<!DOCTYPE html>
<?php
  function genericOptions($col_name){
  $c = new mysqli("localhost", "root", "", "testdb");
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

    <div class="row">
      <div class="col-md-12 order-md-1">
        <h4 class="mb-3">Datos Personales</h4>

        <form class="needs-validation" novalidate="" action="/tortas-eneyluz/pages/pedido_backend.php" method="post">
          <!-- * DATOS DE USUARIO -->
          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="firstName">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="" required="">
              <div class="invalid-feedback">Primer Nombre necesario
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" value="" required="">
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
              <input type="text" class="form-control" name="cedula" id="cedula" placeholder="##.###.###" required="">
              <div class="invalid-feedback" style="width: 100%;">
                Cedula es requerida.
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="email">Correo Electronico</label>
            <input type="email" class="form-control" id="email"  name="correo" placeholder="tu@ejemplo.com">
            <div class="invalid-feedback">
              Por Favor introduzca un correo electronico correcto</div>
          </div>
          <div class="mb-3">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Casa cual, Calle tal, Avenida cual. "
              required="">
            <div class="invalid-feedback">
              Por favor introduzca la direccion de envio </div>
          </div>
          <div class="mb-3">
            <label for="tlf">Telefono<span class="text-muted">(Opcional)</span></label>
            <input type="text" class="form-control" id="address2" name="tlf" placeholder="Movil o Fijo ">
          </div>
          <hr class="mb-4">
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
        </form>
      </div>
    </div>

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