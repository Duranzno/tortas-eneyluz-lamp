<?php 
$conn = new mysqli("localhost", "root", "", "testdb");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$req_cedula=$_POST['cedula'];
$resultado = $conn->query(getIdSQL($req_cedula));
$n_rows=$resultado->num_rows;
if (isset($n_rows) && $n_rows === 0) {
  echo "<h1>Filas " . $n_rows . ". No existe</h1>";
  $r2 = $conn->query(insertClienteSQL());
  if(isset($r2)){
    echo "<h2>Insertar cliente de forma exitosa</h2>" . $r2;
    $resultado = $conn->query(getIdSQL($req_cedula));
    postPedido($resultado);
  }else{
    echo "<h2>Insertar cliente de forma erronea</h2>" . $r2->num_rows;
  }
} else if(isset($n_rows) && $n_rows === 1){  
  echo "<h1>Filas " . $n_rows . ". Existe y continua</h1>";
  postPedido($resultado);
  
} else {
  echo "<h1>Filas " . $n_rows . ". Error</h1>";
}
  
    // if(!empty($_POST['submit'])) {
    //     header("Location:/tortas-eneyluz/pages/pedido.php");
    //     die();
    //   } else {
    //     echo '<h1> Error en la base de datos</h1>';
    //     echo '<a href="/tortas-eneyluz">Volver</a>';
    // }
$conn->close();
?>

<?php 
function insertClienteSQL(){
  $req_cedula=$_POST['cedula'];
  $req_nombre=$_POST['nombre'];
  $req_apellido=$_POST['apellido'];
  $req_direccion=$_POST['direccion'];
  $req_tlf=$_POST['tlf'];
  $req_correo=$_POST['correo'];

  $str= "INSERT INTO  clientes (
    cedula ,
    nombre ,
    apellido ,
    direccion ,
    tlf ,
    correo
    )
    VALUES (
      " . $req_cedula ." ,
      '" . $req_nombre ."' ,
      '" . $req_apellido ."' ,
      '" . $req_direccion ."' ,
      '" . $req_tlf ."' ,
      '" . $req_correo ."' );";
  echo "<h4>Post Cliente SQL. " . $str . "</h4>";
  return $str;
}
function getIdSQL($cedula){
  echo "<h4>Get ID SQL. Cedula" . $cedula;
  $str= "SELECT id,cedula,apellido from clientes WHERE cedula=" . $cedula;
  echo $str . "</h4>";
  return $str;
}
function bool2($str){
  return (isset($_POST[$str]))?1:0;
};
function postPedido($result){
  while ($row = $result->fetch_assoc()) {
  $clienteId= $row["id"];
  echo "<h4>Post Pedido. Cliente Id</h4>" . $clienteId;
  echo '<form id="myForm" action="/tortas-eneyluz/pages/pedido.php" method="post">';
  echo '<input type="hidden" name="cliente" value="'. $clienteId . '">';
  echo '</form>';
  echo "<script type='text/javascript'>document.getElementById('myForm').submit();</script>";
  }
};
?>

