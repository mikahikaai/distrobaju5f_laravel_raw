@extends('welcome')

@section('JUDUL', 'Barang')

@section('CONTENT')

    <a href="/barang/create" class="btn btn-sm btn-success mt-2">Tambah Data</a>

    @if (Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>Sukses! </strong> {{ Session::get('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-bordered mt-2">
        <tr>
            <th>No.</th>
            <th>Jenis Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Opsi</th>
        </tr>
        @foreach ($barang as $index => $barang1)
            <tr>
                <td>{{ ($barang->currentPage() - 1) * 10 + $index + 1 }}</td>
                <td>{{ $barang1->jenis_barang }}</td>
                <td>{{ $barang1->nama_barang }}</td>
                <td>{{ $barang1->harga_barang }}</td>
                <td>
                    <form action="barang/{{ $barang1->id }}" method="post">
                        <a href="/barang/{{ $barang1->id }}" class="btn btn-sm btn-success">Lihat</a>
                        <a href="/barang/{{ $barang1->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin hapus?');">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    Halaman : {{ $barang->currentPage() }} <br>
    Jumlah Data : {{ $barang->total() }} <br>
    Data Perhalaman : {{ $barang->perPage() }} <br>

    {{ $barang->links() }}

@endsection
