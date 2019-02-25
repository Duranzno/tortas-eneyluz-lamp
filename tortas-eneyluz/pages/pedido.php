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
<?php
  function genericOptions($col_name){
  $c = new mysqli("localhost", "root", "", "testdb","","");
  if(!$c){die("No se pudo conectar");}
  else{
  $r= $c->query("SELECT id,nombre FROM " . $col_name);
  while($fila=$r->fetch_row()){
  echo "<OPTION VALUE='" . $fila['0'] . "'>".  $fila['1'] . "</OPTION>";
  }
  mysql_close($c);}
}
?>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Empresa Repostera</title>
  <!-- Bootstrap core CSS -->
  <link href="../stylesheets/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="../stylesheets/bootstrap-datepicker3.min.css">
</head>

<body class="bg-light">
  <div class="container">
    <div class="py-5 text-center">
      <h2>Realizar Compra</h2>
    </div>
    <form class="needs-validation" novalidate="" action="/tortas-eneyluz/pages/pedido_backend.php" method="post">

    <div class="row">
      <div class="col-md-12 order-md-1">
          <!-- * Especificaciones del pedido -->
          <h4 class="mb-3">Especificaciones del pedido</h4>
          <P>Aqui puede definir las caracteristicas de su pedido, fecha y hora de entrega, si es un regalo, etc.<P>
              
              
              <div class="row">
                <div class="col-md-6 mb-3">
                  <p>Tipo de pedido:
                    <SELECT class="custom-select" NAME="tipo" SIZE="1">
                      <?php genericOptions("tipo")?>
                    </SELECT></p>
                </div>
                <div class="col-md-6 mb-3">
                  <p>Tamano de la torta:
                    <SELECT class="custom-select" NAME="tamano" SIZE="1">
                      <?php genericOptions("tamano")?>
                    </SELECT></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <p>Sabor de la torta:
                    <SELECT class="custom-select" NAME="sabor" SIZE="1">
                      <?php genericOptions("sabor")?>
                    </SELECT></p>
                </div>
                <div class="col-md-6 mb-3">
                  <p>Topping:
                    <SELECT class="custom-select" NAME="topping" SIZE="1">
                      <?php genericOptions("topping")?>
                    </SELECT></p>
                </div>
              </div>

              <div class="row">

                <div class="col-md-3 mb-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="esRegalo" name="esRegalo" id="regalo">
                    <label class="custom-control-label" for="regalo">Es un Regalo?</label>
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="tieneCajaEspecial" name="tieneCajaEspecial" id="especial">
                    <label class="custom-control-label" for="especial">Caja especial?</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-6">
                  <p>Fecha de entrega:</p>
                  <input type="text" class="form-control" id="datepicker" name="fecha">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-12">
                  <p>Comentarios adicionales sobre el pedido:</p>
                  <TEXTAREA class="form-control" NAME="comentarios"></TEXTAREA>
                </div>
              </div>
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
      </div>
    </div>
    </form>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">© 2017-2018 Company Name</p>
    </footer>
  </div>
  <script src="/js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="/js/form-validation.js"></script>
  <script src="/js/bootstrap-datepicker.min.js"></script>
  <script>$('#datepicker').datepicker({
      todayBtn: "linked",
      language: "es",
      orientation: "top left",
      todayHighlight: true,
      format: "yyyy-mm-dd"
    });</script>
</body>

</html>