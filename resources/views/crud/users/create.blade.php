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
        <h2>Add User</h2>
        <form action="{{ route('user.store') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                @error('name')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                @error('email')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password">
                @error('password')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}" placeholder="Enter direccion">
                @error('direccion')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="form-btn">Create User</button>
        </form>
        <br>
        <a href="{{ route('user.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>
</div>
</div>
</div>

</body>
