@extends('admin.pages.master')

@section('title')
    Time Range
@endsection

@section('content')
@include('admin.components.alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h4>Create a new Time slot</h4> 
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.createTime') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-3">
                                    <label>Select a Time</label>
                                    <input type="time" class="form-control" name="time" placeholder="Name" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-3">
                                    <label>Select a Day</label>
                                    <select class="form-control custom-select" name="dayoftheweek">
                                        <option value="" selected disabled hidden>Select Day</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
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