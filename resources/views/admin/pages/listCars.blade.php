@php
    $deliveryguy = \App\Deliveryman::latest()->get();
@endphp
@extends('admin.pages.master')

@section('title')
    Create Car
@endsection

@section('content')
@include('admin.components.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Assign Delivery Guy</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.assignCar') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Select car</label>
                                    <select name="car" class="form-control @error('car') is-invalid @enderror" required>
                                        <option value="" hidden>Select a car</option>
                                            @foreach ($cars as $car)
                                                @if ($car->assigned_to == "")
                                                    <option value="{{ $car->id }}">{{ $car->car_name. "-". $car->car_number }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Select delivery guy</label>
                                    <select name="deliveryman" class="form-control @error('deliveryman') is-invalid @enderror" required>
                                        <option value="" hidden>Select</option>
                                            @foreach ($deliveryguy as $guy)
                                                <option value="{{ $guy->id }}">{{ $guy->name }}</option> 
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="submit" class="btn btn-success" value="Assign">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>List all Cars</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                              <tbody><tr>
                                <th>#</th>
                                <th>Car Name</th>
                                <th>Car Number</th>
                                <th>Assigned to</th>
                                <th>Action</th>
                              </tr>
                              @foreach ($cars as $i=>$car)
                              <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $car->car_name }}</td>
                                <td>{{ $car->car_number }}</td>
                                <td>
                                  <div class="badge badge-success">
                                      @if ($car->assigned_to == "")
                                      N/A
                                      @else
                                      {{ $car->getDeliveryguyName($car->assigned_to) }}
                                      @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown d-inline">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Options
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                          <a class="dropdown-item has-icon" href="{{ route("admin.editCar",$car->id) }}"><i class="far fa-heart"></i> Edit</a>
                                          <a class="dropdown-item has-icon" href="{{ route("admin.deleteCar",$car->id) }}"><i class="far fa-file"></i> Delete</a>
                                          @if ($car->assigned_to != "")
                                            <a class="dropdown-item has-icon" href="{{ route("admin.unassignCar",$car->id) }}"><i class="far fa-clock"></i> Unassign</a>
                                          @endif
                                        </div>
                                      </div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody></table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection