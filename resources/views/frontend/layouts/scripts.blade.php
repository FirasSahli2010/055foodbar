<script>
    /*showLoader*/
    function showloader() {
        $('.overlay-container').removeClass('d-none');
        $('.overlay').addClass('active');
    }


    /**Hide loader**/
    function hideLoader() {
        $('.overlay').removeClass('active');
        $('.overlay-container').addClass('d-none');
    }



    {{--  alert sweetdelete frontend  --}}
    $('body').on('click', '.delete-item', function(event) {
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
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: deleteUrl,
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire(
                                'Deleted!',
                                data.message,
                                'success'
                            )
                            window.location.reload();
                        } else if (data.status == 'error') {
                            Swal.fire(
                                'cant delete!',
                                data.message,
                                'error'
                            )
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }

                })

            }
        })
    })

    /*** load product pop model**/
    function loadProductModel(productId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('load-product-modal', ':productId') }}'.replace(':productId', productId),
            beforeSend: function() {
                $('.overlay-container').removeClass('d-none');
                $('.overlay').addClass('active');
            },
            success: function(response) {
                $(".load_product_model_body").html(response);
                $('#cartModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                $('.overlay').removeClass('active');
                $('.overlay-container').addClass('d-none');
            }
        })
    }

    /*** update sidebar product pop model**/

    function updateSidebarCart(callback = null) {
        $.ajax({
            method: 'GET',
            url: '{{ route('get-cart-products') }}',
            success: function(response) {
                $('.cart_contents').html(response);
                let cartTotal = $('#cart_total').val();
                let cartCount = $('#cart_product_count').val();
                $('.cart_subtotal').text(" {{ $settings->currency_icon }} {{ ':cartTotal' }}".replace(
                    ':cartTotal', cartTotal));
                $('.cart_count').text(cartCount);
                if (callback && typeof callback === 'function') {
                    callback();
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
        })
    }

    {{--  remove sidebarproduct  --}}

    function removeProductFromSidebar($rowId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('cart-product-remove', ':rowId') }}'.replace(":rowId", $rowId),
            beforeSend: function() {
                $('.overlay-container').removeClass('d-none');
                $('.overlay').addClass('active');
            },

            success: function(responce) {
                if (responce.status === 'success') {
                    updateSidebarCart(function() {
                        toastr.success(responce.message);
                        $('.overlay').removeClass('active');
                        $('.overlay-container').addClass('d-none');
                    })
                }
            },
            error: function(xhr, status, error) {
                let errorMessage = xhr.responseJSON.message;
                toastr.error(errorMessage);
            },
            complete: function() {}

        })
    }
    {{--  get current cart total amount  في الصفجه النهائيه --}}

    function getCartTotal() {
        return parseInt("{{ cartTotal() }}");
    }
</script>
