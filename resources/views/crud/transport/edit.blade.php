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
        <h2>Update Transport</h2>
        <form action="{{ route('transport.update', $transport) }}" method="post" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $transport->name }}" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $transport->email }}" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter description">{{ $transport->description }}</textarea>
            </div>
    
            <button type="submit" class="form-btn">Update Transport</button>
        </form>
        <br>
        <a href="{{ route('transport.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>
</div>

    
</div>
</div>

</body>