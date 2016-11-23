<?php
include "lib/class/class2.php";
require_once('tools/mypathdb.php');

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  JCombo2::ver_motivos($_GET["cod"]);
} else {
	die("Vete!");
}
?>
