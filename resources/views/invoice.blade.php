<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
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
            background-color: #fff; /* Color de fondo para la tabla */
            border-radius: 8px; /* Bordes redondeados para la tabla */
            overflow: hidden; /* Para ocultar cualquier desbordamiento */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
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
            margin-top: 20px; /* Espacio superior */
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
        /* Estilos para el enlace de regresar */
        .back-link {
            display: inline-block;
            margin-top: 20px;
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease;
        }
        .back-link svg {
            vertical-align: middle;
            margin-right: 5px;
        }
        .back-link:hover {
            color: #5cb85c;
        }
    </style>
</head>
<body>
    <a href="javascript:history.back()" class="back-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm.5 4.5a.5.5 0 0 1 .5.5v2.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5zm1.79 1.79a.5.5 0 0 1 .707.707l-2.25 2.25a.5.5 0 0 1-.707 0l-2.25-2.25a.5.5 0 1 1 .707-.707L8 7.793l1.22-1.22z"/>
        </svg>
        ir al inicio
    </a>

    <div class="container">
        <!-- Contenido de la factura -->
        <table id="invoiceTable">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp

                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                </tr>
                @php
                $total += $item['price'] * $item['quantity'];
                @endphp
                @endforeach
            </tbody>
        </table>

        <!-- Botón para descargar PDF -->
        <button id="download-pdf">Descargar PDF</button>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <script>
        document.getElementById('download-pdf').addEventListener('click', function() {
            const doc = new jsPDF();
            doc.text('Factura', 10, 10);
    
            let specialElementHandlers = {
                '#invoiceTable': function (element, renderer) {
                    return true;
                }
            };
    
            // Obtener el total desde el servidor
            let total = {!! json_encode($total) !!};
    
            // Generar la tabla con los datos del carrito
            doc.autoTable({ html: '#invoiceTable', startY: 20, margin: { top: 20 }, beforePageContent: function(data) {
                doc.text(`Total: $${total.toFixed(2)}`, 14, doc.internal.pageSize.height - 10);
            }});
    
            doc.save('factura.pdf');
        });
    </script>
    
</body>
</html>
