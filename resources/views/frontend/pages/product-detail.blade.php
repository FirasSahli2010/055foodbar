@extends('frontend.layouts.master')
@section('content')
==============================-->
<section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>menu Details</h1>
                <ul>
                    <li><a href="url('/')">home</a></li>
                    <li><a href="javascripts:;">menu Details</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============================
                BREADCRUMB END
            ==============================-->


<!--=============================
                MENU DETAILS START
            ==============================-->
<section class="fp__menu_details mt_115 xs_mt_85 mb_95 xs_mb_65">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-9 wow fadeInUp" data-wow-duration="1s">
                <div class="exzoom hidden" id="exzoom">
                    <div class="exzoom_img_box fp__menu_details_images">
                        <ul class='exzoom_img_ul'>
                            <li><img class="zoom ing-fluid w-100" src="{{ asset($product->thumb_image) }}"
                                    alt="product">
                            </li>
                            @foreach ($product->ProductImageGalleries as $productImage)
                            <li><img class="zoom ing-fluid w-100" src="{{ asset($productImage->image) }}" alt="product">
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="exzoom_nav"></div>
                    <p class="exzoom_btn">
                        <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i>
                        </a>
                        <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__menu_details_text">
                    <h2>{{ $product->name }}</h2>
                    <p class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <span>(201)</span>
                    </p>

                    <h4 class="price">
                        @if ($product->offer_price > 0)
                        {{ $settings->currency_icon }} {{ $product->offer_price }}

                        <del>{{ $settings->currency_icon }} {{ $product->price }}</del></del>
                        @else
                        {{ $settings->currency_icon }} {{ $product->price }}
                        @endif
                    </h4>

                    <p class="short_description">{!! $product->short_description !!} </p>


                    {{-- begin form cart --}}
                    <form action="" id="v_add_to_cart_form">
                        @csrf
                        <input type="hidden" name="base_price" class="v_base_price"
                            value="{{$product->offer_price > 0 ? $product->offer_price : $product->price }}">

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        {{-- Select-size --}}
                        @if ($product->productsize()->exists())
                        <div class="details_size">
                            <h5>Select-Size</h5>
                            @foreach ($product->productsize as $productSize)
                            <div class="form-check">
                                <input class="form-check-input v_product_size" type="radio" name="product_size"
                                    id="size-{{ $productSize->id }}" data-price="{{ $productSize->price }}"
                                    value="{{ $productSize->id }}">


                                <label class="form-check-label" for="size-{{ $productSize->id }}">
                                    {{ $productSize->name }} <span>+
                                        {{ $settings->currency_icon }} {{ $productSize->price }}</span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        {{-- Select-option --}}
                        <div class="details_extra_item">
                            <h5>Select option <span>(Optional)</span></h5>
                            @foreach ($product->productoption as $item)
                            <div class="form-check">
                                <input class="form-check-input v_product_option" type="checkbox" value="{{ $item->id }}"
                                    id="{{ $item->id }}" name="product_option[]" data-price="{{ $item->price }}">

                                <label class="form-check-label" for="{{ $item->id }}">
                                    {{ $item->name }} <span>+ {{ $item->price }}</span>
                                </label>
                            </div>
                            @endforeach
                        </div>

                        {{-- Hier begin code plus en min datials pagina + qty class --}}
                        <div class="details_quentity">
                            <h5>Aantal</h5>
                            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                <div class="quentity_btn">
                                    <button class="btn btn-danger v_decrement"><i class="fal fa-minus"></i></button>
                                    <input type="text" id="v_quantity" placeholder="1" name="qty" value="1" readonly>
                                    <button class="btn btn-success v_increment"><i class="fal fa-plus"></i></button>
                                </div>
                                <h3 id="v_total_price">
                                    {{ $settings->currency_icon }}{{ $product->offer_price > 0 ? $product->offer_price :
                                    $product->price }}
                                </h3>


                            </div>
                        </div>
                    </form>

                    <ul class="details_button_area d-flex flex-wrap">
                        @if ($product->qty === 0)
                        <li><a class="common_btn bg-danger" href="javascript:;">Stock Out</a></li>
                        @else
                        <li><button type="submit" class="common_btn v_submit_button" href="#">add to cart</button></li>
                        @endif
                        <li><a class="wishlist" href="#"><i class="far fa-heart"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__menu_description_area mt_100 xs_mt_70">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        {{-- {{ Relateid Items المنتجاتا الشبيهه}} --}}
        @if (count($relatedProducts) > 0)
        <div class="fp__related_menu mt_90 xs_mt_60">
            <h2>related item</h2>
            <div class="row related_product_slider">
                @foreach ($relatedProducts as $relatedProduct)
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_item">
                        <div class="fp__menu_item_img">
                            <img src="{{ asset($relatedProduct->thumb_image) }}" alt="{{ $relatedProduct->name }}"
                                class="img-fluid w-100">
                            <a class="category" href="#">{{ @$relatedProduct->category->name }}</a>
                        </div>
                        <div class="fp__menu_item_text">
                            <p class="rating">
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <span></span>
                            </p>

                            </p>
                            <a class="title" href="{{route('product-detail', $relatedProduct->slug)}}">{!!
                                $relatedProduct->name !!}</a>
                            <h5 class="price">
                                @if ($relatedProduct->offer_price > 0)
                                {{ $settings->currency_icon }} {{ $relatedProduct->offer_price }}
                                <del> {{$settings->currency_icon}}{{$relatedProduct->price}}</del>
                                @else
                                {{ $settings->currency_icon }} {{ $relatedProduct->price }}
                                @endif
                            </h5>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="javascript:;" onclick="loadProductModel('{{ $relatedProduct->id }}')"><i class="fas fa-shopping-basket"></i></a></li>

                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="#"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
</section>






@endsection

@push('scripts')
<script>
    $(document).ready(function() {

                    $('.v_product_size').prop('checked', false);
                    $('.v_product_option').prop('checked', false);
                    $('#v_quantity').val(1);


                    $('.v_product_size').on('change', function() {
                        v_updateTotalPrice()
                    });

                    $('.v_product_option').on('change', function() {
                        v_updateTotalPrice()
                    });

                    // Event handlers for increment and decrement buttons

                    $('.v_increment').on('click', function(e) {
                        e.preventDefault()

                        let qty = $('#v_quantity');
                        let currentQuantity = parseFloat(qty.val());
                        qty.val(currentQuantity + 1);
                        v_updateTotalPrice()
                    })

                    $('.v_decrement').on('click', function(e) {
                        e.preventDefault();
                        let qty = $('#v_quantity');
                        let currentQuantity = parseFloat(qty.val());
                        if (currentQuantity > 1) {
                            qty.val(currentQuantity - 1);
                            v_updateTotalPrice()
                        }
                    })

                    // Function to update the total price base on seelected options

                    function v_updateTotalPrice() {
                        let basePrice = parseFloat($('.v_base_price').val());
                        let selectedSizePrice = 0;
                        let selectedOptionsPrice = 0;
                        let qty = parseFloat($('#v_quantity').val());

                        // Calculate the selected size price
                        let selectedSize = $('.v_product_size:checked');
                        if (selectedSize.length > 0) {
                            selectedSizePrice = parseFloat(selectedSize.data("price"));
                        }


                        // Calculate selected options price
                        let selectedOptions = $('.v_product_option:checked');
                        $(selectedOptions).each(function() {
                            selectedOptionsPrice += parseFloat($(this).data("price"));
                        })


                        // Calculate the total price // العمليه الحسابيه في البوب
                        let totalPrice = (basePrice + selectedSizePrice + selectedOptionsPrice) * qty;
                        $('#v_total_price').text("{{ $settings->currency_icon }}" + totalPrice);

                    }

                    $('.v_submit_button').on('click', function(e) {
                        e.preventDefault();
                        $("#v_add_to_cart_form").submit();
                    })


                    // Add to cart function
                    $('#v_add_to_cart_form').on('submit', function(e) {
                        e.preventDefault();

                        let selectedSize = $(".v_product_size");
                        if (selectedSize.length > 0) {
                            if ($(".v_product_size:checked").val() === undefined) {
                                toastr.error('Please select a size');
                                console.error('Please select a size');
                                return;
                            }
                        }
                        let formData = $(this).serialize();
                        $.ajax({
                            method: 'POST',
                            url: '{{route("add-to-cart")}}',
                            data: formData,
                            beforeSend: function() {
                                $('.v_submit_button').attr('disabled', true);
                                $('.v_submit_button').html(
                                    '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> Loading...'
                                    )
                            },
                            success: function(response) {
                                updateSidebarCart();
                                toastr.success(response.message);
                            },

                            error: function(xhr, status, error) {
                                let errorMessage = xhr.responseJSON.message;
                                toastr.error(errorMessage);
                            },
                            complete: function() {
                                $('.v_submit_button').html('Add to Cart');
                                $('.v_submit_button').attr('disabled', false);
                            }

                        })
                    });

                })
</script>
@endpush
