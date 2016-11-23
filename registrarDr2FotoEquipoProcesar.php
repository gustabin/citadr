<?php
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
$url = 'includes/img/users.jpg';  
$doc_id = $_SESSION['doc_id'];
$query=mysql_query("SELECT *FROM tbl_imagenes WHERE ima_doc_id='$doc_id'");

// Mostrar resultados de la consulta  
        $nConfig = mysql_num_rows ($query);  
        if ($nConfig > 0)  
        {
            for ($i=0; $i<$nConfig; $i++)  
            {  
				$FotoEquipo = mysql_fetch_array($query);
					$nombre_fichero='';
					$nombre_fichero = "pictures/photos/180X180/" . $FotoEquipo['ima_nombre'];
					#SI EXISTE LA FOTO EN LA CARPETA DESTINO ENTRA AQUI
					if (file_exists($nombre_fichero) && !empty($FotoEquipo['ima_nombre'])) 
					{
						$url = "pictures/photos/180X180/" . $FotoEquipo['ima_nombre'];
					}				
				
?>
<div class="span2" style="margin-top:14px">
	<div id='preview-photo'>
		<img src="includes/img/borrar.png" onclick="eliminarFoto('<?php echo $FotoEquipo['ima_nombre']; ?>')" style="cursor:pointer;">
		<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">					
	</div>
</div>
			
<?php			
	      } 
				if($nConfig<8)
				{
					$total=8-$nConfig;
					for ($j=0; $j<$total; $j++)
					{
?>
			<div class="span2" style="margin-top:36px">
				<div id='preview-photo'>
					<img width="140px" class='preview' alt="Foto" src="includes/img/users.jpg">
				</div> 
			</div>
					
<?
					}//FIN FOR 2	 			
				}
?>

<div style="float:left; display:none" id="barra"><img src="includes/img/barra.gif" alt="Cargando..."/><br>Eliminando foto</div>
<?php		
		}
?>