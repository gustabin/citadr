<?php
	session_start();  
	$_SESSION['status'] = $_GET ['id'];
	//===================================================Redirigir a otra pagina============================================		
	header("Location: citasDoctor.php")
?>