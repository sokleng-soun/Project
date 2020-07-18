<?php

namespace App;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'unit_price',
		'discount',
		'total_price',
		'discounted_unit_price',
		'discounted_total_price',
	];

	public function product()
	{
		return $this->belongsTo(Product::class,'product_id');
	}

}
