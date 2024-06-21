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
        <h2>Details User Details</h2>
        <div class="blog-details">
            <h3>User ID:</h3>
            <p>{{ $detailsUser->user_id }}</p>
        </div>
        <div class="blog-details">
            <h3>Age:</h3>
            <p>{{ $detailsUser->age }}</p>
        </div>
        <div class="blog-details">
            <h3>Sex:</h3>
            <p>{{ $detailsUser->sex }}</p>
        </div>
        <div class="blog-details">
            <h3>Location:</h3>
            <p>{{ $detailsUser->location }}</p>
        </div>
        <div class="blog-details">
            <h3>Image:</h3>
            <p>
                @if (!empty($detailsUser->image))
                    <img style="height: 100px; width: 100px" src="{{ asset('crud/images/' . $detailsUser->image) }}" alt="">
                @else
                    Not Avalite
                @endif
            </p>
        </div>
        <a href="{{ route('detailsUser.index') }}" class="action-link view-link">Back</a>
        <a href="{{ route('detailsUser.edit', $detailsUser) }}" class="action-link edit-link">Edit</a>
    </div>
</x-layout>
</div>

    
</div>
</div>

</body>