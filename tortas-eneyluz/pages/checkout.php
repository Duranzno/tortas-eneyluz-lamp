<?php
//conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";
$conexion = new mysqli($servername, $username, $password, $dbname);

$req_nombre = $_POST['nombre'];
$req_pedido = $_POST['pedido'];
$req_fecha = $_POST['fecha'];
// echo '<h1>' . $req_nombre . '</h1>';
// echo '<h1>' . $req_pedido . '</h1>';
// echo '<h1>' . $_POST['fecha'] . '</h1>';
// echo '<h1>' . STR_TO_DATE($_POST['fecha'], '%m/%d/%Y') . '</h1>';
// echo '<h1>' . $usuario . ' ' . $password . ' Resultados </h1>';
$insert = "INSERT INTO pedidos VALUE('$req_nombre','$req_pedido','$req_fecha')";
// echo '<h1>' . $insert . '</h1>';
$resultado = mysqli_query($conexion, $insert);


if (!$conexion) {
  echo "ERROR: Unable to connect to MySQL." . PHP_EOL . '<br>';
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL . '<br>';
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL . '<br>';
  exit;
}

// echo '<h1>' . $filas . ' Resultados </h1>';
if ($resultado) {
  header("Location:/tortas-eneyluz/");
  die();
} else {
  echo '<h1> Error en la base de datos</h1>';
  echo '<a href="/tortas-eneyluz/pages/steak.html">Volver</a>';
}
mysqli_close($conexion);
?>