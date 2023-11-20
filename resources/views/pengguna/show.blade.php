@extends('welcome')

@section('JUDUL', 'Lihat Pengguna')

@section('CONTENT')

    @csrf
    <label for="nama">Nama</label>
    <input type="text" name="nama" placeholder="Masukkan Nama . . ." class="form-control" value="{{ $pengguna->nama }}" disabled>
    <label for="alamat">Alamat</label>
    <textarea required style="min-height: 14vh" name="alamat" cols="30" rows="3" placeholder="Masukkan Alamat . . ."
        class="form-control" disabled>{{ $pengguna->alamat }}</textarea>
    <label for="no_telp">No. Telepon</label>
    <input required type="tel" name="no_telp" placeholder="Masukkan No. Telpon" class="form-control" value="{{ $pengguna->no_telp }}" disabled>
    <label for="role">Role</label>
    <input type="text" class="form-control" value="{{ $pengguna->role }}" disabled>
@endsection
