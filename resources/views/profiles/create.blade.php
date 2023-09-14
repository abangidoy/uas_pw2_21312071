@extends('pages.master')

@section('judul')
    Tambah Profil
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<form method="post" action="/profiles">
    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
    </div>

    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Umur</label>
        <input type="number" name="umur" value="{{ old('umur') }}" class="form-control">
    </div>

    @error('umur')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Bio</label>
        <textarea class="form-control" name="bio">{{ old('bio') }}</textarea>
    </div>

    @error('bio')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
</form>
@endsection