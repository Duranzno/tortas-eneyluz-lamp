<?php

		$con = mysql_connect("localhost","root","159873luis") or die("<h2>No se encuentra el servidor</h2>");
		$db = mysql_select_db("bodegon",$con) or die ("<h2>Error de conexion</h2>");
		
		$idron=$_POST['id_ron'];
		
		mysql_query("delete from ron where(id_ron=$idron)",$con) or die ("<h2>Error de Envio</h2>");
		
		header("location:datosr.php");
		mysql_close($con)
?>