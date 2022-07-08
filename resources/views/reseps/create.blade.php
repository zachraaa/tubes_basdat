@extends('layouts.master')

@section('content')
    <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Users</h3>
                </div>
                <!-- /.card-header -->
<div class="col-lg-8">
<form method="post" action="/reseps">
  @csrf
  <div class="mb-3">
    <label for="namaMasakan" class="form-label">Nama Masakan</label>
    <input type="text" class="form-control @error('namaMasakan') is-invalid @enderror" id="namaMasakan" name="namaMasakan" required autofocus value="{{ old('namaMasakan') }}">
    @error('namaMasakan')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="estimasiWaktu" class="form-label">Estimasi Waktu</label>
    <input type="text" class="form-control @error('estimasiWaktu') is-invalid @enderror" id="estimasiWaktu" name="estimasiWaktu" required value="{{ old('estimasiWaktu') }}">
    @error('estimasiWaktu')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="estimasiWaktu" class="form-label">Tingkat Kesulitan</label>
    <input type="text" class="form-control @error('tingkatKesulitan') is-invalid @enderror" id="tingkatKesulitan" name="tingkatKesulitan" required value="{{ old('tingkatKesulitan') }}">
    @error('tingkatKesulitan')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <!-- 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 -->
  <div class="mb-3">
  <label for="alat" class="form-label">Alat</label>
  <textarea class="form-control @error('alat') is-invalid @enderror" id="alat" name="alat" rows="3" required value="{{ old('alat') }}"></textarea>
  @error('alat')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
  <label for="bahan" class="form-label">Bahan</label>
  <textarea class="form-control @error('bahan') is-invalid @enderror" id="bahan" name="bahan" rows="3" required value="{{ old('bahan') }}"></textarea>
  @error('bahan')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
  <label for="caraMembuat" class="form-label">Cara Membuat</label>
  <textarea class="form-control @error('caraMembuat') is-invalid @enderror" id="caraMembuat" name="caraMembuat" rows="3" required value="{{ old('caraMembuat') }}"></textarea>
  @error('caraMembuat')
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