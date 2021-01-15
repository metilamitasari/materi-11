<?php 


namespace App\Http\Controllers;
use Livewire\Component;
use App\Models\Produk;
use App\Models\Kategori;
use Carbon\Carbon;
use App\Http\Requests\ProdukStoreRequest;

/**
 * 
 */
class ProdukController extends Controller
{	
	
	
	function index()
	{	
		
		$user = request()->user();
		$data['list_produk'] = Produk::Paginate(4);
		
		return view('admin/produk/index', $data);
	}
	
	function create()
	{	 
		
		return view('admin/produk/create');
	}
	
	function store(ProdukStoreRequest $request)
	{	
		
		$produk = new Produk;
		$produk->id_user = request()->user()->id;
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->foto = request('foto');
		$produk->kategori = request('kategori');
		$produk->deskripsi = request('deskripsi');
		$produk->created_at = Carbon::now();
		$produk->save();

		$produk->handleUploadFoto();
		return redirect('admin/produk')->with('success', 'Data Berhasil di Tambahkan');
	}
	
	function show(Produk $produk)
	{	
	
		$data['produk'] = $produk;
		return view('admin/produk/show', $data);
	}
	
	function edit(Produk $produk)
	{
		$data['produk'] = $produk;
		return view('admin/produk/edit', $data);
		
	}
	
	function update(Produk $produk)
	{
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		
		$produk->kategori = request('kategori');
		$produk->deskripsi = request('deskripsi');
		$produk->save();
		$produk->handleUploadFoto();

		return redirect('admin/produk')->with('success', 'Data Berhasil di Update');
	}
	
	function destroy(Produk $produk)
	{
		$produk->handleDelete(); 
		$produk->delete();

		return redirect('admin/produk')->with('danger', 'Data Berhasil di Hapus');
	}
	function filter(){
		$list_produk = Produk::all();

		$data['produk'] = Produk::simplePaginate(4);
		$nama = request('nama');
		$kategori = explode(",", request('kategori'));
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		//$data['list_produk'] = Produk::where('nama_produk', 'like' "%$nama_produk%") -> get();
		//$data['list_produk'] = Produk::whereIn('kategori_produk', $kategori_produk)->get();
		//$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();
		//$data['list_produk'] = Produk::where('kategori_produk', '<>', $kategori_produk) -> get();
		//$data['list_produk'] = Produk::whereNotIn('kategori_produk', $kategori_produk)->get();
		

		$data['list_produk'] = Produk::where('nama','like', "%$nama%")->whereIn('kategori', $kategori)->whereYear('created_at', '2020')->whereBetween('harga', [$harga_min, $harga_max])->get();
		$data['nama'] = $nama;
		$data['kategori'] =  request('kategori');

		return view('admin/produk/index', $data);
	}
}