@extends('frontend.layouts.master')

@section('content')
<section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>cart view</h1>
                <ul>
                    <li><a href="#">home</a></li>
                    <li><a href="#">cart view</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
{{--=
                BREADCRUMB END
            --}}

{{--
                CART VIEW START
            --}}
<section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__cart_list">
                    <div class="table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <th class="fp__pro_img">
                                        Image
                                    </th>

                                    <th class="fp__pro_name">
                                        Product-naam
                                    </th>

                                    <th class="fp__pro_status">
                                        prijs
                                    </th>

                                    <th class="fp__pro_select">
                                        Aantal
                                    </th>

                                    <th class="fp__pro_tk">
                                        Totaal
                                    </th>
                                    {{-- button clear cart for all products --}}
                                    <th class="fp__pro_icon">
                                        <a class="clear_all clear_cart" href="{{ route('cart.destroy') }}">clear all</a>
                                    </th>
                                </tr>
                                @foreach (Cart::content() as $product)
                                <tr>
                                    <td class="fp__pro_img"><img src="{{ $product->options->product_info['image'] }}"
                                            alt="product" class="img-fluid w-100">
                                    </td>

                                    <td class="fp__pro_name"><a
                                            href="{{ route('product-detail', $product->options->product_info['slug']) }}">{{
                                            $product->name }}</a>
                                        <span>{{ @$product->options->product_size['name'] }}
                                            ({{ $settings->currency_icon }}{{ @$product->options->product_size['price']
                                            }})</span>
                                        @foreach ($product->options->product_options as $option)
                                        <p>{{ $option['name'] }}
                                            ({{ $settings->currency_icon . $option['price'] }}) </p>
                                        @endforeach
                                    </td>
                                    <td class="fp__pro_status">
                                        <h6>{{$settings->currency_icon}} {{ $product->price }}</h6>
                                    </td>

                                    {{-- product increment- decrement --}}
                                    <td class="fp__pro_select">
                                        <div class="quentity_btn">
                                            <button class="btn btn-danger decrement"><i
                                                    class="fal fa-minus"></i></button>

                                            <input class="quantity" data-id="{{ $product->rowId }}" type="text" min="1"
                                                max="100" value="{{ $product->qty }}" readonly />

                                            <button class="btn btn-success increment"><i
                                                    class="fal fa-plus"></i></button>
                                        </div>
                                    </td>

                                    {{-- total price --}}
                                    <td class="fp__pro_tk">
                                        <h6 class="product_cart_total">{{$settings->currency_icon}}
                                            {{productTotal($product->rowId)}}</h6>
                                    </td>


                                    {{-- delete knop x --}}
                                    <td class="fp__pro_icon">
                                        <a href="#" class="remove_cart_product" data-id="{{ $product->rowId }}"><i
                                                class="far fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach



                                @if (Cart::content()->count() === 0)
                                <tr class="d-flex">
                                    <td class="wsus__pro_icon" style="width: 27%; margin-top:3% ; margin-left:30%">
                                        <img src="{{ asset('frontend/images/people-sitting-in-restaurant-ordering-food-clipart-33712.jpg') }}"
                                            alt="">
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




            {{-- Total cart side recht --}}
            <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__cart_list_footer_button">
                    <h6>total cart</h6>
                    <p style="font-weight: 800">subtotal: <span id="subtotal" style="font-weight: 600">
                            {{$settings->currency_icon}} {{cartTotal()}}</span></p>
                    <p style="font-weight: 800">delivery: <span>$00.00</span></p>

                    <p style="font-weight: 800">discount: <span id="discount">
                            @if(isset(session()->get('coupon')['discount']))
                            {{$settings->currency_icon}} {{ session()->get('coupon')['discount']}}
                            @else
                            {{$settings->currency_icon}}0
                            @endif
                        </span></p>


                    <p class="total"><span>total:</span> <span id="final_total">
                            @if (isset(session()->get('coupon')['discount']))
                            {{$settings->currency_icon}} {{ cartTotal() - session()->get('coupon')['discount'] }}
                            @else
                            {{$settings->currency_icon}} {{ cartTotal() }}
                            @endif
                        </span></p>

                    {{-- form codepon --}}
                    <form id="coupon_form">
                        @csrf
                        <input type="text" id="coupon_code" placeholder="Coupon Code" name="code">
                        <button type="submit">apply</button>
                    </form>
                   <div class="coupon_card">
                    @if(session()->has('coupon'))
                    <div class="card mt-2">
                        <div class="m-2">
                            <span><b>Kroting_Code:{{ session()->get('coupon')['code']}}</b></span>
                            <span>
                                <td class="fp__pro_icon">
                                    <button id="destroy_coupon"><i class="far fa-times"></i></button>
                                </td>
                            </span>
                        </div>

                    </div>
                    @endif
                   </div>

                    <a class="common_btn" href="{{route('cheakout-page')}}">checkout</a>
                </div>
            </div>
        </div>
    </div>


</section>
{{--
                CART VIEW END
            --}}
@endsection
@push('scripts')
<script>
    $(document).ready(function() {

             var cartTotal = parseInt("{{ cartTotal() }}");

            $('.increment').on('click', function() {
                let inputField = $(this).siblings(".quantity");
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data("id");

                inputField.val(currentValue + 1);

                cartQtyupdate(rowId, inputField.val(), function(response){
                    inputField.val(response.qty);

                    let productTotal = response.product_total;
                   inputField.closest("tr")
                    .find(".product_cart_total")
                    .text("{{("$settings->currency_icon").(":productTotal")}}"
                    .replace(":productTotal", productTotal));

                    cartTotal = response.cart_total;
                    $('#subtotal').text("{{("$settings->currency_icon")}}" + cartTotal);
                    $("#final_total").text("{{("$settings->currency_icon")}}" + response.grand_cart_total)


                });
            });

            $('.decrement').on('click', function() {

                let inputField = $(this).siblings(".quantity");
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data("id");

                if (inputField.val() > 1) {
                    inputField.val(currentValue - 1);
                    cartQtyupdate(rowId, inputField.val(), function(response){
                        let productTotal = response.product_total;
                        inputField.closest("tr")
                        .find(".product_cart_total")
                        .text("{{("$settings->currency_icon").(":productTotal")}}"
                        .replace(":productTotal", productTotal));
                        cartTotal = response.cart_total;
                        $('#subtotal').text("{{("$settings->currency_icon")}}" + cartTotal);
                        $("#final_total").text("{{("$settings->currency_icon")}}" + response.grand_cart_total)


                 });
                }
            });



            function cartQtyupdate(rowId, qty, callback) {
                $.ajax({
                    method: 'post',
                    url: '{{ route('cart.quantity-update') }}',
                    data: {
                        'rowId': rowId,
                        'qty': qty
                    },
                    beforeSend: function() {
                        showloader();
                    },
                    success: function(response){
                        if(callback && typeof callback === 'function'){
                            callback(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        hideLoader();
                        toastr.error(errorMessage);
                    },

                    complete: function() {
                        hideLoader();
                    }

                })
            }
            $('.remove_cart_product').on('click', function(e) {
                e.preventDefault();
                let rowId = $(this).data('id');
                removeCartProduct(rowId);
                $(this).closest('tr').remove();
            })

             function removeCartProduct(rowId){
                $.ajax({
                    method: 'get',
                    url: '{{ route("cart-product-remove", ":rowId") }}'.replace(":rowId", rowId),
                    beforeSend: function() {
                        showloader();
                    },
                    success: function(response) {
                        updateSidebarCart();
                        cartTotal = response.cart_total;
                        $('#subtotal').text("{{("$settings->currency_icon")}}" + cartTotal);
                        $("#final_total").text("{{("$settings->currency_icon")}}" + response.grand_cart_total)


                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        hideLoader();
                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        hideLoader();
                    }
                })
             }

                /**coupon code**/
             $('#coupon_form').on('submit', function(e){
                e.preventDefault();
                let code = $("#coupon_code").val();
                let subtotal = cartTotal;

                couponApply(code, subtotal);
             })



             function couponApply(code, subtotal){
                $.ajax({
                    method: 'POST',
                    url: '{{route("apply-coupon")}}',
                    data: {
                        code: code,
                        subtotal: subtotal
                    },
                    beforeSend: function(){
                        showloader()
                    },
                    success: function(response){
                        $("#coupon_code").val("");
                        $('#discount').text("{{("$settings->currency_icon")}}"+response.discount);
                        $('#final_total').text("{{"$settings->currency_icon"}}"+response.finalTotal);

                        $couponCartHtml = `<div class="card mt-2">
                            <div class="m-2">
                                <span><b> kroting_Code: ${response.coupon_code}</b></span>
                                <span>
                                    <td class="fp__pro_icon">
                                        <button id="destroy_coupon"><i class="far fa-times"></i></button>
                                    </td>
                                </span>
                            </div>
                        </div>`
                        $('.coupon_card').html($couponCartHtml);
                        toastr.success(response.message);

                    },


                    error: function(xhr, status, error){
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },

                    complete: function(){
                        hideLoader()
                    }
                })
             }

             $(document).on('click', "#destroy_coupon", function(){
                distroyCoupon();
             });

             function distroyCoupon(){
                $.ajax({
                    method: 'GET',
                    url: '{{ route("destroy-coupon") }}',
                    beforeSend: function(){
                        showloader();
                    },
                    success: function(response){

                        $('#discount').text("{{("$settings->currency_icon")}}"+0);
                        $("#final_total").text("{{("$settings->currency_icon")}}" + response.grand_cart_total);
                        $('.coupon_card').html("");
                        toastr.success(response.message);

                    },
                    error: function(xhr, status, error){
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },

                    complete: function(){
                        hideLoader();
                    }

                })
             }

        })
</script>
@endpush
