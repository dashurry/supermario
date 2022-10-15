@extends('admin.pages.master')

@section('title')
    Create New Category
@endsection


@section('content')
@include('admin.components.alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h4>New Category</h4> 
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="categoryName" placeholder="Name" >
                                </div>
                                <div class="col-md-6">
                                    <label>Sort Number</label>
                                    <input type="number" class="form-control" name="categorySort" placeholder="Sort Order" value="1" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="checkbox" name="defaultCategory" id="defaultCategory">
                                    <label for="defaultCategory">Set as default Category</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Choose an Icon</label>
                                    <input type="file" name="categoryIcon" class="form-control-file" accept="image/*">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-success" value="Create">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection