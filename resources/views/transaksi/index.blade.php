@extends('welcome')

@section('JUDUL', 'Transaksi')

@section('CONTENT')

    <a href="/transaksi/create" class="btn btn-sm btn-success mt-2">Tambah Data</a>

    @if (Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>Sukses! </strong> {{ Session::get('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-bordered mt-2">
        <tr>
            <th>No.</th>
            <th>Nama Pelanggan</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Opsi</th>
        </tr>
        @foreach ($transaksi as $index => $transaksi1)
            <tr>
                <td>{{ ($transaksi->currentPage() - 1) * 10 + $index + 1 }}</td>
                <td>{{ $transaksi1->pengguna->nama }}</td>
                <td>{{ $transaksi1->barang->nama_barang }}</td>
                <td>{{ $transaksi1->qty }}</td>
                <td>{{ $transaksi1->barang->harga_barang }}</td>
                <td>{{ $transaksi1->barang->harga_barang * $transaksi1->qty }}</td>
                <td>
                    <form action="transaksi/{{ $transaksi1->id }}" method="post">
                        <a href="/transaksi/{{ $transaksi1->id }}" class="btn btn-sm btn-success">Lihat</a>
                        <a href="/transaksi/{{ $transaksi1->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin hapus?');">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    Halaman : {{ $transaksi->currentPage() }} <br>
    Jumlah Data : {{ $transaksi->total() }} <br>
    Data Perhalaman : {{ $transaksi->perPage() }} <br>

    {{ $transaksi->links() }}

@endsection
