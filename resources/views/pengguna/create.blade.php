@extends('welcome')

@section('JUDUL', 'Tambah Pengguna')

@section('CONTENT')

    <form action="/pengguna" method="post" class="mt-2">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama . . ." class="form-control" required>
        <label for="alamat">Alamat</label>
        <textarea required style="min-height: 14vh" name="alamat" cols="30" rows="3" placeholder="Masukkan Alamat . . ."
            class="form-control"></textarea>
        <label for="no_telp">No. Telepon</label>
        <input required type="tel" name="no_telp" placeholder="Masukkan No. Telpon" class="form-control">
        <label for="role">Role</label>
        <select name="role" class="form-select" required>
            <option value="">--Pilih Role Pengguna--</option>
            <option value="pelanggan">Pelanggan</option>
            <option value="kasir">Kasir</option>
            <option value="owner">Owner</option>
        </select>
        <button class="btn btn-sm btn-primary mt-2" type="submit">Simpan</button>
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
