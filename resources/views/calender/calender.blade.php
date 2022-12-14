@extends('layout.master')
@section('judul')
    Calender
@endsection
@section('content')
    <div class="event-sidebar dz-scroll " id="eventSidebar">
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

    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Calendar</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-xl-3 col-xxl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-warning" role="alert">
                                <h4>Form Kegiatan</h4>
                            </div>

                            <div class="card">
                                <form action="{{route('calender.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="form-label">Nama Kegiatan</div>
                                            <input type="text" id="name" name="name" class="form-control" cols = "30" rows = "2">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label">Lokasi Kegiatan</div>
                                            <input type="text" id="name" name="name" class="form-control" cols = "30" rows = "2">
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="form-label">Tanggal Kegiatan</div>
                                            <input type="datetime-local" class="form-control" name="tanggal" id="tanggal">
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="form-label">Waktu Mulai</div>
                                            <input type="time" class="form-control" name="waktuMulai" id="waktuMulai">
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="form-label">Waktu Selesai</div>
                                            <input type="time" class="form-control" name="waktuSelesai" id="waktuSelesai">
                                        </div>
                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar" class="app-fullcalendar"></div>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            events: [],
                            selectOverlap: function(event) {
                                return event.rendering === 'background';
                            }
                        });

                        calendar.render();
                    });
                </script>
                <!-- BEGIN MODAL -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add New Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                                    event</button>

                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                                    data-bs-toggle="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add a category</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label form-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name"
                                                type="text" name="category-name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label form-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..."
                                                name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category"
                                    data-bs-toggle="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
