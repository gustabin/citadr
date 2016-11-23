<?php 
//calculo de edad desde el datepicker
$data = $_POST['date'];
// Fecha actual
$date = getdate();
$anioact = $date["year"];
$mesact = $date["mon"];
$diaact = $date["mday"];

// Fecha de nacimiento de ejemplo para el test
$fechanac = $data;
// Desglosamos la fecha recibida, como si fuese ingresada en un Form u obtenida de una base de datos
list( $anionac, $mesnac, $dianac ) = split('-', $fechanac);
//Verificamos que la fecha es correcta
if (checkdate ( $mesnac, $dianac, $anionac )){
$fechanac = ($anionac."-".$mesnac."-".$dianac);
} else {
die("Fecha incorrecta");
}
//Calculo de la edad al dia de hoy
$edad = $anioact - $anionac;
if ($mesact < $mesnac){
$edad--;
} elseif ($mesact == $mesnac){
if ($diaact < $dianac){
$edad--;
}
}
$data=  $edad;
die(json_encode($data));
?> 