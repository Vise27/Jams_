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
        <h2>Update Supplier</h2>
        <form action="{{ route('supplier.update', $supplier) }}" method="post" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $supplier->name }}" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="{{ $supplier->email }}" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter description">{{ $supplier->description }}</textarea>
            </div>
    
            <button type="submit" class="form-btn">Update Supplier</button>
        </form>
        <br>
        <a href="{{ route('supplier.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>

</div>

    
</div>
</div>

</body>