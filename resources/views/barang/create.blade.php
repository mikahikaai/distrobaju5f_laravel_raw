@extends('welcome')

@section('JUDUL', 'Tambah Barang')

@section('CONTENT')

    <form action="/barang" method="post" class="mt-2">
        @csrf
        <label for="jenis_barang">Jenis Barang</label>
        <select name="jenis_barang" class="form-select" required>
            <option value="">--Pilih Jenis Barang--</option>
            @php
                $options = ['topi', 'baju', 'celana', 'kaos kaki', 'sepatu'];
            @endphp
            @foreach ($options as $option)
                <option value="{{ $option }}">{{ ucfirst($option) }}</option>
            @endforeach
        </select>
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang. . ." class="form-control" required>
        <label for="harga_barang">Harga Barang</label>
        <input type="text" name="harga_barang" placeholder="Masukkan Harga Barang. . ." class="form-control" required>
        <button class="btn btn-sm btn-primary mt-2" type="submit">Simpan</button>
    </form>

    <script>
        var regExp = /[^0-9\+]/i;
        $(document).on('keypress', 'input[name="no_telp"]', function(e) {
            var value = String.fromCharCode(e.which) || e.key;
            // console.log(value);
            if (regExp.test(value)) {
                e.preventDefault();
                return false;
            }
        })
    </script>

@endsection
