/* Busqueda de conciertos de una banda */
<?php
  try {
    $db = new PDO("pgsql:dbname=grupo28;host=localhost;port=5432;user=grupo28;password=grupo28");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }

    $VALOR_BANDA = "'".$_POST["NOMBRE"]."'";
    $FECHA_FINAL = "'".$_POST["FECHA_FINAL"]."'";
    $FECHA_INICIAL = "'".$_POST["FECHA_INICIAL"]."'";
    print_r($FECHA_INICIAL);


    $query = 
    "SELECT concierto.principal, concierto.fecha, concierto.localización
	FROM concierto, participo_en, banda
	WHERE banda.bid = participo_en.bid
	AND concierto.cid = participo_en.cid
	AND concierto.fecha < $FECHA_FINAL
	AND concierto.fecha > $FECHA_INICIAL
	AND banda.nombre = $VALOR_BANDA
	UNION
	SELECT concierto.principal, concierto.fecha, concierto.localización
	FROM concierto, aparticipo_en, artista
	WHERE concierto.cid = aparticipo_en.cid
	AND artista.aid = aparticipo_en.aid
	AND concierto.fecha < $FECHA_FINAL
	AND concierto.fecha > $FECHA_INICIAL
	AND artista.nombre = $VALOR_BANDA;";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>

    <table><tr> <th>Concierto Artistas</th> </tr>

    <?php
    foreach ($dataCollected as $p) {
      echo "<tr> <th>$p[0]</th><th>$p[1]</th><th>$p[2]</th> </tr>";
    }
    ?>



    <?php




