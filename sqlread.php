<?php
$myfile = fopen("sql/static.sql", "r") or die("Unable to open file!");
// Output one line until end-of-file
$staticSQL = array();
$dynamicSQL = array();
$i = 0;
while(!feof($myfile)) {
  $staticSQL[$i] = fgets($myfile);
  $i++;
}
fclose($myfile);

$myfile = fopen("sql/dynamic.sql", "r") or die("Unable to open file!");
$i = 0;
while(!feof($myfile)) {
  $dynamicSQL[$i] = fgets($myfile);
  $i++;
}

fclose($myfile);
$myfile = fopen("sql/tables.sql", "r") or die("Unable to open file!");
$i = 0;
while(!feof($myfile)) {
  $tables[$i] = fgets($myfile);
  $i++;
}
fclose($myfile);
?>
