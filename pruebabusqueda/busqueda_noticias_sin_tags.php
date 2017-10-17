/* Busqueda de conciertos de una banda */
<?php
  try {
    $db = new PDO("pgsql:dbname=grupo28;host=localhost;port=5432;user=grupo28;password=grupo28");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }

    $FECHA_FINAL = $_POST["FECHA_FINAL"];
    $FECHA_INICIAL = $_POST["FECHA_INICIAL"];
    print_r($FECHA_INICIAL);


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
    #Obtiene todos los resultados de la consulta en forma de un arreglo
    print_r($dataCollected); #si quieren ver el arreglo de la consulta usar print_r($array);
    ?>