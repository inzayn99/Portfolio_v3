@extends('backend.layouts.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="min-height: 272px;" bis_skin_checked="1">
        <section class="content">
            <div class="row" bis_skin_checked="1">
                <div class="col-md-12" bis_skin_checked="1">
                    <!-- general form elements -->
                    <div class="box box-primary" bis_skin_checked="1">
                        <div class="box-header ptbnull" bis_skin_checked="1">
                            <h3 class="box-title titlefix">Users List</h3>
                            <div class="box-tools pull-right" bis_skin_checked="1">
                                <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm addvisitor"><i
                                        class="fa fa-plus"></i> Add New User</a>
                            </div>
                        </div>
                        <div class="box-body" bis_skin_checked="1">
                            <div class="download_label" bis_skin_checked="1">Users List</div>
                            <div class="table-responsive mailbox-messages" bis_skin_checked="1">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"
                                    bis_skin_checked="1">
                                    <div class="top" bis_skin_checked="1">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter" bis_skin_checked="1">
                                            <label><input type="search" class="" placeholder="Search..."
                                                    aria-controls="DataTables_Table_0" autocomplete="off"></label>
                                        </div>
                                    </div>

                                    <div id="DataTables_Table_0_processing" class="dataTables_processing"
                                        style="display: none;" bis_skin_checked="1">
                                        <i class="fa fa-spinner fa-spin fa-1x fa-fw"></i><span
                                            class="sr-only">Loading...</span>
                                    </div>
                                    <div bis_skin_checked="1">
                                        <table
                                            class="table table-hover table-striped table-bordered ajaxlist dataTable no-footer"
                                            data-export-title="Visitor List" id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info" style="width: 1353px;">
                                            <thead>
                                                <tr role="row">

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1" style="width: 20px;"
                                                        aria-label="ID: activate to sort column ascending">ID</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1" style="width: 300px;"
                                                        aria-label="Name: activate to sort column ascending">Name</th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0"rowspan="1" colspan="1"
                                                        style="width: 320px;"
                                                        aria-label="Visit To: activate to sort column ascending">Email
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1" style="width: 116px;"
                                                        aria-label="IPD/OPD/Staff: activate to sort column ascending">Created at</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1" style="width: 116px;"
                                                        aria-label="Date: activate to sort column ascending">Updated at</th>


                                                    <th class="text-right noExport dt-body-right sorting_disabled"
                                                        rowspan="1" colspan="1" style="width: 108px;"
                                                        aria-label="Action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($users as $user)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->created_at->format('m/d/Y h:i A') }}</td>
                                                        <td>{{ $user->updated_at->format('m/d/Y h:i A') }}</td>
                                                        <td class=" dt-body-right">

                                                            {{-- <a href="#" data-toggle="tooltip"
                                                                class="btn btn-default btn-xs pull-right" title="Show"
                                                                data-target="#visitordetails" onclick="getRecord(249)"><i
                                                                    class="fa fa-reorder"></i>
                                                            </a> --}}

                                                            <!-- Edit Button -->
                                                            <a href="{{ route('users.edit', $user->id) }}"
                                                                class="btn btn-default btn-xs pull-right"
                                                                data-toggle="tooltip" title="Edit">
                                                                <i class="las la-pencil-alt" aria-hidden="true"></i>
                                                            </a>

                                                            <!-- Delete Button -->
                                                            <a href="javascript:void(0);" class="delete-item btn btn-default btn-xs pull-right"
                                                                        title="Delete Item" data-id="{{ $user->id }}">
                                                                        <i class="las la-trash"></i>
                                                                    </a>
                                                            <!-- end-delete -->
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- pagination -->
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                        aria-live="polite" bis_skin_checked="1">Records: {{ $users->firstItem() }}
                                        to
                                        {{ $users->lastItem() }} of {{ $users->total() }}</div>
                                    <div class="dataTables_paginate paging_simple_numbers" bis_skin_checked="1">

                                        <a class="paginate_button previous disabled" aria-controls="DataTables_Table_0"
                                            data-dt-idx="0" tabindex="0"><i class="fa fa-angle-left"></i></a>
                                        <span><a class="paginate_button current" aria-controls="DataTables_Table_0"
                                                data-dt-idx="1" tabindex="0">1</a>
                                        </span><a class="paginate_button next disabled" aria-controls="DataTables_Table_0"
                                            data-dt-idx="2" tabindex="0"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!------------------------- modal ------------------------------->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            {{-- <div class="modal-dialog modal-lg modalfullmobile" > --}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-media-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <form id="formadd" action="{{route('users.store')}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="ptt10">
                    @csrf
                    <div class="scroll-area">
                        <div class="modal-body pt0 pb0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label> <small class="req"> *</small>
                                        <input type="text" class="form-control" value="{{@old('name')}}" name="name" placeholder="Full Name">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label> <small class="req"> *</small>
                                        <input type="text" class="form-control" value="{{@old('email')}}" name="email" placeholder="Enter Email">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" value="{{@old('password')}}" name="password" placeholder="Enter Password">
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirmpassword">Confirm Password</label>
                                        <input type="password" class="form-control" value="{{@old('password_confirmation')}}" name="password_confirmation" placeholder="Re-Enter Password">
                                        @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="formaddbtn" data-loading-text="Processing..."
                            class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#createSliderForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{route('users.store')}}',
                method: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // handle success
                    $('#createSliderModal').modal('hide');
                    location.reload();
                },
                error: function(response) {
                    // handle error
                    let errors = response.responseJSON.errors;
                    for (let key in errors) {
                        alert(errors[key][0]);
                    }
                }
            });
        });
    });
</script>
<!-- for-delete -->
<script>
    $(document).ready(function() {
        // Delete item
        $('.delete-item').click(function(e) {
            e.preventDefault();
            var itemId = $(this).data('id');
            var url = '{{ route('users.destroy', ':id') }}';
            url = url.replace(':id', itemId);

            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#expert_' + itemId).remove(); // Remove the item from the DOM
                            toastr.success('User deleted successfully.');
                            location.reload(); // Reload the page
                        } else {
                            toastr.error('Failed to delete item.');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('An error occurred while deleting the item.');
                    }
                });
            }
        });
    });
</script>
@endpush
