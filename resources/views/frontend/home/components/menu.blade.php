@extends('frontend.layouts.master')

@section('content')

<section class="fp__menu mt_95 xs_mt_45 mb_100 xs_mb_70">
    <div class="container"style="margin-top: 5%">
        <div class="row" >
            @foreach ($products as $product)
            <div class="col-xl-3 col-sm-6 col-lg-4 burger pizza wow fadeInUp" data-wow-duration="1s">
                <div class="fp__menu_item">
                    <div class="fp__menu_item_img">
                        <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}">
                        <a class="category" href="#">{{@$product->category->name }}</a>
                    </div>
                    <div class="fp__menu_item_text">

                        <a class="title" href="{{route('product-detail', $product->slug) }}">{{ $product->name }}</a>

                        <h5 class="price">
                            @if (checkDiscount($product))
                            {{ $settings->currency_icon }} {{ $product->offer_price }}
                            <del>{{ $settings->currency_icon }} {{ $product->price }}</del>
                            @else
                            {{ $settings->currency_icon }} {{ $product->price }}
                            @endif
                        </h5>

                        <ul class="d-flex flex-wrap justify-content-center">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                        class="fas fa-shopping-basket"></i></a></li>
                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <div class="fp__pagination mt_35">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


{{--  <div class="fp__cart_popup">
    <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fal fa-times"></i></button>
                    <div class="fp__cart_popup_img">
                        <img src="images/menu1.png" alt="menu" class="img-fluid w-100">
                    </div>
                    <div class="fp__cart_popup_text">
                        <a href="#" class="title">Maxican Pizza Test Better</a>
                        <p class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(201)</span>
                        </p>
                        <h4 class="price">$320.00 <del>$350.00</del> </h4>

                        <div class="details_size">
                            <h5>select size</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="large"
                                    checked>
                                <label class="form-check-label" for="large">
                                    large <span>+ $350</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="medium">
                                <label class="form-check-label" for="medium">
                                    medium <span>+ $250</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="small">
                                <label class="form-check-label" for="small">
                                    small <span>+ $150</span>
                                </label>
                            </div>
                        </div>

                        <div class="details_extra_item">
                            <h5>select option <span>(optional)</span></h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="coca-cola">
                                <label class="form-check-label" for="coca-cola">
                                    coca-cola <span>+ $10</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="7up">
                                <label class="form-check-label" for="7up">
                                    7up <span>+ $15</span>
                                </label>
                            </div>
                        </div>

                        <div class="details_quentity">
                            <h5>select quentity</h5>
                            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                <div class="quentity_btn">
                                    <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                                    <input type="text" placeholder="1">
                                    <button class="btn btn-success"><i class="fal fa-plus"></i></button>
                                </div>
                                <h3>$320.00</h3>
                            </div>
                        </div>
                        <ul class="details_button_area d-flex flex-wrap">
                            <li><a class="common_btn" href="#">add to cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
</section>
@endsection
