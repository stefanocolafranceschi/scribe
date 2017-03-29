<?php
$partialaddress=$_GET["partialaddress"];

$result = array();
for ($i = 0; $i <= 127; $i++) {
   $hex = ($i >= 16) ? dechex($i) : "0".dechex($i);

   if ( $i <= 9 ) {
      $string=8000000;
   }
   elseif ( $i <= 99 ) {
      $string=800000;
   }
   else {
      $string=80000;
   }
   $file = '/srsconfig/registers/'.$partialaddress.$string.$i;

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
