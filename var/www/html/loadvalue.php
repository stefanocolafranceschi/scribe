<?php
$partialaddress=$_GET["partialaddress"];

$result = array();
for ($i = 0; $i <= 31; $i++) {
   $hex = ($i >= 16) ? dechex($i) : "0".dechex($i);
   $file = '/srsconfig/registers/'.$partialaddress.'0'.strtoupper($hex);

   //$file = '/srsconfig/registers/100126039001';
   if (file_exists($file)) {
      $f = fopen($file, "r");

      while ( $line = fgets($f) ) {
         array_push($result, $line);
      }
      fclose($f);
   }
}
echo json_encode($result);

?>
