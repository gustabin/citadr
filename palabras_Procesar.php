
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Palabras clave - concordancia</title>
</head>

<body>
<?php
$palabras = $_POST ['txt_palabras'];
echo "[" . $palabras . "]". "<br>";
echo "&quot;" . $palabras . "&quot;". "<br>";
echo "+" . $palabras . "<br>";
echo "[+" . $palabras . "]". "<br>";
//================en mayusculas=================
$palabras = strtoupper($palabras);
echo "[" . $palabras . "]". "<br>";
echo "&quot;" . $palabras . "&quot;". "<br>";
echo "+" . $palabras . "<br>";
echo "[+" . $palabras . "]". "<br>";


?>
</body>
</html>
