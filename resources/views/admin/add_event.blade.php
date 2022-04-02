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
                <h1 class="h3 mb-0 text-gray-800">Add Event</h1>
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
                        <form action="add_event" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="row">
                                <label for="install_date">Installation date</label>
                                <input id="install_date" type="date" class="form-control mb-3" name="install_date">
                            </div>
                            <div class="row">
                                <label for="install_time">Installation Time</label>
                                <input id="install_time" type="time" class="form-control mb-3" name="install_time">
                            </div>
                            <div class="row">
                                <div class="col pr-1 pl-0">
                                    <label for="pic_id">Person In Charge Id</label>
                                    <input id="pic_id" type="text" class="form-control mb-3" name="pic_id">
                                </div>
                                <div class="col p-0">
                                    <label for="pic_name">Person In Charge Name</label>
                                    <input id="pic_name" type="text" class="form-control mb-3" name="pic_name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pr-1 pl-0">
                                    <label for="device_id">Device Id</label>
                                    <input id="device_id" type="text" class="form-control mb-3" name="device_id">
                                </div>
                                <div class="col p-0">
                                    <label for="location_id">Location Id</label>
                                    <input id="location_id" type="text" class="form-control mb-3" name="location_id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pr-1 pl-0">
                                    <label for="device_reading">Reading Id</label>
                                    <input id="device_reading" type="number" class="form-control mb-3" name="device_reading">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pr-1 pl-0">
                                    <label for="device_status">Device Status Id</label>
                                    <input id="device_status" type="text" class="form-control mb-3" name="device_status">
                                </div>
                            </div>

                            <div class="row">
                                <button class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
