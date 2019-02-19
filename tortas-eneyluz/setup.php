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
  $conn->query("DROP DATABASE testdb");
  if ($conn->query("CREATE DATABASE " . $db) === TRUE) {
    printf("Se creo la base de datos\n");
    if(mysqli_select_db($conn,$db)){  
      printf("Se cambio la base de datos\n");

      $t_usuarios = "CREATE TABLE usuarios (
        usuario text NOT NULL,
        password text NOT NULL)
      ENGINE=InnoDB DEFAULT CHARSET=latin1; ";
      // if ($conn->query($t_usuarios) === TRUE) {echo  "Tabla Usuarios creada exitosamente"."\n";;
      // } else {echo "Error creando tabla: \n" . $conn->error . "\n";}

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
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
    
    // if ($conn->query($t_clientes) === TRUE) {echo "Tabla cliente creada exitosamente"."\n";;
    // } else {echo "Error creando tabla: \n" . $conn->error . "\n";}

    $t_pedidos = "
    CREATE TABLE IF NOT EXISTS pedidos (
      id int(5) unsigned NOT NULL AUTO_INCREMENT,
      tipoId int(5) NOT NULL,
      tamanoId int(5) NOT NULL,
      saborId int(5) NOT NULL,
      toppingId int(5) NOT NULL,
      tieneCajaEspecial tinyint(1) NOT NULL DEFAULT '0',
      esRegalo tinyint(1) NOT NULL DEFAULT '0',
      entrega date NOT NULL,
      comentarios text NOT NULL,
      cliente int(11) DEFAULT NULL,
      PRIMARY KEY (id),
      UNIQUE KEY id (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

  // if ($conn->query($t_pedidos) === TRUE) {echo "Tabla Pedidos creada exitosamente"."\n";;
  //   } else {echo "Error creando tabla: \n" . $conn->error . "\n";}
    function genericTable($name){
      return  "CREATE TABLE IF NOT EXISTS ". $name . " (
        id int(5) unsigned NOT NULL AUTO_INCREMENT,
        nombre varchar(50) NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY id (id)
      );";
    };
    $tablas= $t_pedidos . $t_clientes . $t_usuarios . genericTable("tipo") . genericTable("tamano") . genericTable("sabor") . genericTable("topping");
  
    if ($conn->multi_query($tablas) === TRUE) {
      do {
        if ($result = mysqli_store_result($conn)) {
          while ($row = mysqli_fetch_row($result)) {
              printf("%s\n", $row[0]);
          }
          mysqli_free_result($result);
        }
          /* mostrar divisor */
          if (mysqli_more_results($conn)) {
            printf("-----------------\n");
        }
      }
      while(mysqli_next_result($conn)); 
    }
    else {
      echo "Error creando tabla: \n" . $conn->error . "\n";
    }
  }
  } else {echo "No se pudo crear la base de datos"."\n" . $conn->error . "\n";}
  return $conn;
};
function fillDb($conn){
  $sql="INSERT 
    INTO
      usuarios (usuario, password)
    VALUES
      ('ale', '123'); ";
  
  $sql.="INSERT
    INTO 
      tipo (nombre) 
    VALUES 
      ('Torta Simple'),('Mini Torta'),('Racion');";
  
  $sql.="INSERT
    INTO 
      topping (nombre) 
    VALUES 
    ('Vainilla'),
    ('Chocolate'),
    ('Arequipe'),
    ('Crema pastelera'),
    ('Leche condensada'),
    ('Weed');";
  
  $sql.="INSERT 
  INTO
    sabor (nombre)
   VALUES 
    ('Burrera'),
    ('Vainilla'),
    ('Chocolate'),
    ('Doble chocolate'),
    ('Triple chocolate'),
    ('Tres leches'),
    ('Red velvet'),
    ('Domino'),
    ('Brownie'),
    ('Brownie con weed');";

  $sql.="INSERT 
    INTO 
      tamano (nombre) 
      VALUES     
      ('500g'),
      ('1Kg'),
      ('2Kg'),
      ('3Kg');";
  if ($conn->multi_query($sql) === TRUE) {
    echo "Se guardaron los datos successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
};



$conn->close();
?>