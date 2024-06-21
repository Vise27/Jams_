<!-- resources/views/blog/index.blade.php -->
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
        <a href="{{ route('brand.create') }}" class="create-blog-button">Añadir una marca</a>
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

                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->description }}</td>
                        <td>
                            {{ $brand->created_at }}
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('brand.show', $brand) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('brand.edit', $brand->id) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('brand.destroy', $brand->id) }}" class="action-buttons" onclick="event.preventDefault();  document.getElementById('delete-form-{{ $brand->id }}').submit(); ">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $brand->id }}" action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display: none;">
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

