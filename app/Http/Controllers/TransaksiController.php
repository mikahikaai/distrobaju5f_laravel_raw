<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'DESC')->paginate(10);
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create', [
            'penggunas' => Pengguna::orderBy('nama', 'ASC')->get(),
            'barangs' => Barang::orderBy('nama_barang', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'pengguna_id' => 'bail|required',
                'barang_id' => 'required',
                'qty' => 'required|numeric|min:1',
            ],
            [
                'pengguna_id.required' => 'Silahkan pilih nama pelanggan terlebih dahulu!',
                'barang_id.required' => 'Silahkan pilih barang terlebih dahulu!',
                'qty.required' => 'Jumlah barang tidak boleh kosong!',
                'qty.min' => 'Jumlah barang tidak boleh kurang dari 1!',
            ],
        );

        Transaksi::create($request->all());
        return redirect('transaksi')->with('msg', 'Data Transaksi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        // $pengguna = Pengguna::all();
        // $barang = Barang::all();
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.update', compact('transaksi'), [
            // 'transaksi' => $transaksi,
            'barangs' => Barang::orderBy('nama_barang', 'ASC')->get(),
            'penggunas' => Pengguna::orderBy('nama', 'ASC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->fill($request->post())->save();
        return redirect('transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect('transaksi');
    }
}
