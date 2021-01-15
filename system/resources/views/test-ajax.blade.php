@extends('template.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Alamat
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="control-label">Provinsi</label>
                                <select name=""  class="form-control" onchange="gantiProvinsi(this.value)">
                                    @foreach($list_provinsi as $provinsi)
                                    <option value="{{$provinsi->id_propinsi}}">{{$provinsi->nama_propinsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                            <label for="" class="control-label">Ibukota</label>
                                <select name=""  class="form-control" id="ibukota" onchange="gantiIbukota(this.value)" >
                                <option value="">Pilih Ibukota Dulu</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                            <label for="" class="control-label" >Kelurahan</label>
                                <select name=""  class="form-control" id="kelurahan" onchange="gantiKelurahan(this.value)"> 
                                <option value="">Pilih Ibukota Kelurahan</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                            <label for="" class="control-label">Kecamatan</label>
                                <select name=""  class="form-control" id="kecamatan">
                                <option value="">Pilih Ibukota Kecamatan</option>
                                </select>
                            </div>    
                        </div>
                    </div>
                </div>
            <div>

        </div>
    </div>

@endsection

@push('script')
    <script>
        function gantiProvinsi(id){
            $.get("api/provinsi/"+id, function(result){
                result = JSON.parse(result)
                option = ""
                for(item of result){
                option += `<option value="${item.id}">${item.nama_kabkota}</option>`;
                }
                $("#ibukota").html(option)
            });
        }
        function gantiIbukota(id){
            $.get("api/ibukota/"+id, function(result){
                result = JSON.parse(result)
                option = ""
                for(item of result){
                option += `<option value="${item.id}">${item.nama_kelurahan}</option>`;
                }
                $("#kelurahan").html(option)
            });

        }

        function gantiKelurahan(id){
            $.get("api/kelurahan/"+id, function(result){
                result = JSON.parse(result)
                option = ""
                for(item of result){
                option += `<option value="${item.id}">${item.nama_kecamatan}</option>`;
                }
                $("#kecamatan").html(option)
            });

        }
       
    </script>
@endpush
 