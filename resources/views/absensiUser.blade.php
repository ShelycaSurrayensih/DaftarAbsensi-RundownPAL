@extends('layout2.master')
@section('header')
    Absensi
@endsection
@section('judul')
    Absensi
@endsection
@section('content')
<div class="content-body">
    <div class="container-fluid" style="padding-top: 0px">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                         @if ($message = Session::get('success'))
                             <div class="alert alert-success  alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                 <strong>{{ $message }}</strong>
                             </div>
                         @endif
                         <form method="POST" action="{{ route('signaturepad.upload') }}">
                             @csrf
                             <div class="col-md-12">
                                <input type="text" id="idRundowns" name="idRundowns" class="form-control" value="{{$rundownDetail->idRundowns}}" hidden>
                                <div class="form-group form-group-default">
                                    <label>Acara</label>
                                    <input type="text" id="" name="" class="form-control" value="{{ $rundownDetail->namaAcara }}" readonly>
                                </div>
                             </div>
                             <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Tanggal</label>
                                    <input id="tanggal" type="date" name="tanggal" class="form-control"
                                        value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Nama</label>
                                    <input id="nama" type="text" name="nama" class="form-control"
                                        placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Jabatan</label>
                                    <input id="jabatan" type="text" name="jabatan" class="form-control"
                                        placeholder="Masukkan Jabatan">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Instansi</label>
                                    <input id="instansi" type="text" name="instansi" class="form-control"
                                        placeholder="Masukkan instansi">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>No Hp</label>
                                    <input id="telp" type="number" name="telp" class="form-control"
                                        placeholder="Masukkan No Hp">
                                </div>
                            </div>
                             <div class="col-md-12">
                                 <label class="" for="">Tanda Tangan</label>
                                 <br/>
                                 <div id="sig"></div>
                                 <br><br>
                                 <button id="clear" class="btn btn-danger">Clear Signature</button>
                                 <button class="btn btn-success">Save</button>
                                 <textarea id="tandatangan" name="tandatangan" style="display: none"></textarea>
                             </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" ></script>
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#tandatangan', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#tandatangan").val('');
    });
</script>
@endsection
