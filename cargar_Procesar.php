<?php
	session_start(); 
    include "lib/corelib.php";
	// conector de BD 
	require_once('tools/mypathdb.php');
	
	$A = $_POST ['A'];
	$B = $_POST ['B'];
	$triple = $_POST ['triple'];
	//======================validar que el password tenga mas de 6 caracteres=======================================
	if (strlen($A)<3) OR (strlen($B)<3) OR (strlen($triple)<3) 
	{
		//===================================================Redirigir a otra pagina============================================
		$data=array("error" => '1');
		die(json_encode($data));
	} 
$numero_evaluar=0;
$loteria="TRIPLE ZULIA";
	// ===============================================Grabar los datos ===============================================================
	$query_insertar = "INSERT INTO tbl_loterias (lot_A, lot_B, lot_triple, lot_loteria) VALUES ('".$A."','".$B."',  '".$triple."', '".$loteria."');";
	$insertarResultado = mysql_query($query_insertar); 
	if($insertarResultado == false) 
	{
		$data=array("error" => '2');
		die(json_encode($data));
	}
	else
	{
		//Los datos se han insertado correctamente.
		//desconectar();
		mysql_close();
		//===================================================Redirigir a otra pagina============================================
		header("Location: equipomedico.php");
	}
?>