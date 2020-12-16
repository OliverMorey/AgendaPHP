<?php
require('conector.php');

session_start();

if (isset($_SESSION['username'])) {
  $con = new ConectorBD('localhost','user_db_agenda','1234');
  if ($con->initConexion('agenda_db')=='OK') {
    $resultado = $con->consultar(['usuarios'], ['id'], "WHERE email ='".$_SESSION['username']."'");
    $fila = $resultado->fetch_assoc();

    $resultado = $con->consultar(['eventos'], ['id_evento', 'dia_completo', 'fecha_finalizacion', 'fecha_inicio', 'hora_finalizacion', 'hora_inicio', 'titulo'], "WHERE id ='".$fila['id']."'");
    $i=0;
    while ($fila = $resultado->fetch_assoc()) {
      $response['eventos'][$i]['id']= $fila['id_evento'];
      $response['eventos'][$i]['title']= $fila['titulo'];
      $response['eventos'][$i]['start']= $fila['fecha_inicio'].' '.$fila['hora_inicio'];
      $response['eventos'][$i]['end']=$fila['fecha_finalizacion'].' '.$fila['hora_finalizacion'];
      if ($fila['dia_completo'] == 0){
        $response['eventos'][$i]['allDay']=false;
      }else {
        $response['eventos'][$i]['allDay']=true;
        }
      $i++;
   }
   $response['msg'] = "OK";
  }else {
    $response['msg'] = "No se pudo conectar a la Base de Datos";
  }
}else {
  $response['msg'] = "No se ha iniciado una sesión";
}

echo json_encode($response);
$con->cerrarConexion();

?>
