@extends('frontend.layouts.master')
@section('content')
    <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>sign in</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('login') }}">sign in</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="fp__signin" style="background: url({{ asset('frontend/images/login_bg.jpg') }});">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Welcome back!</h2>
                            <p>sign in to continue</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Email</label>
                                            <input id="email" type="email" name="email" :value="old('email')"
                                                placeholder="Email">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Wachtwoord</label>
                                            <input type="password" id="password" name="password" placeholder="Wachtwoord"
                                                value="__('Password')">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput fp__login_check_area">
                                            <div class="form-check">
                                                <input class="form-check-input" name="remember" type="checkbox"
                                                    value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remeber Me
                                                </label>
                                            </div>
                                            <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="or"><span>or</span></p>

                            <p class="create_account">Dont’t have an aceount ? <a href="{{ route('register') }}">Create
                                    Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



<!--=========================
    SIGNIN END
==========================-->
