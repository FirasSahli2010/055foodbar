@extends('frontend.layouts.master')
@section('content')
    {{--=
                BREADCRUMB START
            --}}
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>checkout</h1>
                    <ul>
                        <li><a href="url('/')">home</a></li>
                        <li><a href="javascripts:;">checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    {{--
                BREADCRUMB END
            --}}


    {{--
                CHECK OUT PAGE START
            --}}
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
    <form action="{{ route('address.store') }}" method="POST">
                                                        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__checkout_form">
                        <div class="fp__check_form">
                            <h5>select address <a href="#" data-bs-toggle="modal" data-bs-target="#address_modal"><i
                                        class="far fa-plus"></i> add address</a></h5>

                            {{-- add-adress --}}
                            <div class="fp__address_modal">
                                <div class="modal fade" id="address_modal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="address_modalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="address_modalLabel">add new address
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="fp_dashboard_new_address d-block ">
                                                    
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4>add new address</h4>
                                                            </div>

                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form">
                                                                    <select id="select_js3" name="area_name">
                                                                        <option value="">select-Stad</option>
                                                                        @foreach ($deliveryAreas as $area)
                                                                            <option value="{{ $area->id }}">
                                                                                {{ $area->area_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="First Name"
                                                                        name="first_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Last Name"
                                                                        name="last_name">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="phone"
                                                                        name="phone">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Email"
                                                                        name="email">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form">
                                                                    <textarea cols="3" rows="4" name="address" placeholder="Address"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="fp__check_single_form check_area">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" id="flexRadioDefault1"
                                                                            value="home">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            home
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" id="flexRadioDefault2"
                                                                            value="office">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
                                                                            office
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="display: flex">
                                                                <button style="width: 200px" type="button"
                                                                    class="common_btn cancel_new_address ml-3">cancel</button>
                                                                <button style="width: 200px" type="submit"
                                                                    class="common_btn ml-3">save
                                                                    address</button>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End adress --}}
                            <div class="row">
                                @foreach ($userAddresses as $item)
                                    <div class="col-md-6">
                                        <div class="fp__checkout_single_address">
                                            <div class="form-check">
                                                <input class="form-check-input v_address" value="{{ $item->id }}"
                                                    type="radio" name="flexRadioDefault" id="home">
                                                <label class="form-check-label" for="home">
                                                    <span class="icon">
                                                        @if ($item->type === 'home')
                                                            <i class="fas fa-home"></i>
                                                        @else
                                                            <i class="far fa-car-building"></i>
                                                        @endif

                                                    </span>
                                                    <span
                                                        class="address">{{ $item->address }},{{ $item->deliveryArea?->area_name }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div id="sticky_sidebar" class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="subtotal">{{ $settings->currency_icon }} {{ cartTotal() }}</span></p>
                        <p>delivery: <span id="delivery_fee">$00.00</span></p>

                        <p style="font-weight: 800">Discount: <span id="discount">
                                @if (isset(session()->get('coupon')['discount']))
                                    {{ $settings->currency_icon }} {{ session()->get('coupon')['discount'] }}
                                @else
                                    {{ $settings->currency_icon }}0
                                @endif
                            </span></p>

                        <p class="total"><span>Total:</span> <span id="grand_total">{{ $settings->currency_icon }}
                                {{ grandCartTotal() }}
                            </span></p>


                        <a class="common_btn" id="procced_pmt_button" href=" #">Proceed to Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section>
    {{--
                CHECK OUT PAGE END
            --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.v_address').prop('checked', false);

            $('.v_address').on('click', function() {
                let addressId = $(this).val();
                let deliveryFee = $('#delivery_fee');
                let grandTotal = $('#grand_total');
                $.ajax({

                    method: 'GET',
                    url: '{{ route('cheakout.delivery-cal', ':id') }}'.replace(":id", addressId),
                    beforeSend: function() {

                    },
                    success: function(response) {
                        deliveryFee.text("{{ $settings->currency_icon }}" + ":amount"
                            .replace(":amount", response.delivery_fee.toFixed(2)));

                        grandTotal.text("{{ $settings->currency_icon }}" + ':amount'
                            .replace(":amount", response.grand_total.toFixed(2)));
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.success(errorMessage);
                    },
                    complete: function() {

                    }
                })
            })


            $('#procced_pmt_button').on('click', function(e){
                e.preventDefault();
                let address = $('.v_address:checked');
                let id = address.val();
                 if(address.length === 0){
                    toastr.error('Please Select a Address');
                    return;
                 }
                $.ajax({
                    method: 'Post',
                    url: '{{route("checkout.redirect")}}',
                    data: {
                    id: id
                    },
                    beforeSend: function(){
                        showloader()
                    },

                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.success(errorMessage);
                    },
                    complete: function() {

                    }
                })
            })



        })
    </script>
@endpush
