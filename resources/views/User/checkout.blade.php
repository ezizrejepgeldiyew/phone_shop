@extends('layouts.app2')
@section('skilet')
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ((array) session('cart') as $id => $item)
                            <div class="order-products">
								<div class="order-col">
									<div>{{ $item['quantity'] }}x Product Name {{ $item['name'] }}</div>
									<div>{{ $item['price'] * $item['quantity'] }}TMT</div>
                                    @php
                                        $total += $item['price'] * $item['quantity'];
                                    @endphp
								</div>
							</div>
                            @endforeach
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">{{ $total }}TMT</strong></div>
							</div>
						</div>
						<a href="@guest
                            {{ route('login') }}
                        @endguest @auth
                            
                        @endauth" class="primary-btn order-submit">Place order</a>
					</div>
				</div>
			</div>
		</div>
@endsection
