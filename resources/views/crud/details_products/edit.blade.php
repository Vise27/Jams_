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
        <h2>Update Details Product</h2>
        <form action="{{ route('detailsProduct.update', $detailsProduct) }}" method="post" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="product_id">Product_Id:</label>
                <input type="number" id="product_id" name="product_id" value="{{ $detailsProduct->product_id }}" placeholder="Enter product_id">
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" id="size" name="size" value="{{ $detailsProduct->size }}" placeholder="Enter size">
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" id="color" name="color" value="{{ $detailsProduct->color }}" placeholder="Enter color">
            </div>
            <div class="form-group">
                <label for="material">Material:</label>
                <input type="text" id="material" name="material" value="{{ $detailsProduct->material }}" placeholder="Enter material">
            </div>
            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="number" id="weight" name="weight" value="{{ $detailsProduct->weight }}" placeholder="Enter weight" step="0.01" min="0">
            </div>
    
            <button type="submit" class="form-btn">Update Details Product</button>
        </form>
        <br>
        <a href="{{ route('detailsProduct.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>

</div>

    
</div>
</div>

</body>