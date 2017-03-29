<?php

//$result = array();
//$file = '/srsconfig/run1_dump';

//if (file_exists($file)) {
//   $f = fopen($file, "r");
//
//   while ( $line = fgets($f) ) {
//      array_push($result, $line);
//   }
//   fclose($f);
//}
$result=system('ls `tail</srsconfig/rawdatadir.txt`/todo | grep -v core');
//echo json_encode($result);

?>
