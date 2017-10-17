/* Busqueda de conciertos de una banda */
<?php
  try {
    $db = new PDO("pgsql:dbname=grupo9;host=localhost;port=5432;user=grupo9;password=grupo9");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }

    $GENERO_INGRESADO = "'".$_POST["NOMBRE"]."'";



    $query = 
        "SELECT disco.nombre, disco.fecha, disco.descripcion
        FROM disco, pertenecegenero
        WHERE disco.id = pertenecegenero.idd
        AND genero.id = pertenecegenero.idg
        AND genero.nombre = $GENERO_INGRESADO;";

    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();

    <?php
    foreach ($dataCollected as $p) {
      echo "<tr> <th>$p[0]</th><th>$p[1]</th><th>$p[2]</th> </tr>";
    }
    ?>
