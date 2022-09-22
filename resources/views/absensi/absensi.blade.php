@extends('layout.master')
@section('judul')
    Table Absensi
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
                            <h6 class="mt-0 mb-3 fs-14"><a class="text-black">{{ $g->jabatan}}</a></h6>
                            <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                <li>{{ $g->created_at }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
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
                <div class="col-md-40 col-sm-12 text-right" style="text-align: right">
                    <div style="text-align: left; padding-left: 50px"><br>
                        <table class="display" style="border: 0px;color: black; font-size: 15pt">
                            <tr>
                                <td>Kode Rundown</td>
                                <td>&nbsp;:</td>
                                <td>PAL-{{ $absensiDetail->idRundowns }}</td>
                            </tr>
                            <tr>
                                <td>Tahun</td>
                                <td>&nbsp;:</td>
                                <td>{{ $absensiDetail->tahun }}</td>
                            </tr>
                            <tr>
                                <td>Nama Acara</td>
                                <td>&nbsp;:</td>
                                <td>{{ $absensiDetail->namaAcara }}</td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td>&nbsp;:</td>
                                <td>{{ $absensiDetail->lokasi }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Mulai</td>
                                <td>&nbsp;:</td>
                                <td>{{ date('d F Y', strtotime($absensiDetail->tanggalMulai)) }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>{{ date('d F Y', strtotime($absensiDetail->tanggalSelesai)) }}</td>
                            </tr>
                        </table>
                    </div>
                    <hr style="height:4px;border-width:4;color:rgb(0, 0, 0);background-color:rgb(0, 0, 0)">
                    <a href="{{ route('absensi.pdf', $absensiDetail->idRundowns) }}">
                        <button type="onClick" class="btn btn-primary mb-2">Print All</button>
                    </a>
                    <a href="{{ route('absensi.signature', $absensiDetail->idRundowns) }}">
                        <button type="button" class="btn btn-primary mb-2">Add Data</button>
                        {{-- <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModalabsensi">Add Data</button> --}}
                    </a>

                </div>
                @include('absensi.addabsensi')
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Instansi</th>
                                    <th>Nomer Hp</th>
                                    <th>Tanda Tangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <!--**********************************
             Content body end
            ***********************************-->
                                @foreach ($absensi as $a)
                                    @if ($a->idRundowns == $absensiDetail->idRundowns)
                                        <!--start modal edit-->
                                        <div class="modal fade" id="editModalabsensi{{ $a->idAbsensi }}" tabindex="-1"
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
                                                        <form action="{{ route('Absensi.update', $a->idAbsensi) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Tanggal</label>
                                                                        <input id="tanggal" type="date" name="tanggal"
                                                                            class="form-control"
                                                                            value="{{ $a->tanggal }}"
                                                                            placeholder="Masukkan Tanggal">
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="col-sm-12">
                                                                    <input id="idRundowns" type="text" name="idRundowns" class="form-control" value="{{$a->idRundowns}}" hidden>
                                                                    <div class="form-group form-group-default">
                                                                        <label>Acara</label>
                                                                        <input id="" type="text" name="" class="form-control" value="{{$a->namaAcara}}" readonly>
                                                                    </div>
                                                                </div> --}}
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Nama</label>
                                                                        <input id="nama" type="text" name="nama"
                                                                            value="{{ $a->nama }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Nama">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Jabatan</label>
                                                                        <input id="jabatan" type="text" name="jabatan"
                                                                            value="{{ $a->jabatan }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Jabatan">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Instansi</label>
                                                                        <input id="instansi" type="text" name="instansi"
                                                                            value="{{ $a->instansi }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Instansi">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>No Hp</label>
                                                                        <input id="telp" type="text"
                                                                            name="telp" value="{{ $a->telp }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan No Hp">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Tanda Tangan</label>
                                                                        <input type="file" name="tandatangan"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Tanda Tangan">
                                                                    </div>
                                                                    <img src="{{ asset('storage/' . $a->tandatangan) }}"
                                                                        width="100px">
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
                                        <div class="modal fade" id="detailModalabsensi{{ $a->idAbsensi }}"
                                            tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                    <label>Tanggal</label>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            {{date('d-m-Y', strtotime($a->tanggal))}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Acara</label>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            {{ $a->idRundowns }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Nama</label>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            {{ $a->nama }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Jabatan</label>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            {{ $a->jabatan }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Instansi</label>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            {{ $a->instansi }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>No Hp</label>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            {{ $a->telp }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Tanda Tangan</label>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            {{ $a->tandatangan }} <br>
                                                                            <img src="{{ asset('storage/' . $a->tandatangan) }}"
                                                                                width="400px"></td>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                            {{-- <td class="text-center">{{ $a->idRundowns }}</td> --}}
                                            <td class="text-center">{{date('d-m-Y', strtotime($a->tanggal))}}</td>
                                            <td class="text-center">{{ $a->nama }}</td>
                                            <td class="text-center">{{ $a->jabatan }}</td>
                                            <td class="text-center">{{ $a->instansi }}</td>
                                            <td class="text-center">{{ $a->telp }}</td>
                                            <td class="text-center"><img src="{{ asset('storage/' . $a->tandatangan) }}"
                                                    width="100px"></td>
                                            <td class="text-center">
                                                {{-- <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editModalabsensi{{ $a->idAbsensi }}"><i
                                                        class="fa fa-edit"></i></button> --}}
                                                <button class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#detailModalabsensi{{ $a->idAbsensi }}"><i
                                                        class="fa fa-edit"></i></button>
                                                <form action="{{ route('absensi.destroy', $a->idAbsensi) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apa anda yakin menghapus data tersebut?')"><i
                                                            class="fa fa-trash"></i></a>
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
@endsection
