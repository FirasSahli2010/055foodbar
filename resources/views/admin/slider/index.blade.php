@extends('admin.layouts.master')
@section('content')

<div class="card card-secondary" style="margin-top: 1%">
    <div class="card-header">
      <h4>Slider-Homepage</h4>
      <div class="card-header-action">
        <a href="{{route('sliderHomePage.create')}}" class="btn btn-primary">Create</a>
      </div>
    </div>
    <div class="card-body">
        {{$dataTable->table()}}
    </div>
  </div>
@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpus
