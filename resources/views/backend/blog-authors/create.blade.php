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
                            <h3 class="box-title titlefix"> Update Author</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                            <form role="form" action="{{ route('authors.update', $author->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Name :</label>
                                                <input type="text"
                                                    value="{{ isset($author) ? $author->name : old('name') }}"
                                                    class="form-control" name="name" placeholder="Enter Name">
                                                <p class="text-danger">
                                                    {{ $errors->first('name') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- Address --->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Addresss">Address :</label>
                                                <input type="text"
                                                    value="{{ isset($author) ? $author->address : old('address') }}"
                                                    class="form-control" name="address" placeholder="Enter address">
                                                <p class="text-danger">
                                                    {{ $errors->first('address') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- image --->
                                        <div class="col-md-4">
                                            <label for="banner_image">Profile Image:</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail1" data-preview="holder1"
                                                        class="btn btn-info btn-sm lfm">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail1" value="{{ old('image', @$author->image) }}"
                                                    class="form-control" type="text" name="image" readonly>
                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;">
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!--- description --->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Content">Description :</label>
                                                <textarea name="description" id="summernote" class="form-control">{{ isset($author) ? $author->description : old('description') }}</textarea>
                                                <p class="text-danger">
                                                    {{ $errors->first('description') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!--- Email --->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Email">Email :</label>
                                                <input type="text"
                                                    value="{{ isset($author) ? $author->email : old('email') }}"
                                                    class="form-control" name="email" placeholder="Enter Email">
                                                <p class="text-danger">
                                                    {{ $errors->first('email') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- Address --->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Address">Phone :</label>
                                                <input type="text"
                                                    value="{{ isset($author) ? $author->phone : old('phone') }}"
                                                    class="form-control" name="phone" placeholder="Enter phone">
                                                <p class="text-danger">
                                                    {{ $errors->first('phone') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- Facebook --->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Address">Facebook :</label>
                                                <input type="text"
                                                    value="{{ isset($author) ? $author->facebook : old('facebook') }}"
                                                    class="form-control" name="facebook" placeholder="Enter facebook">
                                                <p class="text-danger">
                                                    {{ $errors->first('facebook') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- Twitter --->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Address">Twitter :</label>
                                                <input type="text"
                                                    value="{{ isset($author) ? $author->twitter : old('twitter') }}"
                                                    class="form-control" name="twitter" placeholder="Enter twitter">
                                                <p class="text-danger">
                                                    {{ $errors->first('twitter') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- Instagram --->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Address">Instagram :</label>
                                                <input type="text"
                                                    value="{{ isset($author) ? $author->instagram : old('instagram') }}"
                                                    class="form-control" name="instagram" placeholder="Enter instagram">
                                                <p class="text-danger">
                                                    {{ $errors->first('instagram') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--- Whatsapp --->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="whatsapp">Whatsapp :</label>
                                                <input type="text"
                                                    value="{{ isset($author) ? $author->whatsapp : old('whatsapp') }}"
                                                    class="form-control" name="whatsapp" placeholder="Enter whatsapp">
                                                <p class="text-danger">
                                                    {{ $errors->first('whatsapp') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="material-switch">
                                        <br>
                                        <input id="enable_frontcms" name="publish_status" type="checkbox" class="chk"
                                            value="1" {{ $author->publish_status == 1 ? 'checked' : '' }}>
                                        <label for="enable_frontcms" class="label-success"></label>
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
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 80,
            placeholder: "Description."
        });
    </script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.lfm').filemanager('image');

        });
    </script>
@endpush
