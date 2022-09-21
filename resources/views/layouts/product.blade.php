<div class="product wishlist">
    <div class="product-img">
        <img src="{{ asset('images/' . $item->photo) }}" alt="">
        <div class="product-label">
            @isset($item->discount)
                <span class="sale">-{{ $item->discount }}%</span>
            @endisset
            @if (date('d', strtotime(now()) - strtotime($item->created_at)) <= 7)
                <span class="new">NEW</span>
            @endif
        </div>
    </div>
    <div class="product-body">
        <p class="product-category">{{ $item->category->name }}</p>
        <h3 class="product-name"><a href="#">{{ $item->name }}</a></h3>
        @isset($item->discount)
            <h4 class="product-price">{{ ($item->price / 100) * 30 }}TMT <del
                    class="product-old-price">{{ $item->price }}TMT</del>
            </h4>
        @else
            <h4 class="product-price">{{ $item->price }}TMT</h4>
        @endisset


        <div class="product-rating">
            @for ($i = 0; $i < $item->rating; $i++)
                <i class="fa fa-star"></i>
            @endfor
            @for ($i = 0; $i < 5 - $item->rating; $i++)
                <i class="fa fa-star-o"></i>
            @endfor
        </div>
        <div class="product-btns">
            <button class="fa fa-heart-o" onclick="myWishFunction({{ $item->id }})" type="submit"></i>
                <span class="tooltipp">add to
                    wishlist</span></button>
            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                    compare</span></button>
            <button class="quick-view"><a href="{{ route('product1', ['product' => $item->id]) }}"><i
                        class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
        </div>
    </div>
    <div class="add-to-cart" id="cart{{ $item->id }}" data-id="{{ $item->id }}">
        <button class="add-to-cart-btn" onclick="myCartFunction({{ $item->id }})"><i
                class="fa fa-shopping-cart"></i>
            add to
            cart</button>
    </div>
</div>

@section('layouts_product_scripts')
    <script>
        function myCartFunction(id) {
            let data = {
                id: id,
                _token: "{{ csrf_token() }}"
            }

            $.get('{{ route('add.to.cart') }}', data, function(response) {
                let sum = 0
                let link = "{{ asset('images/') }}"
                let all_text = ''

                $.each(response, function($key, $element) {
                    sum++;
                    text = ''
                    text += '<div class="product-widget"> <div class="product-img"><img src=' + link
                    text += '/' + $element.image +
                        ' alt="" ></div> <div class="product-body" ><h3 class="product-name"> <a href="#">' +
                        $element.name + '</a> </h3 ><h4 class="product-price"><span class="qty"> ' +
                        $element.quantity + 'x </span> $' + $element.price + '</h4></div></div>'
                    all_text = text + all_text
                });
                $('.cart-list').html(all_text)
                $(".cart_qty").html(sum);
            });
        }
        function myWishFunction(id){
            data = {
                id : id,
                _token : "{{ csrf_token() }}"
            }
            $.get('route('add.to.wish')',data,function(response){
                console.log(response);
            });
        }
    </script>
@endsection
