
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      
        <a class="navbar-brand text-success logo h1 align-self-center" href="{{ route('index') }}">
          <img src="{{ asset('assets/front/img/jams.jpg') }}" alt="logo" width="50" style="margin-top: -5px;"  class="shadow-light rounded-circle">
          Jams
      </a>
      
      
      
      </ul> 
    </form>
    <ul class="navbar-nav navbar-right">
      @include('admin/layouts.usuario')
      
      
    </ul>
  </nav>