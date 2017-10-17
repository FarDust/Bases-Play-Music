/* Busqueda de conciertos de una banda */
<?php
  try {
    $db = new PDO("pgsql:dbname=grupo28;host=localhost;port=5432;user=grupo28;password=grupo28");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }

    $FECHA_FINAL = "'".$_POST["FECHA_FINAL"]."'";
    $FECHA_INICIAL = "'".$_POST["FECHA_INICIAL"]."'";



    $query = 
        'SELECT DISTINCT * FROM (
            SELECT noticiabandas.titulo, noticiabandas.contenido, noticiabandas.tag
            FROM noticiabandas
            WHERE noticiabandas.fecha <= $FECHA_FINAL
            AND noticiabandas.fecha >= $FECHA_INICIAL

            UNION

            SELECT noticiaartista.titulo, noticiaartista.contenido, noticiaartista.tag
            FROM noticiaartista
            WHERE noticiaartista.fecha <= $FECHA_FINAL
            AND noticiaartista.fecha >= $FECHA_INICIAL
        ) AS result1;';

    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
  ?>

    <table><tr> <th>Noticias: </th> </tr>

    <?php
    foreach ($dataCollected as $p) {
      echo "<tr> <th>$p[0]</th><th>$p[1]</th><th>$p[2]</th> </tr>";
    }
    ?>



    <?php

