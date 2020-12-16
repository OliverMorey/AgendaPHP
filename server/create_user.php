<?php

$servername = "localhost";
$database = "agenda_db";
$username = "user_db_agenda";
$password = "Agenda3867*.";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

//$hash = password_hash('HolaJoven', PASSWORD_DEFAULT, [15]);
//$sql = "INSERT INTO usuarios (email, nombre_completo, fecha_nacimiento, pwd) VALUES ('omorey@hotmail.com', 'Oliver Morey', '1970/05/25','" .$hash. "')";

//$hash = password_hash('HolaMundo', PASSWORD_DEFAULT, [15]);
//$sql = "INSERT INTO usuarios (email, nombre_completo, fecha_nacimiento, pwd) VALUES ('ihurtado@msn.com', 'Ivan Hurtado', '1978/12/30','" .$hash. "')";

$hash = password_hash('HolaJoven', PASSWORD_DEFAULT, [15]);
$sql = "INSERT INTO usuarios (email, nombre_completo, fecha_nacimiento, pwd) VALUES ('jperez@gmail.com', 'Juan Perez', '1981/07/13','" .$hash. "')";

if (mysqli_query($conn, $sql)) {
      echo "<br>New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
