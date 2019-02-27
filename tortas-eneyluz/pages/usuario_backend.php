<?php 
$conexion = new mysqli("localhost", "root", "", "testdb");
if ($conexion->connect_error) {die("Connection failed: " . $conexion->connect_error);}

$req_cedula=$_POST['cedula'];
$resultado = $conexion->query(getIdSQL($req_cedula));
if ($resultado->num_rows>0) {
  while ($row = $resultado->fetch_assoc()) {
  $usuarioId= $row["id"];
  echo $usuarioId;
  // if(!empty($_POST['submit'])) {
  //     header("Location:/tortas-eneyluz/pages/pedido.php");
  //     die();
  //   } else {
  //     echo '<h1> Error en la base de datos</h1>';
  //     echo '<a href="/tortas-eneyluz">Volver</a>';
  //   }
  }
}else{
  echo `no existe en db`;
}    
$conexion->close();
?>

<?php 
function insertClienteSQL(){
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
function getIdSQL($cedula){
  return "SELECT id,cedula,apellido from clientes WHERE cedula=" . $cedula;
}
function bool2($str){
  return (isset($_POST[$str]))?1:0;
};
function postPedido($clienteId){
  echo '<form id="myForm" action="/tortas-eneyluz/pages/pedido_backend.php" method="post">';
  echo '<input type="hidden" name="cliente" value="'. $clienteId . '">';
  echo '</form>';
  echo "<script type='text/javascript'>document.getElementById('myForm').submit();</script>";
};
?>

