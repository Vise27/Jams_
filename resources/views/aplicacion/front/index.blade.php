<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jams</title>
    <link rel="icon" href="{{ asset('assets/front/img/jams.jpg') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/catalogo.css') }}">
    @include('aplicacion/front.links')
    
        

    

</head>
<body>
  
    @include('layouts.header')
    @include('aplicacion/front.banner1')


    <section class="container py-5">
        
        <div class="row">
            @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-3 mt-3 text-center product-card">
                <a href="#" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                    <img class="img-fluid rounded" src="{{ asset('crud/images/' . $product->image) }}" alt="{{ $product->name }}">
                </a>
                <div class="row mt-2">
                    <div class="col text-start">
                        <h4 class="product-name">{{ $product->name }}</h4>
                    </div>
                    <div class="col text-end">
                        <h4 class="product-price">{{ $product->price }}</h4>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col text-center">
                        <a class="btn btn-success add-to-cart" href="#" data-product-id="{{ $product->id }}">
                            <i class="fas fa-shopping-cart"></i> Comprar
                        </a>
                    </div>
                </div>
            </div>
            
            
            <!-- Modal para detalles del producto -->
            @include('layouts.mostrar_detalles')
            <!-- Modal para comprar el producto -->
            @include('layouts.comprar')
            @endforeach
        </div>
    </section>
        <!-- mapa-->

    @include('layouts.mapa')

    <!-- Pie de página -->
    @include('layouts.pie')

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
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
                    $('#cart-item-count').text(response.cartItemCount);
                    // Mostrar notificación de éxito
                    toastr.success('Producto agregado al carrito exitosamente!');
                },
                error: function(xhr) {
                    // Mostrar notificación de error
                    toastr.error('Error al agregar el producto al carrito.');
                }
            });
        });
    });
</script>


</body>
</html>
