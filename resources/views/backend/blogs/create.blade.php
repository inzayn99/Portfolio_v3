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
                            <h3 class="box-title titlefix"> Update Blog</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                            <form role="form" action="{{ route('blogs.update', $blog->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="box-body">
                                    <div class="row">
                                        <!-- Name-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Services Title">Main Title :</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('title', @$blog->title) }}" name="title"
                                                    placeholder="Enter Blog Title" required>
                                                <p class="text-danger">
                                                    {{ $errors->first('title') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- Select blog category --->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="Services type">Select blog category :</label>
                                                <select class="form-control" name="blog_category">
                                                    @foreach ($cat as $type)
                                                        <option value="{{ $type->id }}"
                                                            @isset($blog) @if ($blog->blog_category == $type->id) selected @endif @endisset>
                                                            {{ $type->title }}</option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">
                                                    {{ $errors->first('blog_category') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- Select Color --->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="color">Select Color:</label>
                                                <select class="form-control" name="color" id="color">
                                                    <option value="#f50057" {{ old('color') == '#f50057' ? 'selected' : '' }}>Red</option>
                                                    <option value="#ffa500" {{ old('color') == '#ffa500' ? 'selected' : '' }}>Orange</option>
                                                    <option value="#08fdd8" {{ old('color') == '#08fdd8' ? 'selected' : '' }}>Light Sky</option>
                                                    <option value="#81d8f7" {{ old('color') == '#81d8f7' ? 'selected' : '' }}>Sky</option>
                                                    <option value="#42B658" {{ old('color') == '#42B658' ? 'selected' : '' }}>Green</option>
                                                    <option value="#28689E" {{ old('color') == '#28689E' ? 'selected' : '' }}>Light Blue</option>
                                                    <option value="#FED35D" {{ old('color') == '#FED35D' ? 'selected' : '' }}>Yellow</option>
                                                </select>
                                                @if ($errors->has('color'))
                                                    <p class="text-danger">{{ $errors->first('color') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <!--- Select blog authors --->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="Posted_by">Posted By | Author:</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('posted_by', @$blog->posted_by) }}" name="posted_by"
                                                    placeholder="Enter Author Name" required>
                                                <p class="text-danger">
                                                    {{ $errors->first('posted_by') }}
                                                </p>
                                            </div>
                                        </div>
                                        <input type="hidden" name="blog_type" value="Blog" readonly />
                                    </div>
                                    <div class="row">
                                        <!---blog-content--->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Content">Blog Content :</label>
                                                <textarea name="description" id="content" class="form-control ckeditor">{{ old('description', @$blog->description) }}</textarea>
                                                <p class="text-danger">
                                                    {{ $errors->first('description') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- image -->
                                        <div class="col-md-6">
                                            <label for="cover_image">Cover image:</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                        class="btn btn-info btn-sm lfm">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control"
                                                    value="{{ old('cover_image', @$blog->cover_image) }}" type="text"
                                                    name="cover_image" readonly>
                                            </div>
                                            <img id="holder" style="margin-top:15px;max-height:500px;">
                                            <p class="text-danger">
                                                {{ $errors->first('cover_image') }}
                                            </p>
                                        </div>
                                        <!---banner-image--->
                                        <div class="col-md-6">
                                            <label for="banner_image">Banner Image:</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail1" data-preview="holder1"
                                                        class="btn btn-info btn-sm lfm">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail1"
                                                    value="{{ old('banner_image', @$blog->banner_image) }}"
                                                    class="form-control" type="text" name="banner_image" readonly>
                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;">
                                            <p class="text-danger">
                                                {{ $errors->first('banner_image') }}
                                            </p>
                                        </div>
                                    </div>
                                    {{-- <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="settinghr" bis_skin_checked="1"></div>
                                        </div>
                                    </div> --}}
                                    <div class="material-switch">
                                        <br>
                                        <input id="enable_frontcms" name="publish_status" type="checkbox" class="chk"
                                            value="1" {{ $blog->publish_status == 1 ? 'checked' : '' }}>
                                        <label for="enable_frontcms" class="label-success"></label>
                                    </div>
                                    <!--./row-->
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            {{-- <hr> --}}
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
                                                <textarea name="meta_description" cols="30" rows="5" class="form-control"
                                                    placeholder="Meta description..">{{ old('meta_description', @$blog->meta_description) }}</textarea>
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
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.lfm').filemanager('image');

        });
    </script>
    {{-- <script type="text/javascript">
        $('#summernote').summernote({
            height: 100,
            placeholder: "Team content.."
        });
    </script> --}}
    <script>
        $("#formButton").click(function() {
            $("#form1").toggle();
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('#butsave').on('click', function() {
                // $("#butsave").attr("disabled", "disabled");
                var name = $('#name').val();
                if (name != "") {
                    $.ajax({
                        url: "{{ route('teamType.create') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            name: name,
                        },
                        cache: false,
                        success: function(response) {
                            // $('#form1').hide());
                            $('label[for="form1"]').hide();
                            $('#alertMessage').html('<p>success message</p>');
                            $('#test').html(response.data);

                        }
                    });
                } else {
                    alert('Please fill all the field !');
                }
            });
        });
    </script> --}}
@endpush
