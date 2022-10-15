<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Checking if logged in
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only' => 'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    //Submit new category to database
    public function storeCategory(Request $req)
    {
        $this->validate($req, 
        [
            "categoryName" => "required", 
            "categorySort" => "required | numeric", 
            "categoryIcon" => "required | mimes:jpg,jpeg,png,webp,svg,JPG,JPEG,PNG,WEBP,SVG"
        ],
        [
            "categoryName.required" => "Please Insert a Category Name", 
            "categorySort.required" => "Please Insert a Sort Number", 
            "categoryIcon.required" => "Please Insert a Icon",
            "categoryIcon.mimes" => "File format not supported"
        ]
    );

    // Create New Data
    $new_data = new Category();

    // Insert Data
    $new_data->name = $req->categoryName;
    $new_data->sort_number = $req->categorySort;

    if($req->defaultCategory == "on")
            {
                Category::where('default_Category',1)->update(['default_Category'=>2]);
                $new_data->default_Category = 1;
            }

    // Upload Image
    if($req->hasFile('categoryIcon')){
        $file = $req->file('categoryIcon');
        $new_fileName= "category_".$req->categoryName . "_".rand().".".$file->getClientOriginalExtension();

        $file->move(public_path("uploads/icon/category"),$new_fileName);
        $new_data->icon = $new_fileName;
    }

    // Save the data
    if($new_data->save())
    {
        session()->flash('success', 'New Category has been created');
        return redirect()->back();
    }
    else{
        session()->flash('error', 'Failed to create new Category');
        return redirect()->back();
    }

    }
    // edit Category
    public function editCategory($id)
    {
        if($data = Category::find($id))
        {
            return view('admin.pages.editCategory',compact('data'));
        }
        else
        {
            abort(404);
        }
    }

    // Update edited Category
    public function updateCategory(Request $req)
    {
        $this->validate($req, 
        [
            "categoryName" => "required",
            "categoryID" => "required | numeric", 
            "categorySort" => "required | numeric", 
            "categoryIcon" => "required | mimes:jpg,jpeg,png,webp,svg,JPG,JPEG,PNG,WEBP,SVG"
        ],
        [
            "categoryName.required" => "Please Insert a Category Name",
            "categoryID.required" => "Please Insert a Category ID",
            "categoryID.numeric" => "ID must be numeric",  
            "categorySort.required" => "Please Insert a Sort Number",
            "categoryIcon.mimes" => "File format not supported"
        ]
    );

    $id = $req->categoryID;

    if($update = Category::find($id))
        {
            $update->name = $req->categoryName;
            $update->sort_number = $req->categorySort;

            if($req->defaultCategory == "on")
            {
                Category::where('default_Category',1)->update(['default_Category'=>2]);
                $update->default_Category = 1;
            }
            else{
                $update->default_Category = 2;
            }

            if($req->hasFile('categoryIcon')){

                //delete icon
                $old_icon = $update->icon;
                if (file_exists(public_path('uploads/icon/category/'.$old_icon))) {
                    unlink(public_path('uploads/icon/category/'.$old_icon));
                }
                $file = $req->file('categoryIcon');
                $new_fileName= "category_".$req->categoryName . "_".rand().".".$file->getClientOriginalExtension();
        
                $file->move(public_path("uploads/icon/category"),$new_fileName);
                $update->icon = $new_fileName;
            }
            if ($update->save()) {
                session()->flash('success', 'Category '.$req->categoryName.' saved');
                return redirect()->back();
            }
            else
        {
            session()->flash('error', 'Save failed.');
            return redirect()->back();
        }
        }
        else
        {
            session()->flash('error', 'Invalid Request');
            return redirect()->back();
        }
    }

    // delete Category
    public function deleteCategory($id){
        if($data = Category::find($id)){

            //delete icon image from folder
            $icon = $data->icon;
            if (file_exists(public_path('uploads/icon/category/'.$icon))) {
                unlink(public_path('uploads/icon/category/'.$icon));
            }
            $data->delete();

            session()->flash('success', 'Product deleted!');
            return redirect()->back();
        }
        else
        {
            session()->flash('error', 'ID not found');
            return redirect()->back();
        }
    }
}
