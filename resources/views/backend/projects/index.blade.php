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
                            <h3 class="box-title titlefix">Project List</h3>
                            <div class="box-tools pull-right" bis_skin_checked="1">
                                <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm addvisitor"><i
                                        class="fa fa-plus"></i> Add Project</a>
                            </div>
                        </div>
                        <div class="box-body" bis_skin_checked="1">
                            <div class="download_label" bis_skin_checked="1">Project List</div>
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
                                                        rowspan="1" colspan="1" style="width: 20px;"
                                                        aria-label="ID: activate to sort column ascending">Image</th>

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
                                                        rowspan="1" colspan="1" style="width: 20px;"
                                                        aria-label="Action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($project) == 0)
                                                    <tr>
                                                        <td colspan="12">
                                                            <p class="text-center">No any records.</p>
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($project as $data)
                                                        <tr role="row" class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><img src="{{ $data->cover_image }}" alt="" style="max-height:20px; width:30px; border-radius: 5px"></td>
                                                            <td><a href="{{ route('projects.edit', $data->id) }}">{{ Str_limit($data->title, 100 ?? 'NA') }}</a></td>
                                                            <td>{{ $data->created_at->format('m/d/Y h:i A') }}</td>
                                                            <td>{{ $data->updated_at->format('m/d/Y h:i A') }}</td>
                                                            <td>
                                                                <small class="label {{ $data->publish_status == 1 ? 'label-success' : 'label-danger' }}">
                                                                    {{ $data->publish_status == 1 ? 'Published' : 'UnPublish' }}
                                                                </small>
                                                            </td>
                                                            <td class=" dt-body-right">
                                                                <!--- Delete --->
                                                                <a href="javascript:void(0);"
                                                                    class="delete-item btn btn-default btn-xs pull-right"
                                                                    title="Delete" data-id="{{ $data->id }}">
                                                                    <i class="las la-trash"></i>
                                                                </a>
                                                                <!-- end-delete -->
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- pagination -->
                                    {{-- <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                        aria-live="polite" bis_skin_checked="1">Records: {{ $project->firstItem() }}
                                        to
                                        {{ $project->lastItem() }} of {{ $project->total() }}</div>
                                    <div class="dataTables_paginate paging_simple_numbers" bis_skin_checked="1">

                                        <a class="paginate_button previous disabled" aria-controls="DataTables_Table_0"
                                            data-dt-idx="0" tabindex="0"><i class="fa fa-angle-left"></i></a>
                                        <span><a class="paginate_button current" aria-controls="DataTables_Table_0"
                                                data-dt-idx="1" tabindex="0">1</a>
                                        </span><a class="paginate_button next disabled" aria-controls="DataTables_Table_0"
                                            data-dt-idx="2" tabindex="0"><i class="fa fa-angle-right"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#createSliderForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('projects.store') }}',
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
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.lfm').filemanager('image');
            $('.select2').select2();
        });
    </script>
    <!-- summernote js -->
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 300,
            placeholder: "Project content.."
        });
    </script>

<!-- for-delete -->
<script>
    $(document).ready(function() {
        // Delete item
        $('.delete-item').click(function(e) {
            e.preventDefault();
            var itemId = $(this).data('id');
            var url = '{{ route('projects.destroy', ':id') }}';
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
                            $('#expert_' + itemId).remove();
                            toastr.success('Item deleted successfully.');
                            location.reload();
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
