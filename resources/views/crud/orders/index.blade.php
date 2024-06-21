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
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User_ID</th>
                    <th>product_ID</th>
                    <th>cantidad</th>
                    <th>total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name}}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->cantidad }}</td>
                        <td>{{ $order->total }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('order.show', $order) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                                <i class="fa fa-trash"></i>
                            </a>
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