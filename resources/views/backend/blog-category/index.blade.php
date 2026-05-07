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
                            <h3 class="box-title titlefix">Create Blog Category</h3>
                            <div class="box-tools pull-right" bis_skin_checked="1">
                                <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm addvisitor"><i
                                        class="fa fa-plus"></i> Add new Blog Category</a>
                            </div>
                        </div>
                        <div class="box-body" bis_skin_checked="1">
                            <div class="download_label" bis_skin_checked="1">Create Blog Category</div>
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
                                                        rowspan="1" colspan="1" style="width: 50px;"
                                                        aria-label="ID: activate to sort column ascending">ID</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1" style="width: 500px;"
                                                        aria-label="Name: activate to sort column ascending">Title</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1" style="width: 116px;"
                                                        aria-label="Date: activate to sort column ascending">Date</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1" style="width: 116px;"
                                                        aria-label="Date: activate to sort column ascending">Update</th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0"rowspan="1" colspan="1"
                                                        style="width: 50px;"
                                                        aria-label="Visit To: activate to sort column ascending">Status
                                                    </th>
                                                    <th class="text-right noExport dt-body-right sorting_disabled"
                                                        rowspan="1" colspan="1" style="width: 40px;"
                                                        aria-label="Action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($blogs) == 0)
                                                    <tr>
                                                        <td colspan="7">
                                                            <p class="text-center">
                                                                No any records.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($blogs as $service)
                                                        <tr role="row" class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $service->title }}</td>
                                                            <td>{{ $service->created_at->format('m/d/Y h:i A') }}</td>
                                                            <td>{{ $service->updated_at->format('m/d/Y h:i A') }}</td>
                                                            <td>
                                                                @if ($service->publish_status == 1)
                                                                    <small
                                                                    class="label label-success">Published</small>@else<small
                                                                        class="label label-danger">UnPublish</small>
                                                                @endif
                                                            </td>
                                                            <td class=" dt-body-right">
                                                                <a href="{{ route('blog-category.edit', $service->id) }}"
                                                                    class="btn btn-default btn-xs pull-right"
                                                                    data-toggle="tooltip" title="Edit"
                                                                    onclick="get(249)"><i class="las la-pencil-alt"
                                                                        aria-hidden="true"></i></a>

                                                                <!--- Delete --->
                                                                <a href="javascript:void(0);"
                                                                    class="delete-item btn btn-default btn-xs pull-right"
                                                                    title="Delete=" data-id="{{ $service->id }}">
                                                                    <i class="las la-trash"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- pagination -->
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                        aria-live="polite" bis_skin_checked="1">Records: {{ $blogs->firstItem() }}
                                        to
                                        {{ $blogs->lastItem() }} of {{ $blogs->total() }}</div>
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
    <!--------------- modal --------------->
    @include('backend.blog-category.form')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#createSliderForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('blog-category.store') }}',
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
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 80,
            placeholder: "Blog category content.."
        });
    </script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.lfm').filemanager('image');

        });
    </script>
    <!-- for-delete -->
    <script>
        $(document).ready(function() {
            // Delete item
            $('.delete-item').click(function(e) {
                e.preventDefault();
                var itemId = $(this).data('id');
                var url = '{{ route('blog-category.destroy', ':id') }}';
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
                                toastr.success('Item deleted successfully.');
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
