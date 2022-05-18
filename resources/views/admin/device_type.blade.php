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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">View Device Types</h1>
                    <a href="{{ url('admin/add_device_type') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Register Device Types</a>
                </div>

                <div class="table table-hover">
                    <table id="devicesTable" class="table">
                        <thead>
                            <th>Device Type ID</th>
                            <th>Device Type</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($device_types as $device_type)
                                <tr>
                                    <td>{{ $device_type->device_type_id }}</td>
                                    <td>{{ $device_type->device_type }}</td>
                                    <td><a onclick="return confirm('Are you sure you want to delete this device type?')" href="delete_device_type/{{ $device_type->device_type_id }}" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                {{-- <span class="close">&times;</span> --}}
                <div class="row">
                    <label for="device_id">Device ID</label>
                    <input id="device_id" type="text" class="form-control mb-3" name="device_id" readonly>

                </div>
                <div class="row">
                    <label for="device_type">Device Type</label>
                    <input id="device_type" type="text" class="form-control mb-3" name="device_type" readonly>
                </div>

                <div class="row">
                    <label for="device_name">Device Name</label>
                    <input id="device_name" type="text" class="form-control mb-3" name="device_name" readonly>
                </div>

                <div class="row">
                    <label for="device_unit">Device Unit</label>
                    <input id="device_unit" type="text" class="form-control mb-3" name="device_unit" readonly>
                </div>

                <div class="row">
                    <label for="device_reading">Device Reading</label>
                    <input id="device_reading" type="text" class="form-control mb-3" name="device_reading" readonly>
                </div>

                <div class="row">
                    <label for="device_location">Device Location</label>
                    <input id="device_location" type="text" class="form-control mb-3" name="device_location" readonly>
                </div>

                <div class="row">
                    <label for="device_status">Device Status</label>
                    <input id="device_status" type="text" class="form-control mb-3" name="device_status" readonly>
                </div>

                <div class="row">
                    <label for="device_health">Device Health</label>
                    <input id="device_health" type="text" class="form-control mb-3" name="device_health" readonly>
                </div>
                <div class="row">
                    <label for="device_ip">Device IP</label>
                    <input id="device_ip" type="text" class="form-control mb-3" name="device_ip" readonly>
                </div>
                <div class="row">
                    <label for="device_subnet">Device Subnet</label>
                    <input id="device_subnet" type="text" class="form-control mb-3" name="device_subnet" readonly>
                </div>
            </div>
        </div>

        <script>
            // function close_modal() {
            //     var span = document.getElementsByClassName("close")[0];
            //     modal.style.display = "none";
            // }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    @endsection
