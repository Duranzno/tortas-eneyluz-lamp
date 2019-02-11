<?php

		$con = mysql_connect("localhost","root","159873luis") or die("<h2>No se encuentra el servidor</h2>");
		$db = mysql_select_db("bodegon",$con) or die ("<h2>Error de conexion</h2>");
		
		$idcerveza=$_POST['id_cerveza'];
		$cantidad=$_POST['cantidad'];
		$precio=$_POST['precio'];
		
		mysql_query("update cajas_cervezas set cantidad=('$cantidad') where id_cerveza='$idcerveza'",$con) or die ("<h2>Error de Envio</h2>");
		mysql_query("update cajas_cervezas set precio=('$precio') where id_cerveza='$idcerveza'",$con) or die ("<h2>Error de Envio</h2>");
		
		header("location:datosc.php");
		mysql_close($con)
?>
		