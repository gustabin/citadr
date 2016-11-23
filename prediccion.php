<?php
function extraer($cadena_de_numero)
{   
//$cadena_de_numero = '272';
echo "Numero: " .$cadena_de_numero . "<br>";
$cadena_buscada   = '2';
$reemplazar=0;
$posicion_coincidencia = strpos($cadena_de_numero, $cadena_buscada);

if ($posicion_coincidencia !== true)   
	{
	if ($posicion_coincidencia === 0) 
		{
		$posicion = $posicion_coincidencia + 1;
		echo "Posicion 1: " .$posicion . "<br>";
		echo "Se ha encontrado en la posicion: " .$posicion . "<br>";	
		$cadena1 = substr($cadena_de_numero, 0, $posicion);   
		$resto_cadena = substr($cadena_de_numero, $posicion);  
		$resultado = str_replace($cadena_buscada, $reemplazar, $cadena1);
		$cadena_de_numero = $resultado . $resto_cadena;  
		}
	}	

$posicion_coincidencia = strpos($cadena_de_numero, $cadena_buscada);
if ($posicion_coincidencia !== true)   
	{
	if ($posicion_coincidencia == 1) 
		{
		$posicion = $posicion_coincidencia + 1;
		echo "Posicion 2: " .$posicion . "<br>";
		echo "Se ha encontrado en la posicion: " .$posicion . "<br>";	
		$cadena2 = substr($cadena_de_numero, 0, $posicion);  
		$resto_cadena = substr($cadena_de_numero, $posicion);  
		$resultado = str_replace($cadena_buscada, $reemplazar, $cadena2);
		$cadena_de_numero = $resultado . $resto_cadena;  
		}
	}	
	
$posicion_coincidencia = strpos($cadena_de_numero, $cadena_buscada);
if ($posicion_coincidencia !== true)   
	{
	if ($posicion_coincidencia == 2) 
		{
		$posicion = $posicion_coincidencia + 1;
		echo "Posicion 3: " .$posicion . "<br>";
		echo "Se ha encontrado en la posicion: " .$posicion . "<br>";	
		$cadena3 = substr($cadena_de_numero, 0, $posicion);  
		$resto_cadena = substr($cadena_de_numero, $posicion);  
		$resultado = str_replace($cadena_buscada, $reemplazar, $cadena3);
		$cadena_de_numero = $resultado . $resto_cadena;  
		}
	}	

 return $valordevuelto;
}
extraer("222");
?>
