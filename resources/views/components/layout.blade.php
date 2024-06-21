<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data-base</title>
      
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}"> 
    <style>
        #imagePreview {
            width: 300px;
            height: 300px;
            overflow: hidden;
            border: 1px solid #ccc; /* Opcional: borde para la vista previa */
        }

        #imagePreview img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ajusta la imagen para llenar completamente el contenedor */
        }

    </style>
</head>
<body>
    <div>
        @if(session('success'))
            <div id="success-message" class="success-message">{{ session('success') }}</div>
        @endif
    
        {{ $slot }}
    
        <script>
            function previewImage(event) {
                var input = event.target;
                var reader = new FileReader();
        
                reader.onload = function() {
                    var img = new Image();
                    img.src = reader.result;
        
                    img.onload = function() {
                        var imagePreview = document.getElementById('imagePreview');
                        imagePreview.innerHTML = ''; // Limpiar cualquier vista previa anterior
        
                        // Crear la imagen en el contenedor de vista previa
                        var imgElement = document.createElement('img');
                        imgElement.src = img.src;
                        imgElement.style.width = '100%';
                        imgElement.style.height = '100%';
                        imgElement.style.objectFit = 'cover';
        
                        // Agregar la imagen al contenedor de vista previa
                        imagePreview.appendChild(imgElement);
                    };
                };
        
                if (input.files && input.files[0]) {
                    reader.readAsDataURL(input.files[0]);
                }

                // Función para ocultar el mensaje de éxito después de 3 segundos
                setTimeout(function() {
                    var successMessage = document.getElementById('success-message');
                    if (successMessage) {
                        successMessage.classList.add('fade-out');
                        setTimeout(function() {
                            successMessage.style.display = 'none';
                        }, 1000); // Duración de la animación
                    }
                }, 3000); // 3000 milisegundos = 3 segundos
            }
    
            
        </script>
    </div>       
</body>
</html> 