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
                    <h1 class="h3 mb-0 text-gray-800">Add Device</h1>
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
                            <form action="add" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="row">
                                    <label for="device_id">Device Id</label>
                                    <input id="device_id" type="text" class="form-control mb-3" name="device_id">
                                </div>
                                <div class="row">
                                    <label for="device_name">Device Name</label>
                                    <input id="device_name" type="text" class="form-control mb-3" name="device_name">
                                </div>
                                <div class="row">
                                    <label for="location_image">Location Image</label>
                                    <img src="https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678111-map-marker-512.png"
                                        id="marker" style="display: none; position: absolute; height: 3%;" />
                                    <input id="location_image" type="file" class="form-control-file mb-3"
                                        name="location_image" onchange="readURL(this);">
                                        <img id="location" src="#" alt="your image"
                                    style="display: none; position:relative" />
                                </div>

                                <div class="row">
                                    <label for="device_image">Device Image</label>
                                    <input id="device_image" type="file" class="form-control-file mb-3" name="device_image">
                                </div>
                                <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_type">Device Type</label>
                                        <input id="device_type" type="text" class="form-control mb-3" name="device_type">
                                    </div>
                                    <div class="col p-0">
                                        <label for="device_uptime">Device Initial Uptime</label>
                                        <input id="device_uptime" type="text" class="form-control mb-3"
                                            name="device_uptime">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_subnet">Device Subnet</label>
                                        <input id="device_subnet" type="text" class="form-control mb-3"
                                            name="device_subnet">
                                    </div>
                                    <div class="col p-0">
                                        <label for="device_ip">Device IP</label>
                                        <input id="device_ip" type="text" class="form-control mb-3" name="device_ip">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_reading">Device Initial Reading</label>
                                        <input id="device_reading" type="number" class="form-control mb-3"
                                            name="device_reading">
                                    </div>
                                    <div class="col p-0">
                                        <label for="device_unit">Device Unit</label>
                                        <input id="device_unit" type="text" class="form-control mb-3" name="device_unit">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="device_status">Device Status</label>
                                        <input id="device_status" type="text" class="form-control mb-3"
                                            name="device_status">
                                    </div>
                                    <div class="col p-0">
                                        <label for="device_health">Device Health</label>
                                        <input id="device_health" type="text" class="form-control mb-3"
                                            name="device_health">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="device_location">Building name</label>
                                    <input id="device_location" type="text" class="form-control mb-3"
                                        name="device_location">
                                </div>
                                <div class="row">
                                    <div class="col pr-1 pl-0">
                                        <label for="floor_level">Floor level</label>
                                        <input id="floor_level" type="text" class="form-control mb-3" name="floor_level">
                                    </div>
                                    <div class="col pr-1 pl-0">
                                        <label for="window_id">Window Id</label>
                                        <input id="window_id" type="number" class="form-control mb-3" name="window_id">
                                    </div>
                                    <div class="col p-0">
                                        <label for="door_id">Door Id</label>
                                        <input id="door_id" type="number" class="form-control mb-3" name="door_id">
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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#location').attr('src', e.target.result).width(150).height(200);
                    };

                    reader.readAsDataURL(input.files[0]);
                    // document.getElementById("location").style.display = "inline-block";
                    $('#location').show();
                }
            }

            $('#location').click(function(e) {
                $('#marker').css('left', e.pageX - 300).css('top', e.pageY - 150).show();
                // Position of the marker is now e.pageX, e.pageY
                // ... which corresponds to where the click was.
            });
        </script>
    @endsection
