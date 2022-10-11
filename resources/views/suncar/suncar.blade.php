@extends('layout.master')
@section('header')
    Data Suncar
@endsection
@section('judul')
    Table Suncar
@endsection
@section('pencarian')
    <form action="{{route('suncar.suncar', $rundownDetail->idRundowns)}}" class="form" method="GET">
        <li class="nav-item dropdown notification_dropdown">
            <div class="input-group search-area">
                <input type="text" class="form-control" name="search" id="search" placeholder="Search here...">
                <span class="input-group-text">
                    <button class="btn" type="submit">
                        <i class="flaticon-381-search-2"></i>
                    </button>
                </span>
            </div>
        </li>
    </form>
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
			<h4 class="text-black">Susunan Acara Terkini</h4>
		</div>
		{{-- @foreach ($data as $g)
        <div class="card-body">
            <div class="media mb-5 align-items-center event-list">
                <div class="p-3 text-center rounded me-3 date-bx bgl-primary">
                    <h2 class="flaticon-381-user-7"></h2>
                </div>
                <div class="media-body px-0">
                    <h6 class="mt-0 mb-3 fs-14"><a class="text-black">{{ $g->namaKegiatan}}</a></h6>
                    <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                        <li>{{ $g->waktuMulai }} - {{ $g->waktuSelesai }}</li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach --}}
</div>

</div>

<!--**********************************
	EventList END
***********************************-->        <!--**********************************
	Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <div class="col-12">
                    <div class="card">
                        <div class="col-md-40 col-sm-12 text-right" style="text-align: right">
                            <div style="text-align: left; padding-left: 50px"><br>
                                <table class="display" style="border: 0px;color: black; font-size: 15pt">
                                    <tr>
                                        <td style="font-weight: bold">Kode Rundown</td>
                                        <td>&nbsp;:</td>
                                        <td>PAL-{{$rundownDetail->idRundowns}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Tahun</td>
                                        <td>&nbsp;:</td>
                                        <td>{{$rundownDetail->tahun}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Nama Acara</td>
                                        <td>&nbsp;:</td>
                                        <td>{{$rundownDetail->namaAcara}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Lokasi</td>
                                        <td>&nbsp;:</td>
                                        <td>{{$rundownDetail->lokasi}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Tanggal Mulai</td>
                                        <td>&nbsp;:</td>
                                        <td>{{date('d F Y', strtotime($rundownDetail->tanggalMulai))}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Tanggal Selesai</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{date('d F Y', strtotime($rundownDetail->tanggalSelesai))}}</td>
                                    </tr>
                                </table>
                            </div>
            </ol>
        </div>

                        {{-- <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <form action="/suncar" method="GET">
                                    <input type="search" id="inputPassword6" name="search" class="form-control"
                                        aria-describedby="passwordHelpInline" placeholder="Search here...">
                                </form>
                            </div>
                        </div> --}}


                    @include('suncar.addsuncar')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-md-40 col-sm-12 text-right" style="text-align: right">
                                    <a href="{{ route('suncar.pdf', $rundownDetail->idRundowns) }}">
                                        <button type="onClick" class="btn btn-primary mb-2">Print All</button>
                                    </a>
                                    {{-- <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModalsuncar">Print All</button> --}}
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModalsuncar">Add Data</button>
                                </div>
                                </div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example3" class="display" style="min-width: 845px">
								<thead>
									<tr>
										<th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kode Rundown </th>
                                        <th>Kegiatan </th>
										<th>Penanggung Jawab</th>
										<th>Waktu Mulai</th>
										<th>Waktu Selesai</th>
										<th>Action</th>
									</tr>
								</thead>
                                <tbody>


<!--**********************************
	Content body end
***********************************-->
                    @foreach($suncar as $s)
                    @if($s->idRundowns == $rundownDetail->idRundowns)
                    <!--start modal edit-->
                    <div class="modal fade" id="editModalsuncar{{ $s->idSuncar }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <form action="{{ route('suncar.update', $s->idSuncar) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal</label>
                                                    <input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ $s->tanggal }}" placeholder="Masukkan Tanggal">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kode Rundowns</label>
                                                    <input id="idRundowns" type="text" name="idRundowns" value="{{ $s->idRundowns }}" class="form-control" placeholder="Masukkan kode">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Kegiatan</label>
                                                    <input id="namaKegiatan" type="text" name="namaKegiatan" class="form-control" value="{{ $s->namaKegiatan }}" placeholder="Masukkan Nama Kegiatan">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>PJ</label>
                                                    <input id="pj" type="text" name="pj" class="form-control" value="{{ $s->pj }}" placeholder="Masukkan pj">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-group-default">
                                                    <label>Waktu Mulai</label>
                                                    <input id="waktuMulai" type="time" name="waktuMulai" class="form-control" value="{{ $s->waktuMulai }}" placeholder="Masukkan Waktu Mulai">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-group-default">
                                                    <label>Waktu Selesai</label>
                                                    <input id="waktuSelesai" type="time" name="waktuSelesai" class="form-control" value="{{ $s->waktuSelesai }}" placeholder="Masukkan Waktu Selesai">
                                                </div>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="submit" id="addModal" class="btn btn-primary">Save</button>
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Modal Edit-->

                   <!-- Modal Detail Data -->
                    <div class="modal fade" id="detailModalsuncar{{ $s->idSuncar }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                    {{ $s->tanggal }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kode Rundowns</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            PAL-{{ $s->idRundowns }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Kegiatan</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            {{ $s->namaKegiatan }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>PJ</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            {{ $s->pj }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Waktu Mulai</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            {{ $s->waktuMulai }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Waktu Selesai</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            {{ $s->waktuSelesai }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
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
                        <td class="text-center">{{date('d-m-Y', strtotime($s->tanggal))}}</td>
                        <td class="text-center">PAL-{{ $s->idRundowns}}</td>
                        <td class="text-center">{{ $s->namaKegiatan}}</td>
                        <td class="text-center">{{ $s->pj}}</td>
                        <td class="text-center">{{ $s->waktuMulai}}</td>
                        <td class="text-center">{{ $s->waktuSelesai}}</td>
                        <td class="text-center">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModalsuncar{{ $s->idSuncar }}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModalsuncar{{ $s->idSuncar }}"><i class="fa fa-edit"></i></button>
                            <form action="{{ route('suncar.destroy', $s->idSuncar) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apa anda yakin menghapus data tersebut?')"><i class="fa fa-trash"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
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
</div>
</div>
</div>
</div>
</div>
</div>
 @endsection
