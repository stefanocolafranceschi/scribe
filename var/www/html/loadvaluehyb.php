<?php
$partialaddress=$_GET["partialaddress"];

$hexadrs = array(0, 1, 2, 3, 16, 17, 18, 19, 20, 21, 22, 24, 25, 26, 27, 28, 29);
$result = array();

foreach ($hexadrs as $i) {
   //$hex = ($i >= 16) ? dechex($i) : "0".dechex($i);
   //$hex = $i;
   //$hex = ($i >= 16) ? dechex($i) : dechex($i);
   $file = '/srsconfig/registers/'.$partialaddress.$i;
   //echo $file;
   if (file_exists($file)) {
      $f = fopen($file, "r");

      while ( $line = fgets($f) ) {
         array_push($result, $line);
//echo $line;
      }
      fclose($f);
   }
}
echo json_encode($result);

?>
