<?php
	class conexion{
		function recuperarDatos()
		{
		$con=mysql_connect("localhost","root","159873luis") or die ("<h2>No se encuentra el servidor</h2>");
		mysql_select_db("bodegon",$con) or die ("<h2>Error de conexion</h2>");
		$query = "SELECT * from ron";
		$resultado = mysql_query($query);
		
		while($fila = mysql_fetch_array($resultado))
		{
			echo "<tr>";
			echo "<td>$fila[marca]</td> <td>$fila[cantidad]</td> <td>$fila[precio]</td>";
			echo "<tr>";
		}
		}
	}
?>