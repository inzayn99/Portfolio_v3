@extends('backend.layouts.app')
@push('styles')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .hide {
            display: none;

        }

        .show {
            display: block;
        }
    </style>
    <!-- summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><a href="{{ route('about.index') }}" class="btn btn-primary">View About Information</a></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">About Information</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @isset($about)
                                    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                    @else
                                        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            @endif
                                            <div class="row">

                                                 <!---title--->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Restaurant Title">Title :</label>
                                                        <input type="text"
                                                            value="{{ isset($about) ? $about->title : old('title') }}"
                                                            class="form-control" name="title" placeholder="Enter Title"
                                                            required>
                                                        <p class="text-danger">
                                                            {{ $errors->first('title') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                 <!---Sub title--->
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Restaurant Sub Title">Sub Title :</label>
                                                        <input type="text"
                                                            value="{{ isset($about) ? $about->sub_title : old('sub_title') }}"
                                                            class="form-control" name="sub_title" placeholder="Enter sub Title"
                                                            required>
                                                        <p class="text-danger">
                                                            {{ $errors->first('sub_title') }}
                                                        </p>
                                                    </div>
                                                </div> --}}

                                                {{-- <div class="col-md-6">
                                                    <label for="image">Image:</label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a id="lfm" data-input="thumbnail1" data-preview="holder1"
                                                                class="btn btn-primary lfm">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                            </a>
                                                        </span>
                                                        <input id="thumbnail1" value="{{ old('image', @$about->image) }}"
                                                            class="form-control" type="text" name="image" readonly>
                                                    </div>
                                                    <img id="holder1" style="margin-top:15px;max-height:100px;">
                                                    <p class="text-danger">
                                                        {{ $errors->first('image') }}
                                                    </p>
                                                </div> --}}

                                                 <!---Description--->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Content">Brief description :</label>
                                                        <textarea name="description" id="summernote" class="form-control">{{ isset($about) ? $about->description : old('description') }}</textarea>
                                                        <p class="text-danger">
                                                            {{ $errors->first('description') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <!---amenities--->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Content">Amenities Information:</label>
                                                        <textarea name="amenities" id="summernote2" class="form-control">{{ isset($about) ? $about->amenities : old('amenities') }}</textarea>
                                                        <p class="text-danger">
                                                            {{ $errors->first('amenities') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <!---nearby--->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Content">Nearby Information:</label>
                                                        <textarea name="nearby" id="summernote3" class="form-control">{{ isset($about) ? $about->nearby : old('nearby') }}</textarea>
                                                        <p class="text-danger">
                                                            {{ $errors->first('nearby') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <!---guest policies--->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Content">Guest Policies Information:</label>
                                                        <textarea name="guest_policies" id="summernote4" class="form-control">{{ isset($about) ? $about->guest_policies : old('guest_policies') }}</textarea>
                                                        <p class="text-danger">
                                                            {{ $errors->first('guest_policies') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                 <!---public status--->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Active">Active: </label>
                                                        <label class="switch pt-0">
                                                            <input type="checkbox" name="publish_status"
                                                                @if (isset($about)) @if ($about->publish_status == 1) checked @endif
                                                                @endif value="1">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            {{--<div class="col-md-12 text-center">
                                                <hr>
                                                <h3>Meta Information</h3>
                                                <hr>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title(Optional): </label>
                                                    <input type="text" value="{{isset($feature)?$feature->meta_title:old('meta_title') }}" class="form-control" name="meta_title" placeholder="Meta Title for SEO" value="">
                                                    <p class="text-danger">
                                                        {{ $errors->first('meta_title') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meta_keywords">Meta Keywords(Optional): </label>
                                                    <input type="text" class="form-control" value="{{isset($feature)?$feature->meta_keywords:old('meta_keywords') }}" name="meta_keywords" placeholder="Meta Keywords for SEO" value="">
                                                    <p class="text-danger">
                                                        {{ $errors->first('meta_keywords') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="meta-description">Meta Description (optional):</label>
                                                    <textarea name="meta_description" cols="30" rows="5" class="form-control" placeholder="Meta description..">{{isset($feature)?$feature->meta_description:old('meta_description') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="banner_image">Og image:</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a id="lfm1" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary lfm" >
                                                        <i class="fa fa-picture-o"></i> Choose
                                                      </a>
                                                    </span>
                                                    <input id="thumbnail2" value="{{old('og_image',@$feature->og_image)}}" class="form-control" value="{{old('og_image')}}" type="text" name="og_image" readonly>
                                                  </div>
                                                  <img id="holder2" style="margin-top:15px;max-height:100px;">
                                                  <p class="text-danger">
                                                    {{ $errors->first('og_image') }}
                                                </p>
                                            </div>
                                            </div>
                                        </div> --}}

                                            <div class="col-md-12 mt-4">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--content -->
        </div>
        <!--content-wrapper -->
    @endsection

    @push('scripts')
        <script type="text/javascript">
            $('#summernote').summernote({
                height: 150,
                placeholder: "Description..."
            });
            $('#summernote2').summernote({
                height: 150,
                placeholder: "Amenities..."
            });
            $('#summernote3').summernote({
                height: 150,
                placeholder: "Nearby..."
            });
            $('#summernote4').summernote({
                height: 150,
                placeholder: "Guest policies..."
            });
        </script>


        <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.lfm').filemanager('image');

            });
        </script>
    @endpush
