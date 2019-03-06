<?php
$conn = new mysqli("localhost", "root", "", "testdb");
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

$req_cedula=$_POST['cedula'];
$nombre="";
$apellido="";
$cedula="";
$direccion="";
$tlf="";
$correo="";
$readonly="";
$clienteId="No Generado";
    

$sql = "SELECT *  FROM clientes WHERE cedula=" . $req_cedula;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $readonly="readonly";
    while ($row = $result->fetch_assoc()) {
    $nombre= $row["nombre"];
    $apellido= $row["apellido"];
    $direccion= $row["direccion"];
    $tlf= $row["tlf"];
    $correo= $row["correo"];
    $clienteId= $row["id"];
    
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
          <?php
              echo ($nombre=="")?"<h2>No existe el cliente, agregar datos</h2>":"<h2>Datos del cliente</h2>";               
          ?>
          </div>
          <div class="row">
              <div class="col-md-12 order-md-1">
<h4 class="mb-3">Datos Personales</h4>
        <form class="needs-validation" novalidate="" action="/tortas-eneyluz/pages/usuario_backend.php" method="post">
          <!-- * DATOS DE USUARIO -->
          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="firstName">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" <?php readonly($nombre)?> value="<?php echo $nombre;?>" required="">
              <div class="invalid-feedback">Primer Nombre necesario
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="apellido" <?php readonly($nombre)?> placeholder="" value="<?php echo $apellido;?>" required="">
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
              <input type="text" class="form-control" name="cedula" id="cedula" placeholder="##.###.###" <?php readonly($nombre)?> required="" value="<?php echo $req_cedula;?>">
              <div class="invalid-feedback" style="width: 100%;">
                Cedula es requerida.
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="email">Correo Electronico</label>
            <input type="email" class="form-control" id="email"  name="correo" value="<?php echo $correo;?>" <?php readonly($nombre)?> placeholder="tu@ejemplo.com">
            <div class="invalid-feedback">
              Por Favor introduzca un correo electronico correcto</div>
          </div>
          <div class="mb-3">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Casa cual, Calle tal, Avenida cual. " <?php readonly($nombre)?>
              required="" value="<?php echo $direccion;?>"> 
            <div class="invalid-feedback">
              Por favor introduzca la direccion de envio </div>
          </div>
          <div class="mb-3">
            <label for="tlf">Telefono<span class="text-muted">(Opcional)</span></label>
            <input type="text" class="form-control" id="address2" name="tlf" placeholder="Movil o Fijo " value="<?php echo $tlf;?>">
          </div>

          <div class="mb-3">
            <label for="tlf">Cliente ID<span class="text-muted">(Opcional)</span></label>
            <input type="text" class="form-control" name="clienteId" placeholder="Cliente ID " value="<?php echo $clienteId;?>" <?php readonly("siexiste")?>>
          </div>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continuar a Compra</button>

        </form>
        </div>
        </div>
        </div>
      </body>  

</html>
          
<?php
function readonly($nombre){
  if(!($nombre=="")){
      echo 'readonly="readonly"';
  }
}
?>