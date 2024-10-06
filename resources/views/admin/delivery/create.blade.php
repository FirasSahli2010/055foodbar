@extends('admin.layouts.master')

@section('content')
    <div class="section-body" style="margin-top: 1%">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create-Delivery</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('delivery.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Name-stad</label>
                                <input type="text" name="area_name" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Min_delivery_time</label>
                                        <input type="text" name="min_delivery_time" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Max_delivery_time</label>
                                        <input type="text" name="max_delivery_time" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>delivery_fee</label>
                                        <input type="text" name="delivery_fee" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="inputState">Status</label>
                                        <select id="inputState"name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>


    </div>
@endsection
