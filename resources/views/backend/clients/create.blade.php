@extends('backend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @isset($clients)
                    <form action="{{ route('clients.update', @$clients->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                        @endisset
                        <!--main-form-->
                        <div class="col-md-9" bis_skin_checked="1">
                            <!-- Basic information -->
                            <div class="box box-primary" bis_skin_checked="1">
                                <div class="box-header with-border" bis_skin_checked="1">
                                    <h3 class="box-title">
                                        Clients | <small>Basic Informations</small>
                                    </h3>
                                </div>
                                <!-- form start -->
                                <div class="box-body" bis_skin_checked="1">
                                    <!--- title --->
                                    <div class="col-md-12" bis_skin_checked="1">
                                        <div class="form-group" bis_skin_checked="1">
                                            <label for="title">Title</label><small class="req"> *</small>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Enter title" value="{{ old('title', @$clients->title) }}"
                                                required>
                                            <span class="text-danger"> {{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                    <!--- link --->
                                    <div class="col-md-12" bis_skin_checked="1">
                                        <div class="form-group" bis_skin_checked="1">
                                            <label for="link">Link | URL</label><small class="req"> *</small>
                                            <input type="text" name="link" class="form-control"
                                                placeholder="Enter link" value="{{ old('link', @$clients->link) }}">
                                            <span class="text-danger"> {{ $errors->first('link') }}</span>
                                        </div>
                                    </div>



                                    <div class="box-body" bis_skin_checked="1">
                                        <!-- Meta Title -->
                                        <div class="form-group" bis_skin_checked="1">
                                            <label for="meta_title">Meta Title (Optional)</label>
                                            <input type="text" class="form-control"
                                                   value="{{ old('meta_title', @$clients->meta_title) }}"
                                                   name="meta_title" placeholder="Meta Title">
                                            <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                        </div>
                                        <!-- Meta Keywords -->
                                        <div class="form-group" bis_skin_checked="1">
                                            <label for="meta_keywords">Meta Keywords (Optional)</label>
                                            <input type="text" class="form-control"
                                                   value="{{ old('meta_keywords', @$clients->meta_keywords) }}"
                                                   name="meta_keywords" placeholder="Meta Keywords">
                                            <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                                        </div>

                                        <!-- Meta Description -->
                                        <div class="form-group" bis_skin_checked="1">
                                            <label for="meta_description">Meta Description (Optional)</label>
                                            <textarea name="meta_description" class="form-control"
                                                      placeholder="Meta description..">{{ old('meta_description', @$clients->meta_description) }}</textarea>
                                            <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--SEO-->
                            {{-- <div class="panel box box-primary" bis_skin_checked="1">
                                <div class="box-header with-border" bis_skin_checked="1">
                                    <a class="btn boxplus" data-widget="collapse" data-original-title="Collapse">SEO<i
                                            class="fa fa-plus"></i>
                                    </a>
                                </div>

                                <div class="box-body" bis_skin_checked="1">
                                    <div class="form-group" bis_skin_checked="1">
                                        <label for="exampleInputEmail1">Meta Title</label>
                                        <input type="text" class="form-control" value="" name="meta_title"
                                            placeholder="Meta Title">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group" bis_skin_checked="1">
                                        <label for="exampleInputEmail1">Meta Keyword</label>
                                        <input type="text" class="form-control" value="" name="meta_keywords"
                                            placeholder="Meta Keywords">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group" bis_skin_checked="1">
                                        <label for="exampleInputEmail1">Meta Description</label>
                                        <textarea name="meta_description" placeholder="" type="text" class="form-control"></textarea>
                                        <span class="text-danger"></span>
                                    </div>

                                </div>
                            </div> --}}
                        </div>
                        <!-- left column -->
                        <div class="col-md-3 col-sm-12" bis_skin_checked="1">
                            <div class="uploadbarfixes" bis_skin_checked="1">
                                <div class="box box-primary" bis_skin_checked="1">
                                    <!--cover-img-->
                                    <div class="box-body" bis_skin_checked="1">
                                        <div class="form-group" bis_skin_checked="1">
                                            <div class="col-md-10" bis_skin_checked="1">
                                                <div class="input-group" bis_skin_checked="1">
                                                    <span class="input-group-btn">
                                                        <a id="lfmCover" data-input="thumbnailCover"
                                                            data-preview="coverPreview" class="btn btn-info btn-sm lfm"><i
                                                                class="fa fa-picture-o"></i> Cover Image</a>
                                                    </span>
                                                    <input id="thumbnailCover" class="form-control"
                                                        value="{{ old('cover_image', @$clients->cover_image) }}"
                                                        type="text" name="cover_image" onchange="loadCover()"
                                                        readonly>
                                                </div>
                                                <img id="coverPreview"
                                                    style="margin-top: 15px;border-radius: 5px; max-height: 126px; width: 235px; object-fit: cover;"
                                                    src="{{ old('cover_image', @$clients->cover_image) ? @$clients->cover_image : asset('storage/noimage.jpg') }}">
                                                <span>{{ $errors->first('cover_image') }}</span>
                                            </div>

                                            <div id="holder" style="margin-top:10px; max-width: 100%;"
                                                bis_skin_checked="1">
                                                <img id="holder" style="max-width: 100%;">
                                                <p class="text-danger"></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- publish-status -->
                                <div class="box box-primary" bis_skin_checked="1">
                                    <div class="box-body" bis_skin_checked="1">
                                        <!-- Publish Status -->
                                        <div class="form-group" style="margin-bottom: 0;" bis_skin_checked="1">
                                            <label for="publish_status">Publish Status</label>
                                            <div class="material-switch pull-right" bis_skin_checked="1">
                                                <input id="publish_status" name="publish_status" type="checkbox" class="chk" value="1"
                                                    {{ @$clients->publish_status == 1 ? 'checked' : '' }}>
                                                <label for="publish_status" class="label-success"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Save button -->
                                <div class="box box-primary" bis_skin_checked="1">
                                    <div class="box-body" bis_skin_checked="1">
                                        <button type="submit" class="btn cfees btn-block"><i class="fa fa-check-circle"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>

        </section>
        <!-- content -->
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.lfm').filemanager('image');

        });
    </script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 100,
            placeholder: "Clients content.."
        });
    </script>
    <script>
        $("#formButton").click(function() {
            $("#form1").toggle();
        });
    </script>

    <script>


        // Cover Image Preview
        var loadCover = function() {
            var output = document.getElementById('coverPreview');
            output.src = document.getElementById('thumbnailCover').value;
            output.onload = output.src;
        };

        // Initialize file manager
        $(document).ready(function() {
            $('#lfmCover').filemanager('image');
        });
    </script>
@endpush
