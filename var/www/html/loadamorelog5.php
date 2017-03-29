
<?php

$result = array();
$file = '/srsconfig/run5_dump';

if (file_exists($file)) {
   $f = fopen($file, "r");

   while ( $line = fgets($f) ) {
      array_push($result, $line);
   }
   fclose($f);
}

echo json_encode($result);

?>
