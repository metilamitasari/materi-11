<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ibukota;
use App\Models\Provinsi;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;


class AlamatResource extends Controller
{
    function getIbukota($id_propinsi){
        return Ibukota::where("id_propinsi", $id_propinsi)->get()->toJson();
    }

    function getKelurahan($id_kabkota){
        return Kelurahan::where("id_kabkota", $id_kabkota)->get()->toJson();
    }

    function getKecamatan($id_kabkota){
        return Kecamatan::where("id_kabkota", $id_kabkota)->get()->toJson();
    }
}
