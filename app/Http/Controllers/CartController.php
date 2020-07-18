<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Order;
use App\OrderItem;
use App\User;
use App\UserDetail;
use Cart;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function addToCart($slug)
	{
		$product = Product::where('slug','=',$slug)->firstOrFail();

		if($product->discount ){
			$finalPrice = $product->discounted_price;
			$discount   = $product->regular_price - $product->discounted_price;
		}else{
			$finalPrice = $product->regular_price;
			$discount   = null;
		}

		$options = [
			'image'         =>$product->images->first()->image,
			'category_slug' =>$product->category->slug,
			'product_id'    => $product->id,
			'product_slug'  => $product->slug,
		];

		if($discount){
			$options['discount'] = $discount;
		}


		$data = [
			'id'         => $product->id,
			'name'       => $product->name,
			'price'      => $finalPrice,
			'quantity'   => 1,
			'attributes' => $options,
		];
		// dd($data);
		\Cart::add($data);
		return redirect()->back()->with([ 'type' => 'success', 'message' => 'You have added '.$product->name.' to your shopping cart!']);
	}

	public function removeFromCart(Request $request){
		\Cart::remove($request->cart_id);
		return response('success');
	}

	public function updateCart(Request $request)
	{
		$cart_id = $request->cart_id;
		$quantity = $request->quantity;
		\Cart::update($cart_id, array(
			'quantity' => array(
				'relative' => false,
				'value' => $quantity,
			),
		));
		
		return ('success');
	}

	public function checkout()
	{
		$data['cart_items'] = Cart::getContent()->sort();
		if (count($data['cart_items']) == 0) {
			return redirect()->route('index')->with([ 'type' => 'error', 'message' => 'Please add items to cart!']);
		}
		return view('checkout',$data);
	}

	public function storeOrder(Request $request){
        DB::beginTransaction();
        try{
            $order_number = rand_str_code(11);

            $checkedComplete = 0;

            while ($checkedComplete == 0) {
                $orderNumberExist = Order::where('order_number', $order_number)->first();                
                if($orderNumberExist){
                    $checkedComplete = 0;
                    $order_number = rand_str_code(11);
                }else{
                    $checkedComplete = 1;
                }
            }
			$params             = $request->only(['name','email']);
			$params['password'] = bcrypt('goshop123');

            if ($user = User::updateOrCreate(['email'=> $request->email], $params)) {
				$user_details            = $request->except('name','email');
				$user_details['user_id'] = $user->id;
            	UserDetail::createOrUpdate(['user_id',$user->id],$user_details);
            	$user_id = $user->id;
            }
                        
            $orderInfo = [
				'amount'       => Cart::getTotal(),
				'order_number' => $order_number,
				'customer_id'  => $user_id,
            ];

            $order = Order::create($orderInfo);

            $items = Cart::getContent();

            foreach ($items as $item) {
                $itemData = [
					'order_id'               => $order->id,
					'product_id'             => $item->id,
					'unit_price'             => $item->price,
					'quantity'               => $item->quantity,
					'discount'               => $item->attributes->discount ? ($item->attributes->discount * $item->quantity) : 0.00,
					'total_price'            => ($item->quantity*$item->price),
					'discounted_unit_price'  => $item->price,
					'discounted_total_price' => ($item->quantity*$item->price)
                ];

                OrderItem::create($itemData);
            }

            DB::commit();
            Cart::clear();
            
            return redirect()->route('index')->with([ 'type' => 'success', 'message' => 'your order submited successfully']);
        }catch(\Exception $e){
            DB::rollBack();

            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


}
