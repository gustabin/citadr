<?php 
# Comprovamos que se haya enviado algo 
if(is_uploaded_file($_FILES["archivo"]["tmp_name"])) 
{ 
  # Copiamos el archivo 
  @copy($_FILES["archivo"]["tmp_name"], 
  $_FILES["archivo"]["name"]); 
echo "El archivo se ha guardado correctamente."; 
  }else{ 
  echo "Selecciona el archivo a guardar en el servidor..."; 
} 
?> 
<html> 
<body> 
<form action="subir.php" method="post" enctype="multipart/form-data"> 
<input type="file" name="archivo"> 
<input type="submit" value="Enviar"> 
</form> 
</body> 
</html>