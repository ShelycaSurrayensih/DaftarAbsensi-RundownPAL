@foreach ($rundown as $r)
    {{-- {!! QrCode::size(250)->generate(Request::url( route('absensi.absensi', $r->idRundowns))); !!} --}}
    {!! QrCode::size(250)->generate(url('absensi/'.$r->idRundowns)); !!}

@endforeach
