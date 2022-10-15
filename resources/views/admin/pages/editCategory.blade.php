@extends('admin.pages.master')

@section('title')
    Edit Category - {{ $data->name }}
@endsection


@section('content')
@include('admin.components.alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h4>Edit - {{ $data->name }}</h4> 
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.submitEdit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="number" hidden name="categoryID" value="{{ $data->id }}">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="categoryName" placeholder="Name" value="{{ $data->name }}" >
                                </div>
                                <div class="col-md-6">
                                    <label>Sort Number</label>
                                    <input type="number" class="form-control" name="categorySort" placeholder="Sort Order" value="{{ $data->sort_number }}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="checkbox" name="defaultCategory" id="defaultCategory" @if($data->default_Category == 1) checked @endif>
                                    <label for="defaultCategory">Set as default Category</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Choose Icon</label>
                                    <input type="file" name="categoryIcon" class="form-control-file" accept="image/*">
                                </div>
                            </div>

                            <div class="form-group row">
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