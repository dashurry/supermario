@extends('admin.pages.master')

@section('title')
    Delivery Man List
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
                          <h4>Simple</h4>
                        </div>
                        <div class="card-body">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Registered On</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($deliveryman as $delivery)
                                <tr>
                                    <th scope="row">{{ $delivery->id }}</th>
                                    <td>
                                        @if ($delivery->profileImg != "")
                                            <img alt="image" class="rounded-circle" width="35" data-toggle="tooltip" title=""
                                            data-original-title="{{ $delivery->name }}" src="{{ asset("uploads/deliveryman/$delivery->profileImg") }}">
                                            @else
                                            <img alt="image" class="rounded-circle" width="35" data-toggle="tooltip" title=""
                                            data-original-title="{{ $delivery->name }}" src="{{ asset("img/defaultDeliveryman35x35.jpg") }}">
                                        @endif
                                    </td>
                                    <td>{{ $delivery->name }}</td>
                                    <td>{{ $delivery->created_at->format('d F, Y') }}</td>
                                    <td>
                                        @if ($delivery->isBusy($delivery->id))
                                        <span class="badge badge-pill badge-warning">Busy</span>
                                        @else
                                        <span class="badge badge-pill badge-success">Ready</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.deliveryman.stats',$delivery->id) }}" class="btn btn-primary">Stats</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Calendar --}}
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Calendar</h4>
                        </div>
                        <div class="card-body">
                            <div class="fc-overflow">
                                <div id="calendar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script src="{{ asset('admin_area/assets/bundles/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('admin_area/assets/bundles/fullcalendar/locales-all.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'UTC',

            headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },

            dayMaxEvents: true, // when too many events in a day, show the popover
            selectable: true,
            locale: 'de',
        });

        // render the calendar
        calendar.render();
        });
    </script>
@endsection


