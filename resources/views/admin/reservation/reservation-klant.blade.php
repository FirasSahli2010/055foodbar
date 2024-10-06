@extends('admin.layouts.master')

@section('content')

<div class="card card-secondary" style="margin-top: 1%">
    <div class="card-header">
      <h4>Klant Reserveren</h4>
      <div class="card-header-action">
        <a href="" class="btn btn-primary">Create</a>
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
        $('body').on('change', '.reservation_status', function(){
            let status = $(this).val();
            let id = $(this).data('id');
            $.ajax({
                url: '{{route("reservation.update")}}',
                method: 'POST',
                data: {
                  _token: "{{csrf_token()}}",
                  status: status,
                  id: id
                },
                success: function(response){
                    toastr.success(response.message);
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            })

        })
    })
</script>
@endpush
