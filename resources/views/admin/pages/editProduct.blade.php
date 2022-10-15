@extends('admin.pages.master')
<style>
    .productImage {
        width: 100px;
        height: 100px;
        object-fit: cover
    }

</style>
@section('title')
    Edit Product - {{ $data->name }}
@endsection



@section('content')
    @include('admin.components.alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $data->name }} - {{ $data->id }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.submitProductEdit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="text-secondary">Basic Information</p>
                        <hr>
                        <input type="number" hidden name="productId" value="{{ $data->id }}">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="productName" placeholder="Name"
                                    value="{{ $data->name }}">
                            </div>
                            <div class="col-md-6">
                                <label>Product Category</label>
                                <select name="productCategory" class="form-control">
                                    <option value="" hidden>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($data->category_id == $category->id) selected
                                    @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Product Description</label>
                                <textarea name="productDescription" rows="5"
                                    class="form-control">{{ $data->description }}</textarea>
                            </div>

                            <div class="col-md-3">
                                <img class="productImage" src="{{ asset('uploads/product/' . $data->img) }}" alt="">
                            </div>

                            <div class="col-md-3">
                                <label>Change Image</label>
                                <input type="file" name="productImage" class="form-control-file" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>

                        <input type="hidden" type="text" value="{{ $data->multiplePrice }}" name="multiplePrice"
                            id="multiplePrice">

                        {{-- Pricing Section --}}
                        <p class="text-secondary">Price Information</p>
                        <hr>

                        <div id="singlePrice" @if ($data->multiplePrice == 'true')
                            style="display: none;" @endif>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Product Price</label>
                                    <input type="number" step="any" class="form-control" name="productPrice"
                                        value="{{ $data->product_price }}">
                                </div>

                                <div class="col-md-6">
                                    <label>Sale Price</label>
                                    <input type="number" step="any" class="form-control" name="productSalePrice"
                                        value="{{ $data->sale_price }}">
                                </div>
                            </div>
                            <a href="#" onclick="switchToMultiplePrice()">I want multiple price</a>
                        </div>

                        <div id="multiPriceArea" @if ($data->multiplePrice == 'false')
                            style="display: none;" @endif>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Size</th>
                                        <th>Product Price</th>
                                        <th>Sale Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->PriceSection($data->id) as $product)
                                        <tr data-productid="{{ $product->id }}">
                                            <td data-size="{{ $product->size }}">{{ $product->size }}</td>
                                            <td data-productprice="{{ $product->product_price }}">{{ $product->product_price }}
                                                <small>CHF</small></td>
                                            <td data-productsale="{{ $product->sale_price }}">{{ $product->sale_price }}
                                                <small>CHF</small></td>
                                            <td>
                                                <a href="#" data-target="#editPriceModal" data-toggle="modal"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ route('admin.deleteProductPrice', $product->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="multiPrice">



                            </div>
                            <button type="button" class="btn btn-sm btn-primary" title="Add new price row"
                                onclick="additionalRow()">
                                <i class="fas fa-plus"></i>
                            </button>
                            <br>
                            <br>
                            <a href="#" class="mt-5" onclick="switchBack()">Switch back to single price</a>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    {{-- Modal --}}
    <div class="modal fade" id="editPriceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Price</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.editProductPrice') }}" method="POST">
                        @csrf
                        <input type="hidden" name="productId" id="productId" value="" required>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Size</label>
                                <input type="text" name="editSize" id="editSize" class="form-control" required>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label>Product Price</label>
                                <input type="number" step="any" name="editProductPrice" id="editProductPrice" class="form-control" required>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label>Sale Price</label>
                                <input type="number" step="any" name="editSalePrice" id="editSalePrice" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        $('#editPriceModal').on('show.bs.modal', function (e) 
        { 
            var target = $(e.relatedTarget);
            var productId = target.parent().parent().data('productid');
            var productSize = target.parent().parent().find('td[data-size]').data('size');
            var productPrice = target.parent().parent().find('td[data-productprice]').data('productprice');
            var productSale = target.parent().parent().find('td[data-productsale]').data('productsale');
            alert(productPrice);

            $('#productId').val(productId);
            $('#editSize').val(productSize);
            $('#editProductPrice').val(productPrice);
            $('#editSalePrice').val(productSale);
        })

        // Switch to multiple Price
        function switchToMultiplePrice() {
            $("#singlePrice").hide();
            $("#multiplePrice").val("true");
            $("#multiPriceArea").show();
        }

        // Add New Price Row
        function additionalRow() {
            $.get("{{ asset('admin_area/assets/component/multiprice.blade.php') }}", function(res) {
                $('#multiPrice').append(res);
            })
        }

        // Switch to Single Price
        function switchBack() {
            $("#multiPriceArea").hide(function() {
                $('#multiPrice').html("");
            });
            $("#singlePrice").show();
            $("#multiplePrice").val("false");
        }

    </script>
@endsection
