<table>
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

    echo "<tr>";
    echo    "<td>";
    echo    "tieneCaja";
    echo    "</td>";
    echo    "<td>";
    echo      bool2('tieneCajaEspecial');
    echo    "</td>";
    echo "</tr>";
  
    echo "<tr>";
    echo    "<td>";
    echo    "esRegalo";
    echo    "</td>";
    echo    "<td>";
    echo      bool2('esRegalo');
    echo    "</td>";
    echo "</tr>";
?>
</table>

<?php
//conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "testdb");
$resultado = $conn->query(insertPedidoSQL());

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($resultado) {
  header("Location:/tortas-eneyluz/");
  die();
} else {
  echo '<h1> Error en la base de datos</h1>';
  echo '<a href="/tortas-eneyluz">Volver</a>';
}
$conn->close();
?>
<?php
function bool2($str){
  return (isset($_POST[$str]))?1:0;
};
function insertPedidoSQL(){
  
  $req_tipo=$_POST['tipo'];
  $req_tamano=$_POST['tamano'];
  $req_sabor=$_POST['sabor'];
  $req_topping=$_POST['topping'];
  $req_tieneCajaEspecial=bool2('tieneCajaEspecial');
  $req_esRegalo=bool2('esRegalo');
  $req_entrega=$_POST['fecha'];
  $req_comentarios=$_POST['comentarios'];
  $req_cliente=1;//$_POST['cliente']

  $str= "INSERT INTO  pedidos (
    tipoId ,
    tamanoId ,
    saborId ,
    toppingId ,
    tieneCajaEspecial ,
    esRegalo ,
    entrega ,
    comentarios ,
    cliente
    )
    VALUES (
      " . $req_tipo ." ,
      " . $req_tamano ." ,
      " . $req_sabor ." ,
      " . $req_topping ." ,
      " . $req_tieneCajaEspecial ." ,
      " . $req_esRegalo ." ,
      " . $req_entrega ." ,
      '" . $req_comentarios ."' ,
      " . $req_cliente
    ." );";
    echo "<h4>Post Cliente SQL. " . $str . "</h4>";
    return $str;

}
?>