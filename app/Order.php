<?php

namespace App;

use App\OrderItem;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
		'order_number',
		'customer_id',
		'amount',
		'discount',
		'status',
	];

	public function customer()
	{
		return $this->belongsTo(User::class,'customer_id');
	}

	public function items()
	{
		return $this->hasMany(OrderItem::class,'order_id','id');
	}

	



}
