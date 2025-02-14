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
        <a href="{{ route('modelo.create') }}" class="create-blog-button">añadir un modelo</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($modelos as $modelo)
                    <tr>
                        <td>{{ $modelo->id }}</td>
                        <td>{{ $modelo->name }}</td>
                        <td>{{ $modelo->description }}</td>
                        <td>
                            {{ $modelo->created_at }}
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('modelo.show', $modelo) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('modelo.edit', $modelo->id) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('modelo.destroy', $modelo->id) }}" class="action-buttons" onclick="event.preventDefault();  document.getElementById('delete-form-{{ $modelo->id }}').submit(); ">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $modelo->id }}" action="{{ route('modelo.destroy', $modelo->id) }}" method="POST" style="display: none;">
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

