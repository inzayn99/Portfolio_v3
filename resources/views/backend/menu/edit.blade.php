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
                            <h3 class="box-title titlefix"> Update Menu Info</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                            <form role="form" action="{{ route('menu.update', $menu->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="box-body">
                                    <div class="row">
                                        <!-- Banner-img-->
                                        <div class="col-md-12">
                                            <label for="banner_image">Banner Image</label><small class="req">*</small>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm1" data-input="thumbnail" data-preview="holder"
                                                        class="btn btn-info btn-sm lfm">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" value="{{ $menu->banner_image }}"
                                                    type="text" name="banner_image" readonly>
                                            </div>
                                            <img id="holder" style="margin-top:15px;max-height:100px;">
                                            <p class="text-danger">
                                                {{ $errors->first('banner_image') }}
                                            </p>
                                        </div>
                                        <!-- name -->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Menu Name<small class="req">*</small></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $menu->name }}" placeholder="Menu Name" required>
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Page-title -->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Page Title<small class="req">*</small></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="page_title"
                                                        value="{{ $menu->page_title }}" placeholder="Meneu page title"
                                                        required>
                                                    <span class="text-danger">{{ $errors->first('page_title') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="setting" bis_skin_checked="1"></div>
                                        </div>
                                        <!-- menu-category -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="menu_category">Menu Category: </label>
                                                <select name="menu_category" class="form-control menuCat">
                                                    <option value="">--Select a category--</option>
                                                    @foreach ($menu_categories as $category)
                                                        <option
                                                            value="{{ $category->slug }}"{{ $category->slug == $menu->category_slug ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">
                                                    {{ $errors->first('menu_category') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--menu-link-->
                                        <div class="col-md-4 content-slug" style="display: none">
                                            <div class="form-group">
                                                <label for="">Select Menu Link : </label>
                                                <select name="content_slug" class="form-control" id="menuLink">

                                                </select>
                                                <p class="text-danger">
                                                    {{ $errors->first('content_slug') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--main-or-child-menu-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Main Child">Main or Child Menu:</label>
                                                <select name="main_child" class="form-control main_child" id="main_child">
                                                    <option value="">--Choose as main or child--</option>
                                                    <option value="0"{{ $menu->main_child == 0 ? 'selected' : '' }}>
                                                        Main Menu</option>
                                                    <option value="1"{{ $menu->main_child == 1 ? 'selected' : '' }}>
                                                        Chlid Menu</option>
                                                </select>
                                                <p class="text-danger">
                                                    {{ $errors->first('main_child') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--Under-main-menu-->
                                        <div class="col-md-4" id="parent" style="display: none;">
                                            <div class="form-group">
                                                <label for="parent id">Under Main Menu:</label>
                                                <select name="parent_id" class="form-control">
                                                    <option value="">--Select a Parent Menu--</option>
                                                    @foreach ($parent_menus as $parent_menu)
                                                        <option
                                                            value="{{ $parent_menu->id }}"{{ $menu->parent_id == $parent_menu->id ? 'selected' : '' }}>
                                                            {{ $parent_menu->name }}</option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">
                                                    {{ $errors->first('parent_id') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--Show-on-->
                                        <div class="col-md-4" id="header_footer" style="display: none;">
                                            <div class="form-group">
                                                <label for="show in">Show In:</label>
                                                <select name="show_in" class="form-control">
                                                    <option value="">--Select where to show--</option>
                                                    <option
                                                        value="1"{{ $menu->header_footer == 1 ? 'selected' : '' }}>
                                                        Header</option>
                                                    <option
                                                        value="2"{{ $menu->header_footer == 2 ? 'selected' : '' }}>
                                                        Footer</option>
                                                    <option
                                                        value="3"{{ $menu->header_footer == 3 ? 'selected' : '' }}>
                                                        Header and Footer</option>
                                                </select>
                                                <p class="text-danger">
                                                    {{ $errors->first('show_in') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--./row-->
                                    <div class="row">
                                        <!--content-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Content">Menu Content:</label>
                                                <textarea name="content" id="summernote" class="form-control">{{ $menu->content }}</textarea>
                                                <p class="text-danger">
                                                    {{ $errors->first('content') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" bis_skin_checked="1">
                                        <label for="exampleInputEmail1">Active</label>
                                        <div class="material-switch" bis_skin_checked="1">
                                            <input id="publish_status" name="publish_status" type="checkbox"
                                                @if ($menu->publish_status == 1) checked @endif class="ext_url_chk"
                                                value="1">
                                            <label for="publish_status" class="label-success"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            {{-- <hr> --}}
                                            <h4>SEO | Meta Information</h4>
                                            <hr>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_title">Meta Title(Optional): </label>
                                                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title for SEO" value="{{ $menu->meta_title }}">
                                                <p class="text-danger">
                                                    {{ $errors->first('meta_title') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_keywords">Meta Keywords(Optional): </label>
                                                <input type="text" class="form-control" name="meta_keywords" placeholder="Meta Keywords for SEO" value="{{ $menu->meta_keywords }}">
                                                <p class="text-danger">
                                                    {{ $errors->first('meta_keywords') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="meta-description">Meta Description (optional):</label>
                                                <textarea name="meta_description" cols="30" rows="5" class="form-control" placeholder="Meta description..">{{ $menu->meta_description }}</textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label for="banner_image">Og image:</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="lfm1" data-input="thumbnail2" data-preview="holder2" class="btn btn-info btn-sm lfm" >
                                                    <i class="fa fa-picture-o"></i> Choose
                                                  </a>
                                                </span>
                                                <input id="thumbnail2" class="form-control" value="{{$menu->og_image}}" type="text" name="og_image" readonly>
                                              </div>
                                              <img id="holder2" style="margin-top:15px;max-height:100px;">
                                              <p class="text-danger">
                                                {{ $errors->first('og_image') }}
                                            </p>
                                        </div>

                                        {{-- <div class="col-md-6">
                                            <label for="">Current Og:</label> <br>
                                            <img id="current_og" style="height: 100px;" src="{{ Storage::disk('uploads')->url($menu->og_image ? $menu->og_image : 'noimage.jpg') }}">
                                        </div> --}}

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="external_link">External Link(Optional): </label>
                                                <input type="text" class="form-control" name="external_link" placeholder="External Link" value="{{ $menu->external_link }}">
                                                <p class="text-danger">
                                                    {{ $errors->first('external_link') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-primary pull-right"
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
    <script type="text/javascript">
        window.onload = function() {
            var main_child = document.getElementById('main_child').value;
            if (main_child == 0) {
                document.getElementById("header_footer").style.display = "block";
            } else if (main_child == 1) {
                document.getElementById("parent").style.display = "block";
            }
        };
    </script>
    <script>
        $(function() {
            $('.main_child').change(function() {
                var main_child = $(this).children("option:selected").val();
                if (main_child == 1) {
                    document.getElementById("parent").style.display = "block";
                    document.getElementById("header_footer").style.display = "none";
                } else if (main_child == 0) {
                    document.getElementById("parent").style.display = "none";
                    document.getElementById("header_footer").style.display = "block";
                }
            })
        });
    </script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $(document).ready(function() {

            // $('.menuCat').trigger('change');

            $('.lfm').filemanager('image');

            var a = $('.menuCat').val();
            if (a == 'course') {
                $('.content-slug').show();
                $.ajax({
                    url: "{{ route('menuLinkCourse') }}",
                    type: "GET",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    cache: false,
                    success: function(response) {
                        var course = response;
                        document.getElementById("menuLink").innerHTML =
                            course.reduce((tmp, x) =>
                                `${tmp}<option value='${x.slug}'>${x.title}</option>`, '');
                    }
                });

            }

            $('.menuCat').change(function() {
                var a = $(this).val();
                if (a == 'course') {

                    $('.content-slug').show();
                    $.ajax({
                        url: "{{ route('menuLinkCourse') }}",
                        type: "GET",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        cache: false,
                        success: function(response) {
                            // console.log(response);
                            var course = response;
                            document.getElementById("menuLink").innerHTML =
                                course.reduce((tmp, x) =>
                                    `${tmp}<option value='${x.slug}'>${x.title}</option>`, '');
                        }
                    });
                } else {
                    $('.content-slug').hide();
                }
            });

        });
    </script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 100,
            placeholder: "Menu content.."
        });
    </script>
@endpush
