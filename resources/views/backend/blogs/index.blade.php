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
                            <h3 class="box-title titlefix">Blog Posts</h3>
                            <div class="box-tools pull-right">
                                <button id="newPostBtn" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> New Post
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" id="blogTable">
                                    <thead>
                                        <tr>
                                            <th style="width:40px;">#</th>
                                            <th style="width:56px;">Cover</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Read</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th class="text-right" style="width:90px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($blogs as $blog)
                                            <tr id="blog_row_{{ $blog->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($blog->cover_image)
                                                        <img src="{{ asset($blog->cover_image) }}"
                                                            style="width:40px; height:30px; object-fit:cover; border-radius:4px;" alt="">
                                                    @else
                                                        <span style="color:#ccc;"><i class="las la-image"></i></span>
                                                    @endif
                                                </td>
                                                <td>{{ Str::limit($blog->title, 60) }}</td>
                                                <td>
                                                    @if($blog->category)
                                                        <small class="label label-info">{{ $blog->category->title }}</small>
                                                    @else
                                                        <span style="color:#ccc;">—</span>
                                                    @endif
                                                </td>
                                                <td>{{ $blog->posted_by ?: '—' }}</td>
                                                <td><i class="las la-clock"></i> {{ $blog->reading_time }} min</td>
                                                <td>
                                                    @if($blog->publish_status == 1)
                                                        <small class="label label-success">Published</small>
                                                    @else
                                                        <small class="label label-danger">Draft</small>
                                                    @endif
                                                </td>
                                                <td>{{ $blog->created_at->format('m/d/Y') }}</td>
                                                <td class="text-right">
                                                    <a href="{{ route('blogs', $blog->slug) }}" target="_blank"
                                                        class="btn btn-default btn-xs" title="View live">
                                                        <i class="las la-eye"></i>
                                                    </a>
                                                    <button class="btn btn-default btn-xs edit-item"
                                                        data-id="{{ $blog->id }}" title="Edit">
                                                        <i class="las la-pen"></i>
                                                    </button>
                                                    <button class="btn btn-default btn-xs delete-item"
                                                        data-id="{{ $blog->id }}" title="Delete">
                                                        <i class="las la-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center" style="padding:30px; color:#aaa;">
                                                    No blog posts yet.
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

    @include('backend.blogs.form')
@endsection

@push('scripts')
<script>
$(document).ready(function () {

    var bmStoreUrl  = '{{ route("blogs.store") }}';
    var bmUpdateUrl = '{{ route("blogs.update", ":id") }}';
    var bmShowUrl   = '{{ route("blogs.show", ":id") }}';

    // ── New post ──────────────────────────────────────────────────
    $('#newPostBtn').on('click', function () {
        openBlogModal(null);
    });

    // ── Edit post ─────────────────────────────────────────────────
    $(document).on('click', '.edit-item', function () {
        var id  = $(this).data('id');
        var btn = $(this);
        btn.prop('disabled', true);
        $.getJSON(bmShowUrl.replace(':id', id), function (blog) {
            btn.prop('disabled', false);
            openBlogModal(blog);
        }).fail(function () {
            btn.prop('disabled', false);
            toastr.error('Could not load post data.');
        });
    });

    // ── Open modal ────────────────────────────────────────────────
    function openBlogModal(blog) {
        var isEdit = !!blog;

        if (CKEDITOR.instances.modalBlogContent) {
            CKEDITOR.instances.modalBlogContent.destroy(true);
        }

        document.getElementById('blogModalForm').reset();

        $('.bm-dropify').each(function () {
            var d = $(this).data('dropify');
            if (d) d.destroy();
        });

        if (isEdit) {
            $('#blogModalTitle').html('<i class="las la-pen" style="color:#3c8dbc"></i> Edit Post');
            $('#bmSaveTxt').text('Update Post');
            $('#blogModalForm').attr('action', bmUpdateUrl.replace(':id', blog.id));
            $('#bmMethod').val('PUT');

            $('#bmTitle').val(blog.title || '');
            $('#bmSlugVal').text(blog.slug || '—');
            $('#bmCategory').val(blog.blog_category || '');
            $('#bmAuthor').val(blog.posted_by || 'Arbaaz Khan');
            $('#bmColorInput').val(blog.color || '#42d392');
            $('#bmMetaTitle').val(blog.meta_title || '');
            $('#bmMetaKeywords').val(blog.meta_keywords || '');
            $('#bmMetaDesc').val(blog.meta_description || '');
            $('#bmPublish').prop('checked', blog.publish_status == 1);

            $('.bm-swatch').removeClass('selected');
            $('.bm-swatch[data-color="' + (blog.color || '#42d392') + '"]').addClass('selected');

            setCurrentImage('bmCoverCurrent',  'bmCoverCurrentImg',  blog.cover_image);
            setCurrentImage('bmBannerCurrent', 'bmBannerCurrentImg', blog.banner_image);
            setCurrentImage('bmOgCurrent',     'bmOgCurrentImg',     blog.og_image);

            window._bmContent = blog.description || '';
        } else {
            $('#blogModalTitle').html('<i class="las la-plus-circle" style="color:#3c8dbc"></i> New Post');
            $('#bmSaveTxt').text('Save Post');
            $('#blogModalForm').attr('action', bmStoreUrl);
            $('#bmMethod').val('POST');
            $('#bmSlugVal').text('—');

            $('.bm-swatch').removeClass('selected');
            $('.bm-swatch[data-color="#42d392"]').addClass('selected');
            $('#bmColorInput').val('#42d392');
            $('#bmAuthor').val('Arbaaz Khan');
            $('#bmCoverCurrent, #bmBannerCurrent, #bmOgCurrent').hide();

            window._bmContent = '';
        }

        activateBmTab('content');
        $('#bmMetaTitle, #bmMetaDesc').trigger('input');
        $('#blogModal').modal('show');
    }

    function setCurrentImage(wrapId, imgId, src) {
        if (src) {
            var url = src.indexOf('http') === 0 ? src : window.location.origin + '/' + src;
            $('#' + imgId).attr('src', url);
            $('#' + wrapId).show();
        } else {
            $('#' + wrapId).hide();
        }
    }

    // ── Modal shown ───────────────────────────────────────────────
    $('#blogModal').on('shown.bs.modal', function () {
        $('.bm-dropify').dropify({
            messages: { 'default': 'Drag & drop or click to upload', 'replace': 'Drop to replace', 'remove': 'Remove', 'error': 'Error' }
        });

        $('#bmCategory').select2({ dropdownParent: $('#blogModal'), width: '100%' });

        if (CKEDITOR.instances.modalBlogContent) {
            CKEDITOR.instances.modalBlogContent.destroy(true);
        }
        var editor = CKEDITOR.replace('modalBlogContent', {
            height: 260,
            removePlugins: 'filebrowser,image',
            toolbar: [
                { name: 'basicstyles', items: ['Bold','Italic','Underline','Strike','RemoveFormat'] },
                { name: 'paragraph',   items: ['NumberedList','BulletedList','Blockquote'] },
                { name: 'links',       items: ['Link','Unlink'] },
                { name: 'insert',      items: ['Table','HorizontalRule','SpecialChar'] },
                { name: 'styles',      items: ['Format'] },
                { name: 'tools',       items: ['Maximize'] },
            ]
        });
        editor.on('instanceReady', function () {
            this.setData(window._bmContent !== undefined ? window._bmContent : '');
            window._bmContent = undefined;
        });
    });

    // ── Modal hidden ──────────────────────────────────────────────
    $('#blogModal').on('hidden.bs.modal', function () {
        if (CKEDITOR.instances.modalBlogContent) {
            CKEDITOR.instances.modalBlogContent.destroy(true);
        }
    });

    // ── Tabs ──────────────────────────────────────────────────────
    $(document).on('click', '.bm-tab', function () {
        activateBmTab($(this).data('bm-tab'));
    });
    function activateBmTab(name) {
        $('.bm-tab').removeClass('active');
        $('.bm-tab[data-bm-tab="' + name + '"]').addClass('active');
        $('.bm-panel').removeClass('active');
        $('#bm-' + name).addClass('active');
    }

    // ── Title → slug ──────────────────────────────────────────────
    $(document).on('input', '#bmTitle', function () {
        var slug = $(this).val().toLowerCase().replace(/[^a-z0-9\s-]/g, '').trim().replace(/\s+/g, '-');
        $('#bmSlugVal').text(slug || '—');
    });

    // ── Color swatches ────────────────────────────────────────────
    $(document).on('click', '.bm-swatch', function () {
        $('.bm-swatch').removeClass('selected');
        $(this).addClass('selected');
        $('#bmColorInput').val($(this).data('color'));
    });

    // ── Word count ────────────────────────────────────────────────
    setInterval(function () {
        var editor = CKEDITOR.instances.modalBlogContent;
        if (!editor || !$('#blogModal').hasClass('in')) return;
        var text  = editor.getData().replace(/<[^>]+>/g, '');
        var words = text.trim() ? text.trim().split(/\s+/).length : 0;
        $('#bmWords').text(words);
        $('#bmReadTime').text(Math.max(1, Math.ceil(words / 200)));
    }, 2000);

    // ── Char counters ─────────────────────────────────────────────
    function bmCharCounter(sel, ctr, max, warn) {
        $(document).on('input', sel, function () {
            var len = $(this).val().length, el = $(ctr);
            el.text(len + ' / ' + max).removeClass('ok warn over');
            if (len > max) el.addClass('over');
            else if (len >= warn) el.addClass('ok');
            else el.addClass('warn');
        });
    }
    bmCharCounter('#bmMetaTitle', '#bmMetaTitleChar', 70, 50);
    bmCharCounter('#bmMetaDesc',  '#bmMetaDescChar',  160, 120);

    // ── Form submit ───────────────────────────────────────────────
    $('#blogModalForm').on('submit', function (e) {
        e.preventDefault();
        if (CKEDITOR.instances.modalBlogContent) {
            CKEDITOR.instances.modalBlogContent.updateElement();
        }
        var fd = new FormData(this), btn = $('#bmSaveBtn'), txt = $('#bmSaveTxt').text();
        btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Saving…');
        $.ajax({
            url: $(this).attr('action'), method: 'POST', data: fd,
            processData: false, contentType: false,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-Requested-With': 'XMLHttpRequest' },
            success: function () {
                $('#blogModal').modal('hide');
                toastr.success('Saved successfully!');
                setTimeout(function () { location.reload(); }, 700);
            },
            error: function (res) {
                btn.prop('disabled', false)
                   .html('<i class="las la-save"></i> <span id="bmSaveTxt">' + txt + '</span>');
                var errors = res.responseJSON && res.responseJSON.errors;
                toastr.error(errors ? Object.values(errors)[0][0] : 'Something went wrong.');
            }
        });
    });

    // ── Delete ────────────────────────────────────────────────────
    $(document).on('click', '.delete-item', function () {
        var id  = $(this).data('id');
        var url = '{{ route("blogs.destroy", ":id") }}'.replace(':id', id);
        if (!confirm('Delete this post? This cannot be undone.')) return;
        $.ajax({
            url: url, type: 'DELETE', data: { _token: '{{ csrf_token() }}' },
            success: function (res) {
                if (res.success) {
                    $('#blog_row_' + id).fadeOut(300, function () { $(this).remove(); });
                    toastr.success('Post deleted.');
                }
            },
            error: function () { toastr.error('Failed to delete.'); }
        });
    });

});
</script>
@endpush
