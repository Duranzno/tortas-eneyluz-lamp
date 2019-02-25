echo "<table>"
<?php 


    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }

    
    if(!isset($_POST["tieneCajaEspecial"])){echo "no hay cajta";}
    else { echo "hay caja";}
    
if(!$_POST["esRegalo"]){echo "no hay regalo";}
else { echo "hay regalo";}
echo "</table>"
?>


<?php
//conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";
$conexion = new mysqli($servername, $username, $password, $dbname);
  // Check connection
if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}
$usuarioId=69;
pedidoSql();

$req_cedula=$_POST['cedula'];

// echo '<h1>' . $req_nombre . '</h1>';
// echo '<h1>' . $req_pedido . '</h1>';
// echo '<h1>' . $_POST['fecha'] . '</h1>';
// echo '<h1>' . STR_TO_DATE($_POST['fecha'], '%m/%d/%Y') . '</h1>';
// echo '<h1>' . $usuario . ' ' . $password . ' Resultados </;h1>';
function bool2($str){
  return (isset($_POST[$str]))?1:0;
};
function pedidoSql(){
  $req_cedula=$_POST['cedula'];
  $req_nombre=$_POST['nombre'];
  $req_apellido=$_POST['apellido'];
  $req_direccion=$_POST['direccion'];
  $req_tlf=$_POST['tlf'];
  $req_correo=$_POST['correo'];

  return "INSERT INTO  clientes (
    usuario ,
    nombre ,
    apellido ,
    cedula ,
    direccion ,
    tlf ,
    correo
    )
    VALUES (
      " . $req_cedula ." ,
      " . $req_nombre ." ,
      " . $req_apellido ." ,
      " . $req_direccion ." ,
      " . $req_tlf ." ,
      " . $req_correo ." );";
}
// $conexion->query(pedidoSql());
$sql="SELECT id,cedula,apellido from clientes WHERE cedula=" . $req_cedula;
$resultado = $conexion->query($sql);
if ($resultado->num_rows>0) {
  while ($row = $resultado->fetch_assoc()) {
  $usuarioId= $row["id"];
  echo $usuarioId;
  if(!empty($_POST['submit'])) {
      header("Location:/tortas-eneyluz/pages/pedido.php");
      die();
    } else {
      echo '<h1> Error en la base de datos</h1>';
      echo '<a href="/tortas-eneyluz">Volver</a>';
    }
  }
}

// if ($resultado) {
//   echo "resultado " . $resultado;
//    
mysqli_close($conexion);
?>

<form id="myForm" action="Page_C.php" method="post">
<?php
    foreach ($_POST as $a => $b) {
        echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
    }
?>
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>