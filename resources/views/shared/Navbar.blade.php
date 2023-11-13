<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container text-center">
      <a class="navbar-brand text-success" href="/"><img class="me-2" src="{{ asset('img/logocbt3.webp') }}" alt="Logo" width="25px"> <b>CBT 3 Sr Max Shein Heister</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto">
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/"><i class="fa-solid fa-house"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('panel')}}"><i class="fa-solid fa-gears me-2"></i>Panel de control</a>
          </li>
        </ul>
        <ul class="navbar-nav mx-auto">
        </ul>
        <ul class="navbar-nav mx-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-success" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user me-2"></i><b>{{Auth::user()->usuario}}</b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item text-center text-muted" href="#">{{$infoUsuario->puesto }}</a></li>
              <li><a class="dropdown-item text-muted" href="#">{{$infoUsuario->nombre }} {{$infoUsuario->apellido_paterno}} {{$infoUsuario->apellido_materno}}</a></li>
              <li><a href="{{route('cerrar.sesion')}}" class="btn btn-outline-danger w-100"><i class="fas fa-power-off me-2"></i>Cerrar Sesion</a></li>
            </ul>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>