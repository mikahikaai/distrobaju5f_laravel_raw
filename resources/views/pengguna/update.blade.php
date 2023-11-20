@extends('welcome')

@section('JUDUL', 'Ubah Pengguna')

@section('CONTENT')

    <form action="/pengguna/{{ $pengguna->id }}" method="post" class="mt-2">
        @csrf
        @method('put')
        {{-- @dd($pengguna->role); --}}
        <label for="nama">Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama . . ." class="form-control" value="{{ $pengguna->nama }}" required>
        <label for="alamat">Alamat</label>
        <textarea required style="min-height: 14vh" name="alamat" cols="30" rows="3" placeholder="Masukkan Alamat . . ."
            class="form-control">{{ $pengguna->alamat }}</textarea>
        <label for="no_telp">No. Telepon</label>
        <input required type="tel" name="no_telp" placeholder="Masukkan No. Telpon" class="form-control" value="{{ $pengguna->no_telp }}">
        <label for="role">Role</label>
        <select name="role" class="form-select" required>
            <option value="" disabled>--Pilih Role Pengguna--</option>
            <?php
           
                $options = ['pelanggan', 'kasir' , 'owner'];
                foreach ($options as $option) {
                    $selected = $option == strtolower($pengguna->role) ? 'selected' : ''; ?>
                    <option {{ $selected }} value="{{ $option }}">{{ ucfirst($option) }}</option>
                <?php } ?>
        </select>
        <button class="btn btn-sm btn-primary mt-2" type="submit">Ubah</button>
    </form>

    <script>
        var regExp = /[^0-9\+]/i;
        $(document).on('keypress', 'input[name="no_telp"]', function(e) {
            var value = String.fromCharCode(e.which) || e.key;
            // console.log(value);
            if (regExp.test(value)){
                e.preventDefault();
                return false;
            }
        })
    </script>

@endsection
