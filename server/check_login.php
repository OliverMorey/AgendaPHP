<?php

require('conector.php');

 $con = new ConectorBD('localhost','user_db_agenda','1234');

 $response['conexion'] = $con->initConexion('agenda_db');

 if ($response['conexion']=='OK') {
   $resultado_consulta = $con->consultar(['usuarios'],['email', 'pwd'], 'WHERE email="'.$_POST['username'].'"');
   if ($resultado_consulta->num_rows != 0) {
     $fila = $resultado_consulta->fetch_assoc();
     if (password_verify($_POST['password'], $fila['pwd'])) {
       $response['msg'] = "OK";
       session_start();
       $_SESSION['username']=$fila['email'];
     }else {
       $response['msg'] = 'Usuario o Contraseña incorrecta';
       $response['acceso'] = 'rechazado';
     }
   }else{
     $response['msg'] = 'Usuario o Contraseña incorrecta';
     $response['acceso'] = 'rechazado';
   }
 }

 echo json_encode($response);

 $con->cerrarConexion();

?>
