<div id="myModal" class="modal fade" role="dialog">
    {{-- <div class="modal-dialog"> --}}
        <div class="modal-dialog modal-lg modalfullmobile" >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Add a New Blog</h4>
            </div>
            <form id="createSliderForm" action="{{ route('blogs.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="scroll-area">
                    <div class="modal-body pt0 pb0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pwd">Title</label> <small class="req"> *</small>
                                    <input type="text" class="form-control" value="{{ old('title') }}"
                                        name="title" placeholder="Enter Title">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Services type">Select blog category</label><small class="req">*</small>
                                    <select class="form-control" name="blog_category">
                                        <option value="" disabled>Please Select</option>
                                        @foreach ($cat as $type)
                                            <option value="{{ $type->id }}" @isset($blog) @if ($blog->blog_category == $type->id) selected @endif @endisset>
                                                {{ $type->title }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">
                                        {{ $errors->first('blog_category') }}
                                    </p>
                                </div>
                            </div>
                            <!--- Select blog authors --->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pwd">Posted By</label> <small class="req"> *</small>
                                    <input type="text" class="form-control" value="{{ old('posted_by') }}" name="posted_by" placeholder="Enter Author Name">
                                    <span class="text-danger">{{ $errors->first('posted_by') }}</span>
                                </div>
                            </div>

                        </div>

                        <input type="hidden" name="blog_type" value="Blog" readonly />
                        <div class="row">
                            <!---cover-image--->
                            <div class="col-md-6">
                                <label for="cover_image">Cover image:</label><small class="req">*</small>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-info btn-sm lfm">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control"
                                        value="{{ old('cover_image') }}" type="text"
                                        name="cover_image" readonly>
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:500px;">
                                <p class="text-danger">
                                    {{ $errors->first('cover_image') }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label for="banner_image">Banner Image:</label><small class="req">*</small>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail1" data-preview="holder1" class="btn btn-info btn-sm lfm" >
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail1" value="{{old('banner_image')}}" class="form-control" type="text" name="banner_image" readonly>
                                  </div>
                                  <img id="holder1" style="margin-top:15px;max-height:100px;">
                                  <p class="text-danger">
                                    {{ $errors->first('banner_image') }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Content">Blog Content</label><small class="req">*</small>
                                    <textarea name="description" id="content" class="form-control ckeditor">{{old('description')}}</textarea>
                                    <p class="text-danger">
                                        {{ $errors->first('description') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row"> --}}
                        <div class="col-md-12 text-center">
                            <hr>
                            <h3>Meta Information</h3>
                            <hr>
                        </div>
                        <!---meta-title--->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meta_title">Meta Title(Optional)</label><small class="req">*</small>
                                <input type="text" class="form-control" value="{{old('meta_title',@$blog->meta_title)}}" name="meta_title" placeholder="Meta Title for SEO" value="">
                                <p class="text-danger">
                                    {{ $errors->first('meta_title') }}
                                </p>
                            </div>
                        </div>
                        <!---meta-keywords--->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords(Optional)</label><small class="req">*</small>
                                <input type="text" class="form-control" name="meta_keywords" value="{{old('meta_keywords',@$blog->meta_keywords)}}" placeholder="Meta Keywords for SEO" value="">
                                <p class="text-danger">
                                    {{ $errors->first('meta_keywords') }}
                                </p>
                            </div>
                        </div>
                        <!---Meta-description--->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta-description">Meta Description (optional)</label><small class="req">*</small>
                                <textarea name="meta_description" cols="30" rows="5" class="form-control" placeholder="Meta description..">{{old('meta_description',@$blog->meta_description)}}</textarea>
                            </div>
                        </div>
                        <!---og-images--->
                        <div class="col-md-10">
                            <label for="banner_image">Og image:</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                  <a id="lfm1" data-input="thumbnail2" data-preview="holder2" class="btn btn-info btn-sm lfm" >
                                    <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                </span>
                                <input id="thumbnail2" value="{{old('og_image',@$blog->og_image)}}" class="form-control" value="{{old('og_image')}}" type="text" name="og_image" readonly>
                              </div>
                              <img id="holder2" style="margin-top:15px;max-height:100px;">
                              <p class="text-danger">
                                {{ $errors->first('og_image') }}
                            </p>
                        </div>
                        <div class="col-sm-2">
                            <h6>Status</h6>
                            <div class="material-switch">
                                <input id="enable_frontcms" name="publish_status" type="checkbox" class="chk" value="1" checked="checked">
                                <label for="enable_frontcms" class="label-success"></label>
                            </div>
                        </div>
                    {{-- </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="submit" id="formaddbtn" data-loading-text="Processing..."
                        class="btn btn-info btn-sm pull-right"><i class="fa fa-check-circle"></i> Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
