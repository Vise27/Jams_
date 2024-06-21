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
        <h2>Add Details Product</h2>
        <form action="{{ route('detailsProduct.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="product_id">Product_Id</label>
                <input type="number" id="product_id" name="product_id" value="{{ old('product_id') }}" placeholder="Enter product_id">
                @error('product_id')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input type="text" id="size" name="size" value="{{ old('size') }}" placeholder="Enter size">
                @error('size')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" id="color" name="color" value="{{ old('color') }}" placeholder="Enter color">
                @error('color')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="material">Material</label>
                <input type="text" id="material" name="material" value="{{ old('material') }}" placeholder="Enter material">
                @error('material')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="number" id="weight" name="weight" value="{{ old('weight') }}" placeholder="Enter weight" step="0.01" min="0">
                @error('weight')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="form-btn">Create Details Product</button>
        </form>
        <br>
        <a href="{{ route('detailsProduct.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>

</div>

    
</div>
</div>

</body>
