<div class="col-md-10">
    <div class="box box-primary">
        <div class="box-header ptbnull">
            <h3 class="box-title titlefix"> General Setting</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="">
            <form role="form" action="{{ route('setting.update', $setting->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="row">
                        <!-- Name-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4">Company Name<small class="req">*</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="company_name"
                                        value="{{ $setting->company_name }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4">Email<small class="req">*</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="email"
                                        value="{{ $setting->email }}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- local address -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4">Address<small class="req">*</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="local_address"
                                        value="{{ $setting->local_address }}">
                                    <span class="text-danger">{{ $errors->first('local_address') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- contact-number -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4">Contact Number<small class="req">*</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="dise_code" name="contact_no"
                                        value="{{ $setting->contact_no }}">
                                    <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Phone-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4">Phone<small class="req">*</small></label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ $setting->phone }}">
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Post-box-no-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4">Post Box No<small class="req">*</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="post_no"
                                        value="{{ $setting->post_no }}">
                                    <span class="text-danger">{{ $errors->first('post_no') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- PAN / VAT -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4">PAN / VAT<small class="req">*</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pan_vat"
                                        value="{{ $setting->pan_vat }}">
                                    <span class="text-danger">{{ $errors->first('pan_Vat') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- map-url -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4">Map link<small class="req">*</small></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="map_url"
                                        value="{{ $setting->map_url }}">
                                    <span class="text-danger">{{ $errors->first('map_url') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-12" bis_skin_checked="1">
                            <div class="setting" bis_skin_checked="1"></div>
                        </div>
                        <!-- province -->
                        <div class="col-md-6" bis_skin_checked="1">
                            <div class="form-group row" bis_skin_checked="1">
                                <label class="col-sm-4">Province No<small class="req">*</small></label>
                                <div class="col-sm-8" bis_skin_checked="1">
                                    <select name="province" class="form-control province" autocomplete="off">
                                        <option value="" disabled>Select</option>
                                        @foreach ($provinces as $province)
                                            <option
                                                value="{{ $province->id }}"{{ $province->id == $setting->province_no ? 'selected' : '' }}>
                                                {{ $province->eng_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('province') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- district -->
                        <div class="col-md-6" bis_skin_checked="1">
                            <div class="form-group row" bis_skin_checked="1">
                                <label class="col-sm-4">District<small class="req">*</small></label>
                                <div class="col-sm-8" bis_skin_checked="1">
                                    <select name="district" class="form-control" autocomplete="off" id="district">
                                        <option value="" disabled>Select</option>
                                        @foreach ($districts as $district)
                                            <option
                                                value="{{ $district->id }}"{{ $district->id == $setting->district_no ? 'selected' : '' }}>
                                                {{ $district->dist_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('district') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!--./row-->
                    <div class="row">
                        {{-- <div class="col-md-12" bis_skin_checked="1">
                            <h5 class="session-head"><Strong>Brief Description (shown on footer)<small
                                        class="req">*</small></Strong></h5>
                        </div>
                        <!-- description -->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea name="brief_description" rows="3" class="form-control"
                                        placeholder="Brief Description (shown on footer):">{{ $setting->brief_description }}</textarea>
                                    <p class="text-danger">
                                        {{ $errors->first('brief_description') }}
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        <!----SITE LOGO--->
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label for="company_logo">Site Logo:</label>
                                <div class="input-group row">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-info btn-sm lfm">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" value="{{ $setting->company_logo }}"
                                        type="text" name="company_logo" onchange="loadLogo()" readonly>
                                </div>
                                <img id="holder" style="margin-top:15px; max-height:100px;">
                                <p class="text-danger">{{ $errors->first('company_logo') }}</p>
                            </div>
                            <div class="col-md-2">
                                {{-- <label for="">Recent Logo:</label> <br> --}}
                                <img id="company_logo_output"
                                    src="{{ $setting->company_logo ?? Storage::disk('uploads')->url('noimage.jpg') }}"
                                    style="height: 40px; margin-top: 13px;" src="">
                            </div>
                        </div>

                        <!--company second-logo -->
                        {{-- <div class="col-md-12">
                            <div class="col-md-4">
                                <label for="company_second_logo">Site Dark Logo:</label>
                                <div class="input-group row">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail9" data-preview="holder9"
                                            class="btn btn-info btn-sm lfm">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail9" class="form-control"
                                        value="{{ $setting->company_second_logo }}" type="text"
                                        name="company_second_logo" onchange="loadSecondLogo(event)" readonly>
                                </div>
                                <img id="holder9" style="margin-top:15px;max-height:100px;">
                                <p class="text-danger">
                                    {{ $errors->first('company_second_logo') }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <img id="company_second_logo_output"
                                    src="{{ $setting->company_second_logo ?? Storage::disk('uploads')->url('noimage.jpg') }}"
                                    style="height: 40px; margin-top: 13px;" src="">
                            </div>
                        </div> --}}
                        <!---SITE Footer LOGO--->
                        {{-- <div class="col-md-12">
                            <div class="col-md-4">
                                <label for="footer_logo">Footer Logo:</label>
                                <div class="input-group row">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail1" data-preview="holder1"
                                            class="btn btn-info btn-sm lfm">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail1" class="form-control" value="{{ $setting->footer_logo }}"
                                        type="text" name="footer_logo" onchange="loadFooterLogo()" readonly>
                                </div>
                                <img id="holder1" style="margin-top:15px;max-height:100px;">
                                <p class="text-danger">{{ $errors->first('footer_logo') }}</p>
                            </div>
                            <div class="col-md-3">
                                <label for="">Recent footer Logo:</label> <br>
                                <img id="footer_logo_output" style="height: 40px; margin-top: 13px;"
                                    src="{{ $setting->footer_logo ?? Storage::disk('uploads')->url('noimage.jpg') }}">
                            </div>
                        </div> --}}
                        <!---SITE FAVICON--->
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label for="company_favicon">Site Favicon:</label>
                                <div class="input-group row">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail11" data-preview="holder11"
                                            class="btn btn-info btn-sm lfm">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail11" class="form-control"
                                        value="{{ $setting->company_favicon }}" type="text"
                                        name="company_favicon" onchange="loadFavicon()" readonly>
                                </div>
                                <img id="holder11" style="margin-top:15px;max-height:100px;">
                                <p class="text-danger">{{ $errors->first('company_favicon') }}</p>
                            </div>
                            <div class="col-md-3 mt-2">
                                {{-- <label for="">Recent Favicon:</label> <br> --}}
                                <img id="company_favicon_output" style="height: 40px; margin-top: 13px; weight: 40px;"
                                    src="{{ $setting->company_favicon ?? Storage::disk('uploads')->url('noimage.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- box-body -->
                <div class="box-footer">
                    <button type="submit" name="companySetting"
                        class="btn btn-primary submit_schsetting pull-right edit_setting"
                        data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">
                        <i class="fa fa-check-circle"></i> Save</button>
                </div>
            </form>
        </div><!-- /.box-body -->
    </div>
</div>
