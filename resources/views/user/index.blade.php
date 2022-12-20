@extends('user.layouts.app')
<script src="{{ asset('js/app.js') }}"></script>
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
        modalImage.src = "{{ URL::to('/') }}/firebase-temp-uploads/" + params[10];

        console.log('params 10' + params[10]);
    }

    $(document).ready(function() {
        var x = document.getElementById("demo");

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }


        function showPosition(position) {
            var current = position.coords.latitude + position.coords.longitude
            if (localStorage.getItem("coord") == null) {
                localStorage.setItem("coord", current);
            } else if (localStorage.getItem("coord") != current) {
                alert("location change alert!");
            }
            x.href = "https://www.google.com/maps/search/?api=1&query=" +
                position.coords.latitude + "," + position.coords.longitude;
        }
    });
</script>
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
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Devices</h1>
                </div>

                <div class="table table-hover">
                    <table id="usersTable" class="table">
                        <thead>
                            <th>Device ID</th>
                            <th>Device Name</th>
                            {{-- <th>Device Type</th> --}}
                            {{-- <th>Device Unit</th> --}}
                            <th>Device Reading</th>
                            <th>Device Location</th>
                            <th>Device Status</th>
                            {{-- <th>View</th> --}}
                            <th>View on map</th>
                            {{-- <th>Device Status</th> --}}
                            {{-- <th>Device Health</th> --}}
                            {{-- <th>Device Health</th> --}}
                            {{-- <th>Device Uptime</th> --}}
                            {{-- <th>Device IP</th> --}}
                            {{-- <th>Device Subnet</th> --}}
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->device_id }}</td>
                                    <td>{{ $item->device_name }}</td>
                                    {{-- <td>{{ $item->device_type }}</td> --}}
                                    {{-- <td>{{ $item->device_unit }}</td> --}}
                                    <td>{{ $item->device_reading }}</td>
                                    <td>{{ $item->device_location }}</td>
                                    <td>{{ $item->device_status }}</td>
                                    {{-- <td>{{ $item->device_health }}</td> --}}
                                    {{-- <td> <button data-id="{{ $item->device_id }}" class="btn btn-primary btn-sm btn-block"
                                            id={{ 'device' . $item->device_id }}
                                            onclick="popup_modal([
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
                                        </button></td> --}}
                                    <td><a id="demo" href="#" target="_blank" class="btn btn-warning">View on
                                            map</a></td>
                                    {{-- <td>{{ $item->device_uptime }}</td> --}}
                                    {{-- <td>{{ $item->device_ip }}</td> --}}
                                    {{-- <td>{{ $item->device_subnet }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Server Migration <span
                                    class="float-right">20%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Sales Tracking <span
                                    class="float-right">40%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Customer Database <span
                                    class="float-right">60%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Payout Details <span
                                    class="float-right">80%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Account Setup <span
                                    class="float-right">Complete!</span></h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Color System -->
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary text-white shadow">
                                <div class="card-body">
                                    Primary
                                    <div class="text-white-50 small">#4e73df</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    Success
                                    <div class="text-white-50 small">#1cc88a</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-info text-white shadow">
                                <div class="card-body">
                                    Info
                                    <div class="text-white-50 small">#36b9cc</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-warning text-white shadow">
                                <div class="card-body">
                                    Warning
                                    <div class="text-white-50 small">#f6c23e</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-danger text-white shadow">
                                <div class="card-body">
                                    Danger
                                    <div class="text-white-50 small">#e74a3b</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-secondary text-white shadow">
                                <div class="card-body">
                                    Secondary
                                    <div class="text-white-50 small">#858796</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-light text-black shadow">
                                <div class="card-body">
                                    Light
                                    <div class="text-black-50 small">#f8f9fc</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-dark text-white shadow">
                                <div class="card-body">
                                    Dark
                                    <div class="text-white-50 small">#5a5c69</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 mb-4">
                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                    src="img/undraw_posting_photo.svg" alt="...">
                            </div>
                            <p>Add some quality, svg illustrations to your project courtesy of <a
                                    target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                constantly updated collection of beautiful svg images that you can use
                                completely free and without attribution!</p>
                            <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                unDraw &rarr;</a>
                        </div>
                    </div>
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                        </div>
                        <div class="card-body">
                            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                CSS bloat and poor page performance. Custom CSS classes are used to create
                                custom components and custom utility classes.</p>
                            <p class="mb-0">Before working with this theme, you should become familiar with the
                                Bootstrap framework, especially the utility classes.</p>
                        </div>
                    </div>

                </div>
            </div> --}}

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
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
                    <label for="device_location">Device Image</label>
                    {{-- <input id="device_location" type="text" class="form-control mb-3" name="device_location" readonly> --}}
                </div>
                <div class="row">
                    <img id="device_image" src="" alt="">
                </div>

                <div class="row">
                    <label for="device_location">Device Location</label>
                    {{-- <input id="device_location" type="text" class="form-control mb-3" name="device_location" readonly> --}}
                </div>
                <div class="row">
                    <img id="device_location" src="" alt="">
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
    @endsection
