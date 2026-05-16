{{-- ============================================================
     Blog Create / Edit Modal  (replaces old #myModal)
     ============================================================ --}}
<style>
    #blogModal .modal-dialog {
        max-width: 940px;
        width: 96%;
    }

    #blogModal .modal-content {
        border-radius: 10px;
        border: none;
        box-shadow: 0 20px 60px rgba(0, 0, 0, .18);
    }

    #blogModal .modal-header {
        padding: 16px 24px;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #blogModal .modal-header h4 {
        font-size: 15px;
        font-weight: 700;
        margin: 0;
    }

    #blogModal .modal-header .close {
        margin: 0;
        opacity: .5;
        font-size: 20px;
    }

    #blogModal .modal-header .close:hover {
        opacity: 1;
    }

    #blogModal .modal-footer {
        padding: 12px 24px;
        border-top: 1px solid #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 8px;
    }

    /* Tab nav inside modal */
    .bm-tabs {
        display: flex;
        gap: 0;
        border-bottom: 2px solid #e8e8e8;
        padding: 0 24px;
        background: #fafafa;
    }

    .bm-tab {
        padding: 11px 18px;
        font-size: 12px;
        font-weight: 600;
        color: #888;
        cursor: pointer;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        transition: all .15s;
        user-select: none;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .bm-tab.active {
        color: #3c8dbc;
        border-color: #3c8dbc;
    }

    .bm-tab:hover:not(.active) {
        color: #555;
    }

    .bm-panel {
        display: none;
        padding: 22px 24px;
    }

    .bm-panel.active {
        display: block;
    }

    /* Scrollable body */
    .bm-body {
        max-height: 60vh;
        overflow-y: auto;
    }

    /* Fields */
    .bm-label {
        font-size: 12px;
        font-weight: 600;
        color: #555;
        margin-bottom: 5px;
        display: block;
    }

    .bm-hint {
        font-size: 11px;
        color: #aaa;
        margin-top: 3px;
    }

    #blogModal .form-control {
        /* border-radius: 6px !important; */
        border: 1px solid #ddd !important;
        font-size: 13px !important;
    }

    #blogModal .form-control:focus {
        border-color: #3c8dbc !important;
        box-shadow: 0 0 0 2px rgba(60, 141, 188, .1) !important;
    }

    /* Slug preview */
    .bm-slug {
        background: #f8f8f8;
        border-radius: 5px;
        padding: 7px 11px;
        font-family: monospace;
        font-size: 11px;
        color: #777;
        margin-top: 5px;
    }

    .bm-slug span {
        color: #3c8dbc;
        font-weight: 600;
    }

    /* Color swatches */
    .bm-swatches {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 6px;
    }

    .bm-swatch {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        cursor: pointer;
        border: 3px solid transparent;
        transition: transform .15s, box-shadow .15s;
        flex-shrink: 0;
    }

    .bm-swatch:hover {
        transform: scale(1.15);
    }

    .bm-swatch.selected {
        border-color: #333;
        box-shadow: 0 0 0 2px #fff, 0 0 0 4px #333;
    }

    /* Status row */
    .bm-status-row {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-top: 4px;
    }

    .bm-status-row label {
        margin: 0;
        font-size: 13px;
        font-weight: 600;
        color: #333;
        cursor: pointer;
    }

    /* Word count */
    .bm-counters {
        display: flex;
        gap: 16px;
        margin-top: 6px;
    }

    .bm-counter {
        font-size: 11px;
        color: #aaa;
    }

    .bm-counter b {
        color: #555;
    }

    /* Existing image preview */
    .bm-current-img {
        display: none;
        margin-bottom: 10px;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 6px;
    }

    .bm-current-img img {
        height: 58px;
        border-radius: 4px;
        border: 1px solid #e0e0e0;
        object-fit: cover;
    }

    .bm-current-img small {
        display: block;
        font-size: 11px;
        color: #aaa;
        margin-top: 5px;
    }

    /* Char counter */
    .bm-char {
        font-size: 11px;
        text-align: right;
        margin-top: 3px;
    }

    .bm-char.ok {
        color: #00a65a;
    }

    .bm-char.warn {
        color: #f39c12;
    }

    .bm-char.over {
        color: #dd4b39;
    }

    /* Save button */
    .bm-save-btn {
        background: #0696F4;
        color: #fff;
        border: none;
        /* border-radius: 6px; */
        padding: 8px 24px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .bm-save-btn:hover {
        background: #337ab7;
    }

    .bm-save-btn:disabled {
        opacity: .6;
        cursor: not-allowed;
    }

    /* Dropify overrides inside modal */
    #blogModal .dropify-wrapper {
        border-radius: 7px !important;
        border: 2px dashed #ddd !important;
    }

    #blogModal .dropify-wrapper:hover {
        border-color: #3c8dbc !important;
    }
</style>

<div id="blogModal" class="modal fade" role="dialog">
    <div class="modal-dialog modalfullmobile">
        <div class="modal-content">

            {{-- Header --}}
            <div class="modal-header">
                <h4 class="modal-title" id="blogModalTitle">
                    <i class="las la-plus-circle" style="color:#3c8dbc"></i> New Post
                </h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            {{-- Tab nav --}}
            <div class="bm-tabs">
                <div class="bm-tab active" data-bm-tab="content">
                    <i class="las la-file-alt"></i> Content
                </div>
                <div class="bm-tab" data-bm-tab="media">
                    <i class="las la-images"></i> Media
                </div>
                <div class="bm-tab" data-bm-tab="seo">
                    <i class="las la-search"></i> SEO
                </div>
            </div>

            <form id="blogModalForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="bmMethod" value="POST">
                <input type="hidden" name="blog_type" value="Blog">

                <div class="bm-body">

                    {{-- ── CONTENT tab ─────────────────────────────── --}}
                    <div class="bm-panel active" id="bm-content">

                        {{-- Title --}}
                        <div class="form-group">
                            <label class="bm-label">Title <span style="color:#dd4b39">*</span></label>
                            <input type="text" class="form-control" name="title" id="bmTitle"
                                placeholder="Enter blog title…" required>
                            <div class="bm-slug">
                                URL: arbaazkhan.com.np/<span id="bmSlugVal"
                                    style="color:#3c8dbc; font-weight:600;">—</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bm-label">Category <span style="color:#dd4b39">*</span></label>
                                    <select class="form-control" name="blog_category" id="bmCategory">
                                        <option value="" disabled selected>Select category</option>
                                        @foreach ($cat as $type)
                                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bm-label">Author</label>
                                    <input type="text" class="form-control" name="posted_by" id="bmAuthor"
                                        value="Arbaaz Khan">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bm-label">Title Color</label>
                                    <input type="hidden" name="color" id="bmColorInput" value="#42d392">
                                    <div class="bm-swatches" id="bmSwatches">
                                        @foreach ([
        '#f50057' => 'Red',
        '#ffa500' => 'Orange',
        '#08fdd8' => 'Cyan',
        '#81d8f7' => 'Sky',
        '#42d392' => 'Green',
        '#28689E' => 'Blue',
        '#FED35D' => 'Yellow',
        '#a855f7' => 'Purple',
    ] as $hex => $name)
                                            <div class="bm-swatch {{ $hex === '#42d392' ? 'selected' : '' }}"
                                                style="background:{{ $hex }}" data-color="{{ $hex }}"
                                                title="{{ $name }}"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Content editor --}}
                        <div class="form-group">
                            <label class="bm-label">Content <span style="color:#dd4b39">*</span></label>
                            <textarea name="description" id="modalBlogContent" class="form-control" style="height:260px;"></textarea>
                            <div class="bm-counters">
                                <div class="bm-counter">Words: <b id="bmWords">0</b></div>
                                <div class="bm-counter">Reading time: <b id="bmReadTime">0</b> min</div>
                            </div>
                        </div>

                        {{-- Publish toggle --}}
                        <div class="bm-status-row">
                            <div class="material-switch" style="margin:0">
                                <input id="bmPublish" name="publish_status" type="checkbox" class="chk"
                                    value="1" checked>
                                <label for="bmPublish" class="label-success" style="margin:0"></label>
                            </div>
                            <div>
                                <label for="bmPublish">Published</label>
                                <div style="font-size:11px; color:#aaa;">Toggle off to save as draft</div>
                            </div>
                        </div>
                    </div>

                    {{-- ── MEDIA tab ─────────────────────────────── --}}
                    <div class="bm-panel" id="bm-media">
                        <div class="form-group">
                            <label class="bm-label">Cover Image</label>
                            <div class="bm-current-img" id="bmCoverCurrent">
                                <img id="bmCoverCurrentImg" src="" alt="">
                                <small>Upload below to replace the current image</small>
                            </div>
                            <input type="file" name="cover_image" class="bm-dropify"
                                data-allowed-file-extensions="jpg jpeg png gif webp" data-max-file-size="5M"
                                data-height="150">
                        </div>

                        <div class="form-group" style="margin-top:20px;">
                            <label class="bm-label">
                                Banner Image
                                <span style="font-weight:400; color:#aaa;">(optional — hero)</span>
                            </label>
                            <div class="bm-current-img" id="bmBannerCurrent">
                                <img id="bmBannerCurrentImg" src="" alt="">
                                <small>Upload below to replace the current image</small>
                            </div>
                            <input type="file" name="banner_image" class="bm-dropify"
                                data-allowed-file-extensions="jpg jpeg png gif webp" data-max-file-size="5M"
                                data-height="150">
                        </div>
                    </div>

                    {{-- ── SEO tab ─────────────────────────────── --}}
                    <div class="bm-panel" id="bm-seo">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bm-label">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" id="bmMetaTitle"
                                        maxlength="70" placeholder="Defaults to post title if empty">
                                    <div class="bm-char" id="bmMetaTitleChar">0 / 70</div>
                                    <p class="bm-hint">Keep under 60 chars for best display in Google.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bm-label">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords"
                                        id="bmMetaKeywords" placeholder="laravel, portfolio, web development">
                                    <p class="bm-hint">Comma-separated keywords.</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="bm-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control" id="bmMetaDesc" rows="3" maxlength="160"
                                placeholder="Brief description for search engines…"></textarea>
                            <div class="bm-char" id="bmMetaDescChar">0 / 160</div>
                            <p class="bm-hint">Keep between 120–160 chars for best results.</p>
                        </div>

                        <div class="form-group">
                            <label class="bm-label">OG Image</label>
                            <div class="bm-current-img" id="bmOgCurrent">
                                <img id="bmOgCurrentImg" src="" alt="">
                                <small>Upload below to replace the current image</small>
                            </div>
                            <input type="file" name="og_image" class="bm-dropify"
                                data-allowed-file-extensions="jpg jpeg png gif webp" data-max-file-size="5M"
                                data-height="120">
                            <p class="bm-hint" style="margin-top:6px;">
                                Recommended: 1200×630px. Defaults to cover image if empty.
                            </p>
                        </div>
                    </div>

                </div>{{-- /.bm-body --}}

                {{-- Footer --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="bm-save-btn" id="bmSaveBtn">
                        <i class="las la-save"></i>
                        <span id="bmSaveTxt">Save Post</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
