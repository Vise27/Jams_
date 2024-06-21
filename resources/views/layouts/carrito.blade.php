<div id="cart-container" class="cart-container">
    <h2 id="cart-title">Carrito de Compras</h2>
    <div id="cart-items" class="cart-items mb-3"></div>
    <div class="font-weight-bold text-center mt-3">
        <button id="buy-button" class="btn btn-success">Comprar</button>
        <span id="cart-total">Total: $</span>
    </div>
</div>
<a class="nav-icon position-relative text-decoration-none me-3" href="{{route('cart.index')}}" id="toggle-cart-button">
    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark" id="cart-item-count">0</span>
</a>
<ul class="cart-list">

</ul>
