@extends('admin.layouts.master')

@section('content')

<div class="section-body" style="margin-top: 1%">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create-Slider</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('sliderHomePage.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label>Achtergrond</label>
                                <input type="file" name="banner" class="form-control">
                            </div>

                            <div class="col-6">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" value="{{old('type')}}">
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"value="{{old('title')}}">
                        </div>

                        <div class="form-group">
                            <label>Prijs</label>
                            <input type="text" name="starting_price" class="form-control"value="{{old('starting_price')}}">
                        </div>

                        <div class="form-group">
                            <label>Button-url</label>
                            <input type="text" name="btn_url" class="form-control"value="{{ old('btn_url')}}">
                        </div>

                        <div class="form-group">
                            <label>Serial</label>
                            <input type="text" name="serial" class="form-control"value="{{ old('serial')}}">
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

@endsection
