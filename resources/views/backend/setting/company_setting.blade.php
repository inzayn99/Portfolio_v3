@extends('backend.layouts.app')
@push('styles')
@endpush

@section('content')
    <div class="content-wrapper" style="min-height: 946px;">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                @include('backend.setting.side-menu')

                @include('backend.setting.company-profile')

            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.province').change(function() {
                var province_no = $(this).children("option:selected").val();

                function fillSelect(districts) {
                    document.getElementById("district").innerHTML =
                        districts.reduce((tmp, x) =>
                            `${tmp}<option value='${x.id}'>${x.dist_name}</option>`, '');
                }

                function fetchRecords(province_no) {

                    var uri = "{{ route('getdistricts', ':no') }}";
                    uri = uri.replace(':no', province_no);
                    $.ajax({
                        url: uri,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            var districts = response;
                            // console.log(districts);
                            fillSelect(districts);
                        }
                    });
                }
                fetchRecords(province_no);
            })
        });
    </script>
    <script>
        var loadLogo = function() {
            var output = document.getElementById('company_logo_output');
            output.src = document.getElementById('thumbnail').value;
            output.onload = output.src;
        };

        var loadSecondLogo = function() {
            var output = document.getElementById('company_second_logo_output');
            output.src = document.getElementById('thumbnail9').value;
            output.onload = output.src;
        };
        var loadPdfLogo = function() {
            var output = document.getElementById('company_pdf_logo_output');
            output.src = document.getElementById('thumbnail8').value;
            output.onload = output.src;
        };

        var loadFooterLogo = function() {
            var output = document.getElementById('footer_logo_output');
            output.src = document.getElementById('thumbnail1').value;
            output.onload = output.src;
        };
        var loadFavicon = function() {
            var output = document.getElementById('company_favicon_output');
            output.src = document.getElementById('thumbnail11').value
            output.onload = output.src;
        };

        var loadHomeBg = function() {
            var output = document.getElementById('home_bg_output');
            output.src = document.getElementById('thumbnail112').value
            output.onload = output.src;
        };

        var loadOg = function() {
            var output = document.getElementById('current_og');
            output.src = document.getElementById('thumbnail111').value;
            output.onload = output.src;
        };

        var loadimgOne = function() {
            var output = document.getElementById('image_one');
            output.src = document.getElementById('thumbnail95').value;
            output.onload = output.src;
        };

        var loadimgTwo = function() {
            var output = document.getElementById('image_two');
            output.src = document.getElementById('thumbnail96').value;
            output.onload = output.src;
        };
        var loadimgThree = function() {
            var output = document.getElementById('image_three');
            output.src = document.getElementById('thumbnail97').value;
            output.onload = output.src;
        };
    </script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.lfm').filemanager('image');
            // $('.select2').select2();
        });
    </script>
@endpush
