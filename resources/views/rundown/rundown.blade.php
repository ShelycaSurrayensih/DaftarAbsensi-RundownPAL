@extends('layout.master')
@section('header')
    Data Rundowns
@endsection
@section('judul')
    Table Rundown
@endsection
@section('pencarian')
    <form action="{{ route('rundown.rundown') }}" class="form" method="GET">
        <li class="nav-item dropdown notification_dropdown">
            <div class="input-group search-area">
                <input type="text" class="form-control" name="search" id="search" placeholder="Search here..."
                    value="{{ request('search') }}">
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
    </div>

    <!--**********************************
         EventList END
        ***********************************-->
    <!--**********************************
         Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            {{-- <div class="row page-titles mx-0"> --}}

            {{-- </div> --}}
            {{-- row --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-40 col-sm-12 text-left" style="text-align: left">
                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModalrundown">
                                    Add Data
                                </button>
                            </div>
                            @include('rundown.addrundown')
                            {{-- <h4 class="card-title">Table Rundown</h4> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Qr-Code</th>
                                            <th>Kode Rundown</th>
                                            <th>Tahun</th>
                                            <th>Nama Acara </th>
                                            <th>Lokasi</th>
                                            <th>Tanggal </th>
                                            <th>Suncar</th>
                                            <th>Data Absensi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                                                        <input id="tanggalMulai" type="date" name="tanggalMulai"
                                                                            value="{{ $r->tanggalMulai }}" class="form-control"
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
                                            <!--Start Modal Detail-->
                                            <div class="modal fade" id="detailModalrundown{{ $r->idRundowns }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header no-bd">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold">Details Data</span>
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="small">Detail Data {{ $loop->iteration }}</p>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Kode Rundowns</label>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                PAL-{{$r->idRundowns}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Tahun</label>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                PAL-{{$r->tahun}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Nama Acara</label>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                PAL-{{$r->namaAcara}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Lokasi</label>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                PAL-{{$r->lokasi}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Tanggal Mulai</label>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                PAL-{{$r->tanggalMulai}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Tanggal Selesai</label>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                PAL-{{$r->tanggalSelesai}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer no-bd">
                                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Modal Detail-->
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#qrCode{{ $r->idRundowns }}">
                                                        Lihat Qr
                                                    </button>
                                                    <div class="modal fade" id="qrCode{{ $r->idRundowns }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold">
                                                                        Qr Code Acara {{$r->namaAcara}}
                                                                    </h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(url('absensi/'.$r->idRundowns))) !!} ">
                                                                    <br><br>
                                                                    <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(500)->generate(url('absensi/'.$r->idRundowns))) !!}" download="Qr Code Acara {{$r->namaAcara}}">
                                                                        Download Qr Code
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>PAL-{{ $r->idRundowns }}</td>
                                                <td>{{ $r->tahun }}</td>
                                                <td>{{ $r->namaAcara }}</td>
                                                <td>{{ $r->lokasi }}</td>
                                                <td>
                                                    @if ($r->tanggalMulai == $r->tanggalSelesai)
                                                        {{ date('d/m/Y', strtotime($r->tanggalMulai)) }}
                                                    @else
                                                        {{ date('d/m/Y', strtotime($r->tanggalMulai)) }} -
                                                        {{ date('d/m/Y', strtotime($r->tanggalSelesai)) }}
                                                    @endif
                                                </td>
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
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> --}}
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
@endsection
