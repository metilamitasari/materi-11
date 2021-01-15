@extends('template.base')


      @section('content')
        
        <div class="row">
          <div class="col-md-12">
            <h3 class="description">Halaman Produk TOTE BAG</h3>

            <div class="card">
                <dir class="card-header">
				<div class="float-right">
					Tanggal Produk : {{$produk->created_at->format('d M Y H:i')}}

                    </div>
            	<div class="card-header">
            		Detail produk <strong>{{$produk->nama}}</strong>

            	</div>
            	<div class="card-body">
            		<table class="table">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th width="200px">Nama Kategori</th>
                                <th width="250px">Harga produk</th>
                                <th width="250px">Deskripsi produk</th>
                       
								<th width="20%">Foto</th>
            				</tr>
            			</thead>
            			<tbody>
            				
            				<tr>
            					<td>1</td>
            					
            					<td>{{$produk->kategori}}</td>
                                <td>Rp. {{number_format($produk->harga)}}</td>
                                <td>{{$produk->deskripsi}}</td>
                                

								<td><img src="{{url('public/'.$produk->foto)}}" alt="" class='img-fluid'></td>
            				</tr>
            			</tbody>
            		</table>
            	</div>
            </div>
          </div>
        </div>



@endsection