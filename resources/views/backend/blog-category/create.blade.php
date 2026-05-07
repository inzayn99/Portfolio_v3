@extends('backend.layouts.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="min-height: 946px;">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"> Update Blog Category</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                            <form role="form" action="{{ route('blog-category.update', $blog->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="box-body">
                                    <div class="row">
                                        <!--title-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Services Title">Title :</label>
                                                <input type="text" value="{{ isset($blog) ? $blog->title : old('title') }}"
                                                    class="form-control" name="title"
                                                    placeholder="Enter Blog Category Title">
                                                <p class="text-danger">
                                                    {{ $errors->first('title') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- image------>
                                        <div class="col-md-6">
                                            <label for="banner_image">Image:</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail1" data-preview="holder1"
                                                        class="btn btn-info btn-sm lfm">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail1" value="{{ old('image', @$blog->image) }}"
                                                    class="form-control" type="text" name="image" readonly>
                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;">
                                            <p class="text-danger">
                                                {{ $errors->first('image') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!---blog-content--->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Content">Blog Content :</label>
                                                <textarea name="description" id="summernote" class="form-control">{{ old('description', @$blog->description) }}</textarea>
                                                <p class="text-danger">
                                                    {{ $errors->first('description') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="material-switch">
                                        <br>
                                        <input id="enable_frontcms" name="publish_status" type="checkbox" class="chk" value="1" {{ $blog->publish_status == 1 ? 'checked' : '' }}>
                                        <label for="enable_frontcms" class="label-success"></label>
                                    </div>
                                    <!--row-->
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h4>Meta Information</h4>
                                            <hr>
                                        </div>
                                        <!---meta-title--->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_title">Meta Title(Optional): </label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('meta_title', @$blog->meta_title) }}" name="meta_title"
                                                    placeholder="Meta Title for SEO" value="">
                                                <p class="text-danger">
                                                    {{ $errors->first('meta_title') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!---meta-keywords--->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_keywords">Meta Keywords(Optional): </label>
                                                <input type="text" class="form-control" name="meta_keywords"
                                                    value="{{ old('meta_keywords', @$blog->meta_keywords) }}"
                                                    placeholder="Meta Keywords for SEO" value="">
                                                <p class="text-danger">
                                                    {{ $errors->first('meta_keywords') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!---Meta-description--->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="meta-description">Meta Description (optional):</label>
                                                <textarea name="meta_description" cols="30" rows="5" class="form-control" placeholder="Meta description..">{{ old('meta_description', @$blog->meta_description) }}</textarea>
                                            </div>
                                        </div>
                                        <!---og-images--->
                                        <div class="col-md-12">
                                            <label for="banner_image">Og image:</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm1" data-input="thumbnail2" data-preview="holder2"
                                                        class="btn btn-info btn-sm lfm">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail2" value="{{ old('og_image', @$blog->og_image) }}"
                                                    class="form-control" value="{{ old('og_image') }}" type="text"
                                                    name="og_image" readonly>
                                            </div>
                                            <img id="holder2" style="margin-top:15px;max-height:100px;">
                                            <p class="text-danger">
                                                {{ $errors->first('og_image') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Save -->
                                <div class="box-footer">
                                    <button type="submit"
                                        class="btn btn-primary submit_schsetting pull-right edit_setting"
                                        data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">
                                        <i class="fa fa-check-circle"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
            // height: 100,
            placeholder: "Blog category content.."
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.lfm').filemanager('image');

        });
    </script>
@endpush
