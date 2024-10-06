@extends('admin.layouts.master')
@section('content')

<div class="card card-secondary" style="margin-top: 1%">
    <div class="card-header">
      <h4 style="font-size: 20px">OverOnS</h4>
      <div class="card-header-action">
        <a href="{{route('about.create')}}" class="btn btn-primary">Create</a>
      </div>
    </div>
    <div class="card-body">
        {{$dataTable->table()}}
    </div>
  </div>
@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module'])}}

<script>
    $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
            let inChecked = $(this).is(':checked');
            let id = $(this).data('id');

            $.ajax({
                url: "",
                method:'PUT',
                data:{
                    status: inChecked,
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

