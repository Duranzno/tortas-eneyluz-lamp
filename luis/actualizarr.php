<?php

		$con = mysql_connect("localhost","root","159873luis") or die("<h2>No se encuentra el servidor</h2>");
		$db = mysql_select_db("bodegon",$con) or die ("<h2>Error de conexion</h2>");
		
		$idron=$_POST['id_ron'];
		$cantidad=$_POST['cantidad'];
		$precio=$_POST['precio'];
		
		mysql_query("update ron set cantidad=('$cantidad') where id_ron='$idron'",$con) or die ("<h2>Error de Envio</h2>");
		mysql_query("update ron set precio=('$precio') where id_ron='$idron'",$con) or die ("<h2>Error de Envio</h2>");
		
		header("location:datosr.php");
		mysql_close($con)
?>
		