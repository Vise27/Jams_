// main.js

// Función para simular la adición de un producto al carrito
function addToCart(name, quantity, price, image) {
    // Llamar al segundo archivo JavaScript para procesar los datos
    cartModule.processProduct(name, quantity, price, image);
}

// Función para agregar un producto al carrito
function addToCart(name, price, quantity, image) {

    cartModule.processProduct(name, quantity, price, image);
}