<?php
$servername = "localhost";
$username = "root";
$password = "";
$db='testdb';
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {die("Connecion fallida: ". "\r\n" . $conn->connect_error . "\r\n");} 
$conn=setupDb($conn,$db);
fillDb($conn);
function setupDb($conn,$db){
  if ($conn->query("CREATE DATABASE " . $db) === TRUE) {
    printf("Se creo la base de datos\n");
    if(mysqli_select_db($conn,$db)){  
      printf("Se cambio la base de datos\n");

      $t_usuarios = "CREATE TABLE usuarios (
        usuario text NOT NULL,
        password text NOT NULL)
      ENGINE=InnoDB DEFAULT CHARSET=latin1 ";
      if ($conn->query($t_usuarios) === TRUE) {echo  "Tabla Usuarios creada exitosamente"."\n";;
      } else {echo "Error creando tabla: \n" . $conn->error . "\n";}

    $t_clientes = "
    CREATE TABLE IF NOT EXISTS clientes (
      id int(6) unsigned NOT NULL AUTO_INCREMENT,
      nombre varchar(15) NOT NULL,
      apellido varchar(15) NOT NULL,
      cedula text NOT NULL,
      direccion text NOT NULL,
      tlf text NOT NULL,
      correo text NOT NULL,
      PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
    
    if ($conn->query($t_clientes) === TRUE) {echo "Tabla cliente creada exitosamente"."\n";;
    } else {echo "Error creando tabla: \n" . $conn->error . "\n";}

    $t_pedidos = "
    CREATE TABLE IF NOT EXISTS pedidos (
      id int(5) unsigned NOT NULL AUTO_INCREMENT,
      tipo enum('Torta Simple','Mini Torta','Raciòn') NOT NULL,
      tamano enum('500g','1Kg','2Kg','3Kg') NOT NULL,
      sabor enum('Burrera','Vainilla','Chocolate','Doble Chocolate','Triple Chocolate','Tres Leches','Red Velvet','Domino','Brownie','Brownie con Weed') NOT NULL,
      topping enum('Vainilla','Chocolate','Arequipe','Crema Pastelera','Leche Condensada','Weed') NOT NULL,
      tieneCajaEspecial tinyint(1) NOT NULL DEFAULT '0',
      esRegalo tinyint(1) NOT NULL DEFAULT '0',
      entrega date NOT NULL,
      commentarios text NOT NULL,
      cliente int(11) DEFAULT NULL,
      PRIMARY KEY (id),
      UNIQUE KEY id (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
  if ($conn->query($t_pedidos) === TRUE) {echo "Tabla Pedidos creada exitosamente"."\n";;
    } else {echo "Error creando tabla: \n" . $conn->error . "\n";}
  }
  } else {echo "No se pudo crear la base de datos"."\n" . $conn->error . "\n";}
  return $conn;
};
function fillDb($conn){
  $sql="INSERT INTO usuarios (usuario, password) VALUES ('ale', '123')";
  // $sql.=
  if ($conn->multi_query($sql) === TRUE) {
    echo "Se guardaron los datos successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
};



$conn->close();
?>