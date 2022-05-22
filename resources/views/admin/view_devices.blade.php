@extends('admin.layouts.app')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    function popup_modal(params) {
        var btn = document.getElementById(params[0]);
        modal = document.getElementById("myModal");

        modal.style.display = "block";
        modalMessage.value = params[0];
        modalDeviceName.value = params[1];
        modalDeviceType.value = params[2];
        modalDeviceUnit.value = params[3];
        modalDeviceReading.value = params[4];
        modalDeviceLocation.src = "{{ URL::to('/') }}/firebase-temp-uploads/location/" + params[5];
        modalDeviceStatus.value = params[6];
        modalDeviceHealth.value = params[7];
        modalDeviceSubnet.value = params[8];
        modalDeviceIP.value = params[9];
        modalDeviceImage.src = "{{ URL::to('/') }}/firebase-temp-uploads/" + params[10];

    }
</script>
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
                    <h1 class="h3 mb-0 text-gray-800">View Devices</h1>
                    <a href="{{ url('admin/add_device') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Register Device</a>
                </div>

                <div class="table table-hover">
                    <table id="devicesTable" class="table">
                        <thead>
                            <th>Device ID</th>
                            <th>Device Name</th>
                            <th>Device Type</th>
                            <th>Device Unit</th>
                            <th>Device Reading</th>
                            <th>Device Location</th>
                            <th>Device Status</th>
                            <th>Device Health</th>
                            <th>Device IP</th>
                            <th>Event ID</th>
                            <th>Archive</th>
                            @if (Auth::user()->role === 'Admin')
                                <th>Edit</th>
                                <th>View more</th>
                            @endif

                            {{-- <th>Device Uptime</th> --}}
                            {{-- <th>Device IP</th> --}}
                            {{-- <th>Device Subnet</th> --}}

                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->device_id }}</td>
                                    <td>{{ $item->device_name }}</td>
                                    <td>{{ $item->device_type }}</td>
                                    <td>{{ $item->device_unit }}</td>
                                    <td>{{ $item->device_reading }}</td>
                                    <td>{{ $item->device_location }}</td>
                                    <td>{{ $item->device_status }}</td>
                                    <td>{{ $item->device_health }}</td>
                                    <td>{{ $item->device_ip }}</td>
                                    <td><a href="view_event/{{ $item->event_id }}">{{ $item->event_id }}</td>
                                    <td><a onclick="return confirm('are you sure you want to archive this?')" class="btn btn-danger" href="archive/{{ $item->device_id }}">Archive</a></td>
                                    {{-- <td>{{ $item->device_uptime }}</td> --}}
                                    {{-- <td>{{ $item->device_ip }}</td> --}}
                                    {{-- <td>{{ $item->device_subnet }}</td> --}}
                                    @if (Auth::user()->role === 'Admin')
                                        <td><a class="btn btn-success btn-sm btn-block"
                                                href="{{ route('updateDevice.admin', $item->device_id) }}">Edit</a></td>
                                    @endif
                                    <td>
                                        <button data-id="{{ $item->device_id }}" class="btn btn-primary btn-sm btn-block"
                                            id={{ 'device' . $item->device_id }} onclick="popup_modal([
                                                                    '{{ $item->device_id }}',
                                                                    '{{ $item->device_name }}',
                                                                    '{{ $item->device_type }}',
                                                                    '{{ $item->device_unit }}',
                                                                    '{{ $item->device_reading }}',
                                                                    '{{ $item->device_location }}',
                                                                    '{{ $item->device_status }}',
                                                                    '{{ $item->device_health }}',
                                                                    '{{ $item->device_subnet }}',
                                                                    '{{ $item->device_ip }}',
                                                                    '{{ $item->image }}',
                                                                    ])">
                                            View more
                                        </button>
                                    </td>
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
                <span class="close">&times;</span>
                <span class="generate"><button class="btn btn-primary" onclick="generate_report()">Generate Device Report</button></span>
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
                    <label for="image">Device Image</label>
                    {{-- <input id="image" type="text" class="form-control mb-3" name="image" readonly> --}}
                    <img id="image" name="image" alt="">
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
                    {{-- <input id="device_location" type="text" class="form-control mb-3" name="device_location" readonly> --}}
                    <img id="device_location" name="device_location" alt="">
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
            function close_modal() {
                var span = document.getElementsByClassName("close")[0];
                modal.style.display = "none";
            }

            function generate_report(){
                var span = document.getElementsByClassName("close")[0];
                span.style.display = "none"
                var generate = document.getElementsByClassName("generate")[0];
                generate.style.display = "none"
                window.print()
            }

            // window.onclick = function(event) {
            //     if (event.target == modal) {
            //         modal.style.display = "none";
            //     }
            // }
        </script>
    @endsection
