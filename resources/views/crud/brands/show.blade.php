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
        <h2>Brands</h2>
        <div class="blog-details">
            <h3>Name:</h3>
            <p>{{ $brand->name }}</p>
        </div>
        <div class="blog-details">
            <h3>Description:</h3>
            <p>{{ $brand->description }}</p>
        </div>
        <a href="{{ route('brand.index') }}" class="action-link view-link">Back</a>
        <a href="{{ route('brand.edit', $brand->id) }}" class="action-link edit-link">Edit</a>
    </div>
</x-layout>

</div>

    
</div>
</div>

</body>

