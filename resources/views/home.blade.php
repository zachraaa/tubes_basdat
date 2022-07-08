@extends('welcome')

@section('konten')
<div class="isi">
    @foreach($reseps as $resep)
    <div class="resep">
        <h2>{{ $resep->namaMasakan }}</h2>
        <h5 class="tanggal">{{ $resep->tingkatKesulitan }}</h5>
        <p style="color: black">{{ $resep->caraMembuat }}</p>
    </div>
    <br>
    <br>
    @endforeach
</div>
@endsection