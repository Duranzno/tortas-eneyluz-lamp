<!doctype html>
<html lang="en">

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
    <th scope="row" class='thead-dark'>Nombre</th>
    <th scope="row" class='thead-dark' th>Pedido</th>
    <th scope="row" class='thead-dark'>Fecha</th>
  </tr>
<?php
$servername = "mariadb";
$username = "testuser";
$password = "testpassword";
$dbname = "testdb";
$conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nombre, pedido, fecha FROM pedidos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "<tr scope='row'><td>" . $row["nombre"] . "</td><td>" . $row["pedido"] . "</td><td> ";
    echo date('d-m-Y', strtotime($row['fecha']));
    // echo date_format($row["fecha"], "Y/m/d H:i:s");
    echo "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();
?>

</body>

</html>