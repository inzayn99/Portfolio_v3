@extends('backend.layouts.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="min-height: 272px;">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix">Blog Categories</h3>
                            <div class="box-tools pull-right">
                                <button id="newCatBtn" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Add New Category
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" id="catTable">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">#</th>
                                            <th>Title</th>
                                            <th>Posts</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th class="text-right" style="width:80px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($blogs as $cat)
                                            <tr id="cat_row_{{ $cat->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $cat->title }}</td>
                                                <td>{{ $cat->blogs_count }} posts</td>
                                                <td>
                                                    @if($cat->publish_status == 1)
                                                        <small class="label label-success">Published</small>
                                                    @else
                                                        <small class="label label-danger">Draft</small>
                                                    @endif
                                                </td>
                                                <td>{{ $cat->created_at->format('m/d/Y') }}</td>
                                                <td class="text-right">
                                                    <button class="btn btn-default btn-xs edit-cat" data-id="{{ $cat->id }}" title="Edit">
                                                        <i class="las la-pen"></i>
                                                    </button>
                                                    <button class="btn btn-default btn-xs delete-cat" data-id="{{ $cat->id }}" title="Delete">
                                                        <i class="las la-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center" style="padding:30px; color:#aaa;">
                                                    No categories yet.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top:10px;">
                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('backend.blog-category.form')
@endsection

@push('scripts')
<script>
$(document).ready(function () {

    var storeUrl  = '{{ route("blog-category.store") }}';
    var updateUrl = '{{ route("blog-category.update", ":id") }}';
    var showUrl   = '{{ route("blog-category.show", ":id") }}';

    // ── New ───────────────────────────────────────────────────────
    $('#newCatBtn').on('click', function () {
        openCatModal(null);
    });

    // ── Edit ──────────────────────────────────────────────────────
    $(document).on('click', '.edit-cat', function () {
        var id  = $(this).data('id');
        var btn = $(this);
        btn.prop('disabled', true);
        $.getJSON(showUrl.replace(':id', id), function (cat) {
            btn.prop('disabled', false);
            openCatModal(cat);
        }).fail(function () {
            btn.prop('disabled', false);
            toastr.error('Could not load category data.');
        });
    });

    // ── Open modal ────────────────────────────────────────────────
    function openCatModal(cat) {
        var isEdit = !!cat;

        document.getElementById('catModalForm').reset();

        $('.cat-dropify').each(function () {
            var d = $(this).data('dropify');
            if (d) d.destroy();
        });

        if (isEdit) {
            $('#catModalTitle').html('<i class="las la-pen" style="color:#3c8dbc"></i> Edit Category');
            $('#catSaveTxt').text('Update Category');
            $('#catModalForm').attr('action', updateUrl.replace(':id', cat.id));
            $('#catMethod').val('PUT');

            $('#catTitle').val(cat.title || '');
            $('#catSlugVal').text(cat.slug || '—');
            $('#catDescription').val(cat.description || '');
            $('#catMetaTitle').val(cat.meta_title || '');
            $('#catMetaKeywords').val(cat.meta_keywords || '');
            $('#catMetaDesc').val(cat.meta_description || '');
            $('#catPublish').prop('checked', cat.publish_status == 1);

            setCatImg('catImgCurrent', 'catImgCurrentImg', cat.image);
            setCatImg('catOgCurrent',  'catOgCurrentImg',  cat.og_image);
        } else {
            $('#catModalTitle').html('<i class="las la-plus-circle" style="color:#3c8dbc"></i> New Category');
            $('#catSaveTxt').text('Save Category');
            $('#catModalForm').attr('action', storeUrl);
            $('#catMethod').val('POST');
            $('#catSlugVal').text('—');
            $('#catImgCurrent, #catOgCurrent').hide();
        }

        $('#catModal').modal('show');
    }

    function setCatImg(wrapId, imgId, src) {
        if (src) {
            $('#' + imgId).attr('src', src.indexOf('http') === 0 ? src : window.location.origin + '/' + src);
            $('#' + wrapId).show();
        } else {
            $('#' + wrapId).hide();
        }
    }

    // ── Modal shown: init dropify ─────────────────────────────────
    $('#catModal').on('shown.bs.modal', function () {
        $('.cat-dropify').dropify({
            messages: { 'default': 'Drag & drop or click to upload', 'replace': 'Drop to replace', 'remove': 'Remove', 'error': 'Error' }
        });
    });

    // ── Title → slug ──────────────────────────────────────────────
    $(document).on('input', '#catTitle', function () {
        var slug = $(this).val().toLowerCase().replace(/[^a-z0-9\s-]/g, '').trim().replace(/\s+/g, '-');
        $('#catSlugVal').text(slug || '—');
    });

    // ── Form submit ───────────────────────────────────────────────
    $('#catModalForm').on('submit', function (e) {
        e.preventDefault();
        var fd = new FormData(this), btn = $('#catSaveBtn'), txt = $('#catSaveTxt').text();
        btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Saving…');
        $.ajax({
            url: $(this).attr('action'), method: 'POST', data: fd,
            processData: false, contentType: false,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-Requested-With': 'XMLHttpRequest' },
            success: function () {
                $('#catModal').modal('hide');
                toastr.success('Saved successfully!');
                setTimeout(function () { location.reload(); }, 700);
            },
            error: function (res) {
                btn.prop('disabled', false).html('<i class="las la-save"></i> <span id="catSaveTxt">' + txt + '</span>');
                var errors = res.responseJSON && res.responseJSON.errors;
                toastr.error(errors ? Object.values(errors)[0][0] : 'Something went wrong.');
            }
        });
    });

    // ── Delete ────────────────────────────────────────────────────
    $(document).on('click', '.delete-cat', function () {
        var id  = $(this).data('id');
        var url = '{{ route("blog-category.destroy", ":id") }}'.replace(':id', id);
        if (!confirm('Delete this category?')) return;
        $.ajax({
            url: url, type: 'DELETE', data: { _token: '{{ csrf_token() }}' },
            success: function (res) {
                if (res.success) {
                    $('#cat_row_' + id).fadeOut(300, function () { $(this).remove(); });
                    toastr.success('Deleted.');
                }
            },
            error: function () { toastr.error('Failed to delete.'); }
        });
    });

});
</script>
@endpush
