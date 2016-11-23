<?php
#Codigo para cargar los avisos clasificados desde el archivo entrante.txt
#Desarrollado por el Ing Gustavo Arias
$archivo = file_get_contents("entrante.txt"); //Guardamos archivo.txt en $archivo
$archivo = ucfirst($archivo); //Le damos un poco de formato
$archivo = nl2br($archivo); //Transforma todos los saltos de linea en tag <br/>
$cadena = $archivo;

$i = 1;
while ($i <=8){
	$buscar   = '@TITULO = 000'. $i;
	$posicion = strpos($cadena, $buscar);
	if (!empty($posicion)) {
			$z = $i + 1;
			$buscarSiguiente   = '@TITULO = 000' .$z;
			$posicionSiguiente = strpos(substr($cadena, $posicion), $buscarSiguiente);
			$cadena = str_replace($buscar,"",$cadena);
			$resultado = substr($cadena, $posicion, $posicionSiguiente-30);
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
			$resultado = substr($cadena, $posicion, $posicionSiguiente-30);
			echo $resultado ."</br>";  
	}
}


$i = 10;	
while ($i >=10){
	$buscar   = '@TITULO = 00'. $i;
	$posicion = strpos($cadena, $buscar);
	if (!empty($posicion)) {
			$z = $i + 1;
			$buscarSiguiente   = '@TITULO = 00' .$z;
			$posicionSiguiente = strpos(substr($cadena, $posicion), $buscarSiguiente);
			$cadena = str_replace($buscar,"",$cadena);
			$resultado = substr($cadena, $posicion, $posicionSiguiente-30);
			echo $resultado ."</br>";   
			$i++;
	}		
}
?>