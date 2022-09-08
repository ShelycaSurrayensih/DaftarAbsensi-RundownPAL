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
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Poppins, sans-serif;
            font-size: 14px;
            font-family: Arial;
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

            font-weight: 400;
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
            /margin: 0 0 20px 0;/ background: url(dimension.png);
        }

        h4 {
            font-weight: bold;
            font-size: 14px;
        }

        table {
            width: 10%;
            margin-top: 5%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table th,
        table td {
            text-align: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif
        }

        table th {
            padding: 10px 20px;
            color: #5D6975;
            border-bottom: 1px solid #858796;
            white-space: nowrap;
            font-weight: bold;
            border-collapse: collapse;
        }

        table td {
            padding: 10px;
            text-align: center;
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
    <main>
        <div class="table-responsive" style="overflow-x:auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Rundown </th>
                        <th>Kegiatan </th>
                        <th>Penanggung Jawab</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suncar as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>PAL-{{ $s->idRundowns }}</td>
                            <td>{{ $s->namaKegiatan }}</td>
                            <td>{{ $s->pj }}</td>
                            <td>{{ $s->waktuMulai }}</td>
                            <td>{{ $s->waktuSelesai }}</td>
                        <tr>
                    @endforeach
                </tbody>
            </table>
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
