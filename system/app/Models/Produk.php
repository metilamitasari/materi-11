<?php 

namespace App\Models;
use App\Models\Traits\Attributes\ProdukAttributes;
use App\Models\Traits\Relations\ProdukRelations;


/**
 * 
 */
class Produk extends Model
{
	use ProdukAttributes, ProdukRelations;
	protected $table = 'produk';
	protected $guard = [];


}