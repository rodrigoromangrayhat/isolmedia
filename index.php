	<?php

	/*
	conexion a mi servidor | todabia no es necesario esto asi q lo comento
	$servidor="localhost";
	$dbusuario="root";
	$dbpass="12345678";
	$dbnombre="area";
	$conex= new mysqli($servidor,$dbusuario,$dbpass,$dbnombre);
	if($conex->connect_errno>0){
		die("Imposible conectarse con la base de datos".$conex->connect_error);
	}


	$sql_consulta="SELECT * FROM accidente WHERE id = (SELECT MAX(id) from accidente)";
	$resultados=$conex->query($sql_consulta);

	foreach ($resultados as $fila_hora) {
			$horaBD= $fila_hora['horas'];
			echo "$horaBD<br/>";
		}

/*insertar
		$sql_insertar =  "INSERT INTO accidente SET horas='$horas'";
		$conex->query($sql_insertar);  
		if($conex->errno) die($conex->error);

//modificar
		$sql_actualizar =  "UPDATE accidente SET horas='$horas' WHERE id='1'";
		$conex->query($sql_actualizar);  
		if($conex->errno) die($conex->error);		
*/

	error_reporting(0);

	$minuto=date("i"); //obtengo minuto del servidor
	$Segundo=date("s");//obtengo segundo del servidor
 
 	$time = time();
 	echo "Fecha y Hora Actual del servidor:<br/>";
	echo date("d-m-Y (H:i:s)", $time);

	?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script type="text/javascript" src="js.js"></script>
</head>
<body onload="inicio()">


	<div id="contenedor">
		<div class="reloj" id="Horas">00</div>
		<div class="reloj" id="Minutos"><?php echo ":$minuto";?></div>
		<div class="reloj" id="Segundos"><?php echo ":$Segundo"; ?></div>
		<div class="reloj" id="Centesimas">:00</div>
	</div>
		
		<?php
				
				//aqui la cuestion..
				if ($Segundo==59)//esta condicion me va obtener el valor de la variable Segundos
								//pero solo una ves cuando la pagina haga un Load o un Refresh

								//si cuando cargue la pagina el valor actual es en 20 no va entrar al if como hago para volver a preguntar el valor sin hacer un load en la pagina
				{
					/*
					$sql_actualizar = "UPDATE accidente SET horas='$minuto' WHERE id='1'";
					$conex->query($sql_actualizar);  
					if($conex->errno) die($conex->error);
					*/
				}
				else
				{
					echo "valio madres no entra al if";
					
				}

		?>
		
<script type="text/javascript">
		
	var centesimas = 0;
	var segundosConPuntos = document.getElementById('Segundos').innerHTML;
	var minutosConPuntos = document.getElementById('Minutos').innerHTML;
	var horasConPuntos = document.getElementById('Horas').innerHTML;

	var segundos = segundosConPuntos.replace(/\:/g,'');
	var minutos = minutosConPuntos.replace(/\:/g,'');
	var horas=horasConPuntos.replace(/\:/g,'');



		function inicio () 
		{
			control = setInterval(cronometro,10);
		}
		function cronometro () 
		{
			if (centesimas < 99) 
			{
				centesimas++;

				if (centesimas < 10)
				 { 
				 	centesimas = "0"+centesimas 
				 }
			Centesimas.innerHTML = ":"+centesimas;
			}
			if (centesimas == 92) //99
			{
				centesimas = -1;
			}
			if (centesimas == 0) 
			{
				segundos ++;//incremento segundo en 1 50+1=51

				if (segundos < 10)
				 { 
				 	segundos = "0"+segundos 
				}
				Segundos.innerHTML = ":"+ segundos;
			}
			if (segundos == 59)
			{
				segundos = -1;
			}
			if ( (centesimas == 0)&&(segundos == 0) )
			{
				minutos++;
				if (minutos < 10) 
					{ minutos = "0"+minutos 
			}
				Minutos.innerHTML = ":"+minutos;
			}
			if (minutos == 59) 
			{
				minutos = -1;
			}
			if ( (centesimas == 0)&&(segundos == 0)&&(minutos == 0) ) 
			{
				horas ++;
				if (horas < 10) 
					{ 
						horas = "0"+horas
					 }
				Horas.innerHTML = horas;
			}
		}

</script>
	

</body>
</html>