@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>All-Product</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create-Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Product-Image</label>
                                    <input type="file" name="thumb_image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="inputState">category</label>
                                            <select id="inputState" name="category"
                                                class="form-control main-category">
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" value="{{old('price')}}">
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <label>offer_start_date</label>
                                        <input type="date" name="offer_start_date" class="form-control" value="{{ old('offer_start_date') }}">
                                      </div>


                                      <div class="col-md-6">
                                        <label>offer_End_date</label>
                                        <input type="date" name="offer_end_date" class="form-control"value="{{old('offer_end_date')}}">
                                      </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>offer Price</label>
                                    <input type="text" name="offer_price" class="form-control"
                                        value="{{ old('offer_price') }}">
                                </div>

                                <div class="form-group">
                                    <label>Short description</label>
                                    <textarea name="short_description" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Long_description</label>
                                    <textarea name="long_description" class="form-control summernote"></textarea>
                                </div>


                                <div class="form-group">
                                    <label>SkU</label>
                                    <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
                                </div>

                                <div class="form-group">
                                    <label>Seo Title</label>
                                    <input type="text" name="seo_title" class="form-control"
                                        value="{{ old('seo_title')}}">
                                </div>

                                <div class="form-group">
                                    <label>Seo Description</label>
                                    <textarea name="seo_description" class="form-control"></textarea>
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
