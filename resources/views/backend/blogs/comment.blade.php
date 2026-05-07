@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $blog->title }}</h1>
                        {{-- <a href="{{ route('forum.create') }}" class="btn btn-primary">Create New Forum Info</a></h1> --}}
                </div><
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">comment</li>
                    </ol>
                </div>
                </div>
            </div>
            </div>
            <!-- content-header -->

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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                {{-- <th>Subject</th> --}}
                                                <th>Comment</th>
                                                <th>Status</th> 
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                           
                                                {{-- @foreach ($blog->comment as $data)
                                                    <tr>
                                                        
                                                        <td>{{$data->name}}</td>
                                                        <td>{!!$data->email!!}</td>
                                                        <td>{{ $data->phone }}</td>
                                                        <td>{!!$data->subject!!}</td>
                                                        <td>{{ $data->message }}</td>
                                                        <td>@if($data->status==1) <span class="badge badge-info"> <a>Show </span>  @else <span class="badge badge-danger"> hide </span> @endif</td>
                                                        <td style="width: 100px;">
                                                            <a href="{{ route('comment.status', $data->id) }}" class="btn btn-primary btn-xs" title="Edit">Status</a>
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletionmember{{ $data->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                            <!-- Modal -->
                                                                <div class="modal fade text-left" id="deletionmember{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                <form action="{{ route('comment.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                                                                    @csrf
                                                                                    @method("POST")
                                                                                    <label for="reason">Are you sure you want to delete??</label><br>
                                                                                    <input type="hidden" name="_method" value="DELETE" />
                                                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">Confirm Delete</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                ";
                                                        </td>
                                                    </tr>
                                                
                                                @endforeach --}}
                                        </tbody>
                                    </table>
                                    {{-- <div class="mt-3">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-sm">
                                                    Showing <strong>{{ $forums->firstItem() }}</strong> to
                                                    <strong>{{ $forums->lastItem() }} </strong> of <strong>
                                                        {{ $forums->total() }}</strong>
                                                    entries
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="pagination-sm m-0 float-right">{{ $forums->links() }}</span>
                                            </div>
                                        </div>
                                    </div> --}}
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
