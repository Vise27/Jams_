$(document).ready(function() {
    $('.add-to-cart').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');
        $.ajax({
            url: '{{ route('cart.add', '') }}/' + productId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Actualizar el contador de ítems en el carrito
                $('#cart-item-count').text(response.cartItemCount);
                alert('Producto agregado al carrito exitosamente!');
            },
            error: function(xhr) {
                alert('Error al agregar el producto al carrito.');
            }
        });
    });
});