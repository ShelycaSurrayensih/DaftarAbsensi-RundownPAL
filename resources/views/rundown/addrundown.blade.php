 <!-- Modal Add Data -->
 <div class="modal fade" id="addModalrundown" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rundown.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Tahun</label>
                                <input id="tahun" type="text" name="tahun" class="form-control" placeholder="Masukkan Tahun" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama Acara</label>
                                <input id="namaAcara" type="text" name="namaAcara" class="form-control" placeholder="Masukkan Nama Acara" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Lokasi</label>
                                <input id="lokasi" type="text" name="lokasi" class="form-control" placeholder="Masukkan Lokasi" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Mulai</label>
                                <input id="tanggalMulai" type="date" name="tanggalMulai" class="form-control" value="{{ date('d-m-y', strtotime(Carbon\Carbon::today()->toDateString())) }}" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Selesai</label>
                                <input id="tanggalSelesai" type="date" name="tanggalSelesai" class="form-control" value="{{ date('d-m-y', strtotime(Carbon\Carbon::today()->toDateString())) }}" placeholder="" required>
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

<!--End Modal Add-->
