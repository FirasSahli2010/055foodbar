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
                    <form action="{{route('about.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Icon</label>
                            <div>
                                <button class="btn btn-primary"data-selected-class="btn-danger"
                                data-unselected-class="btn btn-primary" name="icon" role="iconpicker"data-icon="{{$about->icon}}"></button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" value="{{ $about->type }}">
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{$about->title}}">
                        </div>

                        <div class="form-group ">
                            <label for="inputState">Status</label>

                            <select id="inputState"name="status" class="form-control">
                                <option {{$about->status == 1 ? 'selected': ''}} value="1">Active</option>
                                <option {{$about->status == 0 ? 'selected': ''}} value="0">Inactive</option>
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
