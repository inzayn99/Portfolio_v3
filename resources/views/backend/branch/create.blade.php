@extends('backend.layouts.app')
@push('styles')
@endpush
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            @isset($branch)
                                <form action="{{ route('branch.update', $branch->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                @else
                                    <form action="{{ route('branch.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                    @endisset
                                    <div class="box-body">
                                        @if (session('success'))
                                            <div class="alert alert-info">
                                                {{ session('success') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-info">
                                                {{ session('error') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        <div class="tshadow mb25 bozero">
                                            <div class="box-tools pull-right pt3" bis_skin_checked="1">
                                                <a class="btn btn-sm btn-primary mr3 mt-md-0"
                                                    href="{{ route('branch.index') }}" autocomplete="off">
                                                    <i class="las la-arrow-circle-left"></i> Back</a>
                                            </div>
                                            <h4 class="pagetitleh2">
                                                @isset($branch) Branch Office Update Form
                                                @else
                                                    Branch Office Create Form @endif
                                                </h4>
                                                <div class="around10">
                                                    <!--title-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="title">Title</label><small class="req">
                                                                    *</small>
                                                                <input name="title" type="text"
                                                                    value="{{ old('title', @$branch->title) }}"
                                                                    class="form-control" placeholder="Enter Title" required />
                                                                <small class="req">{{ $errors->first('title') }} </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label><small class="req">
                                                                    *</small>
                                                                <input name="phone" type="text"
                                                                    value="{{ old('phone', @$branch->phone) }}"
                                                                    class="form-control" placeholder="Enter Phone" required />
                                                                <small class="req">{{ $errors->first('phone') }} </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="whatsapp">Whatsapp</label><small class="req">
                                                                    *</small>
                                                                <input name="whatsapp" type="text"
                                                                    value="{{ old('whatsapp', @$branch->whatsapp) }}"
                                                                    class="form-control" placeholder="Enter Whatsapp Number"
                                                                    required />
                                                                <small class="req">{{ $errors->first('whatsapp') }} </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email</label><small class="req">
                                                                    *</small>
                                                                <input name="email" type="text"
                                                                    value="{{ old('email', @$branch->email) }}"
                                                                    class="form-control" placeholder="Enter Email" required />
                                                                <small class="req">{{ $errors->first('email') }} </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address">Address</label><small class="req">
                                                                    *</small>
                                                                <input name="address" type="text"
                                                                    value="{{ old('address', @$branch->address) }}"
                                                                    class="form-control" placeholder="Enter Adress" required />
                                                                <small class="req">{{ $errors->first('address') }} </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> Save</button>
                        </div>
                        </form>
                    </div>
            </div>
        @endsection

        @push('scripts')
        @endpush
