/* Busqueda de conciertos de una banda */
<?php
  try {
    $db = new PDO("pgsql:dbname=grupo9;host=localhost;port=5432;user=grupo9;password=grupo9");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }

    $GENERO_INGRESADO = $_POST["NOMBRE"];

    print_r($FECHA_INICIAL);


    $query = 
        "SELECT disco.nombre, disco.fecha, disco.descripcion
        FROM disco, pertenecegenero
        WHERE disco.id = pertenecegenero.idd
        AND genero.id = pertenecegenero.idg
        AND genero.nombre = $GENERO_INGRESADO;";

    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    #Obtiene todos los resultados de la consulta en forma de un arreglo
    print_r($dataCollected); #si quieren ver el arreglo de la consulta usar print_r($array);
    ?>
