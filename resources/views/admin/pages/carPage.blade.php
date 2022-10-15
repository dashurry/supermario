@extends('admin.pages.master')

@section('title')
    Create Car
@endsection

@section('content')
@include('admin.components.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Car</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("admin.carPage") }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Car Name</label>
                                    <input type="text" class="form-control
                                    @error('carName') is-invalid @enderror" placeholder="Car name" name="carName" value="{{ old('carName') }}">
                                    @error('carName')
                                       <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Car number</label>
                                    <input type="text" class="form-control
                                    @error('carNumber') is-invalid @enderror" placeholder="Car number" name="carNumber" value="{{ old('carNumber') }}">
                                    @error('carNumber')
                                       <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="submit" class="btn btn-success" value="Create">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection