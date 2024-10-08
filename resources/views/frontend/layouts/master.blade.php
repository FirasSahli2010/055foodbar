<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FoodBar || Restaurant Template</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.exzoom.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('frontend/css/rtl.css')}}"> --}}
    {{--sweet Alert--}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css" rel="stylesheet">
    {{-- toastre alert CSS --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/toastr.min.css')}}">
</head>

<body>
    <div class="row" >
    <header>
    <div class="overlay-container d-none">
        <div class="overlay">
            <span class="loader"></span>
        </div>
    </div>

    {{--coument cart pop om te loop in alle page --}}
    <div class="fp__cart_popup">
        <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body load_product_model_body">

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TOPBAR START --}}
    <section class="fp__topbar">
        <div class="col-12">
            <div class="row container">
                <div style="color: #FFFFFF">
                    <ul class="fp__topbar_info d-flex flex-wrap" >
                        <li style="color: #FFFFFF">
                            <a href="mailto:info@055Foodbar.nl" style="color: #FFFFFF">
                            <i class="fas fa-envelope"style="color: #FFFFFF"></i>amer277999@gmail.com</a>
                        </li>
                        <li style="color: #FFFFFF">
                            <a href="callto:123456789" style="color: #FFFFFF"><i class="fas fa-phone-alt" style="color: #FFFFFF"></i> 06123456789</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Tobbar End --}} 

        @include('frontend.layouts.menu');

        </header>

    @yield('content')

    {{-- FOOTER START --}}
        @include('frontend.layouts.footer')
    {{--FOOTER END--}}

    {{-- SCROLL BUTTON START --}}
    <div class="fp__scroll_btn">
        go to top
    </div>
    </div>
    {{--SCROLL BUTTON END--}}
  {{-- jquery library js --}}
    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    {{--bootstrap js--}}
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    {{--font-awesome js--}}
    <script src="{{asset('frontend/js/Font-Awesome.js')}}"></script>
    {{-- slick slider --}}
    <script src="{{asset('frontend/js/slick.min.js')}}"></script>
    {{-- isotop js --}}
    <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
    {{-- simplyCountdownjs --}}
    <script src="{{asset('frontend/js/simplyCountdown.js')}}"></script>
    {{-- counter up js --}}
    <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.countup.min.js')}}"></script>
    {{-- nice select js --}}
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js')}}"></script>
    {{-- venobox js --}}
    <script src="{{asset('frontend/js/venobox.min.js')}}"></script>
    {{-- sticky sidebar js --}}
    <script src="{{asset('frontend/js/sticky_sidebar.js')}}"></script>
    {{-- wow js --}}
    <script src="{{asset('frontend/js/wow.min.js') }}"></script>
    {{-- ex zoom js --}}
    <script src="{{asset('frontend/js/jquery.exzoom.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js "></script>
    {{-- toastre alert CSS --}}
    <script src="{{ asset('frontend/js/toastr.min.js')}}"></script>


    {{--main/custom js--}}
    <script src="{{asset('frontend/js/main.js')}}"></script>

    <script>

        // toastr.options.closeButton = true;

        // if (errors.any()){
        //     errors.all().foreach ( error => {
        //         toastr.error(error);
        //     }) 
        // } 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @include('frontend.layouts.scripts')

    @stack('scripts')
</body>

</html>
