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
<table border="1" width="100%" align="center">
<tr>
<td colspan="2">Verificación de País usando la IP</td>
</tr>
<tr>
<td>La IP es: </td><td> <?php echo($ip); ?> </td>
</tr>
<tr>
<td>El Pais es : </td><td><?php echo(getCountryFromIP($ip));?></td>
</tr>
<tr>
<td>El Codigo del Pais : </td><td><?php echo(getCountryFromIP($ip, "code"));?></td>
</tr>
<tr>
<td>La Abreviacion del Pais es : </td><td><?php echo(getCountryFromIP($ip, "AbBr"));?></td>
</tr>
<tr>
<td>El Nombre del Pais : </td><td><?php echo(getCountryFromIP($ip, " NamE"));?></td>
</tr>
<tr>
<td>Ingrese una IP para verificar</td><td>
<FORM action="" method="post">
<INPUT type="text" id="checkip" name="checkip" value="<?php echo($ip); ?>">
<INPUT type="submit" value="Verificar">
    </P>
 </FORM>
</td>
</tr>
<tr>
<td colspan="2" align="center">ElCódigoFuente.com</td>
</tr>
</table>

</body>
</html>