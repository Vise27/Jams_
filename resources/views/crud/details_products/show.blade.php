@include('admin/layouts.links')
<body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <!-- barra de navegacion -->
        @include('admin.layouts.navbar')
        <!-- barra de lateral -->
        @include('admin.layouts.sidebar')
  
<div class="main-content">
<x-layout>
    <div class="mid-container">
        <h2>Details Product</h2>
        <div class="blog-details">
            <h3>Product_Id:</h3>
            <p>{{ $detailsProduct->product_id }}</p>
        </div>
        <div class="blog-details">
            <h3>Size:</h3>
            <p>{{ $detailsProduct->size }}</p>
        </div>
        <div class="blog-details">
            <h3>Color:</h3>
            <p>{{ $detailsProduct->color }}</p>
        </div>
        <div class="blog-details">
            <h3>Material:</h3>
            <p>{{ $detailsProduct->material }}</p>
        </div>
        <div class="blog-details">
            <h3>Weight:</h3>
            <p>{{ $detailsProduct->weight }}</p>
        </div>
        <a href="{{ route('detailsProduct.index') }}" class="action-link view-link">Back</a>
        <a href="{{ route('detailsProduct.edit', $detailsProduct) }}" class="action-link edit-link">Edit</a>
    </div>
</x-layout>
</div>

    
</div>
</div>

</body>