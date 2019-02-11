<?php

		$con = mysql_connect("localhost","root","159873luis") or die("<h2>No se encuentra el servidor</h2>");
		$db = mysql_select_db("bodegon",$con) or die ("<h2>Error de conexion</h2>");
		
		$idwhiskey=$_POST['id_whiskey'];
		$cantidad=$_POST['cantidad'];
		$precio=$_POST['precio'];
		
		mysql_query("update cajas_whiskey set cantidad=('$cantidad') where id_whiskey='$idwhiskey'",$con) or die ("<h2>Error de Envio</h2>");
		mysql_query("update cajas_whiskey set precio=('$precio') where id_whiskey='$idwhiskey'",$con) or die ("<h2>Error de Envio</h2>");
		
		header("location:datosw.php");
		mysql_close($con)
?>
		