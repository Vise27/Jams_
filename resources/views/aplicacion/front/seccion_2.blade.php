@include('aplicacion/front.links')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jams-Mujer</title>
    <link rel="icon" href="{{ asset('assets/front/img/jams.jpg') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/front/css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/catalogo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
</head>






<body>
    @include('layouts.header')

    


<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url('{{asset('assets/front/img/fondo3.PNG')}}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center text-white">
                <div class="row w-100">
                    <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                        <!--
                        <img class="img-fluid" src="{{asset('assets/front/img/baner1.webp')}}" alt="">
                        -->
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        <div>
                            <p class="lead">
                                ...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
         <!--Modal  para el boton comprar-->
        @include('layouts.comprar') 
        @endforeach
    </div>
</section>
       <!-- mapa-->

       @include('layouts.mapa')

       <!-- Pie de página -->
       @include('layouts.pie')
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