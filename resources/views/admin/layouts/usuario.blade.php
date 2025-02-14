<div class="nav-icon position-relative">
    <button class="btn btn-link dropdown-toggle text-decoration-none" type="button" id="userMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-user text-dark mr-3"></i>
        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
    </button>
    <div class="dropdown-menu" aria-labelledby="userMenuButton">
        @auth
            <a class="dropdown-item" href="{{ route('profile.edit') }}" style="color: #69bb7e;">
                {{ __('Perfil') }}
            </a>
            <a class="dropdown-item" href="{{ route('index') }}" style="color: #69bb7e;">
                {{ __('Inicio') }}
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #69bb7e;">
                {{ __('Cerrar sesión') }}
            </a>
        @endauth
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
