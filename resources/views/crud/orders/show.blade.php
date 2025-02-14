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
        <h2>Order Details</h2>
        <div class="blog-details">
            <h3>User ID:</h3>
            <p>{{ $order->user_id }}</p>
        </div>
        <div class="blog-details">
            <h3>Transport ID:</h3>
            <p>{{ $order->transport_id }}</p>
        </div>
        <div class="blog-details">
            <h3>Total:</h3>
            <p>{{ $order->total }}</p>
        </div>
        <div class="blog-details">
            <h3>Status:</h3>
            <p>{{ $order->status }}</p>
        </div>
        <a href="{{ route('order.index') }}" class="action-link view-link">Back</a>
        <a href="{{ route('order.edit', $order->id) }}" class="action-link edit-link">Edit</a>
    </div>
</x-layout>
</div>

    
</div>
</div>

</body>
