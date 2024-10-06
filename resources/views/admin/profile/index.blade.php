@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Adnin-Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    <div class="section-body">


        <div class="row mt-sm-4">

            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form action="{{ route('admin.profile.update')}}" method="post" class="needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Update Admin Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col col-12">
                                    <div class="mb-3">
                                        <img width="200px" src="{{asset(Auth::user()->image)}}" alt="">
                                    </div>
                                    <label> Upload-photo</label>
                                    <input type="file" name="image" class="form-control">
                                </div>




                                <div class="form-group col-md-6 col-12">
                                    <label> Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"
                                     required="">

                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control"
                                        value="{{ Auth::user()->email }}" required="">

                                </div>
                            </div>



                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>



        {{--  update password profile  --}}
            <div class="col-12 col-md-12 col-lg-7">

                <div class="card">
                    <form action="{{route('admin.password.update')}}" method="post" class="needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-12">
                                    <label> Current Password</label>
                                    <input type="password" name="current_password" class="form-control" required="">
                                </div>

                                <div class="form-group col-12">
                                    <label> New-password</label>
                                    <input type="password" name="password" class="form-control" required="">

                                </div>

                                <div class="form-group col-12">
                                    <label>Conforim Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        required="">

                                </div>


                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
