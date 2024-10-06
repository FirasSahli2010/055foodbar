
@extends('frontend.layouts.master')
@section('content')
<section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>user dashboard</h1>
                <ul>
                    <li><a href="{{route('home')}}">home</a></li>
                    <li><a href="#">dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="fp__dashboard mt_120 xs_mt_90 mb_100 xs_mb_70">
    <div class="container">
        <div class="fp__dashboard_area">
            <div class="row">
                <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__dashboard_menu">
                        <div class="dasboard_header">
                            <div class="dasboard_header_img">
                                <img src="{{Auth::user()->image}}" alt="img" class="img-fluid w-100">
                                <label for="upload"><i class="far fa-camera"></i></label>
                                {{-- image updated --}}
                                    <form id="image_form">
                                        <input hidden name="image" type="file" id="upload">
                                    </form>

                            </div>
                            <h2>{{Auth::user()->name}}</h2>
                        </div>

                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"

                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true"><span><i class="fas fa-user"></i></span> Parsonal Info</button>
                                {{--  code addrss in profile frontend  --}}
                            <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-address" type="button" role="tab"
                                aria-controls="v-pills-address" aria-selected="true"><span><i
                                        class="fas fa-user"></i></span>address</button>

                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false"><span><i
                                        class="fas fa-bags-shopping"></i></span> Order</button>

                                        <button class="nav-link" id="v-pills-reserveren-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-reserveren" type="button" role="tab"
                                        aria-controls="v-pills-reserveren" aria-selected="false"><span><i
                                                class="fas fa-bags-shopping"></i></span> Reserveren</button>

                            <button class="nav-link" id="v-pills-messages-tab2" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages2" type="button" role="tab"
                                aria-controls="v-pills-messages2" aria-selected="false"><span><i
                                        class="far fa-heart"></i></span> wishlist</button>

                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false"><span><i
                                        class="fas fa-star"></i></span> Reviews</button>

                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings" type="button" role="tab"
                                aria-controls="v-pills-settings" aria-selected="false"><span><i
                                        class="fas fa-user-lock"></i></span> Change Password </button>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                 <button class="nav-link" type="submit"><span> <i class="fas fa-sign-out-alt"></i>
                                </span> Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__dashboard_content">
                        <div class="tab-content" id="v-pills-tabContent">

                           @include('frontend.dashboard.sections.personal-info')

                            @include('frontend.dashboard.sections.adress')

                            @include('frontend.dashboard.sections.order-list')

                            @include('frontend.dashboard.sections.reservation-list')

                            @include('frontend.dashboard.sections.wishlist')

                            @include('frontend.dashboard.sections.review')

                                {{--  profile Update het password  --}}
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab">
                                <div class="fp_dashboard_body fp__change_password">
                                    <div class="fp__review_input">
                                        <h3>change password</h3>
                                        <div class="comment_input pt-0">
                                            <form action="{{route('profile.update.password')}}" method="post" >
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="fp__comment_imput_single">
                                                            <label>Current Password</label>
                                                            <input type="password" placeholder="Current Password" name="current_password">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="fp__comment_imput_single">
                                                            <label>New Password</label>
                                                            <input type="password" placeholder="New Password" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="fp__comment_imput_single">
                                                            <label>confirm Password</label>
                                                            <input type="password" placeholder="Confirm Password" name="password_confirmation">
                                                        </div>
                                                        <button type="submit"
                                                            class="common_btn mt_20">submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CART POPUT START -->
<div class="fp__cart_popup">
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
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#upload').on('change',function(){
          let form = $('#image_form')[0];
          let formData = new FormData(form);

         $.ajax({
            method:'POST',
            url: "{{route('profile.image.update')}}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                if(response.status === 'success'){
                    window.location.reload();
                }
            },
            error: function(error){
                console.log(error);
            }

         })
        })
    })
</script>

@endpush
