<?php
session_start();
require('lib/corelib.php');
require_once('tools/mypathdb.php');

require_once('lib/PHPImageWorkshop/ImageWorkshop.php');

use PHPImageWorkshop\ImageWorkshop;

$doc_id = $_SESSION['doc_id'];

$oldpic = 'includes/img/user-icon-180x180.png';

if (isset($_POST) && $_SERVER ['REQUEST_METHOD'] == "POST" && isset($_FILES ['photo'])) {

    $path = "pictures/photos/"; // set your folder path
    $path180X180 = "pictures/photos/180X180/"; // set your folder path
//	$path50X50 = "pictures/photos/50X50/"; // set your folder path


    $filename = $_FILES ['photo'] ['tmp_name']; // get the temporary uploaded image name
    $valid_formats = array(
        "jpg",
        "jpeg",
        "png",
        "gif",
        "GIF",
        "JPG",
        "JPEG",
        "PNG"
    ); // add the formats you want to upload

    $name = $_FILES ['photo'] ['name']; // get the name of the image
    $size = $_FILES ['photo'] ['size']; // get the size of the image
    if (strlen($name)) {  // check if the file is selected or cancelled after pressing the browse button.
        list ( $txt, $ext ) = explode(".", $name); // extract the name and extension of the image
        if (in_array($ext, $valid_formats)) {   // if the file is valid go on.
            if ($size < 2098888) {    // check if the file size is more than 2 mb
                $tmp = $_FILES ['photo'] ['tmp_name'];
                $actual_image_name = $doc_id."_" . date('Ymdhis') . "." . $ext; // actual image name going to store in your folder
                ## Redimensionar imagen:
                $img = new ImageWorkshop();
                $image = $img->initFromPath($tmp);
                $createFolders = true;
                $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
                $imageQuality = 85; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
                # Thumb de 180X180
                $image->resizeInPixel(180, 180, true);
                $image->save($path180X180, $actual_image_name, $createFolders, $backgroundColor, $imageQuality);
                # Thumb de 50X50
//				$image->resizeInPixel(50, null, true);
//				$image->save($path50X50, $actual_image_name, $createFolders, $backgroundColor, $imageQuality);

                if (move_uploaded_file($tmp, $path . $actual_image_name)) { // check the path if it is fine
                    move_uploaded_file($tmp, $path . $actual_image_name); // move the file to the folder
                    // display the image after successfully upload:
		   
		   
					$query=mysql_query("INSERT INTO tbl_imagenes(ima_doc_id, ima_nombre) VALUES ('$doc_id', '$actual_image_name')");
					
$query=mysql_query("SELECT count(ima_id) as total from tbl_imagenes WHERE ima_doc_id='$doc_id'");
// Mostrar resultados de la consulta  
        $nConfig = mysql_fetch_array ($query); 
			$total= $nConfig['total'];
		if ($total==8) {
		die("error");
		}
                    echo "<img width='180' height='180' src='" . $path180X180 . $actual_image_name . "' class='preview'> <input type='hidden' name='actual_image_name' id='actual_image_name' value='$actual_image_name' />";
					
					
					
                } else {
                    echo "<img src='$oldpic' class='preview'> <div id='alert-login' class='alert alert-error'>Error de archivo </div>";
                }
            } else {
                echo "<img src='$oldpic' class='preview'> <div id='alert-login' class='alert alert-error'>Tamaño máximo: 2MB </div>";
            }
        } else {
            echo "<img src='$oldpic' class='preview'> <div id='alert-login' class='alert alert-error'>Formato inválido </div>";
        }
    } else {
        echo "<img src='$oldpic' class='preview'> <div id='alert-login' class='alert alert-error'>Selecciona una imagen </div>";
    }
    exit();
}
?>
