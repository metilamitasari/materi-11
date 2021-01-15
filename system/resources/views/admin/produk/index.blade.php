@inject('TimeServices', 'App\Services\TimeServices')

@extends('template.base')


      @section('content')
        
        <div  class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        Jam : {{$TimeServices->showTImeNow()}}

                    </div>
                    Filter  
                </div>
                <div class="card-body">
                    <form action="{{url('admin/produk/filter')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="" class="control label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$nama ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="" class="control label">Kategori Produk</label>
                            <input type="text" class="form-control" name="kategori" value="{{$kategori ?? ''}}">
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control label">Harga Min</label>
                                <input type="text" class="form-control" name="harga_min" value="{{$harga_min ?? ''}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control label">Harga Max</label>
                                <input type="text" class="form-control" name="harga_max" value="{{$harga_max ?? ''}}">
                            </div>
                        </div>
                    </div>
                        
                        <button class="btn btn-primary float-right"><i class="fa fa-search"> Filter </i></button>
                    </form>
                </div>
            </div>
                </div>
            </div>
            
            <div class="card">
                @include('template.utils.notif')
            	<div class="card-header">
            		<strong>Menu Makanan</strong>
            		<a href="{{url('admin/produk/create')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah Data</a>
            	</div>
            	<div class="card-body">
            		<table class="table">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Aksi</th>
            					<th>Nama produk</th>
                                <th>Harga produk</th>
                                <th>Kategori produk</th>
                               
            				</tr>
            			</thead>
            			<tbody>
            				@foreach($list_produk as $produk)
            				<tr>
            					<td>{{$loop->iteration}}</td>
            					<td>
            						<div class="btn-group">
            							<a href="{{url('admin/produk', $produk->id)}}" class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>
            							<a href="{{url('admin/produk', $produk->id)}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        @include('template.utils.delete', ['url' => url('admin/produk', $produk->id)])
            						</div>
            					</td>
            					<td>{{$produk->nama}}</td>
                                <td>Rp. {{number_format($produk->harga)}}</td>
                                <td>{{$produk->kategori}}</td>
                                <td>{{$produk->qty}}
            				</tr>
            				@endforeach
                            <div class ="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center">
                                    {!! $list_produk->links() !!}
                                    </div>
                                </div>
                            </div>
                 
                        </select>
            			</tbody>
            		</table>
                    
            </div>

            <!--test-->
            <div class="card">
                
            </div>
            <!--test-->
          </div>




@endsection