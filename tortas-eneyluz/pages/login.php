<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- <link rel="icon" href="../../../../favicon.ico"> -->

  <title>Inicio de Sesion | Reposteria</title>

  <!-- Bootstrap core CSS -->
  <link href="/stylesheets/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/stylesheets/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" action="http://localhost/tortas-eneyluz/pages/admin.php" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Por favor ingrese su identificacion</h1>
    <label for="user" class="sr-only">Usuario</label>
    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
    <label for="password" class="sr-only">Contrasena</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Contrasena" required>
    <div class="row">
      <div class="col-md-6 md-6">
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Ingresar"></input>
      </div>
      <div class="col-md-6 md-6">
        <input class="btn btn-lg btn-secondary btn-block" type="submit" value="Reset"></input>
      </div>
    </div>
  </form>
</body>

</html>