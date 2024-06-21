
    const isLoggedIn = true;

    async function generateBoleta(productId, productName, productPrice) {
        const { jsPDF } = window.jspdf;

        // Crear un nuevo documento PDF
        const doc = new jsPDF();

        // Agregar contenido al PDF
        doc.setFontSize(16);
        doc.text("Boleta de Compra", 20, 20);
        doc.setFontSize(12);
        doc.text(`Nombre del Producto: ${productName}`, 20, 40);
        doc.text(`Precio: ${productPrice}`, 20, 50);
        doc.text(`Total a Pagar: ${productPrice}`, 20, 60);

        

        // Descargar el PDF
        doc.save(`Boleta_${productId}.pdf`);
    }

    function handleBuyClick(productId) {
        if (isLoggedIn) {
            generateBoleta(productId, 'Nombre del Producto', 'Precio del Producto');
        } else {
            window.location.href = '/login'; // Redirige al inicio de sesión
        }
    }
