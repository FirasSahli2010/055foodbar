@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Slider</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit-Slider</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sliderHomePage.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf



                                <div class="form-group">
                                    <label style="font-weight: 700">Backgrond</label>
                                    <br>
                                    <img  width="200px" src="{{ asset($slider->banner)}}">

                                    <div class="form-group">
                                        <label style="font-weight: 700">Image</label>
                                        <br>
                                        <img  width="200px" src="{{asset($slider->image)}}">
                                    </div>
                                </div>

                                <div class="row">

                                <div class="form-group">
                                    <label>Backgrond</label>
                                    <input type="file" name="banner" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                </div>








                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type" class="form-control" value="{{$slider->type }}">
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"value="{{$slider->title }}">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="starting_price" class="form-control"value="{{$slider->starting_price }}">
                            </div>

                            <div class="form-group">
                                <label>Button-url</label>
                                <input type="text" name="btn_url" class="form-control"value="{{$slider->btn_url }}">
                            </div>

                            <div class="form-group">
                                <label>Serial</label>
                                <input type="text" name="serial" class="form-control"value="{{$slider->serial }}">
                            </div>

                            <div class="form-group ">
                                <label for="inputState">Status</label>
                                <select id="inputState" name="status" class="form-control">
                                  <option {{ $slider->status == 1 ? 'selected': ''}} value="1">Active</option>
                                  <option {{ $slider->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                                </select>
                              </div>

                           <a href="{{ route('sliderHomePage.index') }}"class="btn btn-dark">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>


    </div>

</section>
@endsection
