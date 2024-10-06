@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1 style="color: rgb(227, 183, 111)">Edit-coupons</h1>

    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('coupon.update', $coupon->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$coupon->name}}">
                            </div>

                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control" value="{{$coupon->code}}">
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" value="{{$coupon->quantity}}">
                            </div>



                            <div class="form-group">
                                <label>Max gebruik per person </label>
                                <input type="text" name="max_use" class="form-control" value="{{$coupon->max_use}}">
                            </div>

                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>start date </label>
                                        <input type="text" name="start_date" class="form-control datepicker" value="{{$coupon->start_date}}">
                                    </div>
                                </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End-date </label>
                                        <input type="text" name="end_date" class="form-control datepicker" value="{{$coupon->end_date}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="inputState">Discount-Type</label>
                                        <select id="inputState" class="form-control sub-category" name="discount_type">
                                            <option {{$coupon->discount_type == 'percent' ? 'selected': ''}} value="percent">Percentage (%)</option>
                                            <option {{$coupon->discount_type == 'amount' ? 'selected': ''}} value="amount">Amount (€)</option>
                                            // هي تابعه  لاعدات السيتنغ تبع الموقع لي عملناه بالسيرفر بروفايدر
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-8">

                            <div class="form-group">
                                <label>Discount_value</label>
                                <input type="text" name="discount" class="form-control" value="{{$coupon->discount}}">
                            </div>
                                </div>
                            </div>


                            <div class="form-group ">
                                <label for="inputState">Status</label>
                                <select id="inputState" name="status" class="form-control">
                                    <option {{$coupon->status == 1 ? 'selected': ''}} value="1">Active</option>
                                    <option {{$coupon->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>

@endsection
