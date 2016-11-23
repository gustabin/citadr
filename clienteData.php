<?php
  error_reporting(1); 
  session_start();
  function nvl($val, $replace) {
      if( is_null($val) || $val === '' )  return $replace;
      else                                return $val;
  }  
  require_once('lib/dbpath.php');
  $opcion = $_REQUEST['opcion'];
  switch ($opcion) {
  case 1:                                                       // Crear Cliente  
    $tipo = strtoupper($_POST['tipo']);	
    if (($tipo <> 'V') and ($tipo <> 'C')) {
       $data=array("error" => '1');
       die(json_encode($data));
    } 
    $sql="INSERT INTO vendedores
            ( vn_nombre, vn_tipo, vn_pct )
          VALUES
            ( '". mysql_real_escape_string( $_POST['nombre'] ) . "',
              '" . mysql_real_escape_string( strtoupper($_POST['tipo']) ) . "',	 
             '". mysql_real_escape_string( $_POST['pct'] ) . "')";
    if(mysql_query($sql)){
      $data=array("exito" => '1');
      die(json_encode($data));;
    }else{
      $data=array("error" => '2');
      die(json_encode($data));;
    }
    mysql_close();                                        
    break;                                                
 case 2:                                                        // Actualizar Cliente
    $tipo   = strtoupper($_POST['tipo']);	
    if (($tipo <> 'V') and ($tipo <> 'C')) {
       $data=array("error" => '1');
       die(json_encode($data));
    }
    $sql="UPDATE clientes
             SET vn_tipo='" . mysql_real_escape_string(strtoupper($_POST['tipo'])) . "',
                 vn_nombre='" . mysql_real_escape_string($_POST['nombre']) . "',			 
                 vn_pct='" . mysql_real_escape_string($_POST['pct']) . "'
           WHERE vn_codigo='" . mysql_real_escape_string($_POST['codigo']) . "'";
                 
    if(mysql_query($sql)){
      $data=array("exito" => '1');
      die(json_encode($data));;
    }else{
      $data=array("error" => '2');
      die(json_encode($data));;
    }
    mysql_close(); 
	break;
 case 3:                                                          // Eliminar Cliente
    $sql="DELETE FROM clientes 
           WHERE cl_codigo='" . mysql_real_escape_string($_POST['codigo']) . "'";
                 
    if(mysql_query($sql)){
      $data=array("exito" => '1');
      die(json_encode($data));;
    }else{
      $data=array("error" => '2');
      die(json_encode($data));;
    }
    mysql_close();
  case 4:                                                       // Buscar Cliente
    isset( $_REQUEST['name'] ) ? $name=$_REQUEST['name'] : $name='';
    $Obj_Cliente  = new Cliente();
    $Data_Cliente = $Obj_Cliente->BuscaClientes($name);
    if (!empty($DataCliente)) {
       $data = array($DataCliente);
	   echo $data;
       die(json_encode($DataCliente));
                              }
    else {
       $data = array("error" => '1');
       die(json_encode($data));
         }
    case 5:                                                    // Buscar Cliente Autocomplete
        if ($_REQUEST['term']) {
            $param = $_REQUEST['term']; 
            $DataCliente = $Obj_Cliente->BuscaClienteAutocomplete($param);
            die(json_encode($DataCliente));
        }
        break;	 
	break;
  }                                                       // End Switch
?>
