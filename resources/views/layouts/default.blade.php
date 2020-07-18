<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Electronic Store a Ecommerce Online Shopping Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/fasthover.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- toastr -->
<link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
<!-- js -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.countdown.css') }}" /> <!-- countdown --> 
<!-- //js -->  
<!-- web fonts --> 
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //web fonts -->  
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling --> 
</head> 
<body>

	<script type="text/javascript" src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>
	<!-- Toastr -->
	<script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
	

	<!-- header modal -->
	<!-- <div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;</button>
					<h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
				</div>
				<div class="modal-body modal-body-sub">
					<div class="row">
						<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="sap_tabs">	
								<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
									<ul>
										<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
										<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
									</ul>		
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="facts">
											<div class="register">
												<form action="#" method="post">			
													<input name="Email" placeholder="Email Address" type="text" required="">						
													<input name="Password" placeholder="Password" type="password" required="">										
													<div class="sign-up">
														<input type="submit" value="Sign in"/>
													</div>
												</form>
											</div>
										</div> 
									</div>	 
									<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts">
											<div class="register">
												<form action="#" method="post">			
													<input placeholder="Name" name="Name" type="text" required="">
													<input placeholder="Email Address" name="Email" type="email" required="">	
													<input placeholder="Password" name="Password" type="password" required="">	
													<input placeholder="Confirm Password" name="Password" type="password" required="">
													<div class="sign-up">
														<input type="submit" value="Create Account"/>
													</div>
												</form>
											</div>
										</div>
									</div> 			        					            	      
								</div>	
							</div>
							<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function () {
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});
								});
							</script>
							<div id="OR" class="hidden-xs">OR</div>
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<div class="row text-center sign-with">
								<div class="col-md-12">
									<h3 class="other-nw">Sign in with</h3>
								</div>
								<div class="col-md-12">
									<ul class="social">
										<li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
										<li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
										<li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
										<li class="social_behance"><a href="#" class="entypo-behance"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('#myModal88').modal('show');
	</script>   -->
	<!-- header modal -->

	<!-- header -->
	@include('layouts.includes.header')
	<!-- //header -->
	
	<!-- navigation -->
	@include('layouts.includes.nav')
	<!-- //navigation -->

	@yield('content')

	<!-- footer -->
	@include('layouts.includes.footer')
	<!-- //footer --> 

	<script type="text/javascript">
		function myFunction() {
			var x = document.getElementById("w3lssbmincart");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		}
	</script>
	<script type="text/javascript">
		$(function(){
			$(document).on('click','.sbmincart-closer', function(){
				$('#w3lssbmincart').hide();
			});

			$(document).on('click', '.sbmincart-remove', function(){
				let cart_id = $(this).attr('data-id');
				$.ajax({
					url : "{{ route('cart.product.remove') }}",
					type : "GET",
					data : {cart_id : cart_id},
					success:function(response){
						console.log(response);
						$("#w3lssbmincart").load(" #w3lssbmincart > *");
					}
				});
			});

			$(document).on('change', '.sbmincart-quantity', function(){
				let cart_id = $(this).attr('data-cart-id');
				let quantity = $(this).val();
				console.log('cart_id==>', cart_id, 'qnty==>', quantity);
				$.ajax({
					url : "{{ route('cart.product.update') }}",
					type : "GET",
					data : {cart_id : cart_id, quantity: quantity},
					success:function(response){
						console.log('cart===>',response);
						$("#w3lssbmincart").load(" #w3lssbmincart > *");
					}
				});
			});
			
		});
	</script> 
	<script>
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "2000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};
		@if(Session::has('message'))
		var type = "{{ Session::get('type') }}";
		switch (type) {
			case 'info':
			toastr.info("{{ Session::get('message') }}");
			break;

			case 'warning':
			toastr.warning("{{ Session::get('message') }}");
			break;

			case 'success':
			toastr.success("{{ Session::get('message') }}");
			break;

			case 'error':
			toastr.error("{{ Session::get('message') }}");
			break;
		}
		@endif
	</script>
	@stack('script')
</body>
</html>