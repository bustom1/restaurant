<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukKategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Support\Facades\File;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $kategori = ProdukKategory::all();
        $produks = Produk::all();
        return view('manager.product.index', compact('produks', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // form tambah produk
        $produk_kategori = ProdukKategory::all();

        return view('manager.product.create', [
            'kategori' => $produk_kategori,
            'title' => 'Form tambah Produk',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        // validasi data dari form
        $request->validate([
            'nama_produks' => 'required',
            'kode_produks' => 'required',
            'kategori_produks' => 'required',
            'harga_produks' => 'required|numeric',
            'stok_produks' => 'required|integer',
            'deskripsi_produks' => 'required',
            'gambar_produks' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // dd($request);

        // upload gambar 
        $gambar = $request->file('gambar_produks');
        $nama_gambar = date("YmdHis")  . '-' . $gambar->getClientOriginalName();
        $gambar->move(base_path('public/uploads'), $nama_gambar);

        // simpan ke database
        $produk = new Produk;
        $produk->kategori_produks = $request->kategori_produks;
        $produk->nama_produks = $request->nama_produks;
        $produk->kode_produks = $request->kode_produks;
        $produk->harga_produks = $request->harga_produks;
        $produk->stok_produks = $request->stok_produks;
        $produk->deskripsi_produks = $request->deskripsi_produks;
        $produk->gambar_produks = $nama_gambar;

        if ($produk->save()) {
            return redirect()->route('produk.index')->with('success', 'produk berhasil di tambahkan ');
        } else {
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id_produks)
    {
        // form edit
        $kategori = ProdukKategory::all();
        $produk = Produk::find($id_produks);
        return view('manager.product.edit', [
            'produks' => $produk,
            'kategories' => $kategori,
            'title' => 'Form Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        //update data produk
        // validasi data dari form
        $request->validate([
            'nama_produks' => 'required',
            'kode_produks' => 'required',
            'kategori_produks' => 'required',
            'harga_produks' => 'required|numeric',
            'stok_produks' => 'required|integer',
            'deskripsi_produks' => 'required',
            'gambar_produks' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // dd($request);
        // memeriksa gambar yg di upload
        if ($request->hasFile('gambar_produks')) {
            $oldImage = \public_path('uploads/') . $produk->gambar_produks;
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            // upload gambar 
            $gambar = $request->file('gambar_produks');
            $nama_gambar = date("YmdHis") . '-' . $gambar->getClientOriginalName();
            $gambar->move(base_path('public/uploads'), $nama_gambar);
        } else {
            $nama_gambar = $produk->gambar_produks;
        }

        // simpan ke database
        $produk->kategori_produks = $request->kategori_produks;
        $produk->nama_produks = $request->nama_produks;
        $produk->kode_produks = $request->kode_produks;
        $produk->harga_produks = $request->harga_produks;
        $produk->stok_produks = $request->stok_produks;
        $produk->deskripsi_produks = $request->deskripsi_produks;
        $produk->gambar_produks = $nama_gambar;

        if ($produk->update()) {
            return redirect()->route('produk.index')->with('success', 'produk berhasil di ubah ');
        } else {
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        // Dapatkan nama file gambar
        $imageName = $produk->gambar_produks;

        // Hapus entri dari database
        $produk->delete();

        // Hapus file gambar dari folder jika ada
        if ($imageName) {
            $imagePath = public_path('uploads/') . $imageName;

            // Periksa apakah file gambar ada sebelum dihapus
            if (File::exists($imagePath)) {
                // Hapus file gambar
                File::delete($imagePath);
            }
        }

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
