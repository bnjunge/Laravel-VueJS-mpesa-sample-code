<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>M-PESA Laravel Vue JS Implementation</title>
</head>

<body>
  <div class="pb-5" id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">SURVDPC Laravel SPA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse float-left" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link class="nav-link" to="/">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/mpesa-access-token">Access Token</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/mpesa-register-url">Register URL</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/mpesa-simulate">Sumulate Transaction</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/mpesa-stk">STK Push</router-link>
            </li>
            <li class="nav-item">
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <router-view></router-view>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>
</body>

</html>