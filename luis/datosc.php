<html>
<head>
<title>Cervezas</title>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #008080;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 10px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

button a {
		display: block;
		color: white;
		text-align: center;
		padding: 2px 6px;
		text-decoration: none;
		}
		
.active {
	background-color: #4CAF50;
}
</style>
</head>
<body>
	<div>
		<table id="customers">
		<tr>
		<th>Marca</th>
		<th>Cantidad</th>
		<th>Precio</th>
		</tr>
		<?php
			include("cerveza.php");
			$con=new conexion();
			$con->recuperarDatos();
		?>
		</table><br><br>
	</div>
	<center><form action="agregarc.php" method="post">
	<input type="text" name="marca" placeholder="Marca">
	<input type="text" name="cantidad" placeholder="Cantidad">
	<input type="text" name="precio" placeholder="Precio">
	<input type="submit" name="agregar" value="Agregar">
	</form>
	<form action="actualizarc.php" method="post">
	<select name="id_cerveza">
	<option value="">Seleccionar</option>
<?php

		$con = mysql_connect("localhost","root","159873luis");
		if(!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("bodegon",$con);
		$sql="select id_cerveza, marca from cajas_cervezas";
		$result=mysql_query($sql);
		
		while($fila=mysql_fetch_row($result))
		{
		echo "<option value ='".$fila['0']."'>".$fila['1']."</option>";
		}
mysql_close($con);
?>
</select>
	<input type="text" name="cantidad" placeholder="Cantidad">
	<input type="text" name="precio" placeholder="Precio">
	<input type="submit" name="actualizar" value="Actualizar">
	</form>
	<form action="borrarc.php" method="post">
	<select name="id_cerveza">
<option value="">Seleccionar</option>

<?php

		$con = mysql_connect("localhost","root","159873luis");
		if(!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("bodegon",$con);
		$sql="select id_cerveza, marca from cajas_cervezas";
		$result=mysql_query($sql);
		
		while($fila=mysql_fetch_row($result))
		{
		echo "<option value ='".$fila['0']."'>".$fila['1']."</option>";
		}
mysql_close($con);
?>
</select><br>
	<input type="submit" name="borrar" value="Borrar">
	</form></center>
<div>
	<center><button class="button" style="vertical-align:middle"><span><a href="bienvenido.html">Home</a></span></button>
			<button class="button active" style="vertical-align:middle"><span><a href="datosc.php">Cerveza</a></span></button>
			<button class="button" style="vertical-align:middle"><span><a href="datosr.php">Ron</a></span></button>
			<button class="button" style="vertical-align:middle"><span><a href="datosw.php">Whiskey</a></span></button></center>
</div>
</body>