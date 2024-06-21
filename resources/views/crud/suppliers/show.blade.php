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
        <h2>Suppliers</h2>
        <div class="blog-details">
            <h3>Name:</h3>
            <p>{{ $supplier->name }}</p>
        </div>
        <div class="blog-details">
            <h3>Email:</h3>
            <p>{{ $supplier->email }}</p>
        </div>
        <div class="blog-details">
            <h3>Description:</h3>
            <p>{{ $supplier->description }}</p>
        </div>
        <a href="{{ route('supplier.index') }}" class="action-link view-link">Back</a>
        <a href="{{ route('supplier.edit', $supplier->id) }}" class="action-link edit-link">Edit</a>
    </div>
</x-layout>
</div>

    
</div>
</div>

</body>