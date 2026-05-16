<style>
    #catModal .modal-dialog {
        max-width: 740px;
        width: 96%;
    }

    #catModal .modal-content {
        border-radius: 0;
        border: none;
        box-shadow: 0 20px 60px rgba(0, 0, 0, .18);
    }

    #catModal .modal-header {
        padding: 16px 24px;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #catModal .modal-header h4 {
        font-size: 15px;
        font-weight: 700;
        color: #333;
        margin: 0;
    }

    #catModal .modal-header .close {
        margin: 0;
        opacity: .5;
        font-size: 20px;
    }

    #catModal .modal-header .close:hover {
        opacity: 1;
    }

    #catModal .modal-footer {
        padding: 12px 24px;
        border-top: 1px solid #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 8px;
    }

    .cat-panel {
        padding: 22px 24px;
    }

    .cat-body {
        max-height: 58vh;
        overflow-y: auto;
    }

    .cat-label {
        font-size: 12px;
        font-weight: 600;
        color: #555;
        margin-bottom: 5px;
        display: block;
    }

    .cat-hint {
        font-size: 11px;
        color: #aaa;
        margin-top: 3px;
    }

    #catModal .form-control {
        border-radius: 6px !important;
        border: 1px solid #ddd !important;
        font-size: 13px !important;
    }

    #catModal .form-control:focus {
        border-color: #3c8dbc !important;
        box-shadow: 0 0 0 2px rgba(60, 141, 188, .1) !important;
    }

    .cat-slug {
        background: #f8f8f8;
        border-radius: 5px;
        padding: 7px 11px;
        font-family: monospace;
        font-size: 11px;
        color: #777;
        margin-top: 5px;
    }

    .cat-slug span {
        color: #3c8dbc;
        font-weight: 600;
    }

    .cat-status-row {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-top: 4px;
    }

    .cat-status-row label {
        margin: 0;
        font-size: 13px;
        font-weight: 600;
        color: #333;
        cursor: pointer;
    }

    .cat-current-img {
        display: none;
        margin-bottom: 10px;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 6px;
    }

    .cat-current-img img {
        height: 54px;
        border-radius: 4px;
        border: 1px solid #e0e0e0;
        object-fit: cover;
    }

    .cat-current-img small {
        display: block;
        font-size: 11px;
        color: #aaa;
        margin-top: 5px;
    }

    .cat-char {
        font-size: 11px;
        text-align: right;
        margin-top: 3px;
    }

    .cat-char.ok {
        color: #00a65a;
    }

    .cat-char.warn {
        color: #f39c12;
    }

    .cat-char.over {
        color: #dd4b39;
    }

    .cat-save-btn {
        background: #3c8dbc;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 8px 24px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .cat-save-btn:hover {
        background: #337ab7;
    }

    .cat-save-btn:disabled {
        opacity: .6;
        cursor: not-allowed;
    }

    #catModal .dropify-wrapper {
        border-radius: 7px !important;
        border: 2px dashed #ddd !important;
    }

    #catModal .dropify-wrapper:hover {
        border-color: #3c8dbc !important;
    }
</style>

<div id="catModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs modalfullmobile">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="catModalTitle">
                    <i class="las la-plus-circle" style="color:#3c8dbc"></i> New Category
                </h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>


            <form id="catModalForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="catMethod" value="POST">

                <div class="cat-body">

                    {{-- ── CONTENT ──────────────────────────────── --}}
                    <div class="cat-panel" id="cat-content">

                        <div class="form-group">
                            <label class="cat-label">Title <span style="color:#dd4b39">*</span></label>
                            <input type="text" class="form-control" name="title" id="catTitle"
                                placeholder="Category name…" required>
                            <div class="cat-slug">
                                Slug: <span id="catSlugVal" style="color:#3c8dbc; font-weight:600;">—</span>
                            </div>
                        </div>

                        <div class="cat-status-row">
                            <div class="material-switch" style="margin:0">
                                <input id="catPublish" name="publish_status" type="checkbox" class="chk"
                                    value="1" checked>
                                <label for="catPublish" class="label-success" style="margin:0"></label>
                            </div>
                            <div>
                                <label for="catPublish">Published</label>
                                <div style="font-size:11px; color:#aaa;">Toggle off to hide from frontend</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="cat-save-btn" id="catSaveBtn">
                        <i class="las la-save"></i>
                        <span id="catSaveTxt">Save Category</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
