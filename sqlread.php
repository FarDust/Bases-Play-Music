<?php
$myfile = fopen("sql/static.sql", "r") or die("Unable to open file!");
// Output one line until end-of-file
$staticSQL = array();
$i = 0;
while(!feof($myfile)) {
  $staticSQL[$i] = fgets($myfile);
  $i++;
}
fclose($myfile);
?>
