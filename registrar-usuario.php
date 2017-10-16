<?php


 try {
    $db = new PDO("pgsql:dbname=grupo9;host=localhost;port=5432;user=grupo9;password=grupo9");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }


 $form_pass = $_POST['password'];
 $user = $_POST['username'];
 $pass = $_POST['password'];


 $buscarUsuario = "SELECT * FROM users
 WHERE users.username = '$user'; ";
 $id = "SELECT * FROM users;";
 $cantidad = $db -> prepare($id);
 $cantidad -> execute();
 $ct = $cantidad -> fetchAll();
 $ultimoid = count($ct)+1;

 $result = $db -> prepare($buscarUsuario);
 $result -> execute();
 $dataCollected = $result -> fetchAll();
 $count = count($dataCollected);
 

 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";

 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
 }
 else{

 $query = "INSERT INTO users (uid, username, password)
           VALUES ('$ultimoid', '$user', '$pass')";
 try{
 $resultado = $db -> prepare($query);
 $resultado -> execute();
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $user . "</h4>" . "\n\n";
 header('Location: ./bienvenido.html');

} catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
 }

?>