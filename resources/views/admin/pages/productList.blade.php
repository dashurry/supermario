@extends('admin.pages.master')
<style>
    .productImage {
        width: 50px;
        height: 50px;
        object-fit: cover
    }

</style>

@section('title')
    Product List
@endsection



@section('content')
    @include('admin.components.alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product List</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.searchProduct') }}" method="GET" {{-- enctype="multipart/form-data" --}}>
                        <p class="text-secondary">Basic Information</p>
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Product Name</label>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="search" class="form-control" placeholder="Search for Products" value="@if(isset($text)) {{ $text }} @endif" aria-label="" name="search" required >
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Pricing</th>
                                    <th>Uploaded by</th>
                                    <th>Uploaded at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td><img class="productImage" src="{{ asset('uploads/product/' . $product->img) }}"
                                                alt=""></td>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->CategoryName($product->category_id) }}</td>
                                        <td>

                                            @if ($product->multiplePrice == 'false')
                                                {{-- Single Price--}}
                                                @if ($product->product_price != '')
                                                <span class="text-success">
                                                    <del>{{ $product->sale_price }}</del>
                                                    &nbsp;
                                                </span>
                                                @endif
                                            
                                               {{ $product->product_price }} <small>CHF</small>

                                            @elseif($product->multiplePrice == "true")
                                                {{-- multiple Price--}}
                                                <ul style="list-style: none; padding: 0;">
                                                    @foreach ($product->PriceSection($product->id) as $price)
                                                    <li>
                                                        @if ($price->product_price != '')
                                                            <span class="text-success">
                                                                <del>{{ $price->sale_price }}</del>
                                                                &nbsp;
                                                            </span>
                                                        @endif
                                                        {{ $price->product_price }} <small>CHF</small> :
                                                       
                                                        <strong>{{ $price->size }}</strong>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                        </td>
                                        <td>{{ $product->uploaded_by }}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d F Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.editProduct',$product->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                            <a href="{{ route('admin.deleteProduct',$product->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"
                                                    onclick="return confirm('Are you sure?')"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
