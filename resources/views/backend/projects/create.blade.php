@extends('backend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                @isset($project)
                    <form action="{{ route('projects.update', @$project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @endisset

                        <div class="col-md-9">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Project | <small>Basic Informations</small></h3>
                                </div>
                                <div class="box-body">
                                    <!-- Title -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label><small class="req"> *</small>
                                            <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ old('title', @$project->title) }}" required>
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="link">Link | URL</label>
                                            <input type="text" name="link" class="form-control" placeholder="Enter link" value="{{ old('link', @$project->link) }}">
                                            <span class="text-danger">{{ $errors->first('link') }}</span>
                                        </div>
                                    </div>

                                    <!-- GitHub Link -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="github_link">GitHub Link</label>
                                            <input type="text" name="github_link" class="form-control" placeholder="Enter github url" value="{{ old('github_link', @$project->github_link) }}">
                                            <span class="text-danger">{{ $errors->first('github_link') }}</span>
                                        </div>
                                    </div>

                                    <!-- Year -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <input type="text" name="year" class="form-control" placeholder="Enter year" value="{{ old('year', @$project->year) }}" required>
                                            <span class="text-danger">{{ $errors->first('year') }}</span>
                                        </div>
                                    </div>

                                    <!-- Made at -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="made_at">Made at</label>
                                            <input type="text" name="made_at" class="form-control" placeholder="Enter made at" value="{{ old('made_at', @$project->made_at) }}">
                                            <span class="text-danger">{{ $errors->first('made_at') }}</span>
                                        </div>
                                    </div>

                                    <!-- Built with - Multiple Select -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="built_with">Built with</label><small class="req"> *</small>
                                            <select class="form-control select-multiple" name="built_with[]" multiple="multiple" data-placeholder="-- Choose programming languages --" required>
                                                @foreach ($pro as $language)
                                                    <option value="{{ $language->id }}"
                                                        @isset($project)
                                                            {{ in_array($language->id, $project->programmingLanguages->pluck('id')->toArray()) ? 'selected' : '' }}
                                                        @endisset
                                                        @if(old('built_with'))
                                                            {{ in_array($language->id, old('built_with')) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $language->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{ $errors->first('built_with') }}</p>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control ckeditor">{{ old('description', @$project->description) }}</textarea>
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        </div>
                                    </div>

                                    <!-- SEO Fields -->
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title (Optional)</label>
                                            <input type="text" class="form-control" value="{{ old('meta_title', @$project->meta_title) }}" name="meta_title" placeholder="Meta Title">
                                            <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords (Optional)</label>
                                            <input type="text" class="form-control" value="{{ old('meta_keywords', @$project->meta_keywords) }}" name="meta_keywords" placeholder="Meta Keywords">
                                            <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">Meta Description (Optional)</label>
                                            <textarea name="meta_description" class="form-control" placeholder="Meta description..">{{ old('meta_description', @$project->meta_description) }}</textarea>
                                            <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-3 col-sm-12">
                            <div class="uploadbarfixes">
                                <!-- Cover Image -->
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfmCover" data-input="thumbnailCover" data-preview="coverPreview" class="btn btn-info btn-sm lfm">
                                                            <i class="fa fa-picture-o"></i> Cover Image
                                                        </a>
                                                    </span>
                                                    <input id="thumbnailCover" class="form-control" value="{{ old('cover_image', @$project->cover_image) }}" type="text" name="cover_image" onchange="loadCover()" readonly>
                                                </div>
                                                <img id="coverPreview" style="margin-top: 15px;border-radius: 5px; max-height: 126px; width: 235px; object-fit: cover;" src="{{ old('cover_image', @$project->cover_image) ? @$project->cover_image : asset('storage/noimage.jpg') }}">
                                                <span class="text-danger">{{ $errors->first('cover_image') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Banner Image -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <label>Banner Image</label>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfmBanner" data-input="thumbnailBanner" data-preview="bannerPreview" class="btn btn-info btn-sm lfm">
                                                            <i class="fa fa-picture-o"></i> Banner Image
                                                        </a>
                                                    </span>
                                                    <input id="thumbnailBanner" class="form-control" value="{{ old('banner_image', @$project->banner_image) }}" type="text" name="banner_image" onchange="loadBanner()" readonly>
                                                </div>
                                                <img id="bannerPreview" style="margin-top: 15px;border-radius: 5px; max-height: 126px; width: 235px; object-fit: cover;" src="{{ old('banner_image', @$project->banner_image) ? @$project->banner_image : asset('storage/noimage.jpg') }}">
                                                <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Publish Status -->
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label for="publish_status">Publish Status</label>
                                            <div class="material-switch pull-right">
                                                <input id="publish_status" name="publish_status" type="checkbox" class="chk" value="1" {{ @$project->publish_status == 1 ? 'checked' : '' }}>
                                                <label for="publish_status" class="label-success"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shown on Main Page -->
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label for="shown_on_main">Shown on Main Page</label>
                                            <div class="material-switch pull-right">
                                                <input id="shown_on_main" name="shown_on_main" type="checkbox" class="chk" value="1" {{ @$project->shown_on_main == 1 ? 'checked' : '' }}>
                                                <label for="shown_on_main" class="label-success"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shown on Gallery -->
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label for="shown_on_gallery">Shown on Gallery</label>
                                            <div class="material-switch pull-right">
                                                <input id="shown_on_gallery" name="shown_on_gallery" type="checkbox" class="chk" value="1" {{ @$project->shown_on_gallery == 1 ? 'checked' : '' }}>
                                                <label for="shown_on_gallery" class="label-success"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <button type="submit" class="btn cfees btn-block">
                                            <i class="fa fa-check-circle"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Initialize file manager
            $('.lfm').filemanager('image');

            // Initialize select2
            $('.select-multiple').select2({
                placeholder: "-- Choose programming languages --",
                allowClear: true
            });
        });

        // Cover Image Preview
        function loadCover() {
            var output = document.getElementById('coverPreview');
            output.src = document.getElementById('thumbnailCover').value;
        }

        // Banner Image Preview
        function loadBanner() {
            var output = document.getElementById('bannerPreview');
            output.src = document.getElementById('thumbnailBanner').value;
        }
    </script>
@endpush
