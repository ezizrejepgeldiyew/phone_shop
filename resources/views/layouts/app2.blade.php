<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Electro - HTML Ecommerce Template</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="{{ asset('css1/bootstrap.min.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('css1/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('css1/slick-theme.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('css1/nouislider.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css1/font-awesome.min.css') }}">
		<link type="text/css" rel="stylesheet" href="{{ asset('css1/style.css') }}"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						@guest
                        <li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Login</a></li>
                        <li><a href="{{ route('register') }}"><i class="fa fa-user-o"></i> Register</a></li>
                        @endguest
                        @auth
                        <li><form action="{{ route('logout') }}" method="post"> @csrf
                            <i class="fa fa-user"></i>
                            <button type="submit">Logout</button> </form>
                        </li>
                        @endauth
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->
			<div id="header">
				<div class="container">
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="{{ asset('img1/logo.png') }}" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
                                        @foreach ($category as $key => $value)
                                        <option value="{{ $key+1 }}">{{ $value->name }}</option>
                                        @endforeach
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{ count((array) session('cart')) }}</div>
									</a>
									<div class="cart-dropdown show_cart">
										<div class="cart-list">

                                            @php $total = 0 @endphp
                                            @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                            @endforeach

                                            @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)

											<div class="product-widget">
												<div class="product-img">
													<img src="{{ asset('img1/product02.png') }}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{ $details['name'] }}</a></h3>
													<h4 class="product-price"><span class="qty">{{ $details['quantity'] }}x</span>${{ $details['price'] }}</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

                                            @endforeach
                                            @endif
										</div>
										<div class="cart-summary">
											<h5>Jemi {{ $total }} TMT</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
					<ul class="main-nav nav navbar-nav">
						<li class=" @if(Request::routeIs('index')) active @endif"><a href="{{ route('index') }}">Home</a></li>
						<li class=" @if(Request::routeIs('cart')) active @endif"><a href="{{ route('cart') }}">Cart</a></li>
						<li class=" @if(Request::routeIs('store')) active @endif"><a href="{{ route('store') }}">Store</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- /NAVIGATION -->



@yield('skilet')

@include('layouts.blank')

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
                                    @foreach ($category as $item)
                                    <li><a href="#">{{ $item->name }}</a></li>
                                    @endforeach
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->


		<!-- jQuery Plugins -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<script src="{{ asset('js1/jquery.min.js') }}"></script>
		<script src="{{ asset('js1/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js1/slick.min.js') }}"></script>
		<script src="{{ asset('js1/nouislider.min.js') }}"></script>
		<script src="{{ asset('js1/jquery.zoom.min.js') }}"></script>
		<script src="{{ asset('js1/main.js') }}"></script>
        @yield('scripts')
	</body>
    </html>
