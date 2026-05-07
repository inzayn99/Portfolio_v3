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
                            <h3 class="box-title titlefix"> UI - UX <small>User Interface & User Experience</small></h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                            <form class="form-horizontal" role="form" action="{{ route('setting.update', $setting->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="box-body">
                                    <!-- main-color --->
                                    <div class="form-group">
                                        <label for="color_one" class="control-label col-md-3 col-sm-3 col-xs-12">Website main-color:<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="color_one"
                                                value="{{ $setting->color_one }}" placeholder="Example: #FF5300">
                                        </div>
                                    </div>
                                    <!-- Secondry-color --->
                                    <div class="form-group">
                                        <label for="color_two"
                                            class="control-label col-md-3 col-sm-3 col-xs-12">Website Secondary Color
                                            Code<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="color_two"
                                                value="{{ $setting->color_two }}" placeholder="Example: #907987">
                                        </div>
                                    </div>
                                    <!-- Footer-background-color --->
                                    <div class="form-group">
                                        <label for="color_five"
                                            class="control-label col-md-3 col-sm-3 col-xs-12">Website Footer Background Color<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="color_five"
                                                value="{{ $setting->color_five }}" placeholder="Example: #eeeeee">
                                        </div>
                                    </div>

                                </div>
                                <div class="box-body">
                                    <h4>Dashboard <small class="req">UI-UX User Interface & User Experience</small></h4>
                                    <!-- Primary-color --->
                                    <div class="form-group">
                                        <label for="color_three" class="control-label col-md-3 col-sm-3 col-xs-12">Dashboard
                                            Primary Color Code<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="color_three"
                                                value="{{ $setting->color_three }}" placeholder="Example: #FFFF">
                                        </div>
                                    </div>
                                    <!-- Secondry-color --->
                                    <div class="form-group">
                                        <label for="color_four"
                                            class="control-label col-md-3 col-sm-3 col-xs-12">Dashboard Secondary Color
                                            Code<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="color_four"
                                                value="{{ $setting->color_four }}" placeholder="Example: #907987">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="uiUX" class="btn btn-info pull-left"
                                            data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait">
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
