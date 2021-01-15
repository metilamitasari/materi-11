<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produk::all();
        return $list_Produk->toJson();
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
  
        if(request('nama') && request ('id_user')  && request ('foto') && request('harga') && request ('kategori') && request ('deskripsi')){
            $produk = new produk;
            $produk->nama = request('nama');
            $produk->id_user = request('id_user');
            $produk->harga = request('harga');
            $produk->foto = request('foto');
            $produk->kategori = request('kategori');
            $produk->deskripsi = request('deskripsi');
            $produk->save();

            return collect([
                'respon' => 200,
                'data' => $produk
            ]);
        }else {
            return collect([
                'respon' => 500,
                'message' => "ada yang kosong"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        if($produk){
            return collect([
                'status' => 200,
                'data' => $produk
            ]);
        }else {
            return collect([
                'respon' => 500,
                'message' => "produk tidak di temukan"
            ]);
        }
    }

   
    public function update($id)
    {
        $produk = Produk::find($id);
        if($produk){

            $produk->nama = request('nama') ?? $produk->nama;
            $produk->id_user = request('id_user') ?? $produk->id_user;
            $produk->harga = request('harga') ?? $produk->harga;
            $produk->foto = request('foto') ?? $produk->foto;
            $produk->kategori = request('kategori') ?? $produk->kategori;
            $produk->deskripsi = request('deskripsi') ?? $produk->deskripsi;
            $produk->save();

            return collect([
                'status' => 200,
                'data' => $produk
            ]);
        }
        return collect([
                'respon' => 500,
                'message' => "produk tidak di temukan"
            ]);
        
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        if($produk){
            $produk->delete();
            return collect([
                'status' => 200,
                'data' => "produk Berhasil di hapus"
            ]);
        }else {
            return collect([
                'respon' => 500,
                'message' => "produk tidak di temukan"
            ]);
        }
    }
}
