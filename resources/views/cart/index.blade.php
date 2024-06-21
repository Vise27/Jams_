<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    @include('aplicacion/front.links')

    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
            table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
            }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
        }
        form {
            display: inline-block;
        }
        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border: 1px solid #d6e9c6;
            margin-bottom: 20px;
            text-align: center;
        }
        .empty-cart {
            text-align: center;
            color: #888;
            margin-top: 50px;
        }
    </style>
</head>
<body>


    <a href="javascript:history.back()" style="display: inline-block; margin-top: 20px; margin-left: 20px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm.5 4.5a.5.5 0 0 1 .5.5v2.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5zm1.79 1.79a.5.5 0 0 1 .707.707l-2.25 2.25a.5.5 0 0 1-.707 0l-2.25-2.25a.5.5 0 1 1 .707-.707L8 7.793l1.22-1.22z"/>
        </svg>
        Regresar
    </a>
    <h1>Carrito de Compras</h1>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    @if(!empty($cart))
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details)
                    <tr>
                        <td><img class="img-fluid rounded" src="{{ asset('crud/images/' . $details['image']) }}" alt="{{ $details['name'] }}"></td>
                        <td>{{ $details['name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                <button type="submit">Actualizar</button>
                            </form>
                        </td>
                        <td>${{ number_format($details['price'], 2) }}</td>
                        <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" style="background-color: #d9534f;">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @auth
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <button type="submit">Comprar</button>
        </form>
        
        @else
        <p style="text-align: center; margin-top: 20px;">Debe iniciar sesión para poder comprar.</p>
        @endauth
        
    @else
        <p class="empty-cart">Tu carrito está vacío</p>
    @endif
    <!-- PayPal button -->
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
        <input type="hidden" name="cmd" value="_s-xclick" />
        <input type="hidden" name="hosted_button_id" value="3U6YUABMY9X8E" />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" title="PayPal es una forma segura y fácil de pagar en línea." alt="Agregar al carrito" />
    </form>
</body>
</html>
