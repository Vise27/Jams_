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
        <a href="{{ route('categorie.create') }}" class="create-blog-button">Añadir una categoria</a>
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

                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->name }}</td>
                        <td>{{ $categorie->description }}</td>
                        <td>
                            {{ $categorie->created_at }}
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('categorie.show', $categorie) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('categorie.edit', $categorie->id) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('categorie.destroy', $categorie->id) }}" class="action-buttons" onclick="event.preventDefault();  document.getElementById('delete-form-{{ $categorie->id }}').submit(); ">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $categorie->id }}" action="{{ route('categorie.destroy', $categorie->id) }}" method="POST" style="display: none;">
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
