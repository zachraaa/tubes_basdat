@extends('welcome')

@section('konten')
<div class="isi">
    @foreach($reseps as $resep)
    <div class="resep">
        <h2>{{ $resep->namaMasakan }}</h2>
        <p style="color: black">{{ $resep->tingkatKesulitan}} </p>
        <p style="color: black">Estimasi waktu untuk membuat resep ini : {{ $resep->estimasiWaktu }}</p>
        <p style="color: black">Alat yang dibutuhkan : </p>
        <p style="color: black">{{ $resep->alat }}</p>
        <p style="color: black">Bahan yang diutuhkan : </p>
        <p style="color: black">{{ $resep->bahan }}</p>
        <p style="color: black">Langkah-langkah : </p>
        <p style="color: black">{{ $resep->caraMembuat }}</p>
    </div>
    <br>
    <br>
    @endforeach
</div>
@endsection