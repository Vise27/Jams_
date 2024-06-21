<div class="modal fade" id="buyModal{{ $product->id }}" tabindex="-1" aria-labelledby="buyModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buyModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="product-image">
                    <img class="img-fluid rounded" src="{{ asset('crud/images/' . $product->image) }}" alt="{{ $product->name }}">
                    <h4 class="mt-3 product-price">{{ $product->price }}</h4>
                </div>
                <div class="product-details">
                    <!-- Detalles del producto para comprar -->
                    <p><strong>Nombre:</strong> {{ $product->name }}</p>
                    <p><strong>Precio:</strong> {{ $product->price }}</p>
                </div>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                    <input type="hidden" name="cmd" value="_s-xclick" />
                    <input type="hidden" name="hosted_button_id" value="3U6YUABMY9X8E" />
                    <input type="hidden" name="currency_code" value="USD" />
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" title="PayPal es una forma segura y fácil de pagar en línea." alt="Agregar al carrito" />
                </form>
                <!-- Boleta de compra -->
                <div id="boletaContent{{ $product->id }}" class="mt-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="generateBoleta({{ $product->id }}, '{{ $product->name }}', '{{ $product->price }}')">Comprar</button>
            </div>
        </div>
    </div>
</div>