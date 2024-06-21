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
        <h2>Update Product</h2>
        <form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="brand_id">Brand_Id:</label>
                <input type="number" id="brand_id" name="brand_id" value="{{ $product->brand_id }}" placeholder="Enter brand_id">
            </div>
            <div class="form-group">
                <label for="supplier_id">Supplier_Id:</label>
                <input type="number" id="supplier_id" name="supplier_id" value="{{ $product->supplier_id }}" placeholder="Enter supplier_id">
            </div>
            <div class="form-group">
                <label for="categorie_id">Categorie_Id:</label>
                <input type="number" id="categorie_id" name="categorie_id" value="{{ $product->categorie_id }}" placeholder="Enter categorie_id">
            </div>
            <div class="form-group">
                <label for="modelo_id">Modelo_Id:</label>
                <input type="number" id="modelo_id" name="modelo_id" value="{{ $product->modelo_id }}" placeholder="Enter modelo_id">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" placeholder="Enter price" step="0.01" min="0">
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" value="{{ $product->stock }}" placeholder="Enter stock">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" onchange="previewImage(event)">
                @if (!empty($product->image))
                    <img style="height: 100px; margin-top: 20px; width: 100px" src="{{ asset('crud/images/' . $product->image) }}" alt="">
                @else
                    Not Avalite
                @endif
            </div>
            <div id="imagePreview"></div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="in-active" {{ $product->status == 'in-active' ? 'selected' : '' }}>In-active</option>
                </select>
            </div>
    
            <button type="submit" class="form-btn">Update Product</button>
        </form>
        <br>
        <a href="{{ route('product.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>


</div>

    
</div>
</div>

</body>