@php
$cart_items = \Cart::getContent()->sort();
// dd($cart_items->toArray());
@endphp
<!-- header -->
<div class="header" id="home1">
	<div class="container">
		<div class="w3l_login">
			<a href="#" data-toggle="modal" data-target="#myModal88" styel="display:inline-block"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
		</div>
		<div class="w3l_logo">
			<h1><a href="{{ route('index') }}">Aura Electronic<span>Your stores. Your place.</span></a></h1>
		</div>
		<div class="search">
			<input class="search_box" type="checkbox" id="search_box">
			<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
			<div class="search_form">
				<form action="#" method="post">
					<input type="text" name="Search" placeholder="Search...">
					<input type="submit" value="Send">
				</form>
			</div>
		</div>
		<div class="cart cart box_1"> 
			<form action="#" method="post" class="last"> 
				<input type="hidden" name="cmd" value="_cart" />
				<input type="hidden" name="display" value="1" />
				{{-- <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button> --}}
			</form>  
			<a class="btn w3view-cart" onclick="myFunction()"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a> 
		</div>



		<div id="w3lssbmincart" style="display: none;">
			<form method="post" class="" action="products.html" target="">   
				<button type="button" class="sbmincart-closer">×</button>    
				<ul>                
					@if (isset($cart_items) && count($cart_items) > 0)
					@foreach ($cart_items as $cart_item)

					<li class="sbmincart-item sbmincart-item-changed">            
						<div class="sbmincart-details-name">               
							<a class="sbmincart-name" href="http://localhost/store/public/index">{{ $cart_item->name }}</a>                
							<ul class="sbmincart-attributes"></ul>
						</div>           
						<div class="sbmincart-details-quantity"> 
							<input min="1" class="sbmincart-quantity" data-cart-id="{{ $cart_item->id }}" name="quantity_1" type="number" pattern="[0-9]*" value="{{ $cart_item->quantity }}" autocomplete="off">            
						</div>            
						<div class="sbmincart-details-remove">               
							<button type="button" class="sbmincart-remove" data-id="{{ $cart_item->id }}">×</button>            
						</div>            
						<div class="sbmincart-details-price">                
							<span class="sbmincart-price">${{ $cart_item->quantity * $cart_item->price }}</span>            
						</div>            
						{{-- <input type="hidden" name="w3ls_item_1" value="Asus Laptop">
						<input type="hidden" name="amount_1" value="765">
						<input type="hidden" name="shipping_1" value="undefined">
						<input type="hidden" name="shipping2_1" value="undefined"> --}}
					</li> 
					@endforeach
					@endif

				</ul>    
				<div class="sbmincart-footer">
					@if (isset($cart_items) && count($cart_items) > 0)
					<div class="sbmincart-subtotal"> Subtotal: ${{ \Cart::getTotal() }} USD            
					</div>            
					<a href="{{ route('cart.checkout') }}" class="btn btn-checkout">Checkout</a>         
					@else
					<p style="color: #ff5063">Add item to cart</p>
					@endif
				</div>    
				{{-- <input type="hidden" name="cmd" value="_cart">    
				<input type="hidden" name="upload" value="1">            
				<input type="hidden" name="bn" value="sbmincart_AddToCart_WPS_US">  --}}  
			</form>
		</div>
	</div>
</div>
<!-- //header -->