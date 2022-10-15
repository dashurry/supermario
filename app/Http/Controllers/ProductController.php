<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PriceSection;

class ProductController extends Controller
{

    //Checking if logged in
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only' => 'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    //Return Product Page
    public function storeProduct(Request $req)
    {
        $this->validate(
            $req,
            [
                "productName" => "required",
                "productCategory" => "required",
                "productImage" => "required | mimes:jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP",
                "productPrice" => "required_if:multiplePrice,false",
                "size.0" => "required_if:multiplePrice,true",
                "multipleProductPrice.0" => "required_if:multiplePrice,true"
            ],
            [
                "productName.required" => "Please Insert a Product Name",
                "productCategory.required" => "Please Insert a Product Category",
                "productImage.required" => "Please Insert a Product Image",
                "productImage.mimes" => "File format not supported",
                "multipleProductPrice.required_if" => "Selling Price is missing",

                "size.0.required_if" => "Title missing",
                "multipleProductPrice.0.required_if" => "Selling Price is missing"
            ]
        );

        // Storing to Database
        //New Product

        // Create New Data
        $new_product = new Product();

        // Insert Data
        $new_product->name = $req->productName;
        $new_product->category_id = $req->productCategory;
        $new_product->description = $req->productDescription;
        $new_product->sale_price = $req->productSalePrice;
        $new_product->product_price = $req->productPrice;
        $new_product->multiplePrice = $req->multiplePrice;
        $new_product->uploaded_by = auth('admin')->user()->name;
        /* $new_product->description = $req->productDescription; */

        // Upload Image
        $file = $req->file('productImage');
        $new_fileName = $req->productName . "_" . rand() . "_" . time() . "." . $file->getClientOriginalExtension();

        $file->move(public_path("uploads/product"), $new_fileName);
        $new_product->img = $new_fileName;

        // Save to Database
        if ($req->multiplePrice == 'false') {
            if ($new_product->save()) {
                session()->flash('success', 'New Product has been created');
                return redirect()->back();
            } else {
                session()->flash('error', 'Failed to create new Product');
                return redirect()->back();
            }
        } elseif ($req->multiplePrice == 'true') {
            // Product saving
            if ($new_product->save()) {
                //after saving get Product ID
                $product_id = $new_product->id;

                $sizes = $req->size;
                $multipleSalePrice = $req->multipleSalePrice;
                $multipleProductPrice = $req->multipleProductPrice;

                $html = "";
                foreach ($sizes as $i => $size)
                {
                    if ($sizes[$i] != "")
                                {
                                PriceSection::insert(
                                    [
                                        "product_id" => $product_id,
                                        "size" => $size,
                                        "sale_price" => $multipleSalePrice[$i],
                                        "product_price" => $multipleProductPrice[$i],
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s')
                                    ]
                                );
                            }
                        }
                session()->flash('success', 'New Product has been created');
                return redirect()->back();
            }
        }
    }
    // search Product
    public function searchProduct(Request $req)
    {
        $text = $req->search;

        $products = Product::orderBy('id','desc')->where('id',$text)->orWhere('name','like',"%$text%")->paginate(20);
        return view('admin.pages.productList')->with(compact('products','text'));
        return $text;
    }


    // delete Product
    public function deleteProduct($id)
    {
        if ($data = Product::find($id)) {

            //delete product image from folder
            
            if (file_exists(public_path('uploads/product/' . $data->img))) {
                unlink(public_path('uploads/product/' . $data->img));
            }
            $data->delete();

            session()->flash('success', 'Category deleted!');
            return redirect()->back();
        } else {
            session()->flash('error', 'ID not found');
            return redirect()->back();
        }
    }
    // Update edited Product
    public function updateProduct(Request $req)
    {
        $this->validate(
            $req,
            [
                "productId" => "required | numeric",
                "productName" => "required",
                "productCategory" => "required",
                "productImage" => "required | mimes:jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP",
                "productPrice" => "required_if:multiplePrice,false"
            ],
            [
                "productName.required" => "Please Insert a Product Name",
                "productCategory.required" => "Please Insert a Product Category",
                "productImage.required" => "Please Insert a Product Image",
                "productImage.mimes" => "File format not supported",
                "multipleProductPrice.required_if" => "Selling Price is missing"
            ]
        );

        if ($updateProduct = Product::find($req->productId)) {
            // Storing to Database

            // Insert Data
            $updateProduct->name = $req->productName;
            $updateProduct->category_id = $req->productCategory;
            $updateProduct->description = $req->productDescription;
            $updateProduct->sale_price = $req->productSalePrice;
            $updateProduct->product_price = $req->productPrice;
            $updateProduct->multiplePrice = $req->multiplePrice;
            /* $updateProduct->description = $req->productDescription; */


            if ($req->hasFile('productImage')) {

                //delete icon
                if (file_exists(public_path('uploads/product' . $updateProduct->img))) {
                    unlink(public_path('uploads/product' . $updateProduct->img));
                }
            }

            // Upload Image
            $file = $req->file('productImage');
            $new_fileName = $req->productName . "_" . rand() . "_" . time() . "." . $file->getClientOriginalExtension();

            $file->move(public_path("uploads/product"), $new_fileName);
            $updateProduct->img = $new_fileName;

            // Save to Database
            if ($req->multiplePrice == 'false') {
                if ($updateProduct->save()) {
                    session()->flash('success', 'Product has been updated');
                    return redirect()->back();
                } else {
                    session()->flash('error', 'Failed to create new Product');
                    return redirect()->back();
                }
            } elseif ($req->multiplePrice == 'true') {
                // Product saving
                if ($updateProduct->save()) {
                    //after saving get Product ID
                    $product_id = $req->productId;

                    $sizes = $req->size;
                    $multipleSalePrice = $req->multipleSalePrice;
                    $multipleProductPrice = $req->multipleProductPrice;

                    $html = "";
                    if (!empty($sizes)) {
                        
                            foreach ($sizes as $i => $size)
                            {
                                if ($sizes[$i] != "")
                                {
                                PriceSection::insert(
                                    [
                                        "product_id" => $product_id,
                                        "size" => $size,
                                        "sale_price" => $multipleSalePrice[$i],
                                        "product_price" => $multipleProductPrice[$i],
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s')
                                    ]
                                );
                            }
                        }
                    }
                    session()->flash('success', 'Product has been updated');
                    return redirect()->back();
                }
            }
        } else {
            session()->flash('error', 'Invalid Request');
            return redirect()->back();
        }
    }

    // edit Product Price
    public function editProductPrice(Request $req)
    {
        if ($data = PriceSection::find($req->productId))
        {
            $data->size = $req->editSize;
            $data->product_price = $req->editProductPrice;
            $data->sale_price = $req->editSalePrice;

            if ($data->save()) {
                session()->flash('success', 'Product Price has been updated');
                return redirect()->back();
            } else {
                session()->flash('error', 'Failed to update new Product Price');
                return redirect()->back();
            }
        }
        else{
            session()->flash('error', 'Invalid Request');
            return redirect()->back();
        }
    }

    // delete Product Price
    public function deleteProductPrice($id)
    {
        if($data = PriceSection::find($id)){

            if ($data->delete()) {
                session()->flash('success', 'Product Price has been deleted');
                return redirect()->back();
            } else {
                session()->flash('error', 'Failed to delete new Product Price');
                return redirect()->back();
            }
        }
        else{
            session()->flash('error', 'Invalid Request');
            return redirect()->back();
        }
    }
}
