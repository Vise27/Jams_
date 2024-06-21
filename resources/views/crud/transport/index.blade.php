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
        <a href="{{ route('transport.create') }}" class="create-blog-button">añadir un transporte</a>
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
                @foreach($transports as $transport)
                    <tr>
                        <td>{{ $transport->id }}</td>
                        <td>{{ $transport->name }}</td>
                        <td>{{ $transport->email }}</td>
                        <td>{{ $transport->description }}</td>
                        <td>{{ $transport->created_at }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('transport.show', $transport) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('transport.edit', $transport->id) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('transport.destroy', $transport->id) }}" class="action-buttons" onclick="event.preventDefault();  document.getElementById('delete-form-{{ $transport->id }}').submit(); ">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $transport->id }}" action="{{ route('transport.destroy', $transport->id) }}" method="POST" style="display: none;">
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
