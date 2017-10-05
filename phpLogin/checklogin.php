<?php
session_start();
?>

<?php
require("conexion.php");
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
    echo "<br><br><a href=http://bases.ing.puc.cl/~grupo28/index.php>pagina inicial</a>"; 

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 ?>