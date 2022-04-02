@extends('admin.layouts.app')
<!-- Main Content -->
@section('content')
    <!-- Content Wrapper -->
    <style>
        /* div{
                                            border: 1px red solid;
                                        } */

    </style>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.header')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="row text-center">
                    <div class="mx-auto d-block">
                        <img src="https://www.pngkit.com/png/detail/263-2636288_admin-premiumcare-female-administrator-icon.png"
                            alt="" style="height: 20vh">
                    </div>
                </div>
                @if ($result)
                    <div class="alert alert-success" role="alert">
                        Updated!
                    </div>
                @endif
                <form action="{{ url('admin/updateuserinfo') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="{{ $user[0]->id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email"
                            value="{{ $user[0]->email }}">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter email"
                            value="{{ $user[0]->name }}">
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    @endsection
