<?php
session_start();  

// conector de BD 
require_once('tools/mypathdb.php');
$puerta = $_REQUEST['puerta'];

switch ($puerta) {
case 1: //guardar datos personales

		$email = $_POST ['Email'];
		$clave = $_POST ['Password'];
		//======================validar que el password tenga mas de 6 caracteres=======================================
		if (strlen($clave)<6) {
		//===================================================Redirigir a otra pagina============================================
			$data=array("error" => '1');
			die(json_encode($data));
			} 
		$nombre = $_POST ['Nombre'];
		$apellido = $_POST ['Apellido'];
		$telefono= $_POST['celular'];
		$direccion= $_POST['Direccion'];
		$ciudad = $_POST ['ciudades'];
		$IdEstado = $_POST ['estados']; 

			// ==============================Buscar Estado =============================
			//$query_estado=mysql_query("SELECT * FROM tbl_estados WHERE id = '$IdEstado'");
			//$resultado_estado=mysql_fetch_array($query_estado);
			//$estado= $fila[resultado_estado];

			// ===============================================Grabar los datos ===============================================
			// ===============================================Introducir los datos en la tabla=====================================
			//asignar $Grupo
			//$grupo="doctor";
			//asignar $userName
			//$userName=$email;
			$status = 1;//"1 Activo, 2 Inactivo";
			$query_insertarUsuario = mysql_query("INSERT INTO tbl_usuarios (us_email, us_clave, us_status, us_fecha, us_tipo) VALUES ('$email', '$clave', '$status', NOW(), '2')");
			$user_id = mysql_insert_id();
			
			$query_insertarDoctor = mysql_query("INSERT INTO tbl_doctores(doc_nombre, doc_apellido, doc_telefono, doc_direccion, doc_ciudad, doc_estado, doc_id_user) VALUES ('$nombre', '$apellido', '$telefono', '$direccion', '$ciudad', '$IdEstado', '$user_id');");
			$doc_id = mysql_insert_id();
			
			// =====================grabar ID en variable de session =====================
			$_SESSION['us_id']=$user_id ;
			$_SESSION['doc_id']=$doc_id;
			
				//Los datos se han insertado correctamente.';		
				$data = array("exito" => '1');
				die(json_encode($data));				
						
				//desconectar();
				mysql_close();
				
				break; //fin case 1
	
case 2: //guardar horarios

		$chkboxLun8a = $_POST ['chkboxLun8a'];
$chkboxLun83a = $_POST ['chkboxLun83a'];
$chkboxLun9a = $_POST ['chkboxLun9a'];
$chkboxLun93a = $_POST ['chkboxLun93a'];
$chkboxLun10a = $_POST ['chkboxLun10a'];
$chkboxLun103a = $_POST ['chkboxLun103a'];
$chkboxLun11a = $_POST ['chkboxLun11a'];
$chkboxLun113a = $_POST ['chkboxLun113a'];
$chkboxLun12m = $_POST ['chkboxLun12m'];
$chkboxLun123p = $_POST ['chkboxLun123p'];
$chkboxLun1p = $_POST ['chkboxLun1p'];
$chkboxLun13p = $_POST ['chkboxLun13p'];
$chkboxLun2p = $_POST ['chkboxLun2p'];
$chkboxLun23p = $_POST ['chkboxLun23p'];
$chkboxLun3p = $_POST ['chkboxLun3p'];
$chkboxLun33p = $_POST ['chkboxLun33p'];
$chkboxLun4p = $_POST ['chkboxLun4p']; 
$chkboxLun43p = $_POST ['chkboxLun43p'];
$chkboxLun5p = $_POST ['chkboxLun5p'];
$chkboxLun53p = $_POST ['chkboxLun53p'];
$chkboxLun6p = $_POST ['chkboxLun6p'];
$chkboxLun63p = $_POST ['chkboxLun63p'];
$chkboxLun7p = $_POST ['chkboxLun7p'];
$chkboxLun73p = $_POST ['chkboxLun73p'];
$chkboxLun8p = $_POST ['chkboxLun8p'];
$chkboxLun83p = $_POST ['chkboxLun83p'];

$horarioLun=$chkboxLun8a.",".$chkboxLun83a.",".$chkboxLun9a.",".$chkboxLun93a.",".$chkboxLun10a.",".$chkboxLun103a.",".$chkboxLun11a.",".$chkboxLun113a.",".$chkboxLun12m.",".$chkboxLun123p.",".$chkboxLun1p.",".$chkboxLun13p.",".$chkboxLun2p.",".$chkboxLun23p.",".$chkboxLun3p.",".$chkboxLun33p.",".$chkboxLun4p.",".$chkboxLun43p.",".$chkboxLun5p.",".$chkboxLun53p.",".$chkboxLun6p.",".$chkboxLun63p.",".$chkboxLun7p.",".$chkboxLun73p.",".$chkboxLun8p.",".$chkboxLun83p;
$horarioLun= str_replace(',,', '', $horarioLun); //limpiar las comas;
$dias="";//reiniciar dia 

if (strlen($horarioLun)==1) { // quitar la coma si no eligio ningun horario en ese dia
	$horarioLun="";
}else {
	$dias=$dias . "Lun,";//asignar dia 
}

$chkboxMar8a = $_POST ['chkboxMar8a'];
$chkboxMar83a = $_POST ['chkboxMar83a'];
$chkboxMar9a = $_POST ['chkboxMar9a'];
$chkboxMar93a = $_POST ['chkboxMar93a'];
$chkboxMar10a = $_POST ['chkboxMar10a'];
$chkboxMar103a = $_POST ['chkboxMar103a'];
$chkboxMar11a = $_POST ['chkboxMar11a'];
$chkboxMar113a = $_POST ['chkboxMar113a'];
$chkboxMar12m = $_POST ['chkboxMar12m'];
$chkboxMar123p = $_POST ['chkboxMar123p'];
$chkboxMar1p = $_POST ['chkboxMar1p'];
$chkboxMar13p = $_POST ['chkboxMar13p'];
$chkboxMar2p = $_POST ['chkboxMar2p'];
$chkboxMar23p = $_POST ['chkboxMar23p'];
$chkboxMar3p = $_POST ['chkboxMar3p'];
$chkboxMar33p = $_POST ['chkboxMar33p'];
$chkboxMar4p = $_POST ['chkboxMar4p'];
$chkboxMar43p = $_POST ['chkboxMar43p'];
$chkboxMar5p = $_POST ['chkboxMar5p'];
$chkboxMar53p = $_POST ['chkboxMar53p'];
$chkboxMar6p = $_POST ['chkboxMar6p'];
$chkboxMar63p = $_POST ['chkboxMar63p'];
$chkboxMar7p = $_POST ['chkboxMar7p'];
$chkboxMar73p = $_POST ['chkboxMar73p'];
$chkboxMar8p = $_POST ['chkboxMar8p'];
$chkboxMar83p = $_POST ['chkboxMar83p'];

$horarioMar=$chkboxMar8a.",".$chkboxMar83a.",".$chkboxMar9a.",".$chkboxMar93a.",".$chkboxMar10a.",".$chkboxMar103a.",".$chkboxMar11a.",".$chkboxMar113a.",".$chkboxMar12m.",".$chkboxMar123p.",".$chkboxMar1p.",".$chkboxMar13p.",".$chkboxMar2p.",".$chkboxMar23p.",".$chkboxMar3p.",".$chkboxMar33p.",".$chkboxMar4p.",".$chkboxMar43p.",".$chkboxMar5p.",".$chkboxMar53p.",".$chkboxMar6p.",".$chkboxMar63p.",".$chkboxMar7p.",".$chkboxMar73p.",".$chkboxMar8p.",".$chkboxMar83p;
$horarioMar= str_replace(',,', '', $horarioMar); //limpiar las comas;

if (strlen($horarioMar)==1) { // quitar la coma si no eligio ningun horario en ese dia
	$horarioMar="";
}else {
	$dias=$dias . "Mar,";//asignar dia 
}

$chkboxMie8a = $_POST ['chkboxMie8a'];
$chkboxMie83a = $_POST ['chkboxMie83a'];
$chkboxMie9a = $_POST ['chkboxMie9a'];
$chkboxMie93a = $_POST ['chkboxMie93a'];
$chkboxMie10a = $_POST ['chkboxMie10a'];
$chkboxMie103a = $_POST ['chkboxMie103a'];
$chkboxMie11a = $_POST ['chkboxMie11a'];
$chkboxMie113a = $_POST ['chkboxMie113a'];
$chkboxMie12m = $_POST ['chkboxMie12m'];
$chkboxMie123p = $_POST ['chkboxMie123p'];
$chkboxMie1p = $_POST ['chkboxMie1p'];
$chkboxMie13p = $_POST ['chkboxMie13p'];
$chkboxMie2p = $_POST ['chkboxMie2p'];
$chkboxMie23p = $_POST ['chkboxMie23p'];
$chkboxMie3p = $_POST ['chkboxMie3p'];
$chkboxMie33p = $_POST ['chkboxMie33p'];
$chkboxMie4p = $_POST ['chkboxMie4p'];
$chkboxMie43p = $_POST ['chkboxMie43p'];
$chkboxMie5p = $_POST ['chkboxMie5p'];
$chkboxMie53p = $_POST ['chkboxMie53p'];
$chkboxMie6p = $_POST ['chkboxMie6p'];
$chkboxMie63p = $_POST ['chkboxMie63p'];
$chkboxMie7p = $_POST ['chkboxMie7p'];
$chkboxMie73p = $_POST ['chkboxMie73p'];
$chkboxMie8p = $_POST ['chkboxMie8p'];
$chkboxMie83p = $_POST ['chkboxMie83p'];

$horarioMie=$chkboxMie8a.",".$chkboxMie83a.",".$chkboxMie9a.",".$chkboxMie93a.",".$chkboxMie10a.",".$chkboxMie103a.",".$chkboxMie11a.",".$chkboxMie113a.",".$chkboxMie12m.",".$chkboxMie123p.",".$chkboxMie1p.",".$chkboxMie13p.",".$chkboxMie2p.",".$chkboxMie23p.",".$chkboxMie3p.",".$chkboxMie33p.",".$chkboxMie4p.",".$chkboxMie43p.",".$chkboxMie5p.",".$chkboxMie53p.",".$chkboxMie6p.",".$chkboxMie63p.",".$chkboxMie7p.",".$chkboxMie73p.",".$chkboxMie8p.",".$chkboxMie83p;
$horarioMie= str_replace(',,', '', $horarioMie); //limpiar las comas;

if (strlen($horarioMie)==1) { // quitar la coma si no eligio ningun horario en ese dia
	$horarioMie="";
}else {
	$dias=$dias . "Mie,";//asignar dia 
}

$chkboxJue8a = $_POST ['chkboxJue8a'];
$chkboxJue83a = $_POST ['chkboxJue83a'];
$chkboxJue9a = $_POST ['chkboxJue9a'];
$chkboxJue93a = $_POST ['chkboxJue93a'];
$chkboxJue10a = $_POST ['chkboxJue10a'];
$chkboxJue103a = $_POST ['chkboxJue103a'];
$chkboxJue11a = $_POST ['chkboxJue11a'];
$chkboxJue113a = $_POST ['chkboxJue113a'];
$chkboxJue12m = $_POST ['chkboxJue12m'];
$chkboxJue123p = $_POST ['chkboxJue123p'];
$chkboxJue1p = $_POST ['chkboxJue1p'];
$chkboxJue13p = $_POST ['chkboxJue13p'];
$chkboxJue2p = $_POST ['chkboxJue2p'];
$chkboxJue23p = $_POST ['chkboxJue23p'];
$chkboxJue3p = $_POST ['chkboxJue3p'];
$chkboxJue33p = $_POST ['chkboxJue33p'];
$chkboxJue4p = $_POST ['chkboxJue4p'];
$chkboxJue43p = $_POST ['chkboxJue43p'];
$chkboxJue5p = $_POST ['chkboxJue5p'];
$chkboxJue53p = $_POST ['chkboxJue53p'];
$chkboxJue6p = $_POST ['chkboxJue6p'];
$chkboxJue63p = $_POST ['chkboxJue63p'];
$chkboxJue7p = $_POST ['chkboxJue7p'];
$chkboxJue73p = $_POST ['chkboxJue73p'];
$chkboxJue8p = $_POST ['chkboxJue8p'];
$chkboxJue83p = $_POST ['chkboxJue83p'];

$horarioJue=$chkboxJue8a.",".$chkboxJue83a.",".$chkboxJue9a.",".$chkboxJue93a.",".$chkboxJue10a.",".$chkboxJue103a.",".$chkboxJue11a.",".$chkboxJue113a.",".$chkboxJue12m.",".$chkboxJue123p.",".$chkboxJue1p.",".$chkboxJue13p.",".$chkboxJue2p.",".$chkboxJue23p.",".$chkboxJue3p.",".$chkboxJue33p.",".$chkboxJue4p.",".$chkboxJue43p.",".$chkboxJue5p.",".$chkboxJue53p.",".$chkboxJue6p.",".$chkboxJue63p.",".$chkboxJue7p.",".$chkboxJue73p.",".$chkboxJue8p.",".$chkboxJue83p;
$horarioJue= str_replace(',,', '', $horarioJue); //limpiar las comas;

//if ($horarioJue<>",") {
	//$dias=$dias . "Jue,";//asignar dia 
//}
if (strlen($horarioJue)==1) { // quitar la coma si no eligio ningun horario en ese dia
	$horarioJue="";
}else {
	$dias=$dias . "Jue,";//asignar dia 
}

$chkboxVie8a = $_POST ['chkboxVie8a'];
$chkboxVie83a = $_POST ['chkboxVie83a'];
$chkboxVie9a = $_POST ['chkboxVie9a'];
$chkboxVie93a = $_POST ['chkboxVie93a'];
$chkboxVie10a = $_POST ['chkboxVie10a'];
$chkboxVie103a = $_POST ['chkboxVie103a'];
$chkboxVie11a = $_POST ['chkboxVie11a'];
$chkboxVie113a = $_POST ['chkboxVie113a'];
$chkboxVie12m = $_POST ['chkboxVie12m'];
$chkboxVie123p = $_POST ['chkboxVie123p'];
$chkboxVie1p = $_POST ['chkboxVie1p'];
$chkboxVie13p = $_POST ['chkboxVie13p'];
$chkboxVie2p = $_POST ['chkboxVie2p'];
$chkboxVie23p = $_POST ['chkboxVie23p'];
$chkboxVie3p = $_POST ['chkboxVie3p'];
$chkboxVie33p = $_POST ['chkboxVie33p'];
$chkboxVie4p = $_POST ['chkboxVie4p'];
$chkboxVie43p = $_POST ['chkboxVie43p'];
$chkboxVie5p = $_POST ['chkboxVie5p'];
$chkboxVie53p = $_POST ['chkboxVie53p'];
$chkboxVie6p = $_POST ['chkboxVie6p'];
$chkboxVie63p = $_POST ['chkboxVie63p'];
$chkboxVie7p = $_POST ['chkboxVie7p'];
$chkboxVie73p = $_POST ['chkboxVie73p'];
$chkboxVie8p = $_POST ['chkboxVie8p'];
$chkboxVie83p = $_POST ['chkboxVie83p'];

$horarioVie=$chkboxVie8a.",".$chkboxVie83a.",".$chkboxVie9a.",".$chkboxVie93a.",".$chkboxVie10a.",".$chkboxVie103a.",".$chkboxVie11a.",".$chkboxVie113a.",".$chkboxVie12m.",".$chkboxVie123p.",".$chkboxVie1p.",".$chkboxVie13p.",".$chkboxVie2p.",".$chkboxVie23p.",".$chkboxVie3p.",".$chkboxVie33p.",".$chkboxVie4p.",".$chkboxVie43p.",".$chkboxVie5p.",".$chkboxVie53p.",".$chkboxVie6p.",".$chkboxVie63p.",".$chkboxVie7p.",".$chkboxVie73p.",".$chkboxVie8p.",".$chkboxVie83p;
$horarioVie= str_replace(',,', '', $horarioVie); //limpiar las comas;

if (strlen($horarioVie)==1) { // quitar la coma si no eligio ningun horario en ese dia
	$horarioVie="";
}else {
	$dias=$dias . "Vie,";//asignar dia 
}

$chkboxSab8a = $_POST ['chkboxSab8a'];
$chkboxSab83a = $_POST ['chkboxSab83a'];
$chkboxSab9a = $_POST ['chkboxSab9a'];
$chkboxSab93a = $_POST ['chkboxSab93a'];
$chkboxSab10a = $_POST ['chkboxSab10a'];
$chkboxSab103a = $_POST ['chkboxSab103a'];
$chkboxSab11a = $_POST ['chkboxSab11a'];
$chkboxSab113a = $_POST ['chkboxSab113a'];
$chkboxSab12m = $_POST ['chkboxSab12m'];
$chkboxSab123p = $_POST ['chkboxSab123p'];
$chkboxSab1p = $_POST ['chkboxSab1p'];
$chkboxSab13p = $_POST ['chkboxSab13p'];
$chkboxSab2p = $_POST ['chkboxSab2p'];
$chkboxSab23p = $_POST ['chkboxSab23p'];
$chkboxSab3p = $_POST ['chkboxSab3p'];
$chkboxSab33p = $_POST ['chkboxSab33p'];
$chkboxSab4p = $_POST ['chkboxSab4p'];
$chkboxSab43p = $_POST ['chkboxSab43p'];
$chkboxSab5p = $_POST ['chkboxSab5p'];
$chkboxSab53p = $_POST ['chkboxSab53p'];
$chkboxSab6p = $_POST ['chkboxSab6p'];
$chkboxSab63p = $_POST ['chkboxSab63p'];
$chkboxSab7p = $_POST ['chkboxSab7p'];
$chkboxSab73p = $_POST ['chkboxSab73p'];
$chkboxSab8p = $_POST ['chkboxSab8p'];
$chkboxSab83p = $_POST ['chkboxSab83p'];

$horarioSab=$chkboxSab8a.",".$chkboxSab83a.",".$chkboxSab9a.",".$chkboxSab93a.",".$chkboxSab10a.",".$chkboxSab103a.",".$chkboxSab11a.",".$chkboxSab113a.",".$chkboxSab12m.",".$chkboxSab123p.",".$chkboxSab1p.",".$chkboxSab13p.",".$chkboxSab2p.",".$chkboxSab23p.",".$chkboxSab3p.",".$chkboxSab33p.",".$chkboxSab4p.",".$chkboxSab43p.",".$chkboxSab5p.",".$chkboxSab53p.",".$chkboxSab6p.",".$chkboxSab63p.",".$chkboxSab7p.",".$chkboxSab73p.",".$chkboxSab8p.",".$chkboxSab83p;
$horarioSab= str_replace(',,', '', $horarioSab); //limpiar las comas;

if (strlen($horarioSab)==1) { // quitar la coma si no eligio ningun horario en ese dia
	$horarioSab="";
}else {
	$dias=$dias . "Sab,";//asignar dia  
}


$chkboxDom8a = $_POST ['chkboxDom8a'];
$chkboxDom83a = $_POST ['chkboxDom83a'];
$chkboxDom9a = $_POST ['chkboxDom9a'];
$chkboxDom93a = $_POST ['chkboxDom93a'];
$chkboxDom10a = $_POST ['chkboxDom10a'];
$chkboxDom103a = $_POST ['chkboxDom103a'];
$chkboxDom11a = $_POST ['chkboxDom11a'];
$chkboxDom113a = $_POST ['chkboxDom113a'];
$chkboxDom12m = $_POST ['chkboxDom12m'];
$chkboxDom123p = $_POST ['chkboxDom123p'];
$chkboxDom1p = $_POST ['chkboxDom1p'];
$chkboxDom13p = $_POST ['chkboxDom13p'];
$chkboxDom2p = $_POST ['chkboxDom2p'];
$chkboxDom23p = $_POST ['chkboxDom23p'];
$chkboxDom3p = $_POST ['chkboxDom3p'];
$chkboxDom33p = $_POST ['chkboxDom33p'];
$chkboxDom4p = $_POST ['chkboxDom4p'];
$chkboxDom43p = $_POST ['chkboxDom43p'];
$chkboxDom5p = $_POST ['chkboxDom5p'];
$chkboxDom53p = $_POST ['chkboxDom53p'];
$chkboxDom6p = $_POST ['chkboxDom6p'];
$chkboxDom63p = $_POST ['chkboxDom63p'];
$chkboxDom7p = $_POST ['chkboxDom7p'];
$chkboxDom73p = $_POST ['chkboxDom73p'];
$chkboxDom8p = $_POST ['chkboxDom8p'];
$chkboxDom83p = $_POST ['chkboxDom83p'];

$horarioDom=$chkboxDom8a.",".$chkboxDom83a.",".$chkboxDom9a.",".$chkboxDom93a.",".$chkboxDom10a.",".$chkboxDom103a.",".$chkboxDom11a.",".$chkboxDom113a.",".$chkboxDom12m.",".$chkboxDom123p.",".$chkboxDom1p.",".$chkboxDom13p.",".$chkboxDom2p.",".$chkboxDom23p.",".$chkboxDom3p.",".$chkboxDom33p.",".$chkboxDom4p.",".$chkboxDom43p.",".$chkboxDom5p.",".$chkboxDom53p.",".$chkboxDom6p.",".$chkboxDom63p.",".$chkboxDom7p.",".$chkboxDom73p.",".$chkboxDom8p.",".$chkboxDom83p;
$horarioDom= str_replace(',,', '', $horarioDom); //limpiar las comas;

if (strlen($horarioDom)==1) { // quitar la coma si no eligio ningun horario en ese dia
	$horarioDom="";
}else {
	$dias=$dias . "Dom";//asignar dia 
}
		// ===============================================Grabar los datos ===============================================
		$doc_id= $_SESSION['doc_id'];
		
		// ===============================================Introducir los datos en la tabla=====================================
		$query = mysql_query("INSERT INTO tbl_horarios (hor_lun, hor_mar, hor_mie, hor_jue, hor_vie, hor_sab, hor_dom, hor_dias, hor_doc_id) VALUES ('$horarioLun', '$horarioMar', '$horarioMie', '$horarioJue', '$horarioVie', '$horarioSab', '$horarioDom', '$dias', '$doc_id')");
				
		//===================================================Redirigir a otra pagina============================================		
		$data = array("exito" => '1');
		die(json_encode($data));	
		
		//desconectar();
		mysql_close();
	
break;  // fin case2

case 3: //guardar curriculum
	$us_id= $_SESSION['us_id'];
	$text = $_POST ['resumen'];
    $replaced = str_replace("'", "", $text); //eliminar comillas
	$curriculum = str_replace('"', "", $replaced);
	// ===============================================Actualizar los datos en la tabla=====================================
	$query = mysql_query("UPDATE tbl_doctores SET doc_curriculum='$curriculum' WHERE doc_id_user='$us_id'");
		
	//===================================================Redirigir a otra pagina============================================		
	$data = array("exito" => '1');
	die(json_encode($data));
	
	//desconectar();
	mysql_close();
		
break;
		} // fin switch case
?>