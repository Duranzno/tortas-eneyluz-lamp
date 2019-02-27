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

pedidoSql();


// echo '<h1>' . $req_nombre . '</h1>';
// echo '<h1>' . $req_pedido . '</h1>';
// echo '<h1>' . $_POST['fecha'] . '</h1>';
// echo '<h1>' . STR_TO_DATE($_POST['fecha'], '%m/%d/%Y') . '</h1>';
// echo '<h1>' . $usuario . ' ' . $password . ' Resultados </;h1>';
function bool2($str){
  return (isset($_POST[$str]))?1:0;
};
function pedidoSql(){
  
  $req_tipo=$_POST['tipo'];
  $req_tamano=$_POST['tamano'];
  $req_sabor=$_POST['sabor'];
  $req_topping=$_POST['topping'];
  $req_tieneCajaEspecial=bool2('tieneCajaEspecial');
  $req_esRegalo=bool2('esRegalo');
  $req_entrega=$_POST['fecha'];
  $req_comentarios=$_POST['comentarios'];
  $req_cliente=1;//$_POST['cliente']

  return "INSERT INTO  pedidos (
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
      " . $req_comentarios ." ,
      " . $req_cliente
    ." );";
}
echo '<h1>' . pedidoSql() . '</h1>';
$resultado = mysqli_query($conn, pedidoSql());


if (!$conn) {
  echo "ERROR: Unable to connect to MySQL." . PHP_EOL . '<br>';
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL . '<br>';
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL . '<br>';
  exit;
}

echo '<h1>' . $filas . ' Resultados </h1>';
if ($resultado) {
  header("Location:/tortas-eneyluz/");
  die();
} else {
  echo '<h1> Error en la base de datos</h1>';
  echo '<a href="/tortas-eneyluz">Volver</a>';
}
$conn->close();
?>