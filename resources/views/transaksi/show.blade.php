@extends('welcome')

@section('JUDUL', 'Lihat Transaksi')

@section('CONTENT')

    <label>Nama Pelanggan</label>
    <input class="form-control" value="{{ $transaksi->pengguna->nama }}" disabled>
    <label>Nama Barang</label>
    <input class="form-control" value="{{ $transaksi->barang->nama_barang }}" disabled>
    <label>Qty</label>
    <input class="form-control" value="{{ $transaksi->qty }}" disabled>
    <label>Harga</label>
    <input class="form-control" value="{{ $transaksi->barang->harga_barang }}" disabled>
    <label>Total</label>
    <input class="form-control" value="{{ $transaksi->qty * $transaksi->barang->harga_barang }}" disabled>
@endsection
