
<?php
//conectar a la base de datos y colocar el nombre de usuario y contraseña hecho en phpmyadmin
//yo uso por defecto los de wamp y el servername
//crear base de datos testdb	
//en testdb crear tabla usuarios y llenar con usuario y password

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";
$conexion = new mysqli($servername, $username, $password, $dbname);

$ui_usuario = $_POST['usuario'];
$ui_password = $_POST['password'];
// echo '<h1>' . $usuario . ' ' . $password . ' Resultados </h1>';

$consulta = "SELECT * FROM usuarios WHERE usuario='$ui_usuario' and password='$ui_password'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if (!$conexion) {
  echo "ERROR: Unable to connect to MySQL." . PHP_EOL . '<br>';
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL . '<br>';
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL . '<br>';
  exit;
}

// echo '<h1>' . $filas . ' Resultados </h1>';

if ($filas > 0) {
  header("Location:tortas-eneyluz/pages/admin.php");
  die();
} else {
  echo '<h1> Error en la autenticación</h1>';
  echo '<a href="tortas-eneyluz/pages/login.html">Volver</a>';
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>