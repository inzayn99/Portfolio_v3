<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    {{-- <div class="modal-dialog modal-lg modalfullmobile"> --}}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Add a New Blogs Category</h4>
            </div>
            <form id="createSliderForm" action="{{ route('blogs.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="scroll-area">
                    <div class="modal-body pt0 pb0">
                        <div class="row">
                            <!-- title -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pwd">Title</label> <small class="req"> *</small>
                                    <input type="text" class="form-control" value="{{ old('title') }}"
                                        name="title" placeholder="Enter Title">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="col-md-6">
                                <label for="banner_image">Image</label><small class="req"> *</small>
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
                            <div class="col-md-12 text-center">
                                <hr>
                                <h3>Meta Information</h3>
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
                            <div class="col-md-10">
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
                            <!-- status -->
                            <div class="col-sm-2">
                                <div class="material-switch">
                                    <h6>Status</h6>
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
