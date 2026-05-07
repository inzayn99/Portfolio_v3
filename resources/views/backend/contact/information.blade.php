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
                            <h3 class="box-title titlefix"> Contact Information!</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                            <form id="contactForm" role="form" action="{{ route('contact-us.update', $contacts->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="box-body">
                                    <div class="col-md-4">
                                        <!--coverPreview-->
                                        <div class="row">
                                            <img id="coverPreview"
                                                style="margin-top:15px;max-height:354px; border-radius: 10px; max-width: 400px;"
                                                src="{{ old('cover', @$contacts->cover) ? @$contacts->cover : asset('storage/noimage.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <!--cover-img-->
                                        <div class="col-md-12">
                                            <label for="cover">Cover Image</label><small class="req"> *</small>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfmCover" data-input="thumbnailCover"
                                                        data-preview="coverPreview" class="btn btn-info btn-sm lfm">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnailCover" class="form-control"
                                                    value="{{ old('cover', @$contacts->cover) }}" type="text"
                                                    name="cover" onchange="loadCover()" readonly>
                                            </div>

                                            <span>{{ $errors->first('cover') }}</span>
                                        </div><br>
                                        <!-- title-->
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Title<small class="req"> *</small></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="title"
                                                        value="{{ $contacts->title }}">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            </div>
                                        </div><br>
                                        <!-- Phone-->
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Phone<small class="req"> *</small></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ $contacts->phone }}">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            </div>
                                        </div><br>
                                        <!-- Adress-->
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Address<small class="req"> *</small></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="address"
                                                        value="{{ $contacts->address }}">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            </div>
                                        </div><br>
                                        <!-- freelancing-->
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Freelancing<small class="req"> *</small></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="freelance"
                                                        value="{{ $contacts->freelance }}">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('freelance') }}</span>
                                            </div>
                                        </div><br>
                                        <!-- slogan-->
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Slogan<small class="req"> *</small></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="slogan"
                                                        value="{{ $contacts->slogan }}">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('slogan') }}</span>
                                            </div>
                                        </div><br>
                                        <!-- description -->
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <h5 class="session-head"><Strong>Description<small class="req">
                                                        *</small></Strong>
                                            </h5>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <textarea name="description" id="summernote" rows="6" class="form-control">{{ $contacts->description }}</textarea>
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="settinghr" bis_skin_checked="1"></div>
                                        </div>
                                    </div>

                                </div>
                                <!-- box-body -->
                                <div class="box-footer">
                                    <button id="saveBtn" type="submit" name="submit"
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
    <script src="{{ asset('backend/plugins/toastrjs/toastr.min.js') }}"></script>
    <!--update-->
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                let form = $(this);
                let formData = new FormData(this);
                let url = form.attr('action');
                let method = form.attr('method');

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#saveBtn').button('loading'); // Show loading state
                    },
                    success: function(response) {
                        $('#saveBtn').button('reset'); // Reset loading state
                        toastr.success('Information successfully updated.');
                    },
                    error: function() {
                        $('#saveBtn').button('reset'); // Reset loading state
                        toastr.error('An error occurred while updating the information.');
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        // Cover Image Preview
        var loadCover = function() {
            var output = document.getElementById('coverPreview');
            output.src = document.getElementById('thumbnailCover').value;
        };
        // Small Cover Image Preview
        var loadSmallCover = function() {
            var output = document.getElementById('smallCoverPreview');
            output.src = document.getElementById('thumbnailSmallCover').value;
        };
        // Image One Preview
        var loadImgOne = function() {
            var output = document.getElementById('imgOnePreview');
            output.src = document.getElementById('thumbnailImgOne').value;
        };
        // Image Two Preview
        var loadImgTwo = function() {
            var output = document.getElementById('imgTwoPreview');
            output.src = document.getElementById('thumbnailImgTwo').value;
        };
        // Image Three Preview
        var loadImgThree = function() {
            var output = document.getElementById('imgThreePreview');
            output.src = document.getElementById('thumbnailImgThree').value;
        };
        // Image Four Preview
        var loadImgFour = function() {
            var output = document.getElementById('imgFourPreview');
            output.src = document.getElementById('thumbnailImgFour').value;
        };


        // Initialize file manager
        $(document).ready(function() {
            $('.lfm').filemanager('image');
            $('.select2').select2();

            $('#lfmCover').filemanager('image');
            $('#lfmSmallCover').filemanager('image');

            $('#lfmImgOne').filemanager('image');
            $('#lfmImgTwo').filemanager('image');
            $('#lfmImgThree').filemanager('image');
            $('#lfmImgFour').filemanager('image');

        });
    </script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 100,
            placeholder: "Write here.."
        });
    </script>
@endpush
