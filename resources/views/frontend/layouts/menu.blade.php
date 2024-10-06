MENU START
==============================-->
<nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            {{--  <img src="{{ $settings->site_name }}" alt="{{ $settings->site_name }}" class="img-fluid">  --}}
            <p>Foodbar</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('menu-page')}}">menu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.html">contact</a>
                </li>
            </ul>
            <ul class="menu_icon d-flex flex-wrap">
                <li>
                    <a href="#" class="menu_search"><i class="far fa-search"></i></a>
                    <div class="fp__search_form">
                        <form>
                            <span class="close_search"><i class="far fa-times"></i></span>
                            <input type="text" placeholder="Search . . .">
                            <button type="submit">search</button>
                        </form>
                    </div>
                </li>

                {{-- couter product --}}
                <li>
                    <a class="cart_icon"><i class="fas fa-shopping-basket"></i> <span
                            class="cart_count">{{ Cart::content()->count() }}</span></a>
                </li>

                <li>
                    <a href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                </li>

                <li>
                    <a class="common_btn" href="#" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">reservation</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


{{-- sidebar menu sidecartcart --}}

<div class="fp__menu_cart_area">
    <div class="fp__menu_cart_boody">
        <div class="fp__menu_cart_header">
            <h5>winkelwagentje </h5>
            <span class="close_cart"><i class="fal fa-times"></i></span>
        </div>

        <ul class="cart_contents">

            @foreach (Cart::content() as $cartProduct)
                <li "{{ $cartProduct->rowId }}">
                    <div class="menu_cart_img">
                        <img src="{{ $cartProduct->options->product_info['image'] }}" alt="product"
                            class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title"
                            href="{{ route('product-detail', $cartProduct->options->product_info['slug']) }}">{!! $cartProduct->name !!}</a>

                        <p class="size">Aantal: {{ $cartProduct->qty }}</p>
                        {{-- ماتنسا تزبيط الأيكون تبع ليورو --}}
                        <p class="size">{{ @$cartProduct->options->product_size['name'] }}
                            {{ $settings->currency_icon }}
                            {{ @$cartProduct->options->product_size['price']
                                ? '(' . @$cartProduct->options->product_size['price'] . ')'
                                : '' }}
                        </p>

                        {{-- select opttions --}}

                        @foreach ($cartProduct->options->product_options as $cartProductOption)
                            <span class="extra">{{ $cartProductOption['name'] }} ({{ $settings->currency_icon }}
                                {{ $cartProductOption['price'] }})</span>
                        @endforeach
                        <p class="price">{{$settings->currency_icon}} {{ $cartProduct->price }}</p>
                    </div>
                    <a class="del_icon" onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i
                            class="fal fa-times"></i></a>
                </li>
            @endforeach

        </ul>


        <p class="subtotal">subtotal <span class="cart_subtotal">{{ $settings->currency_icon }}{{cartTotal()}}
            </span></p>
        <a class="cart_view" href="{{route('cart.index')}}"> WinkelWagen</a>
        <a class="checkout" href="check_out.html">checkout</a>


    </div>
</div>

{{--  reservation  --}}

@php
    $reservationTime= \App\Models\ReservationTime::where('status', 1)->get();
@endphp
<div class="fp__reservation">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Reserveer een tafel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="fp__reservation_form" action="{{route('afspraak.store')}}" method="POST">
                        @csrf
                        <input class="reservation_input" type="text" placeholder="Naam" name="name">
                        <input class="reservation_input" type="text" placeholder="Telefoon" name="phone">
                        <input class="reservation_input" type="date" name="date">
                        <select class="reservation_input nice-select" name="time">
                            <option value="">select Tijd</option>
                            @foreach ($reservationTime as $time)
                            <option value="{{$time->start_time}}-{{$time->end_time}}">{{$time->start_time}}Tot{{$time->end_time}}</option>
                            @endforeach
                        </select>
                        <input class="reservation_input" type="text" placeholder="Personen" name="persons">

                        <button type="submit" class="btn_submit">book table</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.fp__reservation_form').on('submit', function(e){
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method:'POST',
                    url:'{{route('afspraak.store')}}',
                    data: formData,
                    beforeSend: function(){
                        $('.btn_submit').html(`<span class="spinner-border text-light"><span>`);
                    },
                    success:function(response){
                        toastr.success(response.message);
                        $('.fp__reservation_form').trigger("reset");
                        $('#staticBackdrop').modal('hide');
                    },

                    error: function(xhr, status, error){
                    let errors = xhr.responseJSON.errors;
                       $.each(errors, function(index, value){
                        toastr.error(value);
                        $('.btn_submit').html(`Tafel Reserveren`);
                       })

                    },

                    complete: function(){
                        $('.btn_submit').html(`Tafel Reserveren`);
                    }
                })
            })








        })
    </script>
@endpush

