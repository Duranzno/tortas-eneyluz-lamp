<?php

		$con = mysql_connect("localhost","root","159873luis") or die("<h2>No se encuentra el servidor</h2>");
		$db = mysql_select_db("usuarios",$con) or die ("<h2>Error de conexion</h2>");
		
		$cedula=$_POST['cedula'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$de=$_POST['e_d'];
		$especialidad=$_POST['especialidad'];
		$telefono=$_POST['telefono'];
		$sexo=$_POST['sexo'];
		$pass=$_POST['pass'];
		$rpass=$_POST['rpass'];
		
		//OBTIENE LA LONGITUD DE UN STRING
		$reg= (strlen($cedula)*strlen(nombre)*strlen(apellido)*strlen(e_d)*strlen(especialidad)*strlen(telefono)*strlen(sexo)*strlen(pass)*strlen(rpass)) or die ("No se han llenado todos los campos <br><br><a href='crear.html'>Volver</a>");
		
		if($pass!=$rpass)
			{
			die('Las contraseñas no coinciden<br><br> <a href="crear.html">Volver</a>');
			}
		

		
		mysql_query("INSERT INTO datos VALUES('$cedula','$nombre','$apellido','$de','$especialidad','$telefono','$sexo','$pass')",$con) or die ("<h2>Error de Envio</h2>");
		
		echo '<h2>Registro Completo</h2>
				<a href="Iniciar.html">Iniciar sesion</a>';
				
		mysql_close($con)
?>