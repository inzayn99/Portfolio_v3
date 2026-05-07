<form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">

        <!---BACKGROUND COLOR--->
        <div class="col-md-6">
            <label for="color_one">Website Background Color</label>
            <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                <input type="text" class="form-control" value="{{ $setting->color_one }}" data-original-title="" name="color_one" placeholder="Pick the Color" title="">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-square" style="color: {{ $setting->color_one }}"></i></span>
                </div>
            </div>
        </div>

        <!--ABOUT SECTION-->
        <div class="col-md-12">
            <h4>BELOW SLIDER | ABOUT INFORMATION</h3>
        </div>
        <!--Below Slider -image 1-->
        <div class="col-md-10">
            <label for="image_one">Image 1:</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail95" data-preview="holder951" class="btn btn-primary lfm">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail95" class="form-control" value="{{ $setting->image_one }}" type="text"
                    name="image_one" onchange="loadimgOne()" readonly>
            </div>
            <img id="holder951" style="margin-top:15px;max-height:100px;">
            <p class="text-danger">{{ $errors->first('image_one') }}</p>
        </div>
        <!--Recent-image 1-->
        <div class="col-md-2 mt-2">
            {{-- <label for="">Recent Image:</label> <br> --}}
            <img id="image_one" class="img-rounded" style="height: 100px;"
                src="{{ $setting->image_one ?? Storage::disk('uploads')->url('noimage.jpg') }}">
        </div>

        <!--Below Slider -image 2-->
        <div class="col-md-10">
            <label for="image_two">Image 2:</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail96" data-preview="holder951" class="btn btn-primary lfm">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail96" class="form-control" value="{{ $setting->image_two }}" type="text" name="image_two" onchange="loadimgTwo()" readonly>
            </div>
            <img id="holder951" style="margin-top:15px;max-height:100px;">
            <p class="text-danger">{{ $errors->first('image_two') }}</p>
        </div>
        <!--Recent-image -->
        <div class="col-md-2 mt-2">
            {{-- <label for="">Recent Image:</label> <br> --}}
            <img id="image_two" class="img-rounded" style="height: 100px;" src="{{ $setting->image_two ?? Storage::disk('uploads')->url('noimage.jpg') }}">
        </div>
        <div class="col-md-12">
            <label for="">Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="second_main_title"
                    value="{{ $setting->second_main_title }}" placeholder="Title">
                <p class="text-danger">
                    {{ $errors->first('second_main_title') }}
                </p>
            </div>
            <div class="col-md-13">
                <div class="form-group">
                    <label for="second_sub_title">Summary</label>
                    <textarea name="second_sub_title" rows="4" class="form-control" placeholder="Short Summary..">{{ $setting->second_sub_title }}</textarea>
                    <p class="text-danger">
                        {{ $errors->first('second_sub_title') }}
                    </p>
                </div>
            </div>
        </div>
        <!--END ABOUT SECTION-->

        <!--LOCATION AND MAP-->
        <div class="col-md-12">
            <h4>LOCATION & MAPS HOME PAGE</h3>
        </div>
        <div class="col-md-6">
            <label for="">Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="third_main_title"
                    value="{{ $setting->third_main_title }}" placeholder="Main title">
                <p class="text-danger">{{ $errors->first('third_main_title') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Slogan | Short Description</label>
            <div class="form-group">
                <input type="text" class="form-control" name="third_sub_title"
                    value="{{ $setting->third_sub_title }}" placeholder="sub title">
                <p class="text-danger">{{ $errors->first('third_sub_title') }}</p>
            </div>
        </div>

        <!--ROOM-->
        <div class="col-md-12">
            <h4>Rooms & Suites Section</h3>
        </div>
        <div class="col-md-6">
            <label for="">Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="fourth_main_title"
                    value="{{ $setting->fourth_main_title }}" placeholder="title">
                <p class="text-danger">{{ $errors->first('fourth_main_title') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Slogan | Short Description</label>
            <div class="form-group">
                <input type="text" class="form-control" name="fourth_sub_title"
                    value="{{ $setting->fourth_sub_title }}" placeholder="sub title">
                <p class="text-danger">{{ $errors->first('fourth_sub_title') }}</p>
            </div>
        </div>

        <!--AMENITIES-->
        <div class="col-md-12">
            <h4>Amenitis & Facilities</h3>
        </div>
        <div class="col-md-6">
            <label for="">Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="fifth_main_title"
                    value="{{ $setting->fifth_main_title }}" placeholder="title">
                <p class="text-danger">{{ $errors->first('fifth_main_title') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Slogan | Short Description</label>
            <div class="form-group">
                <input type="text" class="form-control" name="fifth_sub_title"
                    value="{{ $setting->fifth_sub_title }}" placeholder="sub title">
                <p class="text-danger">{{ $errors->first('fifth_sub_title') }}</p>
            </div>
        </div>

        <!--Extra Services-->
        <div class="col-md-12">
            <h4>Extra Services Section</h3>
        </div>
        <div class="col-md-6">
            <label for="">Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="sixth_main_title"
                    value="{{ $setting->sixth_main_title }}" placeholder="title">
                <p class="text-danger">{{ $errors->first('sixth_main_title') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Slogan | Short Description</label>
            <div class="form-group">
                <input type="text" class="form-control" name="sixth_sub_title"
                    value="{{ $setting->sixth_sub_title }}" placeholder="Short description">
                <p class="text-danger">{{ $errors->first('sixth_sub_title') }}</p>
            </div>
        </div>

        <!--Testimonial-->
        <div class="col-md-12">
            <h4>Testimonial Section | What our guest say about us</h3>
        </div>
        <div class="col-md-6">
            <label for="">Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="seventh_main_title"
                    value="{{ $setting->seventh_main_title }}" placeholder="title">
                <p class="text-danger">{{ $errors->first('seventh_main_title') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Slogan | Short Description</label>
            <div class="form-group">
                <input type="text" class="form-control" name="seventh_sub_title"
                    value="{{ $setting->seventh_sub_title }}" placeholder="Short description">
                <p class="text-danger">{{ $errors->first('seventh_sub_title') }}</p>
            </div>
        </div>
        <div class="col-md-10">
            <label for="image_three">Testimonial Background Image:</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail97" data-preview="holder951" class="btn btn-primary lfm">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail97" class="form-control" value="{{ $setting->image_three }}" type="text" name="image_three" onchange="loadimgThree()" readonly>
            </div>
            <img id="holder951" style="margin-top:15px;max-height:100px;">
            <p class="text-danger">{{ $errors->first('image_three') }}</p>
        </div>
        <!--Recent-image 1-->
        <div class="col-md-2 mt-2">
            {{-- <label for="">Recent Image:</label> <br> --}}
            <img id="image_three" class="img-rounded" style="height: 80px;" src="{{ $setting->image_three ?? Storage::disk('uploads')->url('noimage.jpg') }}">
        </div>
        <!--end testimonial--->

        <!--News and Blogs-->
        <div class="col-md-12">
            <h4>Blogs & Events Section</h3>
        </div>
        <div class="col-md-6">
            <label for="">Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="blog_main_title"
                    value="{{ $setting->blog_main_title }}" placeholder="title">
                <p class="text-danger">{{ $errors->first('blog_main_title') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Slogan | Short Description</label>
            <div class="form-group">
                <input type="text" class="form-control" name="blog_sub_title"
                    value="{{ $setting->blog_sub_title }}" placeholder="Short description">
                <p class="text-danger">{{ $errors->first('seventh_sub_title') }}</p>
            </div>
        </div>

        <!--Telephone Booking Section-->
        <div class="col-md-12">
            <h4>Telephone Booking Section</h3>
        </div>
        <div class="col-md-6">
            <label for="">Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="footer_title_other"
                    value="{{ $setting->footer_title_other }}" placeholder="title">
                <p class="text-danger">{{ $errors->first('footer_title_other') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Slogan | Short Description</label>
            <div class="form-group">
                <input type="text" class="form-control" name="footer_slogan_other"
                    value="{{ $setting->footer_slogan_other }}" placeholder="Short description">
                <p class="text-danger">{{ $errors->first('footer_slogan_other') }}</p>
            </div>
        </div>
        <div class="col-md-10">
            <label for="company_favicon">Telephone Booking Section Background image:</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail112" data-preview="holder112"
                        class="btn btn-primary lfm">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail112" class="form-control" class="rounded" value="{{ $setting->home_bg_img }}" type="text" name="home_bg_img" onchange="loadHomeBg()" readonly>
            </div>
            <img id="holder112" style="margin-top:15px;max-height:100px;">
            <p class="text-danger">{{ $errors->first('home_bg_img') }}</p>
        </div>
        <div class="col-md-2 mt-2">
            {{-- <label for="">Recent home background image:</label> <br> --}}
            <img id="home_bg_output" style="height: 80px;" class="rounded" src="{{ $setting->home_bg_img ?? Storage::disk('uploads')->url('noimage.jpg') }}">
        </div>
        <!--EndTelephone Booking Section-->

        <div class="col-md-12 text-center mt-4">
            <button type="submit" class="btn btn-success" name="home">Submit</button>
        </div>
    </div>
    </div>
</form>
