<?php 


namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\ClientProduk;
use App\Models\Provinsi;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\kabupaten;


/**
 * 
 */
class ClientProdukController extends Controller
{

	function index()
	{
		
		$data['list_produk'] = Produk::Paginate(4);
		
		return view('client/index', $data);
	}
	
	function create(Produk $produk)
	{	
		$data['list_provinsi'] = Provinsi::all();
		$data['produk'] = $produk;
		return view('client/create', $data);
	}
	


	function store(Produk $Produk)
	{
		$data['produk'] = $produk;
		$pesanan = new ClientProduk;
		$pesanan->nama = request('nama');
		$pesanan->harga = request('harga');
		$pesanan->jumlah = request('jumlah');
		$pesanan->save();

		return redirect('bayar')->with('success', 'produk Berhasil di Pesan');
	}
	
	function show()
	{	
		
		$data['list_pesanan'] = ClientProduk::all();
		return view('client/bayar', $data);
	}
	
	function edit(ClientProduk $Produk)
	{
		$data['produk'] = $produk;
		return view('client/edit', $data);
		
	}
	
	function update(ClientProduk $Produk)
	{
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->jumlah = request('jumlah');
		$produk->save();

		return redirect('bayar')->with('success', 'Pesanan Berhasil di Update');
	}
	
	function destroy(Produk $Produk)
	{
		$produk->delete();

		return redirect('bayar')->with('danger', 'Pesanan Berhasil di Hapus');
	}

		function filter(){
		$nama = request('nama');
		$kategori = explode(",", request('kategori'));
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		//$data['list_produk'] = produk::where('nama_produk', 'like' "%$nama_produk%") -> get();
		//$data['list_produk'] = produk::whereIn('kategori_produk', $kategori_produk)->get();
		//$data['list_produk'] = produk::whereBetween('harga', [$harga_min, $harga_max])->get();
		//$data['list_produk'] = produk::where('kategori_produk', '<>', $kategori_produk) -> get();
		//$data['list_produk'] = produk::whereNotIn('kategori_produk', $kategori_produk)->get();
		

		$data['list_produk'] = Produk::where('nama','like', "%$nama%")->whereIn('kategori', $kategori)->whereYear('created_at', '2020')->whereBetween('harga', [$harga_min, $harga_max])->get();
		$data['nama'] = $nama;
		$data['kategori'] =  request('kategori');

		return view('client/index', $data);
	}

	

}