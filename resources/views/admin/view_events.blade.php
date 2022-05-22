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
                    <h1 class="h3 mb-0 text-gray-800">View Events</h1>
                    <a href="{{ url('admin/add_event') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> New Event</a>
                </div>

                <div class="table table-hover">
                    <table id="devicesTable" class="table">
                        <thead>
                            <th>Event ID</th>
                            <th>Device ID</th>
                            <th>Install date</th>
                            <th>Install time</th>
                            <th>Personal in charge Id</th>
                            <th>Personal in charge Name</th>
                            <th>Device Location</th>
                            <th>Device Status</th>
                            <th>Device Health</th>
                            @if (Auth::user()->role === 'Admin')
                                <th>Edit</th>
                            @endif

                            {{-- <th>Device Uptime</th> --}}
                            {{-- <th>Device IP</th> --}}
                            {{-- <th>Device Subnet</th> --}}

                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->event_id }}</td>
                                    <td><a href="view_device/{{ $item->device_id }}">{{ $item->device_id }}</a></td>
                                    <td>{{ $item->install_date }}</td>
                                    <td>{{ $item->install_time }}</td>
                                    <td>{{ $item->pic_id }}</td>
                                    <td>{{ $item->pic_name }}</td>
                                    <td>{{ $item->device_id }}</td>
                                    <td>{{ $item->status_id }}</td>
                                    <td>{{ $item->location_id }}</td>
                                    {{-- <td>{{ $item->device_uptime }}</td> --}}
                                    {{-- <td>{{ $item->device_ip }}</td> --}}
                                    {{-- <td>{{ $item->device_subnet }}</td> --}}
                                    @if (Auth::user()->role === 'Admin')
                                        <td><a class="btn btn-success btn-sm btn-block"
                                                href="{{ route('updateEvent.admin', $item->event_id) }}">Edit</a></td>
                                    @endif
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
