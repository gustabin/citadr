<?php 
include "lib/corelib.php";
require_once('tools/mypathdb.php');

$nombreImagen=$_REQUEST['nombreImagen'];
$query=mysql_query("DELETE FROM tbl_imagenes WHERE ima_nombre = '$nombreImagen'");

        $foto = 'pictures/photos/';
        $foto_2 = 'pictures/photos/180X180/';
        unlink($foto.$_REQUEST["nombreImagen"]);
        unlink($foto_2.$_REQUEST["nombreImagen"]);
?>