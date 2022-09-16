@extends('layout.master')
@section('judul')
    Dashboard
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
        <!-- row -->
        < <!--Total Visitor-->
            <div class="row">
                <div class="col-xl-4 col-sm-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="me-4">
                                    <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body ms-1">
                                    <p class="mb-2">Tamu Hari Ini</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $current_date->count() }} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="me-4">
                                    <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body ms-1">
                                    <p class="mb-2">Tamu Minggu Ini</p>
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
                                <span class="me-4">
                                    <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body ms-1">
                                    <p class="mb-2">Tamu Bulan Ini</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $current_month->count() }} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Total Visitor-->

                <div class="col-xl-12">
                    <div id="user-activity" class="card">
                        <div class="card-header border-0 pb-0 d-sm-flex d-block">
                            <div>
                                <h4 class="card-title mb-1">Sales Revenue</h4>
                            </div>
                            <div class="card-action card-tabs mt-3 mt-sm-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#user" role="tab"
                                            aria-selected="true">
                                            Monthly
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#bounce" role="tab"
                                            aria-selected="false">
                                            Weekly
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#session-duration" role="tab"
                                            aria-selected="false">
                                            Today
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="user" role="tabpanel">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="activityLine" class="chartjs chartjs-render-monitor" height="350"
                                        style="display: block; width: 1041px; height: 350px;" width="1041"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxxl-12 col-lg-6">
                    <div class="card">
                        <div class="card-header border-0 pb-3 d-sm-flex d-block ">
                            <h4 class="card-title">Latest Sales</h4>
                            <div class="d-flex mt-3 mt-sm-0">
                                <select class="default-select me-3 style-1" aria-label="Default select example">
                                    <option selected>Weekly</option>
                                    <option value="1">Daily</option>
                                    <option value="2">Monthly</option>
                                </select>
                                <select class="default-select style-1" aria-label="Default select example">
                                    <option selected>2022</option>
                                    <option value="1">2023</option>
                                    <option value="2">2024</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mx-0 align-items-center">
                                <div class="col-sm-8 col-md-7 col-xxl-7 px-0 text-center mb-3 mb-sm-0">
                                    <div id="chart" class="d-inline-block"></div>
                                </div>
                                <div class="col-sm-4 col-md-5 col-xxl-5 px-0">
                                    <div class="chart-deta">
                                        <div class="col px-0">
                                            <span class="bg-warning"></span>
                                            <div class="mx-3">
                                                <p class="fs-14">Ticket Left</p>
                                                <h3>21,512</h3>
                                            </div>
                                        </div>
                                        <div class="col px-0">
                                            <span class="bg-primary"></span>
                                            <div class="mx-3">
                                                <p class="fs-14">Ticket Sold</p>
                                                <h3>456,72</h3>
                                            </div>
                                        </div>
                                        <div class="col px-0">
                                            <span class="bg-success"></span>
                                            <div class="mx-3">
                                                <p class="fs-14">Event Held</p>
                                                <h3>235</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxxl-12 col-lg-6">
                    <div class="card widget-media">
                        <div class="card-header border-0 pb-0 ">
                            <h4 class="text-black">Latest Sales</h4>
                            <div class="dropdown ms-auto text-end">
                                <div class="btn-link" data-bs-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="12" cy="5" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="12" cy="19" r="2">
                                            </circle>
                                        </g>
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="javascript:void(0);">View Detail</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body timeline pb-2">
                            <div class="timeline-panel align-items-end">
                                <div class="media me-3">
                                    <img class="rounded-circle" alt="image" width="50"
                                        src="{{ asset('assets/images/avatar/1.jpg') }}">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1"><a class="text-black" href="javascript:void(0);">Olivia
                                            Johnson</a></h5>
                                    <p class="d-block mb-0 text-primary"><i
                                            class="las la-ticket-alt me-2 scale5 ms-1"></i>Height Performance conert 2020
                                    </p>
                                </div>
                                <p class="mb-0 fs-14">2m ago</p>
                            </div>
                            <div class="timeline-panel align-items-end">
                                <div class="media me-3">
                                    <img class="rounded-circle" alt="image" width="50"
                                        src="{{ asset('assets/images/avatar/2.jpg') }}">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1"><a class="text-black" href="javascript:void(0);">Griezerman</a>
                                    </h5>
                                    <p class="d-block mb-0 text-primary"><i
                                            class="las la-ticket-alt me-2 scale5 ms-1"></i>Fireworks Show New Year 2020</p>
                                </div>
                                <p class="mb-0 fs-14">5m ago</p>
                            </div>
                            <div class="timeline-panel align-items-end">
                                <div class="media me-3">
                                    <img class="rounded-circle" alt="image" width="50"
                                        src="{{ asset('assets/images/avatar/3.jpg') }}">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1"><a class="text-black" href="javascript:void(0);">Uli Trumb</a>
                                    </h5>
                                    <p class="d-block mb-0 text-primary"><i
                                            class="las la-ticket-alt me-2 scale5 ms-1"></i>Height Performance conert 2020
                                    </p>
                                </div>
                                <p class="mb-0  fs-14">8m ago</p>
                            </div>
                            <div class="timeline-panel align-items-end">
                                <div class="media me-3">
                                    <img class="rounded-circle" alt="image" width="50"
                                        src="{{ asset('assets/images/avatar/4.jpg') }}">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1"><a class="text-black" href="javascript:void(0);">Oconner</a></h5>
                                    <p class="d-block mb-0 text-primary"><i
                                            class="las la-ticket-alt me-2 scale5 ms-1"></i>Fireworks Show New Year
                                        2020</p>
                                </div>
                                <p class="mb-0 fs-14">12m ago</p>
                            </div>
                        </div>
                        <div class="card-footer border-0 pt-0 text-center">
                            <a href="javascript:void(0);" class="btn-link">View more <i
                                    class="fa fa-angle-down ms-2 scale-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mx-0">
                                <div class="col-sm-12 col-lg-4 px-0">
                                    <h2 class="fs-40 text-black font-w600">862,441 <small
                                            class="fs-18 ms-2 font-w600 mb-1">pcs</small></h2>
                                    <p class="font-w100 fs-20 text-black">Ticket Sold Today</p>
                                    <div class="justify-content-between border-0 d-flex fs-14 align-items-end">
                                        <a href="javascript:void(0);" class="text-primary">View more <i
                                                class="las la-long-arrow-alt-right scale5 ms-2"></i></a>
                                        <div class="text-end">
                                            <span class="peity-primary" data-style="width:100%;">0,2,1,4</span>
                                            <h3 class="mt-2 mb-1">+4%</h3>
                                            <span>than last day</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-8 px-0">
                                    <canvas id="ticketSold" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection
