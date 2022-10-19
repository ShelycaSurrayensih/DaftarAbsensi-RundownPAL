@extends('layout.master')
@section('header')
    Dashboard
@endsection
@section('judul')
    Dashboard
@endsection
@section('calender')
    <li class="dropdown schedule-event-inner primary">
        <a href="javascript:void(0)" class="btn btn-primary btn-rounded event-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale5 me-0 mb-0 me-sm-2 mb-sm-1"><path d="M19 4H5C3.89543 4 3 4.89543 3 6V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V6C21 4.89543 20.1046 4 19 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 2V6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 2V6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 10H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span class="d-none d-xl-inline-block">Kalender</span> <span class="d-none d-lg-inline-block"> & Tamu Terkini</span>
            <i class="fa fa-caret-right scale3 ms-2 d-none d-sm-inline-block"></i>
        </a>
    </li>
@endsection
@section('content')
    <div class="event-sidebar dz-scroll active" id="eventSidebar">
        <div class="card shadow-none rounded-0 bg-transparent h-auto mb-0">
            <div class="card-body text-center event-calender pb-2">
                <input type='text' class="form-control d-none" id='datetimepicker1' />
            </div>
        </div>
        <div class="card shadow-none rounded-0 bg-transparent h-auto">
            <div class="card-header border-0 pb-0">
                <h4 class="text-black">Tamu Terkini</h4>
            </div>
            @foreach ($data as $g)
                <div class="card-body">
                    <div class="media mb-5 align-items-center event-list">
                        <div class="p-3 text-center rounded me-3 date-bx bgl-primary">
                            <h2 class="flaticon-381-user-7"></h2>
                        </div>
                        <div class="media-body px-0">
                            <h6 class="mt-0 mb-3 fs-14"><a class="text-black">{{ $g->nama }}</a></h6>
                            <h6 class="mt-0 mb-3 fs-14"><a class="text-black">{{ $g->jabatan }}</a></h6>
                            <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                <li>{{ $g->created_at }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <!--**********************************  EventList END ***********************************-->
    <!--**********************************  Content body start ***********************************-->
    <div class="content-body rightside-event">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-sm-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="me-4">
                                    <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body ms-1">
                                    <p class="mb-2">Acara Hari Ini</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $current_date->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="me-2">
                                    <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body ms-1">
                                    <p class="mb-2">Acara Minggu Ini</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $current_week->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="me-2">
                                    <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body ms-1">
                                    <p class="mb-2">Acara Bulan Ini</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $current_month->count() }} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0 d-sm-flex d-block">
                            <div>
                                <h4 class="card-title mb-1">
                                    Chart Acara Per Bulan
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="user" role="tabpanel"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
								    <canvas id="barChart_1" ></canvas>
							    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!--End Chart-->
            <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
            <script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

            <script src="{{ asset('/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('/assets/js/plugins-init/datatables.init.js') }}"></script>

            <script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/peity/jquery.peity.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>
            <script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>
            <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script>

            <script src="{{ asset('assets/vendor/moment/moment.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
            <script src="{{ asset('assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/jquery-asColor/jquery-asColor.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/jquery-asGradient/jquery-asGradient.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
            <script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
            <script src="{{ asset('assets/vendor/pickadate/picker.time.js') }}"></script>
            <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>
            <script src="{{ asset('assets/js/plugins-init/bs-daterange-picker-init.js') }}"></script>
            <script src="{{ asset('assets/js/plugins-init/clock-picker-init.js') }}"></script>
            <script src="{{ asset('assets/js/plugins-init/jquery-asColorPicker.init.js') }}"></script>
            <script src="{{ asset('assets/js/plugins-init/material-date-picker-init.js') }}"></script>
            <script src="{{ asset('assets/js/plugins-init/pickadate-init.js') }}"></script>


            <script src="{{ asset('assets/js/custom.js') }}"></script>
            <script src="{{ asset('assets/js/deznav-init.js') }}"></script>
            <script src="{{ asset('assets/js/demo.js') }}"></script>
            <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>

            <script type="text/javascript">
                (function($) {
                    var labels = {{ Js::from($labels) }};
                    var guests = {{ Js::from($datacharts) }};
                    var dzSparkLine = function() {
                        let draw = Chart.controllers.line.__super__.draw; //draw shadow
                        var screenWidth = $(window).width();
                        var barChart1 = function() {
                            if (jQuery('#barChart_1').length > 0) {
                                const barChart_1 = document.getElementById("barChart_1").getContext('2d');
                                barChart_1.height = 100;
                                new Chart(barChart_1, {
                                    type: 'bar',
                                    data: {
                                        defaultFontFamily: 'Poppins',
                                        labels: @json($labels),
                                        datasets: [{
                                            label: "My First dataset",
                                            data: @json($datacharts),
                                            borderColor: 'rgba(34, 47, 185, 1)',
                                            borderWidth: "0",
                                            backgroundColor: 'rgba(34, 47, 185, 1)'
                                        }]
                                    },
                                    options: {
                                        legend: false,
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    stepSize: 10,
                                                    max: 100,
                                                    min: 0
                                                }
                                            }],
                                            xAxes: [{
                                                // Change here
                                                barPercentage: 1
                                            }]
                                        }
                                    }
                                });
                            }
                        }
                        return {
                            init: function() {},
                            load: function() {
                                barChart1();
                            },
                            resize: function() {
                                barChart1();
                            }
                        }
                    }();
                    jQuery(document).ready(function() {});
                    jQuery(window).on('load', function() {
                        dzSparkLine.load();
                    });
                    jQuery(window).on('resize', function() {
                        dzSparkLine.resize();
                        setTimeout(function() {
                            dzSparkLine.resize();
                        }, 1000);
                    });
                })(jQuery);
            </script>

    </html>
@endsection
