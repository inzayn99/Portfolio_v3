@extends('backend.layouts.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="min-height: 946px;">
        <!-- User Details -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"> User Details</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                            <form class="form-horizontal" action="{{ route('users.update', $existing_user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="box-body">
                                    <!-- Fill-namee -->
                                    <div class="form-group">
                                        <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Full Name<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="name" value="{{$existing_user->name}}" placeholder="Enter Full Name">
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email"
                                            class="control-label col-md-3 col-sm-3 col-xs-12">Email<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="email" value="{{$existing_user->email}}" placeholder="Email Address">
                                            @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="updatedetails" class="btn btn-info pull-left"
                                            data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait">
                                            <i class="fa fa-check-circle"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Change Password -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"> Update User</h3> | <small class="req">Note*: If you don't want to change password then leave empty.</small>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="">
                                <form class="form-horizontal" action="{{route('users.update', $existing_user->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="oldpassword"
                                            class="control-label col-md-3 col-sm-3 col-xs-12">Old Password<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="oldpassword" value="{{@old('oldpassword')}}" placeholder="Old Password">
                                            @error('oldpassword')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        @if (session('errorpass'))
                                            <div class="col-sm-12">
                                                <p class="text-danger">
                                                    {{ session('errorpass') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password"
                                            class="control-label col-md-3 col-sm-3 col-xs-12">New Password<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="new_password" value="{{@old('new_password')}}" placeholder="New Password">
                                            @error('new_password')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        @if (session('errorpass'))
                                            <div class="col-sm-12">
                                                <p class="text-danger">
                                                    {{ session('errorpass') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm New Password<small class="req">*</small></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="new_password_confirmation" value="{{@old('password_confirmation')}}" placeholder="Re-enter New Password">
                                            @error('new_password_confirmation')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        @if (session('errorpass'))
                                            <div class="col-sm-12">
                                                <p class="text-danger">
                                                    {{ session('errorpass') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>


                                </div>
                                <div class="box-footer">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="updatepassword" class="btn btn-info pull-left"
                                            data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait">
                                            <i class="fa fa-check-circle"></i> Save</button>
                                    </div>
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
@endpush
