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
                            <form class="form-horizontal" action="{{ route('setting.update', $setting->id) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="facebook" class="control-label col-md-3 col-sm-3 col-xs-12">Facebook<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control"  name="facebook" value="{{ $setting->facebook }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram" class="control-label col-md-3 col-sm-3 col-xs-12">Instagram<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control"  name="instagram" value="{{ $setting->instagram }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="whatsapp" class="control-label col-md-3 col-sm-3 col-xs-12">Whatsapp<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control"  name="whatsapp" value="{{ $setting->whatsapp }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter" class="control-label col-md-3 col-sm-3 col-xs-12">Twitter/X<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control"  name="twitter" value="{{ $setting->twitter }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube" class="control-label col-md-3 col-sm-3 col-xs-12">Youtube<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control"  name="youtube" value="{{ $setting->youtube }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="spotify" class="control-label col-md-3 col-sm-3 col-xs-12">Spotify<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control"  name="spotify" value="{{ $setting->spotify }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="github" class="control-label col-md-3 col-sm-3 col-xs-12">Github<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control"  name="github" value="{{ $setting->github }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin" class="control-label col-md-3 col-sm-3 col-xs-12">Linkedin<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control"  name="linkedin" value="{{ $setting->linkedin }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="socialMedia" class="btn btn-info pull-left" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait">
                                            <i class="fa fa-check-circle"></i> Save</button>
                                    </div>
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
@endpush
