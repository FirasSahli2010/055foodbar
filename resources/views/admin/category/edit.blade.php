@extends('admin.layouts.master')

@section('content')

<div class="section-body" style="margin-top: 1%">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create-Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update',$category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}">
                        </div>

                        <div class="form-group ">
                            <label for="inputState">Status</label>
                            <select id="inputState" name="status" class="form-control">
                                <option {{ $category->status == 1 ? 'selected': ''}} value="1">Active</option>
                                <option {{ $category->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

            </div>
        </div>

    </div>


</div>

@endsection
