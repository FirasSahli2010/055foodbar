@extends('admin.layouts.master')
@section('content')

<div class="card card-secondary" style="margin-top: 1%">
    <div class="card-header">
      <h4>Alle_Bestellen</h4>

    </div>
    <div class="card-body">
        {{$dataTable->table()}}
    </div>
  </div>
@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
