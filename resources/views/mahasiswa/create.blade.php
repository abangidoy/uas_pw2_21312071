@extends('pages.master')

@section('judul')
    Tambah Mahasiswa
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<form method="post" action="{{ route('mahasiswa.store') }}">
    @csrf
    <div class="form-group">
        <label>NPM</label>
        <input type="text" name="npm" value="{{ old('npm') }}" class="form-control">
    </div>

    @error('npm')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
    </div>

    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control">
    </div>

    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
</form>
@endsection