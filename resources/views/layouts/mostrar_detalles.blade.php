<div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="product-image">
                    <img class="img-fluid rounded" src="{{ asset('crud/images/' . $product->image) }}" alt="{{ $product->name }}">
                    <h4 class="mt-3 product-price">{{ $product->price }}</h4>
                </div>
                <div class="product-details">
                    <!-- Mostrar los detalles del producto -->
                    @foreach ($detailsProducts as $detailsProduct)
                        @if ($detailsProduct->product_id === $product->id)
                            <p><strong>Talla:</strong> {{ $detailsProduct->size }}</p>
                            <p><strong>Color:</strong> {{ $detailsProduct->color }}</p>
                            <p><strong>Material:</strong> {{ $detailsProduct->material }}</p>
                            <p><strong>Peso:</strong> {{ $detailsProduct->weight }} cm</p>
                        @endif
                    @endforeach

                    <!-- Mostrar la marca (brand) del producto -->
                    @foreach ($brands as $brand)
                        @if ($brand->id === $product->brand_id)
                            <p><strong>Marca:</strong> {{ $brand->name }}</p>
                        @endif
                    @endforeach

                    <!-- Mostrar el modelo (model) del producto -->
                    @foreach ($modelos as $modelo)
                        @if ($modelo->id === $product->modelo_id)
                            <p><strong>Modelo:</strong> {{ $modelo->name }}</p>
                        @endif
                    @endforeach

                    <!-- Mostrar la categoría (category) del producto -->
                    @foreach ($categories as $categorie)
                        @if ($categorie->id === $product->categorie_id)
                            <p><strong>Categoría:</strong> {{ $categorie->name }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <a class="btn btn-success add-to-cart" href="#" data-product-id="{{ $product->id }}">
                    <i class="fas fa-shopping-cart"></i> Comprar
                </a>
            </div>
        </div>
    </div>
</div>