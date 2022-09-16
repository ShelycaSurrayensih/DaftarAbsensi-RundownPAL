@extends('layout.master')
@section('judul')
Table User
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
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModaluser">Add Data</button>
                    </div>
                    @include('admin.adduser')
					<div class="card-body">
						<div class="table-responsive">
							<table id="example3" class="display" style="min-width: 845px">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Password</th>
										<th>Action</th>
									</tr>
								</thead>
                                <tbody>


<!--**********************************
	Content body end
***********************************-->
                    @foreach($datauser as $du)
                    <!--start modal edit-->
                    <div class="modal fade" id="editModalUser{{ $du->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <form action="{{ route('Absensi.update', $du->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama</label>
                                                    <input id="nama" type="text" name="name" value="{{ $du->name }}" class="form-control" placeholder="Masukkan Nama">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Email</label>
                                                    <input id="email" type="text" name="email" value="{{ $du->email }}" class="form-control" placeholder="Masukkan Email">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Password</label>
                                                    <input id="password" type="text" name="password" value="{{ $du->password }}" class="form-control" placeholder="Masukkan password">
                                                </div>
                                            </div>
                                            {{-- <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>No Hp</label>
                                                    <input id="telp" type="text" name="telp" value="{{ $du->telp }}" class="form-control" placeholder="Masukkan No Hp">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Tanda Tangan</label>
                                                    <input type="file" name="tandatangan" class="form-control" placeholder="Masukkan Tanda Tangan">
                                                </div>
                                                <img src="{{asset('images/'.$du->gambar)}}"  width="100px" alt="">
                                            </div> --}}
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" id="addModaluser" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Modal Edit-->

                    <!-- Modal Detail Data -->
                    <div class="modal fade" id="detailModalUser{{ $du->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                <label>Nama</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        {{ $du->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        {{ $du->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Password</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        {{ $du->password }}
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
                        <td class="text-center">{{ $du->name }}</td>
                        <td class="text-center">{{ $du->email}}</td>
                        <td class="text-center">{{ $du->password}}</td>
                        <td class="text-center">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModalUser{{ $du->id }}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModalUser{{ $du->id }}"><i class="fa fa-edit"></i></button>
                            <form action="{{ route('user.destroy', $du->id) }}" method="POST" class="d-inline">
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
