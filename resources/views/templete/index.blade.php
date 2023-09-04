<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sales Control</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Sales Control</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @if(Auth::user()->access !== 'S')
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/sales">Vendas</a>
            </li>
          </ul>
          <div class="d-flex">
              <div class="profile">
                  <div class="name">
                    {{Auth::user()->name}}
                  </div>
                  <div class="logout">
                    <a class="nav-link" href="/user/logout">Sair</a>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </nav>
    @yield('content')
    </body>
    <style>
      .profile {
        color: #fff;
        border: 1px white solid;
        padding: 10px;
        border-radius: 10px;
      }
      .logout {
        float: right;
        font-weight: bold
      }
    </style>
    @yield('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</html>