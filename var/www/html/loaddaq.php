<?php

$result = array();
$file = '/srsconfig/daqon.txt';

   if (file_exists($file)) {
      array_push($result, 'DAQ ACTIVATED');
   }

echo json_encode($result);

?>
