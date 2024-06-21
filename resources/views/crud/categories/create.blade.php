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
        <h2>Add Categorie</h2>
        <form action="{{ route('categorie.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                @error('name')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
                @error('description')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="form-btn">Create Categorie</button>
        </form>
        <br>
        <a href="{{ route('categorie.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>
</div>

    
</div>
</div>

</body>
