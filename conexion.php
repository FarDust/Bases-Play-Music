<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <div id="errors" style="display: none;">
      <?php
      include(".credentials.php");
      include("sqlread.php")
      $echo array_key_exists('query',$_POST);
      if (array_key_exists('query',$_POST)){
        $query = $_POST["query"];
        $sql = ''.trim($query).'';
      }
      if (array_key_exists("static",$_POST)){
        echo $staticSQL[$_POST['static']];
        $sql = $staticSQL[$_POST['static']];
      }
      $db = pg_connect("host=localhost dbname=".trim($dbname)." user=".trim($dbuser)." password=".trim($dbpass)."") or die('Conection failed: '.pg_last_error());
      $result= pg_query($sql) or die('Query failed: '.pg_last_error());
      pg_close();

      $json_result = json_encode(pg_fetch_all($result));
      ?>
    </div>
    <pre id='result' style="word-wrap: break-word; white-space: pre-wrap;">
      <?php echo $json_result?>
    </pre>
  </body>
</html>
