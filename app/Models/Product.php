<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'category_id',
		'sku',
		'name',
		'slug',
		'description',
		'regular_price',
		'discount',
		'total_stock',
		'status',
		'featured',
	];


	public function category()
	{
		return $this->belongsTo(Category::class,'category_id');
	}

	public function images()
	{
		return $this->hasMany(ProductImage::class,'product_id','id');
	}

	public function getDiscountedPriceAttribute()
	{
		if ($this->discount) {
			$discount_val = ($this->regular_price * $this->discount) / 100;
			$after_discount = round($this->regular_price - $discount_val);
			return $after_discount;	
		}
	}

	public function getFeaturedImageAttribute()
	{
		$images = $this->images;
		if (count($images) > 0) {
			return url('/backend/uploads/product_images').'/'.$images[0]->image;
		}
	}

}
