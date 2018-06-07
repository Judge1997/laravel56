<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Judge</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('style')
  </head>
  <body>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="http://127.0.0.1:8000/">Judge</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="http://127.0.0.1:8000/users">Users</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="http://127.0.0.1:8000/projects">Projects</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="http://127.0.0.1:8000/categories">Categories</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="http://127.0.0.1:8000/issues">Issues</a>
            </li>
          </ul>
          <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
      </nav>
      <br>
      <br>

      @yield('content')

    <script src="/js/app.js" charset="utf-8"></script>
    @stack('script')
  </body>
</html>
