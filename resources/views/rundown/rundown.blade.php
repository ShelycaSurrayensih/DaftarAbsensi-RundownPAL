@extends('layout.master')
@section('header')
    Data Rundowns
@endsection
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
                <h4 class="text-black">Acara Terkini</h4>
            </div>
            {{-- @foreach ($data as $g)
                <div class="card-body">
                    <div class="media mb-5 align-items-center event-list">
                        <div class="p-3 text-center rounded me-3 date-bx bgl-primary">
                            <h2 class="flaticon-381-user-7"></h2>
                        </div>
                        <div class="media-body px-0">
                            <h6 class="mt-0 mb-3 fs-14"><a class="text-black">{{ $g->namaAcara }}</a></h6>
                            <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                <li>{{ date('d/m/Y', strtotime($g->tanggalMulai)) }} -
                                    {{ date('d/m/Y', strtotime($g->tanggalSelesai)) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach --}}
        </div>

    </div>

    <!--**********************************
     EventList END
    ***********************************-->
    <!--**********************************
     Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <ol class="breadcrumb">
            </ol>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <form action="/rundown" method="GET">
                            <input type="search" id="inputPassword6" name="search" class="form-control"
                                aria-describedby="passwordHelpInline" placeholder="Search here...">
                        </form>
                    </div>
                </div>
                <div class="col-md-40 col-sm-12 text-right" style="text-align: right">
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                        data-bs-target="#addModalrundown">Add Data</button>
                </div>
                @include('rundown.addrundown')
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Qr-Code</th>
                                    <th>Kode Rundown</th>
                                    <th>Tahun</th>
                                    <th>Nama Acara </th>
                                    <th>Lokasi</th>
                                    <th>Tanggal </th>
                                    {{-- <th>Tanggal Selesai</th> --}}
                                    <th>Suncar</th>
                                    <th>Data Absensi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <!--**********************************
     Content body end
    ***********************************-->
                                @foreach ($rundown as $r)
                                    <!--start modal edit-->
                                    <div class="modal fade" id="editModalrundown{{ $r->idRundowns }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
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
                                                                    <input id="idRundowns" type="text" name="idRundowns"
                                                                        value="{{ $r->idRundowns }}" class="form-control"
                                                                        placeholder="Masukkan Kode" placeholder
                                                                        readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Tahun</label>
                                                                <input id="tahun" type="text" name="tahun"
                                                                    value="{{ $r->tahun }}" class="form-control"
                                                                    placeholder="Masukkan Tahun">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Acara</label>
                                                                <input id="namaAcara" type="text" name="namaAcara"
                                                                    value="{{ $r->namaAcara }}" class="form-control"
                                                                    placeholder="Masukkan Nama Acara">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Lokasi</label>
                                                                <input id="lokasi" type="text" name="lokasi"
                                                                    value="{{ $r->lokasi }}" class="form-control"
                                                                    placeholder="Masukkan Lokasi">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-group-default">
                                                                <label>Tanggal Mulai</label>
                                                                <input id="tanggalMulai" type="date"
                                                                    name="tanggalMulai" value="{{ $r->tanggalMulai }}"
                                                                    class="form-control"
                                                                    placeholder="Masukkan Tanggal Mulai">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>Tanggal Selesai</label>
                                                                <input id="tanggalSelesai" type="date"
                                                                    name="tanggalSelesai"
                                                                    value="{{ $r->tanggalSelesai }}" class="form-control"
                                                                    placeholder="Masukkan Tanggal Selesai">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <button type="submit" id="addModal"
                                                                class="btn btn-primary">Save</button>
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal Edit-->

                                    <!-- Modal Detail Data -->
                                    <div class="modal fade" id="detailModalrundown{{ $r->idRundowns }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
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
                                                                        PAL-{{ $r->idRundowns }}
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
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Modal Detail-->
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{!! QrCode::size(50)->generate(url('absensi/' . $r->idRundowns)) !!}</td>
                                            <td class="text-center">PAL-{{ $r->idRundowns }}</td>
                                            <td class="text-center">{{ $r->tahun }}</td>
                                            <td class="text-center">{{ $r->namaAcara }}</td>
                                            <td class="text-center">{{ $r->lokasi }}</td>
                                            <td class="text-center">{{ date('d/m/Y', strtotime($r->tanggalMulai)) }} -
                                                {{ date('d/m/Y', strtotime($r->tanggalSelesai)) }}</td>
                                            {{-- <td class="text-center">{{ date('d-m-Y', strtotime($r->tanggalSelesai))}}</td> --}}
                                            <td class="text-center"><a type="button" class="btn btn-info light"
                                                    href="{{ route('suncar.suncar', $r->idRundowns) }}">Detail</a></td>
                                            <td class="text-center"><a type="button" class="btn btn-info light"
                                                    href="{{ route('absensi.absensi', $r->idRundowns) }}">Detail</a></td>
                                            <td class="text-center">
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editModalrundown{{ $r->idRundowns }}"><i
                                                        class="fa fa-edit"></i></button>
                                                <button class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#detailModalrundown{{ $r->idRundowns }}"><i
                                                        class="fa fa-edit"></i></button>
                                                <form action="{{ route('rundown.destroy', $r->idRundowns) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apa anda yakin menghapus data tersebut?')"><i
                                                            class="fa fa-trash"></i></a>
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
