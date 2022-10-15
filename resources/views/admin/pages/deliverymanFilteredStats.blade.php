@php
    $startYear = $deliverymanData->created_at->year;
    $endYear = \Carbon\Carbon::now()->year;

    $yearRange = range($startYear,$endYear);
@endphp
@extends('admin.pages.master')

@section('title')
    {{ $deliverymanData->name }} - Statistic
@endsection

@section('content')

    <link rel="stylesheet" href="{{ asset('admin_area/assets/bundles/fullcalendar/fullcalendar.min.css') }}">

    @include('admin.components.alert')

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                          <h4>{{ $deliverymanData->name }} - Results for the year {{ $data['year'] }} and month of{{ $data['month'] }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="pb-4">
                                <form action="#" method="GET">
                                    <input type="hidden" name="deliveryman" value="{{ $deliverymanData->id }}">
                                    <div class="row">
                                        <div class="col-3">
                                            <select name="year" class="form-control" required>
                                                <option value="" hidden>Select Year</option>
                                                @foreach ($yearRange as $year)
                                                    <option value="{{ $year }}" @if ($year == $data['year']) selected @endif>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select name="month" class="form-control">
                                                <option value="" hidden>Select Month</option>
                                                <option value="1" @if ($data['month'] == 1) selected @endif>January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select name="day" class="form-control">
                                                <option value="" hidden>Today</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-3">
                                                <button type="submit" class="btn btn-success">Filter</button>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Order Id</th>
                                <th scope="col">Order Placed At</th>
                                <th scope="col">Order Assigned At</th>
                                <th scope="col">Order Delivered At</th>
                                <th scope="col">Order Delivered With</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($stats as $stat)
                                <tr>
                                    <td>{{ $stat->id }}</td>
                                    <td>{{ $stat->created_at->format('d F, Y - H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($stat->delivery_man_assign_time)->format('d F, Y - H:i') }}</td>
                                    <td>
                                        @if ($stat->status == "Completed")
                                        {{ $stat->updated_at->format('d F, Y - H:i') }}
                                        @else
                                        Waiting...
                                        @endif
                                    </td>
                                    <td>
                                        @if ($stat->status == "Completed")
                                        <span class="badge badge-pill badge-success">Completed</span>
                                        @else
                                        <span class="badge badge-pill badge-warning">In Progress</span>
                                        @endif
                                    </td>
                                    <td>Fiat TG 454554</td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="text-center">
                            {{ $stats->links('pagination::bootstrap-4') }}
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script src="{{ asset('admin_area/assets/bundles/fullcalendar/fullcalendar.min.js') }}"></script> 
@endsection


