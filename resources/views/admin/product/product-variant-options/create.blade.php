@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1 style="color: rgb(227, 183, 111)"> Create-Options Product</h1>

    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('products-option-item.store')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label> product-Name</label>
                                <input type="text" name="product_name" class="form-control" value="{{ $product->name}}">
                            </div>


                            <div class="form-group">
                                <input type="hidden" name="product_id" class="form-control" value="{{$product->id}}">
                            </div>



                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="">
                            </div>


                            <div class="form-group">
                                <label>Price <code>(set 0 for make it free)</code></label>
                                <input type="text" name="price" class="form-control" value="">
                            </div>

                            <div class="form-group ">
                                <label for="inputState">Is Defult</label>
                                <select id="inputState" name="is_default" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>


                            <div class="form-group ">
                                <label for="inputState">Status</label>
                                <select id="inputState" name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{route('product-option-item.index',['productId'=> $product->id])}}"class="btn btn-dark">Back</a>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>


@endsection
