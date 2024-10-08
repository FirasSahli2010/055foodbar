@extends('frontend.layouts.master')
@section('content')
<section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>payment</h1>
                <ul>
                    <li><a href="url('/')">home</a></li>
                    <li><a href="javascripts:;">payment</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============================
    BREADCRUMB END
==============================-->


<!--============================
    PAYMENT PAGE START
==============================-->
<section class="fp__payment_page mt_100 xs_mt_70 mb_100 xs_mb_70">
    <div class="container">
        <h2 style="color: darkgoldenrod">Chose Your payment Gateway</h2>
        <div class="row">
            <div class="col-lg-8">
                <div class="fp__payment_area">
                    <div class="row">
                    <form action="{{ route('paypal.payment') }}" method="GET">
        <button type="submit" class="btn btn-primary">
        <img src="{{asset('frontend/images/pay_1.jpg')}}" alt="payment method"
        class="img-fluid w-100">
            Pay Now PayPal
        </button>
    </form>

                        <div class="col-lg-3 col-6 col-sm-4 col-md-3 wow fadeInUp" data-wow-duration="1s">
                            <a class="fp__single_payment payment-card" data-name="paypal" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" href="#">
                                <img src="{{asset('frontend/images/pay_1.jpg')}}" alt="payment method"
                                    class="img-fluid w-100">

                            </a>
                        </div>
                        <form action="{{ route('payment.create') }}" method="GET">
                            <button type="submit" class="btn btn-primary">
                            <img src="{{asset('frontend/images/ideal_images_alt-payments_ideal.jpg')}}" alt="payment method" class="img-fluid w-100">
                                Pay Now
                            </button>
                        </form>
                        <div class="col-lg-3 col-6 col-sm-4 col-md-3 wow fadeInUp" data-wow-duration="1s">
                        <a class="fp__single_payment payment-card" data-name="mollie" data-bs-toggle="modal">
                                <img src="{{asset('frontend/images/ideal_images_alt-payments_ideal.jpg')}}" alt="payment method" class="img-fluid w-100">
                            </a>
                        </div>


                        <div class="col-lg-3 col-6 col-sm-4 col-md-3 wow fadeInUp" data-wow-duration="1s">
                            <a class="fp__single_payment" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                href="#">
                                <img src="{{asset('frontend/images/pay_2.jpg')}}" alt="payment method"
                                    class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-lg-3 col-6 col-sm-4 col-md-3 wow fadeInUp" data-wow-duration="1s">
                            <a class="fp__single_payment" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                href="#">
                                <img src="{{ asset('frontend/images/pay_3.jpg') }}" alt="payment method"
                                    class="img-fluid w-100">
                            </a>
                        </div>



                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt_25 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__cart_list_footer_button">
                    <h6>Total cart</h6>
                    <p>Subtotal: <span>{{$settings->currency_icon}} {{ $subtotal }}</span></p>
                    <p>Delivery: <span>{{$settings->currency_icon}} {{ $delivery }}</span></p>
                    <p>Discount: <span>{{$settings->currency_icon}} {{ $discount }}</span></p>
                    <p class="total"><span>Total:</span> <span>{{$settings->currency_icon}} {{ $grantTotal }}</span></p>

                    <a class=" common_btn" href=" #">Back</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
$('.payment-card').on('click', function(e){
    e.preventDefault();

    let paymentGateway = $(this).data('name');

    $.ajax({
        method: 'POST',
        url: '{{route("make-payment")}}',
        data: {
            payment_gateway: paymentGateway
        },
        beforeSend: function(){
            showloader();
        },
        success: function(response){
            window.location.href = response.redirect_url;
        },
        error: function(xhr, status, error){
            let errors = xhr.responseJSON.errors;
         $.each(errors, function(index, value){
                toastr.error(value);
            });
        },
        complete: function(){
            hideLoader();
        }

    })

});

{{--  paymemet Mollie  --}}

})
</script>

@endpush
