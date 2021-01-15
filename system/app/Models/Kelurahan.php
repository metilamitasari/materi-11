<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;
use App\Models\Ibukota;


 class Kelurahan extends Model {
   
    protected $table = 'kelurahan';

    function kecamatan(){
        return $this->hasMany(Kecamatan::class,'id_kecamatan');
    }

    function ibukota(){
        return $this->belongsTo(Ibukota::class, 'id_kabkota');
    }
 }

