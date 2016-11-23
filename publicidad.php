<?php
#Codigo para cargar los avisos clasificados desde el archivo entrante.txt
#Desarrollado por el Ing Gustavo Arias
$archivo = file_get_contents("entrante.txt"); //Guardamos archivo.txt en $archivo
$archivo = ucfirst($archivo); //Le damos un poco de formato
$archivo = nl2br($archivo); //Transforma todos los saltos de linea en tag <br/>
$cadena = $archivo;
//$cadena = str_replace("<<","<",$cadena); //eliminar doble <<

$i = 1;
while ($i <=8){
	$buscar   = '@TITULO = 000'. $i;
	$posicion = strpos($cadena, $buscar);
	if (!empty($posicion)) {
			$z = $i + 1;
			$buscarSiguiente   = '@TITULO = 000' .$z;
			$posicionSiguiente = strpos(substr($cadena, $posicion), $buscarSiguiente);
			
			$cadena = str_replace($buscar,"",$cadena);
			
			  switch($i) {
			  case 1: 
			  $cadena = str_replace("01-APARTAMENTOS ALQUILER","<a name='APARTAMENTOS ALQUILER'></a><b>01-APARTAMENTOS ALQUILER</b>",$cadena);
			  break;
			  
			  case 2:
			  $cadena = str_replace("02-APARTAMENTOS VENTA","<br><a name='APARTAMENTOS VENTA'></a><b>02-APARTAMENTOS VENTA</b>",$cadena);
			  break;
			  
			  case 3:
			  $cadena = str_replace("03-CASAS ALQUILER","<br><a name='CASAS ALQUILER'></a><b>03-CASAS ALQUILER</b>",$cadena);
			  break;
			  
			  case 4:			   
			  $cadena = str_replace("04-CASAS VENTA","<br><a name='CASAS VENTA'></a><b>04-CASAS VENTA</b>",$cadena);
			  break;
			  
			  case 5:
			  $cadena = str_replace("05-CONDOMINIOS","<br><a name='CONDOMINIOS'></a><b>05-CONDOMINIOS</b>",$cadena);
			  break;
			  
			  case 6:
			  $cadena = str_replace("06-QUINTAS ALQUILER","<br><a name='QUINTAS ALQUILER'></a><b>06-QUINTAS ALQUILER</b>",$cadena);
			  break;
			  
			  case 7:
			  $cadena = str_replace("07-QUINTAS VENTA","<br><a name='QUINTAS VENTA'></a><b>07-QUINTAS VENTA</b>",$cadena);
			  break;
			  
			  case 8:
			  $cadena = str_replace("08-GALPONES ALQUILER ","<br><a name='GALPONES ALQUILER'></a><b>08-GALPONES ALQUILER</b>",$cadena);
			  break;
			  
			  default:
			  //$cadena = str_replace($buscar,"",$cadena);
			  }			
			
			$resultado = substr($cadena, $posicion, $posicionSiguiente+12);
			echo $resultado ."</br>"; 
			$i++;
	}
}

if ($i==9) {
	$buscar   = '@TITULO = 000'. $i;
	$posicion = strpos($cadena, $buscar);
	if (!empty($posicion)) {
			$z = $i + 1;
			$buscarSiguiente   = '@TITULO = 00' .$z;
			$posicionSiguiente = strpos(substr($cadena, $posicion), $buscarSiguiente);
			$cadena = str_replace($buscar,"",$cadena);
			$cadena = str_replace("09-GALPONES VENTA","<br><a name='GALPONES VENTA'></a><b>09-GALPONES VENTA</b>",$cadena);
			$resultado = substr($cadena, $posicion, $posicionSiguiente+10);
			echo $resultado ."</br>";  
	}
}


$i = 10;	
while (($i >=10) AND ($i <=50)){
	$buscar   = '@TITULO = 00'. $i;
	$posicion = strpos($cadena, $buscar);
	if (!empty($posicion)) {
			$z = $i + 1;
			$buscarSiguiente   = '@TITULO = 00' .$z;
			$posicionSiguiente = strpos(substr($cadena, $posicion), $buscarSiguiente);
			$cadena = str_replace($buscar,"",$cadena);
			switch($i) {
			  case 10: 
			  $cadena = str_replace("10-HABITACIONES ALQUILER ","<br><a name='Habitaciones Alquiler'></a><b>10-HABITACIONES ALQUILER</b>",$cadena);
			  break;
			  
			  case 11: 
			  $cadena = str_replace("11-LOCALES ALQUILER","<br><a name='Locales Alquiler'></a><b>11-LOCALES ALQUILER</b>",$cadena);
			  break; 
			  
			  case 12: 
			  $cadena = str_replace("12-LOCALES VENTA ","<br><a name='LOCALES VENTA'></a><b>12-LOCALES VENTA</b>",$cadena);
			  break;
			  
			  case 13: 
			  $cadena = str_replace("13-OFICINAS VENTA","<br><a name='OFICINAS VENTA'></a><b>13-OFICINAS VENTA</b>",$cadena);
			  break;
			  
			  case 14: 
			  $cadena = str_replace("14-OFICINAS ALQUILER","<br><a name='OFICINAS ALQUILER'></a><b>14-OFICINAS ALQUILER</b>",$cadena);
			  break;
			  
			  case 15: 
			  $cadena = str_replace("15-PARCELAS & TERRENOS","<br><a name='PARCELAS & TERRENOS'></a><b>15-PARCELAS & TERRENOS</b>",$cadena);
			  break;
			  
			  case 16: 
			  $cadena = str_replace("16-ANIMALES","<br><a name='ANIMALES'></a><b>16-ANIMALES</b>",$cadena);
			  break;
			  
			  case 17: 
			  $cadena = str_replace("17-BELLEZA","<br><a name='BELLEZA'></a><b>17-BELLEZA</b>",$cadena);
			  break;
			  
			  case 18: 
			  $cadena = str_replace("18-CERAMICAS","<br><a name='CERAMICAS'></a><b>18-CERAMICAS</b></b>",$cadena);
			  break;
			  
			  case 19: 
			  $cadena = str_replace("19-COMIDAS","<br><a name='COMIDAS'></a><b>19-COMIDAS</b></b>",$cadena);
			  break;
			  
			  case 20: 
			  $cadena = str_replace("20-COMPRAS VARIAS","<br><a name='COMPRAS VARIAS'></a><b>20-COMPRAS VARIAS</b>",$cadena);
			  break;
			  
			  case 21: 
			  $cadena = str_replace("21-CURSOS","<br><a name='CURSOS'></a><b>21-CURSOS</b>",$cadena);
			  break;
			  
			  case 22: 
			  $cadena = str_replace("22-DECORACIONES","<br><a name='DECORACIONES'></a><b>22-DECORACIONES</b>",$cadena);
			  break;
			  
			  case 23: 
			  $cadena = str_replace("23-ELECTRICIDAD","<br><a name='ELECTRICIDAD'></a><b>23-ELECTRICIDAD</b>",$cadena);
			  break;
			  
			  case 24: 
			  $cadena = str_replace("24-EMPLEOS VARIOS","<br><a name='EMPLEOS VARIOS'></a><b>24-EMPLEOS VARIOS</b>",$cadena);
			  break;
			  
			  case 25: 
			  $cadena = str_replace("25-VACACIONES/TURISMO","<br><a name='VACACIONES/TURISMO'></a><b>25-VACACIONES/TURISMO</b>",$cadena);
			  break;
			  
			  case 26: 
			  $cadena = str_replace("26-FUMIGACIONES","<br><a name='FUMIGACIONES'></a><b>26-FUMIGACIONES</b>",$cadena);
			  break;
			  
			  case 27: 
			  $cadena = str_replace("27-GIMNASIA","<br><a name='GIMNASIA'></a><b>27-GIMNASIA</b></b>",$cadena);
			  break;
			  
			  case 28: 
			  $cadena = str_replace("28-GUARDERIA","<br><a name='GUARDERIA'></a><b>28-GUARDERIA</b></b>",$cadena);
			  break;
			  
			  case 29: 
			  $cadena = str_replace("29-HIPOTECAS & PRESTAMOS","<br><a name='HIPOTECAS & PRESTAMOS'></a><b>29-HIPOTECAS & PRESTAMOS</b>",$cadena);
			  break;
			  
			  case 30: 
			  $cadena = str_replace("30-INSTITUTOS EDUCACIONAL","<br><a name='INSTITUTOS EDUCACIONAL'></a><b>30-INSTITUTOS EDUCACIONAL</b>",$cadena);
			  break;
			  
			  case 31: 
			  $cadena = str_replace("31-MAQUINARIAS COMPRA VEN","<br><a name='MAQUINARIAS COMPRA VENTA'></a><b>31-MAQUINARIAS COMPRA VENTA</b>",$cadena);
			  break;
			  
			  case 32: 
			  $cadena = str_replace("32-MOTOS COMPRA-VENTA","<br><a name='MOTOS COMPRA-VENTA'></a><b>32-MOTOS COMPRA-VENTA</b>",$cadena);
			  break;
			  
			  case 33: 
			  $cadena = str_replace("33-MUEBLES COMPRA-VENTA","<br><a name='MUEBLES COMPRA-VENTA'></a><b>33-MUEBLES COMPRA-VENTA</b>",$cadena);
			  break;
			  
			  case 34: 
			  $cadena = str_replace("34-MUSICA","<br><a name='MUSICA'></a><b>34-MUSICA</b>",$cadena);
			  break;
			  
			  case 35: 
			  $cadena = str_replace("35-NEGOCIOS COMPRA VENTA","<br><a name='NEGOCIOS COMPRA VENTA'></a><b>35-NEGOCIOS COMPRA VENTA</b>",$cadena);
			  break;
			  
			  case 36: 
			  $cadena = str_replace("36-PROFESIONALES","<br><a name='PROFESIONALES'></a><b>36-PROFESIONALES</b>",$cadena);
			  break;
			  
			  case 37: 
			  $cadena = str_replace("37-SERVICIOS ESPECIALIZAD","<br><a name='SERVICIOS ESPECIALIZAD'></a><b>37-SERVICIOS ESPECIALIZADOS</b>",$cadena);
			  break;
			  
			  case 38: 
			  $cadena = str_replace("38-TELEFONOS","<br><a name='TELEFONOS'></a><b>38-TELEFONOS</b>",$cadena);
			  break;
			  
			  case 39: 
			  $cadena = str_replace("39-VENTAS VARIAS","<br><a name='VENTAS VARIAS'></a><b>39-VENTAS VARIAS</b>",$cadena);
			  break;
			  
			  case 40: 
			  $cadena = str_replace("40-VEHICULOS COMPRA VENTA","<br><a name='VEHICULOS COMPRA VENTA'></a><b>40-VEHICULOS COMPRA VENTA</b>",$cadena);
			  break;
			  
			  case 41: 
			  $cadena = str_replace("41-DEPORTES","<br><a name='DEPORTES'></a><b>41-DEPORTES</b>",$cadena);
			  break;
			  
			  case 42: 
			  $cadena = str_replace("42-AUTOESCUELAS","<br><a name='AUTOESCUELAS'></a><b>42-AUTOESCUELAS</b>",$cadena);
			  break;
			  
			  case 43: 
			  $cadena = str_replace("43-VETERINARIOS","<br><a name='VETERINARIOS'></a><b>43-VETERINARIOS</b>",$cadena);
			  break;
			  
			  case 44: 
			  $cadena = str_replace("44-FIESTAS","<br><a name='FIESTAS'></a><b>44-FIESTAS</b>",$cadena);
			  break;
			  
			  case 45: 
			  $cadena = str_replace("45-VENTA DE ACCIONES","<br><a name='VENTA DE ACCIONES'></a><b>45-VENTA DE ACCIONES</b>",$cadena);
			  break;
			  
			  case 46: 
			  $cadena = str_replace("46-COMPUTACION","<br><a name='COMPUTACION'></a><b>46-COMPUTACION</b>",$cadena);
			  break;
			  
			  case 47: 
			  $cadena = str_replace("47-TRAJES ALQUILER Y VENT","<br><a name='TRAJES ALQUILER Y VENTA'></a><b>47-TRAJES ALQUILER Y VENTA</b>",$cadena);
			  break;
			  
			  case 48: 
			  $cadena = str_replace("48-SOLO PARA ADULTOS","<br><a name='SOLO PARA ADULTOS'></a><b>48-SERVICIO EXCLUSIVO PARA MAYORES DE 18</b>",$cadena);
			  break;
			  
			  case 49: 
			  $cadena = str_replace("49-MENSAJES AMOR Y AMISTA","<br><a name='MENSAJES AMOR Y AMISTAD'></a><b>49-MENSAJES AMOR Y AMISTAD</b>",$cadena);
			  break;
			  
			  case 50: 
			  $cadena = str_replace("50-ARTE Y ESPECTACULOS","<br><a name='ARTE Y ESPECTACULOS'></a><b>50-ARTE Y ESPECTACULOS</b>",$cadena);
			  break;
			  
			  default:
				//$cadena = str_replace($buscar,"",$cadena);
			  }	
			$resultado = substr($cadena, $posicion, $posicionSiguiente+15);
			echo $resultado ."</br>";   
			$i++;
	}		
}
if ($i==51) {
	$buscar   = '@TITULO = 00'. $i;
	$posicion = strpos($cadena, $buscar);
	if (!empty($posicion)) {
			$cadena = str_replace($buscar,"",$cadena);
			$cadena = str_replace("51-ULTIMA HORA","<br><a name='ULTIMA HORA'></a><b>51-ULTIMA HORA</b>",$cadena);
			$resultado = substr($cadena, $posicion);
			echo $resultado ."</br>";  
	}
}
?>