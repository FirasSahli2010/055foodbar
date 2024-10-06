@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1 style="color: rgb(227, 183, 111)"> Update-product-Size </h1>

    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('menu-option-item.update',$variantItemId->id)}} method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="product_id" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label>Size</label>
                                <input type="text" name="name" class="form-control" value="{{$variantItemId->name}}">
                            </div>


                            <div class="form-group">
                                <label>Pricec <code>(set 0 for make it free)</code></label>
                                <input type="text" name="price" class="form-control" value="{{$settings->currency_icon }} {{$variantItemId->price}}">
                            </div>

                            <div class="form-group">
                                <label for="inputState">Is Defult</label>
                                <select id="inputState" name="is_default" class="form-control">
                                    <option {{$variantItemId->is_default == 1 ? 'selected': ''}} value="1">Yes</option>
                                    <option {{$variantItemId->is_default == 0 ? 'selected': ''}} value="0">No</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="inputState">Status</label>
                                <select id="inputState" name="status" class="form-control">
                                    <option {{ $variantItemId->status == 1 ? 'selected': '' }} value="1">Active</option>
                                    <option {{ $variantItemId->status == 0 ? 'selected': '' }} value="0">Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href=""class="btn btn-dark">Back</a>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>


@endsection
