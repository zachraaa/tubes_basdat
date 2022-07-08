@extends('layouts.master')

@section('content')
    <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Resep</h3>
                </div>
                <!-- /.card-header -->
<div class="col-lg-8">
<form method="post" action="/reseps/{{ $resep->id }}">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="namaMasakan" class="form-label">Nama Masakan</label>
        <input type="text" class="form-control @error('namaMasakan') is-invalid @enderror" id="namaMasakan" name="namaMasakan" required autofocus value="{{ old('namaMasakan', $resep->namaMasakan) }}">
        @error('namaMasakan')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
    </div>
  <div class="mb-3">
    <label for="estimasiWaktu" class="form-label">Estimasi Waktu</label>
    <input type="text" class="form-control @error('estimasiWaktu') is-invalid @enderror" id="estimasiWaktu" name="estimasiWaktu" required value="{{ old('estimasiWaktu', $resep->estimasiWaktu) }}">
    @error('estimasiWaktu')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Add Recipe</button>
</form>
</div>

            </div><!-- /.container-fluid -->
@endsection