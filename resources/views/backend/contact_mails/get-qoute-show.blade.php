@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @if (session('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Enrollments details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">enroll-mail</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                {{-- <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('backend/dist/img/user3-128x128.jpg')}}" alt="User profile picture">
                                </div> --}}

                                <h3 class="profile-username text-center">{{$enroll->name}}</h3>

                                <p class="text-muted text-center"><a href="mailto:{{ $enroll->email }}">{{ $enroll->email }}</a></p>

                                    <ul class="list-group list-group-unbordered ">
                                    <li class="list-group-item">
                                        <b>Course</b> <a class="float-right">{{$enroll->course->title}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Received on</b> <a class="float-right">{{ date('F j, Y', strtotime($enroll->created_at)) }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Contact no</b> <a class="float-right">{{$enroll->contact}}</a>
                                    </li>
                                </ul>

                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        {{-- <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Package</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong></i> Package Type</strong>

                                <p class="text-muted"> {{ $enroll->package_type }}</p>
                                <hr>
                                <strong></i> Package Title</strong>

                                <p class="text-muted"> {{ $enroll->package_title }}</p>
                                <hr>
                                <strong></i> Package Price</strong>

                                <p class="text-muted"> {{ $enroll->package_price }}</p>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Message</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> --}}
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                      
                                        <!-- Post -->
                                        <div class="post">
                                            {{$enroll->message }}
                                        </div>

                                        <!-- /.post -->
                                    </div>
                                    
                                </div> 
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
