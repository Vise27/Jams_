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
                        <a href="{{ route('user.create') }}" class="create-blog-button">Crear un usuario</a>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->direccion }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td class="action-buttons">
                                            <a href="{{ route('user.show', $user) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('user.edit', $user->id) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('user.destroy', $user->id) }}" class="action-buttons" onclick="event.preventDefault(); confirmDelete({{ $user->id }});">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
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

    <script>
        function confirmDelete(userId) {
            if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
</body>
