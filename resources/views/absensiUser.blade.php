<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>

</head>
<body class="bg-dark">
<div class="container">
   <div class="row">
       <div class="col-md-6 offset-md-3 mt-5">
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
                        {{-- <tr>
                            <td>Kode Rundown</td>
                            <td>&nbsp;:</td>
                            <td>PAL-{{$rundownDetail->idRundowns}}</td>
                        </tr> --}}
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Id Rundown</label>
                                <input id="nama" type="text" name="idRundowns" class="form-control" placeholder="Masukkan Nama">
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
                            <div class="col-md-12">
                                <label class="" for="">Signature:</label>
                                <br/>
                                <div id="sig" ></div>
                                <br/>
                                <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                                <textarea id="tandatangan" name="signed" style="display: none"></textarea>
                            </div>
                            <br/>
                            <button class="btn btn-success">Save</button>
                        </form>
                   </div>
               </div>
           </div>
       </div>
    </div>
    <script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#tandatangan', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#tandatangan").val('');
        });
    </script>
    </body>
    </html>
