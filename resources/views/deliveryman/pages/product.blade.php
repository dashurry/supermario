@extends('admin.pages.master')

@section('title')
    Add Product
@endsection



@section('content')
@include('admin.components.alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.createProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="text-secondary">Basic Information</p>
                        <hr>
                        <input type="number" hidden name="categoryID" value="">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="productName" placeholder="Name" value="">
                            </div>
                            <div class="col-md-6">
                                <label>Product Category</label>
                                <select name="productCategory" class="form-control">
                                    <option value="" hidden>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Product Description</label>
                                <textarea name="productDescription" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label>Select Image</label>
                                <input type="file" name="productImage" class="form-control-file" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>

                        <input type="hidden" type="text" value="false" name="multiplePrice" id="multiplePrice">

                        {{-- Pricing Section --}}
                        <p class="text-secondary">Price Information</p>
                        <hr>

                        <div id="singlePrice">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Product Price</label>
                                    <input type="number" step="any" class="form-control" name="productPrice">
                                </div>

                                <div class="col-md-6">
                                    <label>Sale Price</label>
                                    <input type="number" step="any" class="form-control" name="productSalePrice">
                                </div>
                            </div>
                            <a href="#" onclick="switchToMultiplePrice()">I want multiple price</a>
                        </div>

                        <div id="multiPriceArea" style="display: none">
                            <div id="multiPrice">

                                

                            </div>
                            <button type="button" class="btn btn-sm btn-primary" title="Add new price row" onclick="additionalRow()">
                                <i class="fas fa-plus"></i>
                            </button>
                            <a href="#" class="mt-5" onclick="switchBack()">Switch back to single price</a>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success" value="Upload">
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
    // Switch to multiple Price
    function switchToMultiplePrice()
    {
        $("#singlePrice").hide();
        $("#multiplePrice").val("true");
        $("#multiPriceArea").show(function()
        {
            $.get("{{ asset('admin_area/assets/component/multiprice.blade.php') }}", function(res){
                $('#multiPrice').append(res);
            })
        });
    }

    // Add New Price Row
    function additionalRow()
    {
        $.get("{{ asset('admin_area/assets/component/multiprice.blade.php') }}", function(res){
                $('#multiPrice').append(res);
            })
    }

    // Switch to Single Price
    function switchBack()
    {
        $("#multiPriceArea").hide(function(){
            $('#multiPrice').html("");
        });
        $("#singlePrice").show();
        $("#multiplePrice").val("false");
    }
</script>    
@endsection
