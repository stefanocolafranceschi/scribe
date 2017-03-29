<?php

    $sysidfec = $_POST['sysidfec'];

    for ($i = 1; $i <= 5; $i++) {
       $file='/srsconfig/set_ip'.$i.'.txt';
       if (file_exists($file)) {
          $f = fopen($file, "r");
          $line = fgets($f);
          fclose($f);
       }
       $line = str_replace(array("\n", "\r"), ' ', $line);
       $ip = explode(".", $line);
	   
       if ($sysidfec == $i) {
          $fp1 = fopen('/srsconfig/ip1', 'w');
          fwrite($fp1, $ip[0]);
          fclose($fp1);
    
          $fp2 = fopen('/srsconfig/ip2', 'w');
          fwrite($fp2, $ip[1]);
          fclose($fp2);
    
          $fp3 = fopen('/srsconfig/ip3', 'w');
          fwrite($fp3, $ip[2]);
          fclose($fp3);
    
          $fp4 = fopen('/srsconfig/ip4', 'w');
          fwrite($fp4, $ip[3]);
          fclose($fp4);
       }
   }	
?>
