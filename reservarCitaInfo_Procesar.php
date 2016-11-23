<?php
if (!isset($_SESSION)) {// poner esto en todas las demas paginas
  session_start();
}
$_SESSION['motivoCita'] = $_POST ['motivos'];
$_SESSION['consulta'] = $_POST ['consulta'];
//===================================================Redirigir a otra pagina============================================
header("Location: reservarCita_Quien.php");
?>
