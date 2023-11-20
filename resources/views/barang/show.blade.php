@extends('welcome')

@section('JUDUL', 'Lihat Barang')

@section('CONTENT')

    @csrf
    <label for="alamat">Jenis Barang</label>
    <input type="text" placeholder="Masukkan Jenis Barang . . ." class="form-control" value="{{ $barang->jenis_barang }}" disabled>
    <label for="nama">Nama Barang</label>
    <input type="text" placeholder="Masukkan Nama Barang . . ." class="form-control" value="{{ $barang->nama_barang }}" disabled>
    <label for="harga">Harga</label>
    <input type="text" class="form-control" value="{{ $barang->harga_barang }}" disabled>
@endsection
