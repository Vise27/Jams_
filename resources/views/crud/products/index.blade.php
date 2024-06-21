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
        <a href="{{ route('product.create') }}" class="create-blog-button">Añadir un producto</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand_Id</th>
                    <th>Supplier_Id</th>
                    <th>Categorie_Id</th>
                    <th>Modelo_Id</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->supplier ->name }}</td>
                        <td>{{ $product->categorie->name }}</td>
                        <td>{{ $product->modelo->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->description }}</td>
                        <td>

                            @if (!empty($product->image))
                                <img style="height: 100px; width: 100px" src="{{ asset('crud/images/' . $product->image) }}" alt="">
                            @else
                                Not Avalite
                            @endif
                        </td>
                        <td>{{ $product->status }}</td>
                        <td>
                            {{ $product->created_at }}
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('product.show', $product) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('product.edit', $product->id) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('product.destroy', $product->id) }}" class="action-buttons" onclick="event.preventDefault();  document.getElementById('delete-form-{{ $product->id }}').submit(); ">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: none;">
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
