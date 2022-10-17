<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Susunan Acara</title>

    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            height: 29.7cm;
            width: 100%;
            margin: auto;
            color: #001028;
            background: #FFFFFF;
            font-size: 11px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        header {
            /* width: 100%;
            padding: 10px 0;
            margin-bottom: 30px; */
            border-color: #f3f3f3;
            position: relative;
            background: transparent;
            padding: 1.5rem 1.875rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer {
            font-family: "Times New Roman", Times, serif;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 11px;
        }

        h2 {

            font-weight: 100;
            line-height: 1.5;
            color: #000;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin-top: 6%;
            /* font-size: 2.4em; */
            line-height: 1.4em;
            font-weight: bold;
            text-align: center;

            /* margin: 0 0 20px 0; */
            background: url(dimension.png);
        }

        h3 {
            /* border-bottom: 1px solid #5D6975; */
            color: #001028;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            /* font-size: 2.4em; */
            /* line-height: 1.4em; */
            font-weight: normal;
            text-align: center;
            margin-top: -15px;
            margin-bottom: 5%;
            /margin: 0 0 20px 0;/ background: url(dimension.png);
        }

        table {
            width: 100%;
            margin-top: 5%;
            border-collapse: collapse;
            border-spacing: 0;
            margin: auto;
        }

        table1 {
            width: 100%;
            border: none;
        }



        tr {
            text-align: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }


        table th {
            padding: 9px 22px;
            color: #000;
            white-space: nowrap;
            font-weight: bold;
            border-collapse: collapse;
            background-color: #abcdef;
        }

        tr {
            border-bottom: 0.5px #000 solid;
        }

        table {
            border: 0.5px #000 solid
        }

        table td {
            padding: 10px;
            text-align: center;
        }

        p {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 11px;
            margin: 0px;
        }

        .topright {
            position: absolute;
            top: 10px;
            right: 16px;
            font-size: 18px;
            width: 17%;
        }

        .topleft {
            position: absolute;
            top: 10px;
            left: 16px;
            font-size: 18px;
            width: 20%;
        }
    </style>
</head>

<body>
    <header>
        <img src="assets/images/logo-bumn1.png" class="topleft">
        <img src="assets/images/logo-4.png" class="topright">
    </header>
    <h2 style="text-decoration: underline;">SUSUNAN ACARA</h2>
    <table style="border: 0; margin-top: 0; margin: 0; width: 30%; font-size: 13px">
        <tr style="border: 0; text-align: left">
            <td style="padding: 0; text-align: left; font-weight: bold">Kode Rundowns</td>
            <td style="padding: 0; text-align: left">&nbsp;:</td>
            <td style="padding: 0; text-align: left">&nbsp;PAL-{{ $rundownDetail->idRundowns }}</td>
        </tr>
        <tr style="border: 0; text-align: left">
            <td style="padding: 0; text-align: left; font-weight: bold">Tahun</td>
            <td style="padding: 0; text-align: left">&nbsp;:</td>
            <td style="padding: 0; text-align: left">&nbsp;{{ $rundownDetail->tahun }}</td>
        </tr>
        <tr style="border: 0; text-align: left">
            <td style="padding: 0; text-align: left; font-weight: bold">Nama Acara</td>
            <td style="padding: 0; text-align: left">&nbsp;:</td>
            <td style="padding: 0; text-align: left">&nbsp;{{ $rundownDetail->namaAcara }}</td>
        </tr>
        <tr style="border: 0; text-align: left">
            <td style="padding: 0; text-align: left; font-weight: bold">Lokasi</td>
            <td style="padding: 0; text-align: left">&nbsp;:</td>
            <td style="padding: 0; text-align: left">&nbsp;{{ $rundownDetail->lokasi }}</td>
        </tr>
        <tr style="border: 0; text-align: left">
            <td style="padding: 0; text-align: left; font-weight: bold">Tanggal Mulai</td>
            <td style="padding: 0; text-align: left">&nbsp;:</td>
            <td style="padding: 0; text-align: left">&nbsp;{{ date('d F Y', strtotime($rundownDetail->tanggalMulai)) }}</td>
        </tr>
        <tr style="border: 0; text-align: left">
            <td style="padding: 0; text-align: left; font-weight: bold">Tanggal Selesai</td>
            <td style="padding: 0; text-align: left">&nbsp;:</td>
            <td style="padding: 0; text-align: left">&nbsp;{{ date('d F Y', strtotime($rundownDetail->tanggalSelesai)) }}</td>
        </tr>
    </table>
    <main>
        <div class="table-responsive" style="overflow-x:auto"><br>
            <?php
            $tanggalPertama = $suncarFirst->tanggal;
            $header = 0;
            ?>
            @foreach ($suncarKonten as $sk)
                @if ($sk->tanggal == $tanggalPertama)
                Tanggal: {{date('d-m-Y', strtotime ($sk->tanggal))}}
                    <table class="table">
                        @if ($header == 0)
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Kegiatan </th>
                                    <th>Penanggung Jawab</th>
                                </tr>
                            </thead>
                            <?php
                            $header = 1;
                            ?>
                        @endif
                        <tbody>
                            <?php
                            $count = 1;
                            ?>
                            @foreach ($suncar as $s)
                                @if ($s->idRundowns == $rundownDetail->idRundowns)
                                    @if ($s->tanggal == $sk->tanggal)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $s->waktuMulai }}</td>
                                            <td>{{ $s->waktuSelesai }}</td>
                                            <td>{{ $s->namaKegiatan }}</td>
                                            <td>{{ $s->pj }}</td>
                                        </tr>
                                        <?php
                                        $count++;
                                        ?>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                <br>
                    <?php
                    $count = 1;
                    $tanggalPertama = $sk->tanggal;
                    ?>
                    Tanggal: {{date('d-m-Y', strtotime ($sk->tanggal))}}
                    <table>

                        <thead>
                            <tr>
                                <th>No</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Kegiatan </th>
                                    <th>Penanggung Jawab</th>
                            </tr>
                        </thead>
                        @foreach ($suncar as $s)
                                @if ($s->idRundowns == $rundownDetail->idRundowns)
                                    @if ($s->tanggal == $sk->tanggal)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $s->waktuMulai }}</td>
                                            <td>{{ $s->waktuSelesai }}</td>
                                            <td>{{ $s->namaKegiatan }}</td>
                                            <td>{{ $s->pj }}</td>
                                        </tr>
                                        <?php
                                        $count++;
                                        ?>
                                    @endif
                                @endif
                            @endforeach
                    </table>
                @endif
            @endforeach

        </div>
    </main>
    <div class="footer">
        <p style="font-weight: bold">PT. PAL INDONESIA</p>
        <p>Kantor Pusat : UJUNG, SURABAYA 60155, PO BOX 1134 INDONESIA</p>
        <p>Telp : +62-31-3292275 (HUNTING) FAX : +62-31-3292530, 3292493, 3292516 Email : headoffice@pal.co.id Web Site
            : http//www.pal.co.id</p>
        <p>Kantor Perwakilan : JL. TANAH ABANG IV27, JAKARTA 10100, PHONE : +62-21-3846833, FAX : +62-21-3643717 E-mail
            : jakartabranch@pal.co.id</p>
    </div>

</body>

</html>
