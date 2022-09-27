@extends('layout.layout')

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="form-input-content text-center error-page">
                        <div class="card">
                            <div style="text-align:center;">
                                <svg viewBox="0 0 24 24" width="100" height="100" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="me-2">
                                    <style>
                                        svg {
                                            font-size: 25px;
                                            color: rgb(20, 221, 60)
                                        }
                                    </style>
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg>
                            </div>
                            <strong>Success!</strong>
                            <p>Anda Sudah Melakukan Absensi</p>
                            <div class="col-md-40 col-sm-12 text-right" style="text-align: right">
                                <div style="text-align: left; padding-left: 50px"><br>
                                    <table class="display" style="border: 10px;color: black; font-size: 15pt">
                                        <tr>
                                            <td>Nama Acara</td>
                                            <td>&nbsp;:</td>
                                            <td>{{ $rundownDetail->namaAcara }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi</td>
                                            <td>&nbsp;:</td>
                                            <td>{{ $rundownDetail->lokasi }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Mulai</td>
                                            <td>&nbsp;:</td>
                                            <td>{{ date('d F Y', strtotime($rundownDetail->tanggalMulai)) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Selesai</td>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td>{{ date('d F Y', strtotime($rundownDetail->tanggalSelesai)) }}
                                            </td>
                                        </tr>
                                    </table><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <div style="text-align:center;">
                                        <a class="btn btn-primary"
                                            href="{{ route('suncar.pdf', $rundownDetail->idRundowns) }}">Download
                                            Susunan Acara</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--**********************************
 Scripts
***********************************-->
                        <!-- Required vendors -->
                        <script src="public/assets/vendor/global/global.min.js"></script>
                        <script src="public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
                        <script src="public/assets/js/deznav-init.js"></script>
                        <script src="public/assets/js/deznav-init.js"></script>
                        <script src="public/assets/js/demo.js"></script>
                        <script src="public/assets/js/styleSwitcher.js"></script>
</body>

<!-- Mirrored from tixia.dexignzone.com/codeigniter/demo/page_error_400 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jul 2022 07:17:18 GMT -->

</html>
