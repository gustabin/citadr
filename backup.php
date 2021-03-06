<?php
session_start();
require_once('tools/mypathdb.php');
backup_tables('servidor','usuario','contrasena','bd'); 

/* backup the db OR just a table */
//En la variable $talbes puedes agregar las tablas especificas separadas por comas:
//profesor,estudiante,clase
//O déjalo con el asterisco '*' para que se respalde toda la base de datos
  
function backup_tables($host,$user,$pwd,$name,$tables = 'tbl_historias')     
{
   //$link = mysql_connect($host,$user,$pwd);
   //mysql_select_db($name,$link);

   //get all of the tables
   if($tables == '*')
   { 
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
         $tables[] = $row[0];
      }
   }

   else

   {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
   
   //cycle through
   foreach($tables as $table)
   {
      //$result = mysql_query('SELECT * FROM '.$table);
	  
	  $doc_id = $_SESSION['doc_id']; 
	  //$result = ("SELECT * FROM ".$table. " WHERE his_doc_id= '$doc_id'");
	  $result = mysql_query("SELECT * FROM ".$table. " WHERE his_doc_id= '$doc_id'");
	  $num_fields = mysql_num_fields($result);
      
      $return.= 'DROP TABLE '.$table.';';
      $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
    for ($i = 0; $i < $num_fields; $i++)
      {
         while($row = mysql_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               $row[$j] = ereg_replace("\n","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }

   //save file
   //$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
   $handle = fopen('db-backup-'.$_SESSION['doc_id'].'.sql','w+');
   fwrite($handle,$return);
   fclose($handle);

}
$enlace = 'db-backup-'.$_SESSION['doc_id'].'.sql';
header ("Content-Disposition: attachment; filename=$enlace ");
header ("Content-Type: application/force-download");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
unlink($enlace); //borra el archivo del servidor
?>