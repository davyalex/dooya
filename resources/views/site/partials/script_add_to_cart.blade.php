
<script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}"></script>
<script>

    $('.addCart').click(function (e) { 

        e.preventDefault();

        var getId =   e.target.dataset.id;
        $.ajax({
            type: "GET",
            url: "/add-to-cart/" + getId,
            data: getId,
            dataType: "json",
            success: function (response) {
                console.log(response);
              $('.total-pro').html(response.countCart)
              $('.pro-quantity').html(response.qte)
              $('.cart-price').html(response.price)
              $('.get-total').html(response.total)
              $('.img-cart').html('<img  src="'+response.image+ '">')
              Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Produit ajouter avec succès',
                            animation: false,
                            position: 'top-right',
                            background:'#3da108',
                            iconColor:'#fff',
                            color:'#fff',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        });

            }
        });
    });
   
</script>