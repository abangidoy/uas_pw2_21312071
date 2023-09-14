@extends('pages.master')

@section('judul')
    Edit Mahasiswa
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<form id="update-form" method="post" action="{{ route('mahasiswa.update', ['npm' => $mahasiswa->npm]) }}">
    @if(session('success'))
    <div id="success-alert" class="alert alert-warning">
        {{ session('success') }}
    </div>
    @endif
    @csrf
    @method('PUT') <!-- Menggunakan metode PUT untuk update -->

    <div class="form-group">
        <label>NPM</label>
        <input type="text" name="npm" value="{{ $mahasiswa->npm }}" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="form-control">
    </div>

    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="{{ $mahasiswa->alamat }}" class="form-control">
    </div>

    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="button" class="btn btn-primary" id="btn-update"><i class="bi bi-pencil-square"></i> Simpan</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btn-update').addEventListener('click', function () {
        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda ingin menyimpan perubahan?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#5d7eeb",
            cancelButtonColor: "#5d7eeb",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('update-form').submit();
            }
        });
    });
</script>

<script>
    // Ambil elemen pesan flash session
    const successAlert = document.getElementById('success-alert');

    // Cek apakah elemen pesan ada
    if (successAlert) {
        // Setelah 10 detik, sembunyikan elemen pesan
        setTimeout(function() {
            successAlert.style.display = 'none';
        }, 10000); // 10 detik
    }
</script>
@endsection