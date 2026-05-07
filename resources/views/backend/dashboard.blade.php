@extends('backend.layouts.app')
@section('content')
    @php
        $unread_messages = \App\Models\MailMessages::where('is_read', 0)->get();
        // $unread_subscribers = \App\Models\Subscribers::where('is_read', 0)->get();
    @endphp
    <div class="content-wrapper">
        <section class="content">
            @if ($unread_messages->count() > 0)
                <div class="alert alert-info" style="font-family:'Roboto-Medium';">
                    You have {{ $unread_messages->count() }} new Contact Mail, Please check in Contact Mails Support
                    Section.
                    <a class="display-inline vertical-align-middle" href="{{ route('message.index') }}"
                        style="color:#e30e66; vertical-align: bottom;">Click here to view.</a>
                </div>
            @endif


            {{-- @if ($unread_subscribers->count() > 0)
                <div class="alert alert-info" style="font-family:'Roboto-Medium';">
                    You have {{ $unread_subscribers->count() }} new Subscribers, Please check in Subscribers Support
                    Section.
                    <a class="display-inline vertical-align-middle" href="{{ route('subscribers.index') }}"
                        style="color:#e30e66; vertical-align: bottom;">Click here to view.</a>
                </div>
            @endif --}}


            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row">
                <!--user-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20">
                    <div class="info-box" title="Users Profile">
                        <a href="{{ route('users.index') }}">
                            <span class="info-box-icon bg-green"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Users Profile</span>
                                <span class="info-box-number">{{ $users_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--Company Setting-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Company Setting">
                    <div class="info-box">
                        <a href="{{ route('setting.index') }}">
                            <span class="info-box-icon bg-green"><i class="fas fa-cog"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Company Setting</span>
                                {{-- <span class="info-box-number">$3,250.00</span> --}}
                            </div>
                        </a>
                    </div>
                </div>
                <!--slider-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="slider">
                    <div class="info-box">
                        <a href="">
                            <span class="info-box-icon bg-green"><i class="fas fa-image"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Banner - Slider</span>
                                <span class="info-box-number">23535</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--Home-info-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="info">
                    <div class="info-box">
                        <a href="">
                            <span class="info-box-icon bg-green"><i class="fas fa-info"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Home Info</span>
                                <span class="info-box-number">$1,400.00</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--destination-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="destination">
                    <div class="info-box">
                        <a href="">
                            <span class="info-box-icon bg-green"><i class="fas fa-plane-departure"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Study In Abroad | Destination</span>
                                <span class="info-box-number">2435</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--quickinquiry-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Quick Inquiry">
                    <div class="info-box">
                        <a href="">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Quick Inquiry</span>
                                <span class="info-box-number">764654</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!--mail-->
                <div class="col-lg-2 col-md-3 col-sm-6 col20" title="Mail">
                    <div class="info-box">
                        <a href="{{ route('message.index') }}">
                            <span class="info-box-icon expenes-red" style="background-color: #41B782"><i class="fas fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mails</span>
                                <span class="info-box-number">{{ $mail_count }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--./row-->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col60">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Students Inquiries</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="lineChart" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!--./col-lg-7-->
                <div class="col-lg-6 col-md-6 col-sm-12 col40">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Find Universities</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="pieChart" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!--./col-lg-5-->
            </div>
        </section>
    </div>
    {{-- <div id="newEventModal" class="modal fade " role="dialog">
        <div class="modal-dialog modal-dialog2 modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Event</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form role="form" id="addevent_form" method="post" enctype="multipart/form-data"
                            action="">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Event Title</label><span class="req"> *</span>
                                <input class="form-control" name="title" id="input-field">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" id="desc-field"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Event Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" autocomplete="off" name="event_dates"
                                        class="form-control pull-right" id="date-field">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Event Color</label>
                                <input type="hidden" name="eventcolor" autocomplete="off" id="eventcolor"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="cpicker-wrapper">
                                    <div class='calendar-cpicker cpicker cpicker-big' data-color='#03a9f4'
                                        style='background:#03a9f4;border:1px solid #03a9f4; border-radius:100px'>
                                    </div>
                                    <div class='calendar-cpicker cpicker cpicker-small' data-color='#c53da9'
                                        style='background:#c53da9;border:1px solid #c53da9; border-radius:100px'>
                                    </div>
                                    <div class='calendar-cpicker cpicker cpicker-small' data-color='#757575'
                                        style='background:#757575;border:1px solid #757575; border-radius:100px'>
                                    </div>
                                    <div class='calendar-cpicker cpicker cpicker-small' data-color='#8e24aa'
                                        style='background:#8e24aa;border:1px solid #8e24aa; border-radius:100px'>
                                    </div>
                                    <div class='calendar-cpicker cpicker cpicker-small' data-color='#d81b60'
                                        style='background:#d81b60;border:1px solid #d81b60; border-radius:100px'>
                                    </div>
                                    <div class='calendar-cpicker cpicker cpicker-small' data-color='#7cb342'
                                        style='background:#7cb342;border:1px solid #7cb342; border-radius:100px'>
                                    </div>
                                    <div class='calendar-cpicker cpicker cpicker-small' data-color='#fb8c00'
                                        style='background:#fb8c00;border:1px solid #fb8c00; border-radius:100px'>
                                    </div>
                                    <div class='calendar-cpicker cpicker cpicker-small' data-color='#fb3b3b'
                                        style='background:#fb3b3b;border:1px solid #fb3b3b; border-radius:100px'>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Event Type</label>
                                <br />
                                <label class="radio-inline">
                                    <input type="radio" name="event_type" value="public" id="public">Public
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="event_type" value="private" checked
                                        id="private">Private </label>
                                <label class="radio-inline">
                                    <input type="radio" name="event_type" value="sameforall" id="public">All
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="event_type" value="protected" id="public">Protected
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 modal-footer pb0">
                                <input type="submit" class="btn btn-primary submit_addevent pull-right" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="viewEventModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog2 modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">View Event</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form role="form" method="post" id="updateevent_form" enctype="multipart/form-data"
                            action="">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Event Title</label><span class="req"> *</span>
                                <input class="form-control" name="title" placeholder="Event Title" id="event_title">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" placeholder="Description" id="event_desc"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Event Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" autocomplete="off" name="eventdates"
                                        class="form-control pull-right" id="eventdates">
                                </div>
                            </div>
                            <input type="hidden" name="eventid" id="eventid">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Event Color</label>
                                <input type="hidden" name="eventcolor" autocomplete="off" placeholder="Event Color"
                                    id="event_color" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="cpicker-wrapper selectevent">
                                    <div id=03a9f4 class='calendar-cpicker cpicker cpicker-big' data-color='#03a9f4'
                                        style='background:#03a9f4;border:1px solid #03a9f4; border-radius:100px'>
                                    </div>
                                    <div id=c53da9 class='calendar-cpicker cpicker cpicker-small' data-color='#c53da9'
                                        style='background:#c53da9;border:1px solid #c53da9; border-radius:100px'>
                                    </div>
                                    <div id=757575 class='calendar-cpicker cpicker cpicker-small' data-color='#757575'
                                        style='background:#757575;border:1px solid #757575; border-radius:100px'>
                                    </div>
                                    <div id=8e24aa class='calendar-cpicker cpicker cpicker-small' data-color='#8e24aa'
                                        style='background:#8e24aa;border:1px solid #8e24aa; border-radius:100px'>
                                    </div>
                                    <div id=d81b60 class='calendar-cpicker cpicker cpicker-small' data-color='#d81b60'
                                        style='background:#d81b60;border:1px solid #d81b60; border-radius:100px'>
                                    </div>
                                    <div id=7cb342 class='calendar-cpicker cpicker cpicker-small' data-color='#7cb342'
                                        style='background:#7cb342;border:1px solid #7cb342; border-radius:100px'>
                                    </div>
                                    <div id=fb8c00 class='calendar-cpicker cpicker cpicker-small' data-color='#fb8c00'
                                        style='background:#fb8c00;border:1px solid #fb8c00; border-radius:100px'>
                                    </div>
                                    <div id=fb3b3b class='calendar-cpicker cpicker cpicker-small' data-color='#fb3b3b'
                                        style='background:#fb3b3b;border:1px solid #fb3b3b; border-radius:100px'>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Event Type </label>
                                <label class="radio-inline">
                                    <input type="radio" name="eventtype" value="public" id="public">Public </label>
                                <label class="radio-inline">
                                    <input type="radio" name="eventtype" value="private" id="private">Private
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="eventtype" value="sameforall" id="public">All
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="eventtype" value="protected" id="public">Protected
                                </label>
                            </div>
                            <div class="col-lg-12 modal-footer pb0">
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary submit_update" value="Save">
                                    <input type="button" id="delete_event" class="btn btn-primary submit_delete "
                                        value="Delete">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('Script')
@endpush
