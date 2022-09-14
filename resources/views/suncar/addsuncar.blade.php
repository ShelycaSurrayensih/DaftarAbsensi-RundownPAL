     <!-- Modal Add Data -->
     <div class="modal fade" id="addModalsuncar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('suncar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Tanggal</label>
                                        <input id="tanggal" type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal">
                                    </div>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Kode Rundown</label>
                                    <input id="idRundowns" type="text" name="idRundowns" class="form-control" value="{{$rundownDetail->idRundowns}}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Nama Kegiatan</label>
                                    <input id="namaKegiatan" type="text" name="namaKegiatan" class="form-control" placeholder="Masukkan Nama Kegiatan">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Penanggung Jawab</label>
                                    <input id="pj" type="text" name="pj" class="form-control" placeholder="Masukkan pj">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Waktu Mulai</label>
                                    <input id="waktuMulai" type="time" name="waktuMulai" class="form-control" placeholder="Masukkan Waktu Mulai">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Waktu Selesai</label>
                                    <input id="waktuSelesai" type="time" name="waktuSelesai" class="form-control" placeholder="Masukkan Waktu Selesai">
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
    </div>
