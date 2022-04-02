@extends('user.layouts.app')
<!-- Main Content -->
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('user.header')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">View Devices</h1>
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
                                    {{-- <td>{{ $item->device_uptime }}</td> --}}
                                    {{-- <td>{{ $item->device_ip }}</td> --}}
                                    {{-- <td>{{ $item->device_subnet }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    @endsection
