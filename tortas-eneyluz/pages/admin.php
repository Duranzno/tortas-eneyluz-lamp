<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- <link rel="icon" href="../../../../favicon.ico"> -->

  <title>Admin | Reposteria</title>

  <!-- Bootstrap core CSS -->
  <link href="/stylesheets/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/stylesheets/signin.css" rel="stylesheet">
</head>

<body>
<table class='table table-striped table-hover'>
  <tr>
    <th scope="row" class='thead-dark'>Nombre & Apellido</th>
    <th scope="row" class='thead-dark'>Telefono</th>
    <th scope="row" class='thead-dark'>Direccion</th>
    <th scope="row" class='thead-dark' th>Tipo de Pedido</th>
    <th scope="row" class='thead-dark' th>Especificaciones</th>
    <th scope="row" class='thead-dark' th>Regalo</th>
    <th scope="row" class='thead-dark' th>Caja especial</th>
    <th scope="row" class='thead-dark'>Fecha de Entrega</th>
  </tr>
<?php
  $conn = new mysqli("localhost", "root", "", "testdb");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sabor=getTableVal("sabor");
  $tipo=getTableVal("tipo");
  $topping=getTableVal("topping");
  $tamano=getTableVal("tamano");
  getTablas();
  
  $conn->close();
  function getTablas(){
    $result =   $GLOBALS['conn']->query("SELECT * FROM pedidos
    LEFT JOIN clientes ON pedidos.cliente = clientes.id");
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr scope='row'>";
        echo    "<td>" . $row["nombre"] . " " .$row["apellido"] . "</td>";
        echo    "<td>" . $row["tlf"] . "</td>";
        echo    "<td>" . $row["direccion"] . "</td>";
        echo    "<td>" . mapGeneric($row["tipoId"],$GLOBALS["tipo"]) . " de ". mapGeneric($row["tamanoId"],$GLOBALS["tamano"]) . "</td>";
        echo    "<td>" . mapGeneric($row["saborId"],$GLOBALS["sabor"]) . " con topping de ". mapGeneric($row["toppingId"],$GLOBALS["topping"]) . "</td>";
        echo    "<td>" . bool2tabla($row["esRegalo"]) .  "</td>";
        echo    "<td>" . bool2tabla($row["tieneCajaEspecial"]) .  "</td>";
        echo    "<td>" . $row["entrega"] .  "</td>";
        echo "</tr>";
      }
    }
  }
  function mapGeneric($numero,$arr){
    return $arr[$numero]['nombre'];
  }
  function getTableVal($tabla){
    $resultado =   $GLOBALS['conn']->query("SELECT * FROM " . $tabla);
    $save=array();
    while($row = $resultado->fetch_array()){
      $item = array();
      $item['id']                   = $row[0];
      $item['nombre']                 = $row[1];  
      array_push($save, $item);
    }
    $json_data = json_encode($save, JSON_UNESCAPED_SLASHES);
    // echo $json_data;
    return $save;
  }
  function bool2tabla($numero){
    return ($numero)?"Si":"No";
  }
?>

</table>
</body>