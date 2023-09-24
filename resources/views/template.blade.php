@php
    $route = request()->route()->getName();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <header class="p-3 mb-3 border-bottom">

        <div class="container">
          <nav class="navbar navbar-expand-md navbar-light bg-light ">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="/images/logo2.png" alt="Logo" height="50px"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_starts_with($route, 'administrator.wine.')]) href="/administrator/wine">Vins</a>
                  </li>
                  <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_starts_with($route,'administrator.cepage.')]) href="/administrator/cepage">Cépages</a>
                  </li>
                  <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_starts_with($route,'message.')]) href="/administrator/message">Messages</a>
                  </li>
                </ul><div class="dropdown text-end">
                @auth<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

                      {{Auth::user()->name}}

                  </a>
                  <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <!--<li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>-->
                <!-- route('auth.logout')}}-->
                <li><form action="/auth/logout" method="POST">
                  @csrf

                  <button class="d-block link-dark text-decoration-none" >Se deconnecter</button>
                </form></li>
              </ul>@endauth
              @guest
                <a href="{{route('auth.login')}}" class="d-block link-dark text-decoration-none">
                    Se Connecter
                </a>
              @endguest
            </div>
              </div>
            </div>
          </nav>
        </div>
      </header>


    <div class="container">
        @yield('content')
    </div>



    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>
</html>
