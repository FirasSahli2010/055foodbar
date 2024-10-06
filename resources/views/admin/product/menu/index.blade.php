@extends('admin.layouts.master')

@section('content')

<div class="card card-secondary" style="margin-top: 1%">
    <div class="card-header">
      <h4>Page-menu-products</h4>
      <div class="card-header-action">
        <a href="{{route('menupage.create')}}" class="btn btn-primary">Create</a>
      </div>
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
                url: "{{route('menu.change-status')}}",
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
