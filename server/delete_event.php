<?php
require('./conector.php');

session_start();

if (isset($_SESSION['username'])) {
  $con = new ConectorBD('localhost','user_db_agenda','1234');
  if ($con->initConexion('agenda_db')=='OK') {
    if ($con->eliminarRegistro('eventos', "id_evento ='".$_POST['id']."'")) {
      $response['msg']= 'OK';
    }else {
      $response['msg']= 'No se pudo realizar la eliminación del registro';
    }
  }else {
    $response['msg']= 'No se pudo conectar a la base de datos';
  }
}else {
  $response['msg']= 'No se ha iniciado una sesión';
}

echo json_encode($response);
$con->cerrarConexion();

?>
