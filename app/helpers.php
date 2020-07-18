<?php


if (!function_exists('productImageView')) {
	function productImageView($product_images){
		$html = '';
		if (count($product_images) > 0) {
			foreach ($product_images as $key => $value) {
				$html .= '<img src="'.url('backend/uploads/product_images',$value->image).'" alt=" " class="img-responsive" />';
			}
		}
		return $html;
	}
}

if (!function_exists('getProductCartPrice')) {
	function getProductCartPrice($product){
		if ($product->discount) {
			$old_price = '$'.$product->regular_price;
			$price = '$'.$product->discounted_price;
		}else{
			$old_price = '';
			$price = '$'.$product->regular_price;
		}
		$html = '<div class="simpleCart_shelfItem"><p>';
		$html .= '<span>'.$old_price.'</span>';
		$html .= '<i class="item_price">'.$price.'</i></p>';
		$html .= '</p><a href="'. route('cart.product.add', $product->slug) .'" class="btn w3ls-cart">Add to cart</a></div>';

		return $html;
	}
}

if(!function_exists('rand_str_code')){
    function rand_str_code($length = 6, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'){
        $chars_length = (strlen($chars) - 1);

        $chars_string = str_split($chars);
        
        $string = $chars_string[rand(0, $chars_length)];

        $string_array = str_split($string);
        
        
        for ($i = 1; $i < $length; $i = strlen($string))
        {
            // Grab a random character from our list
            $r = $chars_string[rand(0, $chars_length)];
            
            // Make sure the same two characters don't appear next to each other
            if ($r != $string_array[$i - 1]) $string .=  $r;
        }
        
        // Return the string
        return $string;
    }    
}