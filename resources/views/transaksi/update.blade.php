@extends('welcome')

@section('JUDUL', 'Ubah Barang')

@section('CONTENT')

    <form action="/transaksi/{{ $transaksi->id }}" method="post" class="mt-2">
        @csrf
        @method('put')
        {{-- @dd($penggunas, $barangs, $transaksi); --}}
        <label for="pengguna_id">Nama Pelanggan</label>
        <select name="pengguna_id" class="form-select" required>
            <option value="">--Pilih Pelanggan--</option>
            {{-- @php
                $options = ['topi', 'baju', 'celana', 'kaos kaki', 'sepatu'];
            @endphp --}}
            @foreach ($penggunas as $pengguna)
            @php
                $selected = $pengguna->id == $transaksi->pengguna_id ? 'selected' : '';
            @endphp
                <option {{ $selected }} value="{{ $pengguna->id }}">{{ ucfirst($pengguna->nama) }}</option>
            @endforeach
        </select>
        <label for="barang_id">Nama Barang</label>
        <select name="barang_id" class="form-select" required>
            <option value="">--Pilih Barang--</option>
            {{-- @php
                $options = ['topi', 'baju', 'celana', 'kaos kaki', 'sepatu'];
            @endphp --}}
            @foreach ($barangs as $barang)
            @php
                $selected = $barang->id == $transaksi->barang_id ? 'selected' : '';
            @endphp
                <option {{ $selected }} value="{{ $barang->id }}">{{ ucfirst($barang->nama_barang) }}</option>
            @endforeach
        </select>
        <label for="qty">Qty</label>
        <input type="text" name="qty" placeholder="Masukkan Jumlah Pembelian. . ." class="form-control" value="{{ $transaksi->qty }}" required>
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
