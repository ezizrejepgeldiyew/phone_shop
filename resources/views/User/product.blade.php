@extends('layouts.app2')
@section('skilet')

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        <div class="product-preview">
                            <img src="{{ asset('images/' . $product->photo) }}" alt="">
                        </div>
                        @foreach (json_decode($product->photos) as $item)
                            <div class="product-preview">
                                <img src="{{ asset('images/' . $item) }}" alt="">
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        <div class="product-preview">
                            <img src="{{ asset('images/' . $product->photo) }}" alt="">
                        </div>
                        @foreach (json_decode($product->photos) as $item)
                            <div class="product-preview">
                                <img src="{{ asset('images/' . $item) }}" alt="">
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div>
                            <div class="product-rating">
                                @for ($i = 0; $i < $product->rating; $i++)
                                <i class="fa fa-star"></i>
                                @endfor
                                @for ($i = 0; $i < 5-($product->rating); $i++)
                                <i class="fa fa-star-o"></i>
                                @endfor
                            </div>
                            <a class="review-link" href="#">{{ $all }} Review(s)</a>
                        </div>
                        <div>
                            @isset($product->discount)
                                <h3 class="product-price">{{ ($product->price / 100) * $product->discount }}TMT <del
                                        class="product-old-price">{{ $product->price }}TMT</del></h3>
                            @else
                                <h3 class="product-price">{{ $product->price }}TMT</h3>
                            @endisset
                            <span class="product-available">In Stock</span>
                        </div>
                        <p>{{ $product->description }}</p>

                        <div class="product-options">
                            <label>
                                Color
                                <select class="input-select">
                                    @foreach (json_decode($product->colors) as $item)
                                    <option value="0">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label>
                                Qty
                                <div class="input-number">
                                    <input type="number" value="0">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </label>
                        </div>

                        <div class="add-to-cart">

                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>

                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>


                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Details</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews ({{ $all }})</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>{{ $product->rating }}</span>
                                                <div class="rating-stars">
                                                    @for ($i = 0; $i < $product->rating; $i++)
                                                    <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for ($i = 0; $i < 5-($product->rating); $i++)
                                                    <i class="fa fa-star-o"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <ul class="rating">
                                                @for ($i = 5; $i > 0; $i--)
                                                    <li>
                                                        <div class="rating-stars">
                                                            @for ($j = 0; $j < $i; $j++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                            @for ($j = 0; $j < 5 - $i; $j++)
                                                                <i class="fa fa-star-o"></i>
                                                            @endfor
                                                        </div>
                                                        @php
                                                            $t = 0;
                                                        @endphp
                                                        @foreach ($count as $key => $value)
                                                            @if ($i == $key)
                                                                @php
                                                                    $t = 1;
                                                                @endphp
                                                                <div class="rating-progress">
                                                                    <div style="width: {{ (100*$value)/$all }}%;"></div>
                                                                </div>
                                                                <span class="sum">{{ $value }}</span>
                                                            @endif
                                                        @endforeach
                                                        @if ($t == 0)
                                                            <div class="rating-progress">
                                                                <div style="width: 0%;"></div>
                                                            </div>
                                                            <span class="sum">0</span>
                                                        @endif

                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            @foreach ($review as $item)
                                            <ul class="reviews">
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">{{ $item->name }}</h5>
                                                        <p class="date">{{ $item->created_at }}</p>
                                                        <div class="review-rating">
                                                            @for ($i = 0; $i < $item->rating; $i++)
                                                            <i class="fa fa-star"></i>
                                                            @endfor
                                                            @for ($i = 0; $i < 5-($item->rating); $i++)
                                                            <i class="fa fa-star-o empty"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>{{$item->discription}}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach

                                            <ul class="reviews-pagination">

                                            </ul>
                                        </div>{{ $review->links() }}
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <form class="review-form"
                                                action="{{ route('review', ['product' => $product->id]) }}"
                                                method="POST">
                                                @csrf
                                                <input class="input" type="text" name="name" placeholder="Your Name">
                                                <input class="input" type="email" name="email" placeholder="Your Email">
                                                <textarea class="input" name="discription"
                                                    placeholder="Your Review"></textarea>
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" value="5" type="radio"><label
                                                            for="star5"></label>
                                                        <input id="star4" name="rating" value="4" type="radio"><label
                                                            for="star4"></label>
                                                        <input id="star3" name="rating" value="3" type="radio"><label
                                                            for="star3"></label>
                                                        <input id="star2" name="rating" value="2" type="radio"><label
                                                            for="star2"></label>
                                                        <input id="star1" name="rating" value="1" type="radio"><label
                                                            for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Related Products -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>
                @foreach ($products as $item)
                    @if ($item->category_id == $product->category_id)
                        <div class="col-md-3 col-xs-6"> @include('layouts.product')
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection