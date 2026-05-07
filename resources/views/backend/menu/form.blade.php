<div id="myModal" class="modal fade" role="dialog">
    {{-- <div class="modal-dialog"> --}}
    <div class="modal-dialog modal-lg modalfullmobile">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Add A New Menu</h4>
            </div>
            <form id="createSliderForm" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="scroll-area">
                    <div class="modal-body pt0 pb0">
                        <div class="row">
                            <!--menu-title-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Menu Title</label><small class="req"> *</small>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" placeholder="Enter Title" required>
                                    <p class="text-danger">
                                        {{ $errors->first('name') }}
                                    </p>
                                </div>
                            </div>
                            <!--menu-title-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="page_title">Page Title : </label>
                                    <input type="text" class="form-control" name="page_title"
                                        value="{{ old('page_title') }}" placeholder="Enter Page title" required>
                                    <p class="text-danger">
                                        {{ $errors->first('page_title') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--banner-image-->
                            <div class="col-md-12">
                                <label for="banner_image">Banner Image:</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm1" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-info btn-sm lfm">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" value="{{ old('banner_image') }}"
                                        type="text" name="banner_image" readonly>
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                <p class="text-danger">
                                    {{ $errors->first('banner_image') }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="menu_category">Menu Category: </label>
                                    <select name="menu_category" class="form-control menuCat">
                                        <option value="">--Select a category--</option>
                                        @foreach ($menu_categories as $category)
                                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">
                                        {{ $errors->first('menu_category') }}
                                    </p>
                                    {{-- <button  class="btn btn-warning"  type="button" id="formButton">Create Category</button>
                                    <label id="form1">
                                        <input type="text" id="name" placeholder="category Title">
                                        <button class="btn btn-success" type="button" id="butsave">Submit</button>
                                    </label> --}}
                                </div>
                            </div>
                            <!--- Select Menu Link --->
                            {{-- <div class="col-md-3 content-slug" style="display: none">
                                <div class="form-group">
                                    <label for="">Select Menu Link : </label>
                                    <select name="content_slug" class="form-control" id="menuLink">
                                    </select>
                                    <p class="text-danger">
                                        {{ $errors->first('content_slug') }}
                                    </p>
                                </div>
                            </div> --}}
                            <!--- Main or Child Menu --->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Main Child">Main or Child Menu:</label>
                                    <select name="main_child" class="form-control main_child">
                                        <option value="">--Choose as main or child--</option>
                                        <option value="0">Main Menu</option>
                                        <option value="1">Chlid Menu</option>
                                    </select>
                                    <p class="text-danger">
                                        {{ $errors->first('main_child') }}
                                    </p>
                                </div>
                            </div>
                            <!--- under main menu --->
                            <div class="col-md-3" id="parent" style="display: none;">
                                <div class="form-group">
                                    <label for="parent id">Under Main Menu:</label>
                                    <select name="parent_id" class="form-control" id="parent_id">
                                        <option value="">--Select a Parent Menu--</option>
                                        @foreach ($parent_menus as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">
                                        {{ $errors->first('parent_id') }}
                                    </p>
                                </div>
                            </div>
                            <!--- show-in --->
                            <div class="col-md-3" id="header_footer" style="display: none;">
                                <div class="form-group">
                                    <label for="show in">Show In:</label>
                                    <select name="show_in" class="form-control" id="show_in_id">
                                        <option value="">--Select where to show--</option>
                                        <option value="1">Header</option>
                                        <option value="2">Footer</option>
                                        <option value="3">Header and Footer</option>
                                    </select>
                                    <p class="text-danger">
                                        {{ $errors->first('show_in') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--- menu-content --->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Content">Menu Content:</label>
                                    <textarea name="content" id="summernote" class="form-control"></textarea>
                                    <p class="text-danger">
                                        {{ $errors->first('content') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="material-switch">
                                <input name="publish_status" type="checkbox" class="chk" value="1" checked="checked">
                                <label for="enable_frontcms" class="label-success"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {{-- <hr> --}}
                                <h4>Meta Information</h4>
                                <hr>
                            </div>
                            <!--- meta-title --->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meta_title">Meta Title(Optional): </label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{ old('meta_title') }}" placeholder="Meta Title for SEO"
                                        value="">
                                    <p class="text-danger">
                                        {{ $errors->first('meta_title') }}
                                    </p>
                                </div>
                            </div>
                            <!--- meta-keywords --->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords(Optional): </label>
                                    <input type="text" class="form-control" name="meta_keywords"
                                        value="{{ old('meta_keyword') }}" placeholder="Meta Keywords for SEO"
                                        value="">
                                    <p class="text-danger">
                                        {{ $errors->first('meta_keywords') }}
                                    </p>
                                </div>
                            </div>
                            <!---meta-description --->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta-description">Meta Description (optional):</label>
                                    <textarea name="meta_description" value="{{ old('meta_description') }}" cols="30" rows="5"
                                        class="form-control" placeholder="Meta description.."></textarea>
                                </div>
                            </div>
                            <!---og-img--->
                            <div class="col-md-6">
                                <label for="banner_image">Og image:</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm1" data-input="thumbnail2" data-preview="holder2"
                                            class="btn btn-info btn-sm lfm">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail2" class="form-control" value="{{ old('og_image') }}"
                                        type="text" name="og_image" readonly>
                                </div>
                                <img id="holder2" style="margin-top:15px;max-height:100px;">
                                <p class="text-danger">
                                    {{ $errors->first('og_image') }}
                                </p>
                            </div>

                            {{-- <div class="col-md-6">
                                <label for="">Current Og:</label> <br>
                                <img id="current_og" style="height: 100px;" src="{{ Storage::disk('uploads')->url('noimage.jpg') }}">
                            </div> --}}
                            <!--- external-link --->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="external_link">External Link(Optional): </label>
                                    <input type="text" class="form-control" name="external_link"
                                        value="{{ old('external_link') }}" placeholder="External link"
                                        value="">
                                    <p class="text-danger">
                                        {{ $errors->first('external_link') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="formaddbtn" data-loading-text="Processing..."
                        class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
@push('scripts')
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
            $('.lfm').filemanager('image');

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


        // var loadBanner = function(event) {
        //     var output = document.getElementById('banner_output');
        //     output.src = URL.createObjectURL(event.target.files[0]);
        //     output.onload = function() {
        //         URL.revokeObjectURL(output.src)
        //     }
        // };

        // var loadImage = function(event) {
        //     var output = document.getElementById('image_output');
        //     output.src = URL.createObjectURL(event.target.files[0]);
        //     output.onload = function() {
        //         URL.revokeObjectURL(output.src)
        //     }
        // };
    </script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 100,
            placeholder: "Menu content.."
        });
    </script>
    <script>
        $("#formButton").click(function() {
            $("#form1").toggle();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#butsave').on('click', function() {
                $("#butsave").attr("disabled", "disabled");
                var name = $('#name').val();
                if (name != "") {
                    $.ajax({
                        url: "{{ route('saveMenuCategory') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            name: name,
                        },
                        cache: false,
                        success: function() {
                            $('#alertMessage').html('<p>success message</p>');
                            setTimeout(function() {
                                location.reload();
                            }, 800);
                        }
                    });
                } else {
                    alert('Please fill all the field !');
                }
            });
        });
    </script>
@endpush
