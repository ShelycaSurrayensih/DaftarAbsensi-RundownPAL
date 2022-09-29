<html>

<head>
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* mengatur ukuran canvas tanda tangan  */
        canvas {
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            width: 100%;
            height: 400px;
        }
    </style>
    <title>Form Absensi</title>

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
                            <div class="row">
                                <div class="col-sm-12">
                                    <input id="idRundowns" type="text" name="idRundowns" class="form-control"
                                        value="{{ $rundownDetail->idRundowns }}" hidden>
                                    <div class="form-group form-group-default">
                                        <label>Acara</label>
                                        <input id="" type="text" name="" class="form-control"
                                            value="{{ $rundownDetail->namaAcara }}" readonly>
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
                                        <input id="telp" type="text" name="telp" class="form-control"
                                            placeholder="Masukkan No Hp">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="" for="">Signature:</label>
                                    <canvas id="tandatangan" class="signature-pad" name="tandatangan"></canvas>
                                    <!-- tombol submit  -->
                                    <div style="float: left;">
                                        <button id="btn-submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>

                                    <div style="float: right;">
                                        <!-- tombol ganti warna  -->
                                        <button type="button" class="btn btn-success" id="change-color">
                                            Change Color
                                        </button>

                                        <!-- tombol undo  -->
                                        <button type="button" class="btn btn-dark" id="undo">
                                            <span class="fas fa-undo"></span>
                                            Undo
                                        </button>

                                        <!-- tombol hapus tanda tangan  -->
                                        <button type="button" class="btn btn-danger" id="clear">
                                            <span class="fas fa-eraser"></span>
                                            Clear
                                        </button>
                                    </div>
                                    {{-- <br />
                                    <div id="sig"></div>
                                    <br />
                                    <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                                    <textarea id="tandatangan" name="tandatangan" style="display: none"></textarea> --}}
                                </div>
                                {{-- <br />
                                <button class="btn btn-success">Save</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script>
        // script di dalam ini akan dijalankan pertama kali saat dokumen dimuat
        document.addEventListener('DOMContentLoaded', function () {
            resizeCanvas();
        })

        //script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }


        var canvas = document.getElementById('tandatangan');

        //warna dasar signaturepad
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)'
        });

        //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
        document.getElementById('clear').addEventListener('click', function () {
            signaturePad.clear();
        });

        //saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
        document.getElementById('undo').addEventListener('click', function () {
            var data = signaturePad.toData();
            if (data) {
                data.pop(); // remove the last dot or line
                signaturePad.fromData(data);
            }
        });

        //saat tombol change color diklik maka akan merubah warna pena
        document.getElementById('change-color').addEventListener('click', function () {

            //jika warna pena biru maka buat menjadi hitam dan sebaliknya
            if(signaturePad.penColor == "rgba(0, 0, 255, 1)"){

                signaturePad.penColor = "rgba(0, 0, 0, 1)";
            }else{
                signaturePad.penColor = "rgba(0, 0, 255, 1)";
            }
        })

        //fungsi untuk menyimpan tanda tangan dengan metode ajax
        $(document).on('click', '#btn-submit', function () {
            var signature = signaturePad.toDataURL();

            $.ajax({
                url: url('route('signaturepad.upload')'),
                data: {
                    foto: signature,
                },
                method: "POST",
                success: function () {
                    location.reload();
                    alert('Tanda Tangan Berhasil Disimpan');
                }

            })
        })
    </script>
</body>

</html>
