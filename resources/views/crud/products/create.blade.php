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
    <div class="main-content">
        <div class="mid-container">
            <h2>Add Product</h2>
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                    @error('name')
                        <div class="app-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="brand_id">Marca</label>
                    <select class="form-control" id="brand_id" name="brand_id">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @if(old('brand_id') == $brand->id) selected @endif>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="supplier_id">proveedor</label>
                    <select id="supplier_id" name="supplier_id">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" @if(old('supplier_id') == $supplier->id) selected @endif>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="categorie_id">Categoria</label>
                    <select id="categorie_id" name="categorie_id">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}" @if(old('categorie_id') == $categorie->id) selected @endif>{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="modelo_id">Modelo</label>
                    <select id="modelo_id" name="modelo_id">
                        @foreach ($modelos as $modelo)
                            <option value="{{ $modelo->id }}" @if(old('modelo_id') == $modelo->id) selected @endif>{{ $modelo->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Enter price" step="0.01" min="0">
                    @error('price')
                        <div class="app-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}" placeholder="Enter stock">
                    @error('stock')
                        <div class="app-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="app-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" onchange="previewImage(event)">
                </div>
                <div id="imagePreview"></div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="">-- Select --</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="in-active" {{ old('status') == 'in-active' ? 'selected' : '' }}>In-active</option>
                    </select>
                    @error('status')
                        <div class="app-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="form-btn">Create Product</button>
            </form>
            <br>
            <a href="{{ route('product.index') }}" class="action-link view-link">Back</a>
        </div>
    </div>
</div>
</div>


</x-layout>

</div>

    
</div>
</div>

</body>