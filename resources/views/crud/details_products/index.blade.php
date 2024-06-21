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
        <a href="{{ route('detailsProduct.create') }}" class="create-blog-button">añadir detalles de un producto?</a>
        <table>
            <thead>
                <tr>
                    <th>Product_ID</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Material</th>
                    <th>Weight</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($detailsProducts as $detailsProduct)
                    <tr>
                        <td>{{ $detailsProduct->product->name }}</td>
                        <td>{{ $detailsProduct->size }}</td>
                        <td>{{ $detailsProduct->color }}</td>
                        <td>{{ $detailsProduct->material }}</td>
                        <td>{{ $detailsProduct->weight }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('detailsProduct.show', $detailsProduct->id) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('detailsProduct.edit', $detailsProduct->id) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('detailsProduct.destroy', $detailsProduct->id) }}" class="action-buttons" onclick="event.
                            preventDefault();  document.getElementById('delete-form-{{ $detailsProduct->id }}').submit(); ">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $detailsProduct->id }}" action="{{ route('detailsProduct.destroy', $detailsProduct->id) }}" method="POST" style="display: none;">
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
