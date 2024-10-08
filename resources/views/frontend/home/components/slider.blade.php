<section class="fp__banner" style="background: url(frontend/images/banner2_img_2.jpg);">

    <div class="fp__banner_overlay">
        <div class="row banner_slider">
            @foreach ($slider as $item)
            <div class="col-12">
                <div class="fp__banner_slider">
                    <div class=" container">


                        <div class="row">
                            <div class="col-xl-5 col-md-5 col-lg-5">
                                <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                    <div class="img">
                                        <img src="{{$item->image}}" alt="food item" class="img-fluid w-100">
                                        <span> {{$item->starting_price }}&euro; </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-7 col-lg-6">
                                <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                    <h1>{{$item->type}}</h1>
                                    <h3>Bezorg & Afhalen</h3>
                                    <p>{{$item->title}}</p>
                                    <ul class="d-flex flex-wrap">
                                        <li><a class="common_btn" href="{{$item->btn_url}}">Bestelen</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!--=============================
    BANNER END
==============================-->
