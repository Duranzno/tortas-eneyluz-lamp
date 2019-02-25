<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";
$conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$req_cedula=$_POST['cedula'];
$nombre="";
$apellido="";
$cedula="";
$direccion="";
$tlf="";
$correo="";
$readonly="";

$sql = "SELECT *  FROM clientes WHERE cedula=" . $req_cedula;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $readonly="readonly";
    while ($row = $result->fetch_assoc()) {
    $nombre= $row["nombre"];
    $apellido= $row["apellido"];
    $direccion= $row["direccion"];
    $tlf= $row["tlf"];
    $correo= $row["correo"];
  }
} else {
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Empresa Repostera</title>
    <!-- Bootstrap core CSS -->
    <link href="../stylesheets/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/bootstrap-datepicker3.min.css">
  </head>
  <body>
      <div class="container">
          <div class="py-5 text-center">
            <h2>No existe el comprador, crear uno nuevo</h2>
          </div>
          <div class="row">
              <div class="col-md-12 order-md-1">
<h4 class="mb-3">Datos Personales</h4>
        <form class="needs-validation" novalidate="" action="/tortas-eneyluz/pages/usuario_backend.php" method="post">
          <!-- * DATOS DE USUARIO -->
          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="firstName">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" readonly="<?php echo $readonly;?>" value="<?php echo $nombre;?>" required="">
              <div class="invalid-feedback">Primer Nombre necesario
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="apellido" readonly="<?php echo $readonly;?>" placeholder="" value="<?php echo $apellido;?>" required="">
              <div class="invalid-feedback">
                Apellido necesario
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="cedula">Cedula de Identidad</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">V</span>
              </div>
              <input type="text" class="form-control" name="cedula" id="cedula" placeholder="##.###.###" readonly="<?php echo $readonly;?>" required="" value="<?php echo $req_cedula;?>">
              <div class="invalid-feedback" style="width: 100%;">
                Cedula es requerida.
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="email">Correo Electronico</label>
            <input type="email" class="form-control" id="email"  name="correo" value="<?php echo $correo;?>" readonly="<?php echo $readonly;?>" placeholder="tu@ejemplo.com">
            <div class="invalid-feedback">
              Por Favor introduzca un correo electronico correcto</div>
          </div>
          <div class="mb-3">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Casa cual, Calle tal, Avenida cual. " readonly="<?php echo $readonly;?>"
              required="" value="<?php echo $direccion;?>"> 
            <div class="invalid-feedback">
              Por favor introduzca la direccion de envio </div>
          </div>
          <div class="mb-3">
            <label for="tlf">Telefono<span class="text-muted">(Opcional)</span></label>
            <input type="text" class="form-control" id="address2" name="tlf" placeholder="Movil o Fijo " value="<?php echo $tlf;?>" 
             readonly="<?php echo $readonly;?>">
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continuar a Compra</button>

        </form>
        </div>
        </div>
        </div>
      </body>  

</html>
          
