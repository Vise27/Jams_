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
        <h2>Add Details User</h2>
        <form action="{{ route('detailsUser.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" id="user_id" name="user_id" value="{{ old('user_id') }}" placeholder="Enter User ID">
                @error('user_id')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" placeholder="Enter Age">
                @error('age')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sex">Sex</label>
                <select id="sex" name="sex">
                    <option value="">-- Select --</option>
                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('sex') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('sex')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Enter Location">
                @error('location')
                    <div class='app-error'>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
            </div>

            <button type="submit" class="form-btn">Create Details User</button>
        </form>
        <br>
        <a href="{{ route('detailsUser.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>
</div>

    
</div>
</div>

</body>