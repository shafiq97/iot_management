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
                    <h1 class="h3 mb-0 text-gray-800">Add Device Unit</h1>
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
                            <form action="device_unit" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="row">
                                    <label for="device_type">Unit</label>
                                    <input id="device_type" type="text" class="form-control mb-3" name="device_unit">
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary">Submit</button>
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
