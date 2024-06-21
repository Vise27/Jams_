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
        <h2>Update User</h2>
        <form action="{{ route('user.update', $user) }}" method="post" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="direccion">Address:</label>
                <input type="text" id="direccion" name="direccion" value="{{ $user->direccion }}" placeholder="Enter address">
            </div>
    
            <button type="submit" class="form-btn">Update User</button>
        </form>
        <br>
        <a href="{{ route('user.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>
</div>
</div>
</div>

</body>
