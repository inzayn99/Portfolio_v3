@extends('backend.layouts.app')
@push('styles')
    <style>
        .bg-white {
            background-color: #ffffff !important;
        }

        .sm\:px-0 {
            padding-left: 10px !important;
            padding-right: 0px !important;
        }
    </style>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
@endpush

@section('content')
    <div class="content-wrapper" style="min-height: 946px;">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
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
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                                    {{-- <div class="col-md-8"> --}}
                                                    @livewire('profile.update-profile-information-form')
                                                    {{-- </div> --}}
                                                    <x-jet-section-border />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                                    @livewire('profile.update-password-form')
                                                    <x-jet-section-border />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                                        @livewire('profile.two-factor-authentication-form')
                                                        <x-jet-section-border />
                                                    @endif
                                                </div>

                                                <div class="col-md-6">
                                                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                                        <x-jet-section-border />
                                                        @livewire('profile.delete-user-form')
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                @livewire('profile.logout-other-browser-sessions-form')
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    {{-- <div class="box-footer">
                                        <button type="submit" name="companySetting"
                                            class="btn btn-primary submit_schsetting pull-right edit_setting"
                                            data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">
                                            <i class="fa fa-check-circle"></i> Save</button>
                                    </div> --}}
                            </form>
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts

    <script>
        document.getElementById('px-4 sm:px-0').style.display = 'none';
    </script>
@endpush
