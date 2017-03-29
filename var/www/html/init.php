<?php
    $flock = fopen('/srsconfig/lock', 'w');
    fwrite($flock, "Wait, saving SRS status in progress...");
    fclose($flock);

$port     = file_get_contents("/srsconfig/port");
$adcport     = file_get_contents("/srsconfig/adcport");
$sysport     = file_get_contents("/srsconfig/sysport");
$hybport     = file_get_contents("/srsconfig/hybport");
$apzport     = file_get_contents("/srsconfig/apzport");
$srsgensystem     = file_get_contents("/srsconfig/srsgensystem");
$srsfecadc     = file_get_contents("/srsconfig/srsfecadc");
$srsapvar     = file_get_contents("/srsconfig/srsapvar");
$srsapvhyb     = file_get_contents("/srsconfig/srsapvhyb");
$srsapvzs     = file_get_contents("/srsconfig/srsapvzs");
  
    $f = fopen("/srsconfig/fecnum.txt", "r");
    $fectoiterate = fgets($f);
    fclose($f);

    for ($i = 1; $i <= $fectoiterate; $i++) {
       $file='/srsconfig/set_ip'.$i.'.txt';
       if (file_exists($file)) {
          $f = fopen($file, "r");
          $line = fgets($f);
          $line = str_replace(array("\n", "\r"), ' ', $line);
          $ip = explode(".", $line);
          fclose($f);
          
          $allchips = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");

          if ($srsapvar == '1') {
             $command = '/var/www/cgi-bin/read.sh '.$ip[0].' '.$ip[1].' '.$ip[2].' '.$ip[3].' '.$port;
             system($command);
	  }
	  if ($srsfecadc == '1') {
             $adccommand = '/var/www/cgi-bin/read.sh '.$ip[0].' '.$ip[1].' '.$ip[2].' '.$ip[3].' '.$adcport;
             system($adccommand);
	  }
	  if ($srsgensystem == '1') {
             $syscommand = '/var/www/cgi-bin/read.sh '.$ip[0].' '.$ip[1].' '.$ip[2].' '.$ip[3].' '.$sysport;
             system($syscommand);
	  }
	  if ($srsapvhyb == '1') {
             foreach ($allchips as $j) {
                $hybcommand = '/var/www/cgi-bin/read.sh '.$ip[0].' '.$ip[1].' '.$ip[2].' '.$ip[3].' '.$hybport. ' '. $j;
                system($hybcommand);
	     }
	  }
	  if ($srsapvzs == '1') {
             for ($k = 0; $k <= 15; $k++) {
                $apzcommand = '/var/www/cgi-bin/readapz.sh '.$ip[0].' '.$ip[1].' '.$ip[2].' '.$ip[3].' '.$apzport.' '.$k;
                system($apzcommand);
             }
	  }
       }	   
    }
    $flock = fopen('/srsconfig/lock', 'w');
    fwrite($flock, "");
    fclose($flock);

?> 
