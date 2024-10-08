@extends('admin.layouts.master')
@section('content')

<div class="card card-secondary" style="margin-top: 1%">
    <div class="card-header">
        <h4> Product-name: {{$product->name }}(Select-Size)</h4>
      <div class="card-header-action">
        <a href="{{ route('menu-variant-item.create', ['productId'=> $product->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a> </div>
    </div>
    <div class="card-body">
        {{$dataTable->table()}}
    </div>
  </div>
@endsection


@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script>
    $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
            let isChecked = $(this).is(':checked');
            let id = $(this).data('id');

            $.ajax({
                url: "{{route('menu-variant-item.change-status')}}",
                method: 'PUT',
                data: {
                    status: isChecked,
                    id: id
                },
                success: function(data){
                    toastr.success(data.message)
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            })

        })
    })
</script>
@endpush
