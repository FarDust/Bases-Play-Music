/* Busqueda de conciertos de una banda */
<?php
  try {
    $db = new PDO("pgsql:dbname=grupo9;host=localhost;port=5432;user=grupo9;password=grupo9");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }

    $NOMBRE_BANDA= $_POST["NOMBRE"];

    // Consulta para la info basica de la banda
    $query_1 = 
        "SELECT banda.nombre, banda.descripcion
        FROM banda
        WHERE banda.nombre = $NOMBRE_BANDA;";

    // Consulta para los artistas de la banda
    $query_2 = 
        "SELECT artista.nombre, email.email
        FROM miembro, banda, artista, email, hasemail
        WHERE artista.id = miembro.ida
        AND hasemail.id = artista.id
        AND hasemail.email = email
        AND banda.id = miembro.idb
        AND banda.nombre = $NOMBRE_BANDA;";

    // Consulta para la info de los discos
    $query_3 = 
        "SELECT disco.nombre, disco.sello
        FROM banda, disco, bandaautorof
        WHERE bandaautorof.idb = banda.id
        AND bandaautorof.idd = disco.id
        AND banda.nombre = $NOMBRE_BANDA;";

    $resultado_1 = $db -> prepare($query_1);
    $resultado_1 -> execute();
    $data_1 = $resultado_1 -> fetchAll();

    $resultado_2 = $db -> prepare($query_2);
    $resultado_2 -> execute();
    $data_2 = $resultado_2 -> fetchAll();

    $resultado_3 = $db -> prepare($query_3);
    $resultado_3 -> execute();
    $data_3 = $resultado_3 -> fetchAll();

    // Ahora vienen las consultas a la base de datos del grupo 28
  try {
    $db_2 = new PDO("pgsql:dbname=grupo28;host=localhost;port=5432;user=grupo28;password=grupo28");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }


    // consulta para las noticias de la banda
    $query_4 = 
        "SELECT noticiabandas.titulo, noticiabandas.contenido, noticiabandas.tag
        FROM noticiabandas, baparece_en, banda
        WHERE banda.bid = baparece_en.bid
        AND baparece_en.nid = noticiabandas.nid
        AND banda.nombre = $NOMBRE_BANDA;";

    $query_5 = 
    "SELECT noticiabandas.titulo, noticiabandas.contenido, noticiabandas.tag
    FROM noticiabandas, baparece_en, banda
    WHERE banda.bid = baparece_en.bid
    AND baparece_en.nid = noticiabandas.nid
    AND banda.nombre = $NOMBRE_BANDA;";

    /*Consulta integrantes actuales y pasados de una banda (nombre) */

    $query_6 = 
    "SELECT artista.nombre
    FROM artista, toca_en, banda
    WHERE banda.bid = toca_en.bid
      AND toca_en.aid = artista.aid
      AND toca_en.actual = 'T'
      AND banda.nombre = $NOMBRE_BANDA;";

/*Artistas pasados*/

    $query_7 = 
    "SELECT artista.nombre
    FROM artista, toca_en, banda
    WHERE banda.bid = toca_en.bid
      AND toca_en.aid = artista.aid
      AND toca_en.actual = 'F'
      AND banda.nombre = $NOMBRE_BANDA;";

/* Consulta conciertos futuros */

    $query_8 = 
    "SELECT concierto.principal, concierto.localizacion, concierto.fecha
    FROM concierto, banda, participo_en
    WHERE participo_en.bid = banda.bid
    AND concierto.cid = participo_en.cid
    AND concierto.fecha > now()
    AND banda.nombre = $NOMBRE_BANDA;";




    $resultado_4 = $db_2 -> prepare($query_4);
    $resultado_4 -> execute();
    $data_4 = $resultado_4 -> fetchAll();

    $resultado_5 = $db_2 -> prepare($query_5);
    $resultado_5 -> execute();
    $data_5 = $resultado_5 -> fetchAll();

    $resultado_6 = $db_2 -> prepare($query_6);
    $resultado_6 -> execute();
    $data_6 = $resultado_6 -> fetchAll();

    $resultado_7 = $db_2 -> prepare($query_7);
    $resultado_7 -> execute();
    $data_7 = $resultado_7 -> fetchAll();

    $resultado_8 = $db_2 -> prepare($query_8);
    $resultado_8 -> execute();
    $data_8 = $resultado_8 -> fetchAll();




    /*$result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();*/
    #Obtiene todos los resultados de la consulta en forma de un arreglo

    print_r($data_1);
    print_r($data_2);
    print_r($data_3);
    print_r($data_4);
    print_r($data_5);
    print_r($data_6);
    print_r($data_7);
    print_r($data_8);
    ?>
