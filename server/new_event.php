<?php
require('./conector.php');

session_start();

if (isset($_SESSION['username'])) {
  $con = new ConectorBD('localhost','user_db_agenda','1234');
  if ($con->initConexion('agenda_db')=='OK') {
    $resultado = $con->consultar(['usuarios'], ['id'], "WHERE email ='".$_SESSION['username']."'");
    $fila = $resultado->fetch_assoc();

    $data['id'] = $fila['id'];
    $data['titulo'] = "'".$_POST['titulo']."'";
    $data['fecha_inicio'] = "'".$_POST['start_date']."'";
    $data['hora_inicio'] = "'".$_POST['start_hour']."'";
    $data['fecha_finalizacion'] = "'".$_POST['end_date']."'";
    $data['hora_finalizacion'] = "'".$_POST['end_hour']."'";
    if ($_POST['allDay']){
      $data['dia_completo'] = 0;
    }else {
      $data['dia_completo'] = 1;
      }
    if ($con->insertData('eventos', $data)) {
      $response['msg']= 'OK';
      //$response['msg']= $con->insertData('eventos', $data);
    }else {
      $response['msg']= 'No se pudo realizar la inserción de los datos';
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
