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
        <h2>Update Details User</h2>
        <form action="{{ route('detailsUser.update', $detailsUser) }}" method="post" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="number" id="user_id" name="user_id" value="{{ $detailsUser->user_id }}" placeholder="Enter user ID">
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="{{ $detailsUser->age }}" placeholder="Enter age">
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select id="sex" name="sex">
                    <option value="">-- Select --</option>
                    <option value="male" {{ $detailsUser->sex == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $detailsUser->sex == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $detailsUser->sex == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="{{ $detailsUser->location }}" placeholder="Enter location">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                @if (!empty($detailsUser->image))
                    <img style="height: 100px; margin-top: 20px; width: 100px" src="{{ asset('crud/images/' . $detailsUser->image) }}" alt="">
                @else
                    Not Avalite
                @endif
            </div>
    
            <button type="submit" class="form-btn">Update Details User</button>
        </form>
        <br>
        <a href="{{ route('detailsUser.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>
</div>

    
</div>
</div>

</body>