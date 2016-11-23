<?
error_reporting(E_ALL & ~E_NOTICE);
include("geoiploc.php"); // Incluimos el Archivo bajado para localizar el pais
  if (empty($_POST['checkip'])) //Envio Solicitud?
  {
	$ip = $_SERVER["REMOTE_ADDR"]; //si llego desde otra ubicacion o con url directa, toma la IP del cliente
  }
  else
  {
	$ip = $_POST['checkip']; //si mando una IP desde la misma pagina 
  }
?>  
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Identificación de Pais - El Código Fuente </title>
</head>
<body>
<table border="0" width="19%" align="center">
<tr>
  <td width="27%">Pais: </td><td width="73%"><?php echo(getCountryFromIP($ip, " NamE"));?></td>
</tr>
</table>

</body>
</html>