<?php
session_start();

 try {
    $db = new PDO("pgsql:dbname=grupo9;host=localhost;port=5432;user=grupo9;password=grupo9");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }

$username = $_POST['username'];
$pass = $_POST['password'];
 
$sql = "SELECT * FROM users WHERE users.username = '$username';";

$result = $db -> prepare($sql);
$result -> execute();
#$data = $result -> fetchAll();

$query = "SELECT * FROM users WHERE users.password = '$pass';";
$consu = $db -> prepare($query);
$consu -> execute();
$data = $consu -> fetchAll();

if (count($data) == 1) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "Bienvenido! " . $_SESSION['username'];
    header('Location: ./home.html');

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 ?>