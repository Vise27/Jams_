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
        <h2>Products</h2>
        <div class="blog-details">
            <h3>Name:</h3>
            <p>{{ $product->name }}</p>
        </div>
        <div class="blog-details">
            <h3>Brand_Id:</h3>
            <p>{{ $product->brand_id }}</p>
        </div>
        <div class="blog-details">
            <h3>Supplier_Id:</h3>
            <p>{{ $product->supplier_id }}</p>
        </div>
        <div class="blog-details">
            <h3>Categorie_Id:</h3>
            <p>{{ $product->categorie_id }}</p>
        </div>
        <div class="blog-details">
            <h3>Modelo_Id:</h3>
            <p>{{ $product->modelo_id }}</p>
        </div>
        <div class="blog-details">
            <h3>Price:</h3>
            <p>{{ $product->price }}</p>
        </div>
        <div class="blog-details">
            <h3>Stock:</h3>
            <p>{{ $product->stock }}</p>
        </div>
        <div class="blog-details">
            <h3>Description:</h3>
            <p>{{ $product->description }}</p>
        </div>
        <div class="blog-details">
            <h3>Image:</h3>
            <p>
                @if (!empty($product->image))
                    <img style="height: 100px; width: 100px" src="{{ asset('crud/images/' . $product->image) }}" alt="">
                @else
                    Not Avalite
                @endif
            </p>
        </div>
        <div class="blog-details">
            <h3>Status:</h3>
            <p>{{ $product->status }}</p>
        </div>
        <a href="{{ route('product.index') }}" class="action-link view-link">Back</a>
        <a href="{{ route('product.edit', $product->id) }}" class="action-link edit-link">Edit</a>
    </div>
</x-layout>

</div>

    
</div>
</div>

</body>