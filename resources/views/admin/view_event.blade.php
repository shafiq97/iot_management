@extends('admin.layouts.app')
<!-- Main Content -->
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.header')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Edit Event</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            @if (Session::get('success'))
                                <div class="row">
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('fail'))
                                <div class="row">
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                </div>
                            @endif
                            <form action="/admin/edit_event" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="id" value="{{ $event[0]->event_id }}">
                                <div class="row">
                                    <label for="device_id">Install Date</label>
                                    <input id="device_id" type="text" class="form-control mb-3" name="install_date"
                                        value="{{ $event[0]->install_date }}">
                                </div>
                                <div class="row">
                                    <label for="device_name">Install Time</label>
                                    <input id="device_name" type="text" class="form-control mb-3" name="install_time"
                                        value="{{ $event[0]->install_time }}">
                                </div>

                                <div class="row">
                                    <label for="device_name">Personal in charge Id</label>
                                    <input id="device_name" type="text" class="form-control mb-3" name="pic_id"
                                        value="{{ $event[0]->pic_id }}">
                                </div>

                                <div class="row ">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_type">Personal in charge name</label>
                                        <input id="device_type" type="text" class="form-control mb-3" name="pic_name"
                                            value="{{ $event[0]->pic_name }}">
                                    </div>
                                    <div class="col p-0">
                                        <label for="device_uptime">Device ID</label>
                                        <input id="device_uptime" type="text" class="form-control mb-3" name="device_id"
                                            value="{{ $event[0]->device_id }}">
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_subnet">Status Id</label>
                                        <input id="device_subnet" type="text" class="form-control mb-3" name="status_id"
                                            value="{{ $event[0]->status_id }}">
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_subnet">Location Id</label>
                                        <input id="device_subnet" type="text" class="form-control mb-3" name="location_id"
                                            value="{{ $event[0]->location_id }}">
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_subnet">Reading Id</label>
                                        <input id="device_subnet" type="text" class="form-control mb-3" name="reading_id"
                                            value="{{ $event[0]->reading_id }}">
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <button onclick="return confirm('Are you sure you want to update the event?')"
                                        class="btn btn-success btn-block">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            $('#location').click(function(e) {
                $('#marker').css('left', e.pageX-300).css('top', e.pageY-150).show();
                // Position of the marker is now e.pageX, e.pageY
                // ... which corresponds to where the click was.
            });
        </script>
    @endsection
