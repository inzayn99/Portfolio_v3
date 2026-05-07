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
                            <h3 class="box-title titlefix"> {{ isset($language) ? 'Update' : 'Create' }} Language</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                            <form role="form" action="{{ isset($language) ? route('programming-language.update', $language->id) : route('programming-language.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (isset($language))
                                    @method('PUT')
                                @endif
                                <div class="box-body">
                                    <div class="row">
                                        <!--title-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Services Title">Title :</label>
                                                <input type="text"
                                                    value="{{ isset($language) ? $language->title : old('title') }}"
                                                    class="form-control" name="title"
                                                    placeholder="Enter Title">
                                                <p class="text-danger">
                                                    {{ $errors->first('title') }}
                                                </p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="material-switch">
                                        <br>
                                        <input id="enable_frontcms" name="publish_status" type="checkbox" class="chk"
                                            value="1" {{ @$language->publish_status == 1 ? 'checked' : '' }}>
                                        <label for="enable_frontcms" class="label-success"></label>
                                    </div>

                                </div>
                                <!-- Save -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary submit_schsetting pull-right edit_setting"
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
