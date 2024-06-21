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
    <div class="container">
        <a href="{{ route('detailsUser.create') }}" class="create-blog-button">Crear detalles de un usuario</a>
        <table>
            <thead>
                <tr>
                    <th>User_ID</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailsUsers as $detailsUser)
                    <tr>
                        <td>{{ $detailsUser->user->name }}</td>
                        <td>{{ $detailsUser->age }}</td>
                        <td>{{ $detailsUser->sex }}</td>
                        <td>{{ $detailsUser->location }}</td>
                        <td>
                            @if (!empty($detailsUser->image))
                                <img style="height: 100px; width: 100px" src="{{ asset('crud/images/' . $detailsUser->image) }}" alt="">
                            @else
                                Not Available
                            @endif
                        </td>
                        <td>{{ $detailsUser->created_at }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('detailsUser.show', $detailsUser->id) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('detailsUser.edit', $detailsUser->id) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('detailsUser.destroy', $detailsUser->id) }}" class="action-buttons" onclick="event.preventDefault();  document.getElementById('delete-form-{{ $detailsUser->id }}').submit(); ">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $detailsUser->id }}" action="{{ route('detailsUser.destroy', $detailsUser->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
</div>

    
</div>
</div>

</body>