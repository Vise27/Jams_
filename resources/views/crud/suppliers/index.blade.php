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
        <a href="{{ route('supplier.create') }}" class="create-blog-button">Añadir un proveedor</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->description }}</td>
                        <td>
                            {{ $supplier->created_at }}
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('supplier.show', $supplier) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('supplier.edit', $supplier->id) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('supplier.destroy', $supplier->id) }}" class="action-buttons" onclick="event.preventDefault();  document.getElementById('delete-form-{{ $supplier->id }}').submit(); ">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $supplier->id }}" action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" style="display: none;">
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

