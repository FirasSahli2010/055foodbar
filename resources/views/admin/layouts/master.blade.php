<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{csrf_token()}}"/>
  <title>General Dashboard</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/modules/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/modules/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">

  <!-- DatatBELS -->
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">

  <!-- toastre alert CSS -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!--sweet Alert-->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css" rel="stylesheet">

  {{--  icons picker  --}}
  <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.min.css') }}">
<!-- Start GA -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      /*Sidebar+ nav**/
      @include('admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
       @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://Slimme-pc.nl/">Slimme-pc</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('admin/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/popper.js')}}"></script>
  <script src="{{asset('admin/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>

  <script src="{{asset('admin/assets/js/stisla.js')}}"></script>
  <!-- DataTabels  -->
  <script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
  {{--  tOASTER ALERT  --}}
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- DatatBELS -->
  <!-- Page Specific JS File -->

  <script src="{{asset('admin/assets/js/page/index-0.js')}}"></script>
  <!---sweet Alert--->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js "></script>

{{--  icon pinker  --}}
<script src="{{asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{asset('admin/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{asset('admin/assets/js/scripts.js')}}"></script>
  <script src="{{asset('admin/assets/js/custom.js')}}"></script>


<script>
    $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete-item', function(event){
                event.preventDefault();

                let deleteUrl = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                     }).then((result) =>{
                    if(result.isConfirmed){
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,
                            success: function(data){
                                if(data.status == 'success'){
                                  Swal.fire(
                                   'Deleted!',
                                   data.message,
                                  'success'
                                )
                                window.location.reload();
                                }else if(data.status == 'error'){
                                  Swal.fire(
                                   'cant delete!',
                                   data.message,
                                  'error'
                                  )
                                }
                            },
                            error: function(xhr, status, error){
                             console.log(error);
                            }

                        })

                    }
                })
            })
        })
  </script>

@stack('scripts')



</body>
</html>

