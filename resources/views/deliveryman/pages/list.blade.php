@extends('admin.pages.master')

<style>
    .iconImg{
        width: 50px;
        height: 50px;
        object-fit: cover
    }
</style>
@section('title')
    Category List
@endsection


@section('content')
@include('admin.components.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Category List</h4> 
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Sort Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $i }}</td>
                                <td><img class="iconImg" src="{{ asset('uploads/icon/category/'.$data->icon) }}" alt=""></td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->sort_number }}</td>
                                <td>
                                    <a href="{{ route('admin.editCategory',$data->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="{{ route('admin.deleteCategory',$data->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Are you sure?')"></i>Delete</a>
                                </td>
                            </tr>
                            @php
                                $i++
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection