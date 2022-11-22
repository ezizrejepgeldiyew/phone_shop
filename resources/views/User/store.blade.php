@extends('layouts.app2')
@section('skilet')
    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div id="aside" class="col-md-3">
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">

                            @foreach ($category as $key => $value)
                                <div class="input-checkbox">
                                    <input type="checkbox" class="category_checkbox" value="{{ $value->id }}"
                                        id="category-{{ $key }}">
                                    <label for="category-{{ $key }}">
                                        <span></span>
                                        {{ $value->name }}
                                        <small>(120)</small>
                                    </label>
                                </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">

                            <input type="number" id="price-min" class="form-control input-number price-max" value="0">
                            <span>-</span>
                            <input type="number" id="price-max" class="form-control input-number price-max" value="100000">
                        </div>
                    </div>

                    <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div class="checkbox-filter">
                            @foreach ($ourbrand as $key => $value)
                                <div class="input-checkbox">
                                    <input type="checkbox" value="{{ $value->id }}" id="brand-{{ $key }}">
                                    <label for="brand-{{ $key }}">
                                        <span></span>
                                        {{ $value->name }}
                                        <small>(578)</small>
                                    </label>
                                </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                        @foreach ($product as $item)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{ asset('images/' . $item->photo) }}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{ $item->category->name }}</p>
                                    <h3 class="product-name"><a href="#">{{ $item->name }}</a></h3>
                                    <h4 class="product-price">{{ $item->price }}TMT</h4>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div id="store" class="col-md-9">
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <div class="row hii">
                        @foreach ($product as $item)
                            <div class="col-md-4 col-xs-6">
                                @include('layouts.product')
                            </div>
                        @endforeach
                        <div class="store-filter clearfix">
                            <ul class="store-pagination">
                                <li class="active">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('store_checkbox')
    <script>
        $(document).ready(function() {
            $('#txtSearch').on('keyup', function() {
                var text = $("#txtSearch").val();
                let data = {
                    _token: "{{ csrf_token() }}",
                    text: text
                }

                $.get('{{ route('search') }}', data, function(response) {
                    let all_txt = ''
                    $.each(response, function($key, $item) {
                        all_txt = all_txt + GetHtmlBlade($item)
                    });
                    $(".hii").html(all_txt);
                })
            });
            $('input[type="checkbox"]').click(function() {
                var arr_id = [];
                $(":checkbox:checked").each(function(i) {
                    arr_id[i] = $(this).val();
                });
                if (arr_id.length == 0) {
                    arr_id = null
                }
                data = {
                    _token: "{{ csrf_token() }}",
                    id: arr_id
                }
                $.get('{{ route('category_checkbox') }}', data, function(response) {

                    let len = response.length
                    let all_txt = ''
                    for (let i = 0; i < len; i++) {
                        if (response[i].length != 0) {
                            $.each(response[i], function($key, $item) {
                                all_txt = all_txt + GetHtmlBlade($item)
                            });
                            $(".hii").html(all_txt);
                        }

                    }
                });
            });
            const rangeInput = document.querySelectorAll(".price-filter input");
            rangeInput.forEach(input => {
                input.addEventListener("input", () => {
                    let minVal = parseInt(rangeInput[0].value),
                        maxVal = parseInt(rangeInput[1].value);
                    let data = {
                        _token: "{{ csrf_token() }}",
                        minVal: minVal,
                        maxVal: maxVal
                    }

                    $.post('{{ route('price.filter') }}', data, function(response) {
                        let all_txt = ''
                        $.each(response, function($key, $item) {
                            all_txt = all_txt + GetHtmlBlade($item)
                        });
                        $(".hii").html(all_txt);
                    });
                });
            });
        });
        function GetHtmlBlade($item) {
            url = "{{ url('product1') }}/" + $item.id
            let link = "{{ asset('images/') }}"
            text = ''
            all_txt = ''
            text +=
                '<div class="col-md-4 col-xs-6"><div class="product wishlist"><div class="product-img"><img src=' +
                link
            text += '/' + $item.photo +
                ' alt=""> <div class="product-label">'
            text +=
                '</div></div><div class="product-body"><p class="product-category">' +
                $item.category.name + '</p>'
            text += '<h3 class="product-name"><a href="#">' + $item
                .name + '</a></h3>'
            text += '<h4 class="product-price">' + $item.price +
                ' TMT</h4> <div class="product-btns"> <button class="fa fa-heart-o btn_wish" value="' +
                $item.id +
                '" id="result" type="submit"></i><span class="tooltipp">add to wishlist</span></button>'
            text +=
                '<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> <button class="quick-view"><a href="' +
                url + '"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>'
            text += '</div></div> <div class="add-to-cart" id="cart' +
                $item.id + '" data-id="' + $item.id +
                '"><button class="add-to-cart-btn addtocart" onclick="myCartFunction('+$item.id+')"><i class="fa fa-shopping-cart"></i>add to cart</button></div></div></div>'
            all_txt = all_txt + text
            return all_txt
        }
    </script>
@endsection
@endsection
