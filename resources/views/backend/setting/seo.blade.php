@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 946px;">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                @include('backend.setting.side-menu')

                <div class="col-md-10">
                    <div class="box box-primary">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"> social Media</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                            <form role="form" action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="box-body">
                                    <div class="row">
                                        <!-- Meta Title-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Meta Title(Optional)<small class="req">*</small></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="meta_title"
                                                        value="{{ $setting->meta_title }}">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                            </div>
                                        </div>
                                        <!-- Meta Keywords -->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Meta Keywords(Optional)<small class="req">*</small></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="meta_keywords"
                                                        value="{{ $setting->meta_keywords }}">
                                                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <h5 class="session-head"><Strong>Meta Description (optional)<small class="req">*</small></Strong></h5>
                                        </div>
                                        <!-- description -->
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <textarea name="meta_description" rows="3" class="form-control"
                                                        placeholder="Write meta description here..">{{ $setting->meta_description }}</textarea>
                                                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- og-img -->
                                        <div class="col-md-10">
                                            <label for="og_image">OG Image (1200 X 600): </label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail111" data-preview="holder111" class="btn btn-info btn-sm lfm">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail111" class="form-control" value="{{ $setting->og_image }}" type="text"
                                                    name="og_image" onchange="loadOg()" readonly>
                                            </div>
                                            <img id="holder111" style="margin-top:15px;max-height:100px;">
                                            <span class="text-danger">{{ $errors->first('og_image') }}</span>
                                        </div>

                                        <div class="col-md-2">
                                            {{-- <label for="">Current Og:</label> <br> --}}
                                            <img id="current_og" class="img-rounded" style="height: 70px;"
                                                src="{{ $setting->og_image ?? Storage::disk('uploads')->url('noimage.jpg') }}">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="metaSetting"
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
     var loadOg = function() {
            var output = document.getElementById('current_og');
            output.src = document.getElementById('thumbnail111').value;
            output.onload = output.src;
        };
</script>
<script>
    $(document).ready(function() {
        $('.lfm').filemanager('image');
        // $('.select2').select2();
    });
</script>
@endpush
