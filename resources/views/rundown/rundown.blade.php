@extends('layout.master')
@section('judul')
Table Rundown
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
			<h4 class="text-black">Upcoming Events</h4>
		</div>
		<div class="card-body">
			<div class="media mb-5 align-items-center event-list">
				<div class="p-3 text-center rounded me-3 date-bx bgl-primary">
					<h2 class="mb-0 text-black">3</h2>
					<h5 class="mb-1 text-black">Wed</h5>
				</div>
				<div class="media-body px-0">
					<h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="events.html">Live Concert Choir Charity Event 2020</a></h6>
					<ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
						<li>Ticket Sold</li>
						<li>561/650</li>
					</ul>
					<div class="progress mb-0" style="height:4px; width:100%;">
						<div class="progress-bar bg-warning progress-animated" style="width:85%; height:8px;" role="progressbar">
							<span class="sr-only">60% Complete</span>
						</div>
					</div>
				</div>
			</div>
			<div class="media mb-5 align-items-center event-list">
				<div class="p-3 text-center rounded me-3 date-bx bgl-primary">
					<h2 class="mb-0 text-black">16</h2>
					<h5 class="mb-1 text-black">Tue</h5>
				</div>
				<div class="media-body px-0">
					<h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="events.html">Beautiful Fireworks Show In The New Year Night</a></h6>
					<ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
						<li>Ticket Sold</li>
						<li>431/650</li>
					</ul>
					<div class="progress mb-0" style="height:4px; width:100%;">
						<div class="progress-bar bg-warning progress-animated" style="width:50%; height:8px;" role="progressbar">
							<span class="sr-only">60% Complete</span>
						</div>
					</div>
				</div>
			</div>
			<div class="media mb-0 align-items-center event-list">
				<div class="p-3 text-center rounded me-3 date-bx bgl-success">
					<h2 class="mb-0 text-black">28</h2>
					<h5 class="mb-1 text-black">Fri</h5>
				</div>
				<div class="media-body px-0">
					<h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="events.html">The Story Of Danau Toba (Musical Drama)</a></h6>
					<ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
						<li>Ticket Sold</li>
						<li>650/650</li>
					</ul>
					<div class="progress mb-0" style="height:4px; width:100%;">
						<div class="progress-bar bg-success progress-animated" style="width:100%; height:8px;" role="progressbar">
							<span class="sr-only">60% Complete</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer justify-content-between border-0 d-flex fs-14">
			<span>5 events more</span>
			<a href="javascript:void(0);" class="text-primary">View more <i class="las la-long-arrow-alt-right scale5 ms-2"></i></a>
		</div>
	</div>
	<div class="card shadow-none rounded-0 bg-transparent h-auto mb-0">
		<div class="card-body text-center event-calender">
			<a href="javascript:void(0);" class="btn btn-primary btn-rounded btn shadow">
				+ New Event
			</a>
		</div>
	</div>
</div>

<!--**********************************
	EventList END
***********************************-->        <!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">
			<ol class="breadcrumb">
			</ol>
		</div>
			<div class="col-12">
				<div class="card">

                    <div class="col-md-40 col-sm-12 text-right" style="text-align: right">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModalrundown">Add Data</button>
                    </div>
                    @include('rundown.addrundown')
					<div class="card-body">
						<div class="table-responsive">
							<table id="example3" class="display" style="min-width: 845px">
								<thead>
									<tr>
										<th>No</th>
                                        <th>Kode Rundown</th>
                                        <th>Tahun</th>
										<th>Nama Acara </th>
										<th>Lokasi</th>
										<th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Suncar</th>
										<th>Action</th>
									</tr>
								</thead>
                                <tbody>


<!--**********************************
	Content body end
***********************************-->
                    @foreach($rundown as $r)
                    <!--start modal edit-->
                    <div class="modal fade" id="editModalrundown{{ $r->idRundowns }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                            Edit Data
                                        </span>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Edit Data ID {{ $loop->iteration }}</p>
                                    <form action="{{ route('rundown.update', $r->idRundowns) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kode Rundown</label>
                                                    <input id="idRundowns" type="text" name="idRundowns" value="{{ $r->idRundowns }}" class="form-control" placeholder="Masukkan Kode" placeholder readonly="">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tahun</label>
                                                    <input id="tahun" type="text" name="tahun" value="{{ $r->tahun }}" class="form-control" placeholder="Masukkan Tahun">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Acara</label>
                                                    <input id="namaAcara" type="text" name="namaAcara" value="{{ $r->namaAcara }}" class="form-control" placeholder="Masukkan Nama Acara">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Lokasi</label>
                                                    <input id="lokasi" type="text" name="lokasi" value="{{ $r->lokasi }}" class="form-control" placeholder="Masukkan Lokasi">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal Mulai</label>
                                                    <input id="tanggalMulai" type="date" name="tanggalMulai" value="{{ $r->tanggalMulai }}" class="form-control" placeholder="Masukkan Tanggal Mulai">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal Selesai</label>
                                                    <input id="tanggalSelesai" type="date" name="tanggalSelesai" value="{{ $r->tanggalSelesai }}" class="form-control" placeholder="Masukkan Tanggal Selesai">
                                                </div>
                                            </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" id="addModalrundown" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Modal Edit-->

<!-- Modal Detail Data -->
<div class="modal fade" id="detailModalrundown{{ $r->idRundowns }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Details Data
                    </span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                <p class="small">Detail Data ID {{ $loop->iteration }}</p>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Kode Rundowns</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    PAL : {{ $r->idRundowns }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Tahun</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    {{ $r->tahun }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Nama Acara</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    {{ $r->namaAcara }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Lokasi</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    {{ $r->lokasi }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Tanggal Mulai</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    {{ $r->tanggalMulai }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Tanggal Selesai</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    {{ $r->tanggalSelesai }}
                                </div>
                            </div>
                        </div>
                    </div>

                {{-- </div> --}}
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Modal Detail-->
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">ID : PAL-{{ $r->idRundowns }}</td>
                        <td class="text-center">{{ $r->tahun }}</td>
                        <td class="text-center">{{ $r->namaAcara}}</td>
                        <td class="text-center">{{ $r->lokasi}}</td>
                        <td class="text-center">{{ $r->tanggalMulai}}</td>
                        <td class="text-center">{{ $r->tanggalSelesai}}</td>
                        <td class="text-center"><a type="button" class="btn btn-info light" href="{{ route('suncar.suncar', $r->idRundowns) }}">Detail</a></td>
                        <td class="text-center">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModalrundown{{ $r->idRundowns }}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModalrundown{{ $r->idRundowns }}"><i class="fa fa-edit"></i></button>
                            <form action="{{ route('rundown.destroy', $r->idRundowns) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apa anda yakin menghapus data tersebut?')"><i class="fa fa-trash"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
 @endsection
