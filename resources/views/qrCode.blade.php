@extends('layout2.master')
@section('header')
    List Rundowns
@endsection
@section('judul')
    List Rundowns
@endsection
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">
        <div class="row">
            @foreach ($rundown as $r)
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent" style="text-align: center">
                                    {!! QrCode::size(250)->generate(url('absensi/'.$r->idRundowns)); !!}
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h4 style="color: black; font-style: bold">{{$r->namaAcara}}</h4>
                                    <h4 style="color: black; font-style: bold">{{$r->lokasi}}</h4>
                                    @if ($r->tanggalMulai == $r->tanggalSelesai)
                                        <h4 style="color: black; font-style: bold">{{ date('d F Y', strtotime($r->tanggalMulai)) }}</h4>
                                        <br>
                                    @else
                                        <h4 style="color: black; font-style: bold">{{ date('d F', strtotime($r->tanggalMulai)) }} - {{ date('d F Y', strtotime($r->tanggalSelesai)) }}</h4>
                                    @endif
                                    @foreach ($suncar as $s)
                                        @if ($s->idSuncar)
                                            @if ($s->idRundowns == $r->idRundowns)
                                                <h4 style="color: black; font-style: bold">{{ date('H:i', strtotime($s->waktuMulai)) }} - Selesai</h4>
                                                @break
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

		</div>

	</div>
</div>
<!--**********************************
    Content body end
***********************************-->
@endsection
