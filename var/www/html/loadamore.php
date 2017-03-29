<?php

$result = array();
$file = '/srsconfig/amoreautoon.txt';

   if (file_exists($file)) {
      array_push($result, 'AUTOMATIC ANALYSIS ACTIVATED');
   }

echo json_encode($result);

?>
