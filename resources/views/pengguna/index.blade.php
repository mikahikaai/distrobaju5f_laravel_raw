@extends('welcome')

@section('JUDUL', 'Pengguna')

@section('CONTENT')

    <a href="/pengguna/create" class="btn btn-sm btn-success mt-2">Tambah Data</a>

    @if (\Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>Sukses! </strong> {{ \Session::get('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-bordered mt-2">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Role</th>
            <th>Opsi</th>
        </tr>
        @foreach ($penggunas as $index => $pengguna)
            <tr>
                <td>{{ ($penggunas->currentPage() - 1) * 10 + $index + 1 }}</td>
                <td>{{ $pengguna->nama }}</td>
                <td>{{ $pengguna->alamat }}</td>
                <td>{{ $pengguna->no_telp }}</td>
                <td>{{ $pengguna->role }}</td>
                <td>
                    <form action="pengguna/{{ $pengguna->id }}" method="post">
                        <a href="/pengguna/{{ $pengguna->id }}" class="btn btn-sm btn-success">Lihat</a>
                        <a href="/pengguna/{{ $pengguna->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?');">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    Halaman : {{ $penggunas->currentPage() }} <br>
    Jumlah Data : {{ $penggunas->total() }} <br>
    Data Perhalaman : {{ $penggunas->perPage() }} <br>

    {{ $penggunas->links() }}

@endsection
