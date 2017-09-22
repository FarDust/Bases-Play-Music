<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <div id="errors" style="display: none;">
      <?php
      include(".credentials.php");
      include("sqlread.php");
      elseif (isset($_POST['query'])){
        $query = $_POST["query"];
        $sql = ''.trim($query).'';
      }
      elseif (isset($_POST['static'])){
        echo $staticSQL[$_POST['static']];
        $sql = $staticSQL[$_POST['static']];
      }
  	  elseif (isset($_POST['dynamic'])){
  		  echo $dynamicSQL[$_POST['option']];
  		  $sql = $dynamicSQL[$_POST['option']];
  	  }
      $db = pg_connect("host=localhost dbname=".trim($dbname)." user=".trim($dbuser)." password=".trim($dbpass)."") or die('Conection failed: '.pg_last_error());
  	  if (isset($_POST['dynamic'])){
        unset($_POST['dynamic']);
        unset($_POST['option']);
        var_dump($_POST);
  		  $result = pg_query_params($db,$sql,$_POST) or die('Query failed: '.pg_last_error());
  	  }else {
  	    $result= pg_query($sql) or die('Query failed: '.pg_last_error());
  	  }
      pg_close();

      $json_result = json_encode(pg_fetch_all($result));
      ?>
    </div>
    <pre id='result' style="word-wrap: break-word; white-space: pre-wrap;">
      <?php echo $json_result?>
    </pre>
  </body>
</html>
