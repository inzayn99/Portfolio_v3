@extends('backend.layouts.app')
@push('styles')
    <style>
        #form1 {
            display: none;
        }
    </style>
    <script src="https://ilikenwf.github.io/jquery.mjs.nestedSortable.js"></script>
    <style type="text/css">
        ol {
            margin: 0;
            padding: 0;
            padding-left: 30px;
        }

        ol.sortable {
            margin: 0 0 0 0px;
            padding: 0;
            list-style-type: none;
        }

        ol.sortable ol {
            margin: 0 0 0 25px;
            padding: 0;
            list-style-type: none;
        }

        .sortable li {
            margin: 7px 0 0 0;
            padding: 0;
            position: relative;
        }

        .material-switch>input[type="checkbox"] {
            display: none;
        }

        .material-switch>label {
            cursor: pointer;
            height: 0px;
            position: relative;
            width: 40px;
        }

        .material-switch>label::before {
            background: rgb(0, 0, 0);
            box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            content: '';
            height: 16px;
            margin-top: -8px;
            position: absolute;
            opacity: 0.3;
            transition: all 0.4s ease-in-out;
            width: 40px;
        }

        .material-switch>label::after {
            background: rgb(255, 255, 255);
            border-radius: 16px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            content: '';
            height: 24px;
            left: -4px;
            margin-top: -8px;
            position: absolute;
            top: -4px;
            transition: all 0.3s ease-in-out;
            width: 24px;
        }

        .material-switch>input[type="checkbox"]:checked+label::before {
            background: inherit;
            opacity: 0.5;
        }

        .material-switch>input[type="checkbox"]:checked+label::after {
            background: inherit;
            left: 20px;
        }

        .ui-sortable-handle a {
            color: #444;
        }

        .tooltip.top .tooltip-inner {
            background-color: #000;
            padding: 5px 20px;
            opacity: 100;
            border-radius: 2px;

        }

        .tooltip.top .tooltip-arrow {
            border-top-color: #000;
            opacity: 0.5;
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!--- header --->
                    <div class="box box-primary" id="holist">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix">Header Menu Item List</h3>
                            <div class="box-tools pull-right" bis_skin_checked="1">
                                {{-- <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm addvisitor"><i
                                        class="fa fa-plus"></i> Add New</a> --}}
                                <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm addvisitor"><i
                                        class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="menu-box">
                                @if ($menu_items->count() > 0)
                                    <ol class="sortable">
                                        @foreach ($menu_items as $item)
                                            @if (is_null($item->parent_id))
                                                <li id="list_{{ $item->id }}" data-id="{{ $item->id }}" data-parent-id="{{ $item->parent_id }}">
                                                    <div>{{ $item->name }}
                                                        <span class="pull-right">
                                                            <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-xs"
                                                                title="Edit"><i class="las la-pencil-alt"></i></a>


                                                                <a href="javascript:void(0);" class="btn btn-xs delete-item" title="Delete Item" data-id="{{ $item->id }}">
                                                                    <i class="fa fa-remove"></i>
                                                                </a>
                                                        </span>
                                                        @php
                                                            $child_menus = \App\Models\Menu::orderBy('position', 'asc')
                                                                ->where('parent_id', $item->id)
                                                                ->get();
                                                        @endphp
                                                    </div>
                                                    <ol class="submenu-list">
                                                        @foreach ($child_menus as $menu)
                                                            <li id="list_{{ $menu->id }}" data-id="{{ $menu->id }}"
                                                                data-parent-id="{{ $menu->parent_id }}">
                                                                <div>{{ $menu->name }}
                                                                    <span class="pull-right">
                                                                        <a href="{{ route('menu.edit', $menu->id) }}"
                                                                            class="btn btn-xs" title="Edit Item"><i
                                                                                class="las la-pencil-alt"></i></a>

                                                                                <a href="javascript:void(0);" class="btn btn-xs delete-item" title="Delete Item" data-id="{{ $item->id }}">
                                                                                    <i class="fa fa-remove"></i>
                                                                                </a>

                                                                    </span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ol>
                                    {{-- <div class="form-group mt-4">
                                        <button type="button" class="btn btn-info btn-sm" id="update-order"><i
                                                class="fa fa-save"></i> Update Menu</button>
                                    </div> --}}
                                @else
                                    <p class="text-center">Menu Not Found in Database</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!--- footer --->
                    <div class="box box-primary" id="holist">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix">Footer Menu Item List</h3>
                        </div>
                        <div class="box-body">
                            <div class="menu-box">
                                @if ($menu_footer->count() > 0)
                                    <ol class="sortable">
                                        @foreach ($menu_footer as $item)
                                            @if ($item->parent_id == null)
                                                <li id="list_{{ $item->id }}" data-id="{{ $item->id }}" data-parent-id="{{ $item->parent_id }}">
                                                    <div>{{ $item->name }}
                                                        <span class="pull-right">
                                                            <a href="{{ route('menu.edit', $item->id) }}"
                                                                class="btn btn-xs" title="Edit"><i
                                                                    class="las la-pencil-alt"></i></a>

                                                                    <a href="javascript:void(0);" class="btn btn-xs delete-item" title="Delete Item" data-id="{{ $item->id }}">
                                                                        <i class="fa fa-remove"></i>
                                                                    </a>

                                                        </span>
                                                        @php
                                                            $child_menus = \App\Models\Menu::orderBy('position', 'asc')
                                                                ->where('parent_id', $item->id)
                                                                ->get();
                                                        @endphp
                                                    </div>
                                                    <ol class="submenu-list">
                                                        @foreach ($child_menus as $menu)
                                                            <li id="list_{{ $menu->id }}"
                                                                data-id="{{ $menu->id }}"
                                                                data-parent-id="{{ $menu->parent_id }}">
                                                                <div>{{ $menu->name }}
                                                                    <span class="pull-right">
                                                                        <a href="{{ route('menu.edit', $menu->id) }}"
                                                                            class="btn btn-xs" title="Edit Item"><i
                                                                                class="las la-pencil-alt"></i></a>

                                                                                <a href="javascript:void(0);" class="btn btn-xs delete-item" title="Delete Item" data-id="{{ $item->id }}">
                                                                                    <i class="fa fa-remove"></i>
                                                                                </a>

                                                                    </span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ol>
                                    {{-- <div class="form-group mt-4">
                                        <button type="button" class="btn btn-info btn-sm" id="update-order"><i
                                                class="fa fa-save"></i> Update Menu</button>
                                    </div> --}}
                                @else
                                    <p class="text-center">Menu Not Found in Database</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('backend.menu.form')

@endsection

@push('scripts')

    @push('scripts')
        {{-- <script src="{{ asset('backend/summernote/plugins/toastrjs/toastr.min.js') }}"></script> --}}
        <script src="{{ asset('backend/plugins/toastrjs/toastr.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('ol.sortable').nestedSortable({
                    disableNesting: 'no-nest',
                    forcePlaceholderSize: true,
                    handle: 'div',
                    helper: 'clone',
                    items: 'li',
                    maxLevels: 2,
                    opacity: .6,
                    tabSize: 25,
                    tolerance: 'pointer',
                    toleranceElement: '> div',
                    update: function() {
                        var list = $(this).nestedSortable('toHierarchy');
                        $.ajax({
                            url: '{{ route('updateMenuOrder') }}',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                order: list
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.success('Menu order updated successfully.');
                                } else {
                                    toastr.error('Failed to update menu order.');
                                }
                            },
                            error: function() {
                                toastr.error('An error occurred while updating menu order.');
                            }
                        });
                    }
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
                    var url = '{{ route("menu.destroy", ":id") }}';
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
                                    $('#list_' + itemId).remove(); // Remove the item from the DOM
                                    toastr.success('Item deleted successfully.');
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
