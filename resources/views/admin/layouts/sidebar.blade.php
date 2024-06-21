<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard.admin') }}">Jams</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard.admin') }}">Jams</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a class="nav-link has-dropdown" href="blank.html"><i class="far fa-square"></i> <span>Database</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('product.index') }}">Products</a></li>
            <li><a class="nav-link" href="{{ route('detailsProduct.index') }}" >Details Products</a></li>
            <li><a class="nav-link" href="{{ route('brand.index') }}">Brands</a></li>
            <li><a class="nav-link" href="{{ route('modelo.index') }}">Modelos</a></li>
            <li><a class="nav-link" href="{{ route('supplier.index') }}" >Suppliers</a></li>
            <li><a class="nav-link" href="{{ route('categorie.index') }}" >Categories</a></li>
            <li><a class="nav-link" href="{{ route('user.index') }}">Users</a></li>
            <li><a class="nav-link" href="{{ route('detailsUser.index') }}" >Details User</a></li>
            <li><a class="nav-link" href="{{ route('transport.index') }}">Transport</a></li>
            <li><a class="nav-link" href="{{ route('order.index') }}" >Orders</a></li>

          </ul>
        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li>
  
     </aside>
  </div>