@extends('admin.layouts.master')

@section('content')

<div class="section-body" style="margin-top: 1%">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create-Reservation</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('reservation-time.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Start-time</label>
                            <input type="text" name="start_time" class="form-control timepicker" value="">
                        </div>

                        <div class="form-group">
                            <label>End-time</label>
                            <input type="text" name="end_time" class="form-control timepicker" value="">
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
