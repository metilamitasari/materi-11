@extends('template.base')


      @section('content')
      <h3 class="description">Halaman Update Produk TOTE BAG</h3>
        <div class="row">
        
          <div class="col-md-3">
            <div  class="card">
                <div class="card-body">
                  <img src="{{url('public', $produk->foto)}}" alt="" class="img-fluid">
                  </br>
                  <p class="center"> produk: {{$produk->nama}} </p>
                  <p class="center">Harga:Rp. {{number_format($produk->harga)}} </p>
                </div>

            </div>
          </div>
          <div class="col-md-9">
            
            <div class="card">
            	<div class="card-header">
            		<strong>Ubah data produk</strong>
            	</div>
            	<div class="card-body">
            		<form action="{{url('admin/produk', $produk->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                          <div class="form-group">
                        <label for="nama">Nama produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$produk->nama}}">
                      </div>
                      <div class="form-group">
                        <label for="nama">Harga produk</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{$produk->harga}}">
                      </div>
                
                      <div class="form-group">
                        <label for="produk">Kategori produk</label>
                        <select class="form-control" id="kategori" name="kategori">
                          <option selected="">{{$produk->kategori}}</option>
                          <option disabled=""></option>
                          <option value="produk Pembuka">produk Pembuka</option>
                          <option value="produk Ringan">produk Ringan</option>
                          <option value="produk Berat">produk Berat</option>
                          <option value="produk Penutup">produk Penutup</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nama">Deskripsi produk</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{$produk->deskripsi}}</textarea>
                      </div>
                    <div class="card" style="width:400px">
                    <div class="card-body">
                    <h4 class="card-title">Masukan Foto </h4>
                    <label for="nama">Foto Produk</label>
                    <input type="file" class="form-control" id="foto" name="foto" accepted=".png">
                    </div>
                    </div>
                      <button type="submit" class="btn btn-primary">Ubah data</button>
                    </form>
            	</div>
            </div>
          </div>
        </div>




@endsection

@push('style')
   <!-- css summernote untuk text -->
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush 

@push('script')
   <!-- js summernote untuk text -->
<script>
  $(document).ready(function() {
  $('#deskripsi').summernote();
});
  </script>
@endpush