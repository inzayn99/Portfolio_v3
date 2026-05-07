<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dashboard | {{ $setting->company_name }}</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ $setting->company_favicon }}" />
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#5190fd" />
    <link href="{{ $setting->company_favicon }}" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('backend/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/style-main.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/themes/default/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/themes/default/ss-main.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/flat/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/colorpicker/bootstrap-colorpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/custom_style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datepicker/css/bootstrap-datetimepicker.css') }}">
    <!--file dropify-->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/dropify.min.css') }}">
    <!--file nprogress-->
    <link href="{{ asset('backend/dist/css/nprogress.css') }}" rel="stylesheet">
    <!--print table-->
    <link href="{{ asset('backend/dist/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/datatables/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <!--print table mobile support-->
    <link href="{{ asset('backend/dist/datatables/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/datatables/css/rowReorder.dataTables.min.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/custom/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/colorpicker/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('backend/datepicker/date.js') }}"></script>
    <script src="{{ asset('backend/dist/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/js/school-custom.js') }}"></script>
    <link href="{{ asset('backend/toast-alert/toastr.css') }}" rel="stylesheet" />

    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('backend/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/dist/css/bootstrap-select.min.css') }}">
    <!-----------------------------internal-link------------------------->
    <link rel="stylesheet" href="{{ asset('backend/line-awesome/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/summernote/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Styles -->
    <style>
        .cke_notification_warning {
            display: none;
        }
    </style>
    @stack('styles')
</head>
<script type="text/javascript">
    var baseurl = "https://demo.smart-hospital.in/";
    var chk_validate = "T7QFYN-T75CSD-GHD6EY-dHVybmIrbldVN0hLdlJiQ010WEYzdDI2bUF4NEFDSlk5VURtcFVoNjF5VT0=";
</script>

<body class="hold-transition skin-blue fixed sidebar-mini">

    <script type="text/javascript">
        function collapseSidebar() {
            if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                sessionStorage.setItem('sidebar-toggle-collapsed', '');
            } else {
                sessionStorage.setItem('sidebar-toggle-collapsed', '1');
            }
        }

        function checksidebar() {
            if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                var body = document.getElementsByTagName('body')[0];
                body.className = body.className + ' sidebar-collapse';
            }
        }
        checksidebar();

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    </script>
    <div class="wrapper">
        @include('backend.includes.header')
        @include('backend.includes.sidebar')
        @yield('content')
        @include('backend.includes.footer')
    </div>

    <script type="text/javascript">
        function collapseSidebar() {
            if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                sessionStorage.setItem('sidebar-toggle-collapsed', '');
            } else {
                sessionStorage.setItem('sidebar-toggle-collapsed', '1');
            }
        }

        function checksidebar() {
            if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                var body = document.getElementsByTagName('body')[0];
                body.className = body.className + ' sidebar-collapse';
            }
        }
        checksidebar();

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    </script>
    <script src="{{ asset('backend/js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/utils.js') }}"></script>
    <script type="text/javascript">
        window.onload = function() {
            var dataPointss = [];
            var yearly_collection_array = [15089, 16397.15, 20113, 13644, 17739.55, 32983.4, 25941.9, 25250.2,
                "0.00", "0.00", "0.00", "0.00"
            ];
            var yearly_expense_array = [197990, 245290, 244890, 200850, 183450, 250670, 220400, 225800, 0, 0, 0,
                0
            ];
            var MONTHS = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            console.log(yearly_collection_array);
            console.log(yearly_expense_array);

            var config = {
                type: 'line',
                data: {
                    labels: MONTHS,
                    datasets: [

                        {
                            label: 'Courses',
                            fill: false,
                            backgroundColor: '#66aa18',
                            borderColor: '#66aa18',
                            data: yearly_collection_array,
                        },

                        {
                            label: 'University',
                            backgroundColor: window.chartColors.red,
                            borderColor: window.chartColors.red,
                            data: yearly_expense_array,
                            fill: false,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Chart Data'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: 'Value'
                            },

                        }]
                    }
                }
            };
            var ctx = document.getElementById('lineChart').getContext('2d');
            window.myLine = new Chart(ctx, config);


            /* Pie chart */
            var ph = "pharmacy";
            var dataPointss = [];
            var color = ['#f56954', '#00a65a', '#f39c12', '#2f4074', '#00c0ef', '#3c8dbc', '#d2d6de',
                '#b7b83f'
            ];
            var datas = {
                "value": [46, 13, 9, 6, 7, 7, 6, 6],
                "label": ["Service", "Course", "University", "Scholarship", "Inquiry", "Payment", "Event",
                    "Testimonial"
                ]
            };

            function addData(datap) {
                for (var i = 0; i < datap.value.length; i++) {
                    lb = datap.label[i];


                    dataPointss.push({
                        label: lb,
                        value: datap.value[i],
                        color: color[i],
                        highlight: color[i]
                    });
                }
            }
            addData(datas);
            /* donut chart */
            var config2 = {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: datas.value,
                        backgroundColor: [
                            '#715d20',
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green,
                            window.chartColors.purple,
                            window.chartColors.blue,
                            window.chartColors.grey,
                            '#42b782',
                            '#66aa18',
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: datas.label,
                },
                options: {
                    responsive: true,
                    circumference: Math.PI,
                    rotation: -Math.PI,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: false,
                        text: 'Chart.js Doughnut Chart'
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            };
            var ctx2 = document.getElementById('pieChart').getContext('2d');
            window.myDoughnut = new Chart(ctx2, config2);

        }

        $(document).ready(function() {
            $(document).on('click', '.close_notice', function() {
                var data = $(this).data();
                $.ajax({
                    type: "POST",
                    url: base_url + "admin/notification/read",
                    data: {
                        'notice': data.noticeid
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status == "fail") {

                            errorMsg(data.msg);
                        } else {
                            successMsg(data.msg);
                        }

                    }
                });
            });
        });
    </script>
    <script src="{{ asset('backend/dist/js/moment.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('backend/toast-alert/toastr.js') }}"></script>
    <script src="{{ asset('backend/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('backend/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('backend/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!--language js-->
    <script type="text/javascript" src="{{ asset('backend/dist/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('.languageselectpicker').selectpicker();
        });
    </script>
    <script src="{{ asset('backend/js/jquery.scrolling-tabs.js') }}"></script>
    <script>
        $('.navlistscroll').scrollingTabs();
    </script>
    <script type="text/javascript">
        $("#myModalpa").on('hidden.bs.modal', function(e) {
            console.log("sdfsdfsf");
            $(".filestyle").next(".dropify-clear").trigger("click");

            $('form#formaddpa').find('input:text, input:password, input:file, textarea').val('');
            $('form#formaddpa').find('select option:selected').removeAttr('selected');
            $('form#formaddpa').find('input:checkbox, input:radio').removeAttr('checked');
        });
        $(document).ready(function() {
            $(".studentsidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('.studentsideclose, .overlay').on('click', function() {
                $('.studentsidebar').removeClass('active');
                $('.overlay').fadeOut();
            });

            $('#sidebarCollapse').on('click', function() {
                $('.studentsidebar').addClass('active');
                $('.overlay').fadeIn();
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    <script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('backend/dist/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/datepicker/js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('backend/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/app.min.js') }}"></script>
    <!--nprogress-->
    <script src="{{ asset('backend/dist/js/nprogress.js') }}"></script>
    <!--file dropify-->
    <script src="{{ asset('backend/dist/js/dropify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/buttons.print.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/datatables/js/ss.custom.js') }}"></script>
    <script src="{{ asset('backend/dist/datatables/js/datetime-moment.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('backend/fullcalendar/dist/locale-all.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".dt-body-right a").tooltip();
        });
    </script>
    <!-- Summernote -->
    <script src="{{ asset('backend/summernote/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/ckeditor4/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '/filemanager?type=image',
            filebrowserUploadUrl: '/filemanager/upload?type=image&_token={{ csrf_token() }}'
        });
    </script>
    @stack('scripts')
</body>

</html>
