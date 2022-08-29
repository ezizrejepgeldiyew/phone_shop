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
            <input type="hidden" class="wsish_id" value="{{$item->id}}">
            <button class="add-to-wishlist btn_wish" value="{{ $item->id }}" type="submit"><a @guest
                    href="{{ route('login') }}" @endguest><i class="fa fa-heart-o"></i></a>
                <span class="tooltipp">add to
                    wishlist</span></button>
            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                    compare</span></button>
            <button class="quick-view"><a href="{{ route('product1', ['product' => $item->id]) }}"><i
                        class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
        </div>
    </div>
    <div class="add-to-cart">
        <a class="btn btn add-to-cart-btn add" href="{{ route('add.to.cart', $item->id) }}"><i class="fa fa-shopping-cart"></i>
            add to
            cart</a>
    </div>
</div>


@section('scripts')
<script>
    $(document).ready(function(){
        $(.btn_wish).click(function(e){
            e.preventDefault();
            var Click = $(this);
            var wish_id = $(Click).closest('.wishlist').find('.wsish_id').val();
            console.log(wish.id);
            document.alert(wish_id);
        })
    })
</script>
@endsection
