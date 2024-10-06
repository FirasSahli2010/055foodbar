@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1 style="color: rgb(227, 183, 111)">Create-coupons</h1>

    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('coupon.store')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label>Max gebruik per person </label>
                                <input type="text" name="max_use" class="form-control" value="">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>start_date</label>
                                    <input type="date" name="start_date" class="form-control"
                                        value="{{old('start_date')}}">
                                </div>

                                <div class="col-md-6">
                                    <label>End-date</label>
                                    <input type="date" name="end_date" class="form-control" value="{{old('end_date')}}">
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="inputState">Discount-Type</label>
                                <select id="inputState" class="form-control sub-category" name="discount_type">
                                    <option value="percent">Percentage (%)</option>
                                    <option value="amount">Amount (€)</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Discount_value</label>
                                <input type="text" name="discount" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="inputState">Status</label>
                        <select id="inputState" name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
    </div>

</section>
@endsection
