@extends('admin.layouts.master')

@section('content')

<div class="section-body" style="margin-top: 1%">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update-Reservation</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('reservation-time.update', $time->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Start-time</label>
                            <input type="text" name="start_time" class="form-control timepicker" value="{{ $time->start_time}}">
                        </div>

                        <div class="form-group">
                            <label>End-time</label>
                            <input type="text" name="end_time" class="form-control timepicker" value="{{ $time->end_time}}">
                        </div>


                        <div class="form-group ">
                            <label for="inputState">Status</label>
                            <select id="inputState" name="status" class="form-control">
                                <option {{$time->status == 1 ? 'selected': ''}} value="1">Active</option>
                                <option {{$time->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                            </select>
                          </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('reservation-time.index')}}"class="btn btn-dark">Back</a>
                    </form>
                </div>

            </div>
        </div>

    </div>


</div>

@endsection

