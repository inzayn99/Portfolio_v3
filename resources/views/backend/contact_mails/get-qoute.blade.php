@extends('backend.layouts.app')
@push('styles')

@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Get Qoute</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Messages</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="col-sm-12">
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="col-sm-12">
                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Received on</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                {{-- <th>Contact no.</th> --}}
                                                <th>Qoute</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (count($messages) == 0)
                                                <tr>
                                                    <td colspan="7">
                                                        <p class="text-center">
                                                            No any messages.
                                                        </p>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($messages as $message)
                                                    <tr>
                                                        <td>
                                                            {{ date('F j, Y', strtotime($message->created_at)) }}
                                                        </td>

                                                        <td>
                                                            {{$message->name}}
                                                        </td>

                                                        <td>
                                                            {{$message->email}}
                                                        </td>

                                                        {{-- <td>
                                                            {{$message->contact}}
                                                        </td> --}}

                                                        <td>
                                                            {{$message->course->title}}
                                                        </td>

                                                        <td>
                                                            {{-- <div class="d-flex content-jusify-start"> --}}
                                                            <form action="{{ route('enroll-course.destroy', $message->id) }}" method="POST">
                                                                @csrf
                                                                @method("DELETE")
                                                                <a href="{{ route('enroll-course.show',$message->id) }}" class="btn btn-primary" title="View"><i class="fas fa-eye"></i></a>
                                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')" title="Delete"><span class="fas fa-trash"></span></button>
                                                            </form>
                                                            {{-- </div> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="mt-3">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-sm">
                                                    Showing <strong>{{ $messages->firstItem() }}</strong> to
                                                    <strong>{{ $messages->lastItem() }} </strong> of <strong>
                                                        {{ $messages->total() }}</strong>
                                                    entries
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="pagination-sm m-0 float-right">{{ $messages->links() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    <!-- /.content-wrapper -->
@endsection
@push('scripts')

@endpush
