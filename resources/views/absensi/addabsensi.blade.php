 <!-- Modal Add Data -->
 <div class="modal fade" id="addModalabsensi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('absensi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Acara</label>
                                <select name="idRundowns" id="idRundowns">
                                    @foreach ($rundown as $run)
                                    <option value="{{ $run->idRundowns}}">{{ $run->namaAcara}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form row">
                            <label for="idRundowns" class="col-sm-12  col-form-label">Acara</label>
                                <div class="input-group">
                                    <input id="rundown_namaAcara" type="text" class="form-control" readonly="" required>
                                    <input id="idRundowns" type="hidden" name="idRundowns" value="{{ ('idRundowns') }}" required readonly="">
                                    <button type="button" class="btn btn-info btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal"><b>Cari Acara </b><span class="fa fa-search"></span></button>
                                </div>
                            </div> --}}
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Tanggal</label>
                                    <input id="tanggal" type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal">
                                </div>
                            </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama</label>
                                <input id="nama" type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Jabatan</label>
                                <input id="jabatan" type="text" name="jabatan" class="form-control" placeholder="Masukkan Jabatan">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Instansi</label>
                                <input id="instansi" type="text" name="instansi" class="form-control" placeholder="Masukkan instansi">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>No Hp</label>
                                <input id="telp" type="text" name="telp" class="form-control" placeholder="Masukkan No Hp">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Tanda Tangan</label>
                                <input id="tandatangan" type="file" name="tandatangan" class="form-control" placeholder="Masukkan tandatangan">
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
