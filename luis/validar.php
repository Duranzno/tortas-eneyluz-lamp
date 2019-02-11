<?php
//conectar a la base de datos
$conexion = mysqli_connect("172.18.0.3", "testuser", "testpassword", "testdb");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$consulta = "SELECT * FROM datos WHERE usuario='$usuario' and password='$password'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas > 0) {
  header("location:bienvenido.html");
} else {
  echo 'error en la autenticación<br>';
  echo '<a href="iniciar.html">Volver</a>';
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>