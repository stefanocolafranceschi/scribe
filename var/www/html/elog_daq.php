<?php

$port=8081;

$elogyesnofile = '/srsconfig/elogyesno';
$elogportfile = '/srsconfig/elogport';
$eloghostfile = '/srsconfig/eloghost';
$eloguserfile = '/srsconfig/srsuser';
$elogmessagefile='/srsconfig/elogmessage';

   if (file_exists($elogyesnofile)) {
      $f = fopen($elogyesnofile, "r");
        $elogyesno = fgets($f);
      fclose($f);
   }
   if ( $elogyesno == "1") {

   if (file_exists($elogportfile)) {
      $f1 = fopen($elogportfile, "r");
        $elogport = fgets($f1);
      fclose($f1);
   }

   if (file_exists($eloguserfile)) {
      $f2 = fopen($eloguserfile, "r");
        $eloguser = fgets($f2);
      fclose($f2);
   }

   if (file_exists($eloghostfile)) {
      $f3 = fopen($eloghostfile, "r");
        $eloghost = fgets($f3);
      fclose($f3);
   }

   if (file_exists($elogrunfile)) {
      $f3 = fopen($elogrunfile, "r");
        $elogrun = fgets($f3);
      fclose($f3);
   }
      
   if (file_exists($elogmessagefile)) {
      $sendanelog = "/usr/local/bin/elog -v -h ".$eloghost." -p ".$elogport." -l fit -a Author=".$eloguser." -a Type=''run'' -a Subject=''run'' -m ".$elogmessagefile." -f /srsconfig/config.zip > /dev/null";
      //echo ciao1;
      system($sendanelog);
      system("rm ".$elogmessagefile);
   }
}
?>
