<?php

		$con = mysql_connect("localhost","root","159873luis") or die("<h2>No se encuentra el servidor</h2>");
		$db = mysql_select_db("bodegon",$con) or die ("<h2>Error de conexion</h2>");
		
		$marca=$_POST['marca'];
		$cantidad=$_POST['cantidad'];
		$precio=$_POST['precio'];
		
		mysql_query("INSERT INTO cajas_cervezas VALUES('','$marca','$cantidad','$precio')",$con) or die ("<h2>Error de Envio</h2>");
		header("location:datosc.php");
		mysql_close($con);
?>