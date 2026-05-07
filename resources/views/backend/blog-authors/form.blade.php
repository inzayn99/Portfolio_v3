<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    {{-- <div class="modal-dialog modal-lg modalfullmobile"> --}}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Add a New Authors</h4>
            </div>
            <form id="createSliderForm" action="{{ route('blogs.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="scroll-area">
                    <div class="modal-body pt0 pb0">
                        <div class="row">
                            <!-- namee -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pwd">Name</label> <small class="req"> *</small>
                                    <input type="text" class="form-control" value="{{ isset($author) ? $author->name : old('name') }}"
                                        name="name" placeholder="Enter Name">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="col-md-6">
                                <label for="banner_image">Profile Image</label><small class="req">*</small>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail1" data-preview="holder1" class="btn btn-info btn-sm lfm">
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

                        <!-- description -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Content">Description</label><small class="req"> *</small>
                                    <textarea name="description" id="summernote" class="form-control">{{ isset($blog) ? $blog->description : old('description') }}</textarea>
                                    <p class="text-danger">
                                        {{ $errors->first('description') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                <!---facebook--->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="facebook">Facebook</label><small class="req">*</small> --}}
                                    <input type="text" class="form-control" value="{{ isset($author) ? $author->facebook : old('facebook') }}" name="facebook"
                                        placeholder="Facebook" value="">
                                    <p class="text-danger">
                                        {{ $errors->first('facebook') }}
                                    </p>
                                </div>
                            </div>
                            <!---Instagram--->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="instagram">Instagram</label><small class="req">*</small> --}}
                                    <input type="text" class="form-control" value="{{ isset($author) ? $author->instagram : old('instagram') }}" name="instagram"
                                        placeholder="Instagram" value="">
                                    <p class="text-danger">
                                        {{ $errors->first('instagram') }}
                                    </p>
                                </div>
                            </div>
                            <!---twitter--->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="twitter">Twitter</label><small class="req">*</small> --}}
                                    <input type="text" class="form-control" value="{{ isset($author) ? $author->twitter : old('twitter') }}" name="twitter"
                                        placeholder="Twitter" value="">
                                    <p class="text-danger">
                                        {{ $errors->first('twitter') }}
                                    </p>
                                </div>
                            </div>
                            <!---whatsapp--->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="whatsapp">WhatsApp</label><small class="req">*</small> --}}
                                    <input type="text" class="form-control" value="{{ isset($author) ? $author->whatsapp : old('whatsapp') }}" name="whatsapp"
                                        placeholder="WhatsApp" value="">
                                    <p class="text-danger">
                                        {{ $errors->first('whatsapp') }}
                                    </p>
                                </div>
                            </div>
                            <!---phone--->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="whatsapp">WhatsApp</label><small class="req">*</small> --}}
                                    <input type="text" class="form-control" value="{{ isset($author) ? $author->phone : old('phone') }}" name="phone"
                                        placeholder="Phone" value="">
                                    <p class="text-danger">
                                        {{ $errors->first('phone') }}
                                    </p>
                                </div>
                            </div>
                            <!---Email--->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="whatsapp">WhatsApp</label><small class="req">*</small> --}}
                                    <input type="text" class="form-control" value="{{ isset($author) ? $author->email : old('email') }}" name="email"
                                        placeholder="Email" value="">
                                    <p class="text-danger">
                                        {{ $errors->first('email') }}
                                    </p>
                                </div>
                            </div>
                            <!---Address--->
                            <div class="col-md-10">
                                <div class="form-group">
                                    {{-- <label for="whatsapp">WhatsApp</label><small class="req">*</small> --}}
                                    <input type="text" class="form-control" value="{{ isset($author) ? $author->address : old('address') }}" name="address"
                                        placeholder="Address" value="">
                                    <p class="text-danger">
                                        {{ $errors->first('address') }}
                                    </p>
                                </div>
                            </div>
                            <!-- status -->
                            <div class="col-sm-2">
                                <div class="material-switch">
                                    {{-- <h6>Status</h6> --}}
                                    <input id="enable_frontcms" name="publish_status" type="checkbox" class="chk"
                                        value="1" checked="checked">
                                    <label for="enable_frontcms" class="label-success"></label>
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
