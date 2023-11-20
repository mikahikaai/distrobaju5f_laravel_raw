@extends('welcome')

@section('JUDUL', 'Tambah Transaksi')

@section('CONTENT')

    {{-- @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="/transaksi" method="post" class="mt-2">
        @csrf
        {{-- @dd($penggunas) --}}
        <label for="pengguna_id">Nama Pelanggan</label>
        <select name="pengguna_id" class="form-select @error('pengguna_id') is-invalid @enderror">
            <option value="">--Pilih Pelanggan--</option>
            {{-- @php
                $options = ['topi', 'baju', 'celana', 'kaos kaki', 'sepatu'];
            @endphp --}}
            @foreach ($penggunas as $pengguna)
                <option value="{{ $pengguna->id }}" @selected(old('pengguna_id') == $pengguna->id)>{{ ucfirst($pengguna->nama) }}</option>
            @endforeach

            @error('pengguna_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </select>

        <div class="invalid-feedback">
            Silahkan pilih pelanggan terlebih dahulu!
        </div>

        <label for="barang_id">Nama Barang</label>
        <select name="barang_id" class="form-select @error('barang_id') is-invalid @enderror">
            <option value="">--Pilih Barang--</option>
            {{-- @php
                $options = ['topi', 'baju', 'celana', 'kaos kaki', 'sepatu'];
            @endphp --}}
            @foreach ($barangs as $barang)
                <option value="{{ $barang->id }}" @selected(old('barang_id') == $barang->id)>{{ ucfirst($barang->nama_barang) }}
                </option>
            @endforeach
            @error('barang_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </select>

        <div class="invalid-feedback">
            Silahkan pilih barang terlebih dahulu!
        </div>

        <label for="qty">Qty</label>
        <input type="text" name="qty" placeholder="Masukkan Jumlah Pembelian. . ." value="{{ old('qty') }}"
            class="form-control @error('qty') is-invalid @enderror">
        @error('qty')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
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

        // function errorChecking() {
        //     $('form').addClass('was-validated');
        // }
    </script>

@endsection
