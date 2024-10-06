<input type="hidden" value="{{ cartTotal() }}" id="cart_total">
<input type="hidden" value="{{ count(Cart::content()) }}" id="cart_product_count">

@foreach (Cart::content() as $cartProduct)

<li>

    <div class="menu_cart_img">
        <img src="{{ $cartProduct->options->product_info['image'] }}" alt="product" class="img-fluid w-100">
    </div>

    <div class="menu_cart_text">
        <a class="title"href="{{ route('product-detail', $cartProduct->options->product_info['slug'])}}">{!! $cartProduct->name !!}</a>
        <p class="size">Aantal: {{$cartProduct->qty}}</p>
        <p class="size">{{@$cartProduct->options->product_size['name']}} ({{$settings->currency_icon}} {{@$cartProduct->options->product_size['price']}})</p>


        {{-- select opttions  --}}
        @foreach ($cartProduct->options->product_options as  $cartProductOption)
            <span class="size"style="font-weight: 600; color:rgb(96, 117, 20)"> {{$cartProductOption['name']}} {{$cartProductOption['price']}}</span>
        @endforeach

        <p class="price">{{ $settings->currency_icon }} {{$cartProduct->price}}</p>

    </div>
    <a class="del_icon" onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i class="fal fa-times"></i></a>
</li>
@endforeach
