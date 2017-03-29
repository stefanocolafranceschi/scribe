<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<title>SRS SLOW CONTROL AND MONITORING APPLICATION</title>
<link rel="stylesheet" type="text/css" href="srsstyle.css">
<script src="jquery.js"></script>
<script src="jquery.form.js"></script>
<script src="scripts.js"></script>
<script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script>
</head>

<body onload="init()">
<table style="width:100%">
  <tr>
    <td><img align="left" src="fit.jpg" height="90px"></td>
    <td><center>
      <font size="6"><font size="7" color="red">S</font>low <font size="7" color="red">C</font>ontrol & <font size="7" color="red">R</font>un <font size="7" 
color="red">I</font>nitialization <font size="7" color="red">B</font>yte-wise <font size="7" color="red">E</font>nvironment</font>
      </center></td>
    <td><img align="right"src="cmslogo.jpg" height="90px"></td>
  </tr>
</table>

<ul id="tabs">
  <li><a href="http://163.118.204.3/srs_v3.php#general"><font size="4.5">General</font></a></li>
  <li><a href="http://163.118.204.3/srs_v3.php#system"><font size="4.5">SRS system</font></a></li>
  <li><a href="http://163.118.204.3/srs_v3.php#adc"><font size="4.5">ADC Card</font></a></li>
  <li><a href="http://163.118.204.3/srs_v3.php#apvs"><font size="4.5">APV Application Registers</font></a></li>
  <li><a href="http://163.118.204.3/srs_v3.php#hybrid"><font size="4.5">APV Hybrid Registers</font></a></li>
  <li><a href="http://163.118.204.3/srs_v3.php#zsregisters"><font size="4.5">APZ Registers</font></a></li>
  <li><a href="http://163.118.204.3/srs_v3.php#zspedestals"><font size="4.5">ZS PEDESTALS</font></a></li>
  <li><a href="http://163.118.204.3/srs_v3.php#daq"><font size="4.5">DAQ</font></a></li>
  <li><a href="http://163.118.204.3/srs_v3.php#amorelog"><font size="4.5">AMORE</font></a></li>
  <li><a href="http://163.118.204.3/srs_v3.php#dqm"><font size="4.5">DQM</font></a></li>
</ul>

<div class="tabContent" id="syssceltafec">
<form id="syswhichfec" method="post" action="">
  FEC: 
  <input type="radio" class="csysidfec" name="sysidfec" id="sysidfec1" value="1" checked> 1
  <input type="radio" class="csysidfec" name="sysidfec" id="sysidfec2" value="2"> 2
  <input type="radio" class="csysidfec" name="sysidfec" id="sysidfec3" value="3"> 3
  <input type="radio" class="csysidfec" name="sysidfec" id="sysidfec4" value="4"> 4
  <input type="radio" class="csysidfec" name="sysidfec" id="sysidfec5" value="5"> 5
</form>

</div>

<div class="tabContent" id="syssceltafechdmi">

  <form id="hybwhichfec" method="post" action="">
  HDMI: 
  <input type="radio" class="cidhdmi" name="idhdmi" id="idhdmi0" value="0" checked="checked"> 0
  <input type="radio" class="cidhdmi" name="idhdmi" id="idhdmi1" value="1"> 1
  <input type="radio" class="cidhdmi" name="idhdmi" id="idhdmi2" value="2"> 2
  <input type="radio" class="cidhdmi" name="idhdmi" id="idhdmi3" value="3"> 3
  <input type="radio" class="cidhdmi" name="idhdmi" id="idhdmi4" value="4"> 4
  <input type="radio" class="cidhdmi" name="idhdmi" id="idhdmi5" value="5"> 5
  <input type="radio" class="cidhdmi" name="idhdmi" id="idhdmi6" value="6"> 6
  <input type="radio" class="cidhdmi" name="idhdmi" id="idhdmi7" value="7"> 7<br>
  APV
  <input type="radio" class="cidhdmi" name="apvkind" id="apvkind1" value="0" checked="checked">Master
  <input type="radio" class="cidhdmi" name="apvkind" id="apvkind2" value="1"> Slave
</form>

</div>

<div class="tabContent hide" id="general">
  <h2>Settings and Utility tools</h2>
  <b>Elog</b>
  <form id="generalform" method="post" action="">
    Elog hostname: <input name="eloghost" id="eloghost" type="text" value="localhost">
    Elog port: <input name="elogport" id="elogport" type="text" value="8080">
    User: <input name="srsuser" id="srsuser" size="25" type="text" value="Default">
    <input name="elogyesno" id="elogyesno" type="checkbox" value="1">
    Automatic Elog <input name="startwritegeneral" value="Save values" type="submit">
  </form>
  <?php
if (isset($_POST['startwritegeneral'])) {
    $elogport  = $_POST['elogport'];
    $srsuser   = $_POST['srsuser'];
    $elogyesno = $_POST['elogyesno'];
    $eloghost  = $_POST['eloghost'];
    
    $fp = fopen('/srsconfig/elogport', 'w');
    fwrite($fp, $elogport);
    fclose($fp);
    
    $fp = fopen('/srsconfig/srsuser', 'w');
    fwrite($fp, $srsuser);
    fclose($fp);
    
    $fp = fopen('/srsconfig/elogyesno', 'w');
    fwrite($fp, $elogyesno);
    fclose($fp);
    
    $fp = fopen('/srsconfig/eloghost', 'w');
    fwrite($fp, $eloghost);
    fclose($fp);
}
?>
  <br>
<b>Computer</b><br>
<?php
echo "Eth0:    ";
echo exec("/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'");
echo "<br><br>Eth1    ";
echo exec("/sbin/ifconfig eth1 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'");
echo "<br><br>Eth2    ";
echo exec("/sbin/ifconfig eth2 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'");
?>
<br><br>
  <h2>Online Monitor/Control</h2>
 <table border="1" width="100%">
  <tr>
    <td width="50%" valign="top"><b>SRS FEC Ports</b><br><br>
  <form id="startreadform" method="post" action="">
    SRS System Port: <input name="sysport" id="sysport" size="9" type="text" value="6007"><br>
    ADC Card Port: <input name="adcport" id="adcport" size="9" type="text" value="6519"><br>
    APV Application Registers Port: <input name="port" id="port" size="9" type="text" value="6039"><br>
    APV Hybrid Registers Port: <input name="hybport" id="hybport" size="9" type="text" value="6263"><br>
    APZ Register Port: <input name="apzport" id="apzport" size="9" type="text" value="6040"><br><br>
    <input name="readall" value="Initialize SRS" type="submit"><br>

  <input type="checkbox" name="srsgensystem" id="srsgensystem" value="1" checked> System
  <input type="checkbox" name="srsfecadc" id="srsfecadc" value="1" checked> FEC
  <input type="checkbox" name="srsapvar" id="srsapvar" value="1" checked> APV AR
  <input type="checkbox" name="srsapvhyb" id="srsapvhyb" value="1" checked> APV H
  <input type="checkbox" name="srsapvzs" id="srsapvzs" value="1"> APZ<br />

    <input name="saveall" value="Save SRS" type="submit">
    <input type="text" name="srscomments" id="srscomments" value=""> Message
  </form>
  <?php
if (isset($_POST['saveall'])) {
   $srscomments = $_POST['srscomments'];
   $flog = fopen('/srsconfig/elogmessage', 'w');
   fwrite($flog, $srscomments);
   fclose($flog);
   system('/var/www/cgi-bin/save.sh');
}
if (isset($_POST['readall'])) {
    $flock = fopen('/srsconfig/lock', 'w');
    fwrite($flock, "Wait, initialization in progress...");
    fclose($flock);

    $port    = $_POST['port'];
    $adcport = $_POST['adcport'];
    $sysport = $_POST['sysport'];
    $hybport = $_POST['hybport'];
    $apzport = $_POST['apzport'];
    $srsgensystem = $_POST['srsgensystem'];
    $srsfecadc = $_POST['srsfecadc'];
    $srsapvar = $_POST['srsapvar'];
    $srsapvhyb = $_POST['srsapvhyb'];
    $srsapvzs = $_POST['srsapvzs'];
  

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
    
    $fport = fopen('/srsconfig/port', 'w');
    fwrite($fport, $port);
    fclose($fport);
    
    $fport = fopen('/srsconfig/hybport', 'w');
    fwrite($fport, $hybport);
    fclose($fport);
    
    $fport = fopen('/srsconfig/adcport', 'w');
    fwrite($fport, $adcport);
    fclose($fport);
    
    $fport = fopen('/srsconfig/apzport', 'w');
    fwrite($fport, $apzport);
    fclose($fport);
    
    $fport = fopen('/srsconfig/sysport', 'w');
    fwrite($fport, $sysport);
    fclose($fport);

    $flock = fopen('/srsconfig/lock', 'w');
    fwrite($flock, "");
    fclose($flock);
}
?>
<br>
    </td>
    <td width="50%" valign="top"><b>SRS FECs</b><br><br>

  <form id="dateform" method="post" action="">
    Total number of FECs<input name="datetotfecnumber" id="datetotfecnumber" size="3" type="text" value="1"><br><br><br>
    
        SRU:
    <input name="sruip1" id="sruip1" size="3" type="text" value="<?php 
    $file='/srsconfig/sru_ip.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f); 
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[0]);?>">
    <input name="sruip2" id="sruip2" size="3" type="text" value="<?php
    $file='/srsconfig/sru_ip.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[1]);?>">
    <input name="sruip3" id="sruip3" size="3" type="text" value="<?php
    $file='/srsconfig/sru_ip.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[2]);?>">
    <input name="sruip4" id="sruip4" size="3" type="text" value="<?php
    $file='/srsconfig/sru_ip.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[3]);?>">
    <input name="sruyesno" id="sruyesno" size="3" type="checkbox" value="999"><br>

    FEC IP:
    <input name="date1ip1" id="date1ip1" size="3" type="text" value="<?php 
    $file='/srsconfig/set_ip1.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f); 
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[0]);?>">
    <input name="date1ip2" id="date1ip2" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip1.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[1]);?>">
    <input name="date1ip3" id="date1ip3" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip1.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[2]);?>">
    <input name="date1ip4" id="date1ip4" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip1.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[3]);?>">
    FEC number<input name="datefecnumber1" id="datefecnumber1" size="3" type="text" value="1"><br>
    FEC IP:
    <input name="date2ip1" id="date2ip1" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip2.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[0]);?>">
    <input name="date2ip2" id="date2ip2" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip2.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[1]);?>">
    <input name="date2ip3" id="date2ip3" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip2.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[2]);?>">
    <input name="date2ip4" id="date2ip4" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip2.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[3]);?>">
    FEC number<input name="datefecnumber2" id="datefecnumber2" size="3" type="text" value="2"><br>
    FEC IP:
    <input name="date3ip1" id="date3ip1" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip3.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[0]);?>">
    <input name="date3ip2" id="date3ip2" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip3.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[1]);?>">
    <input name="date3ip3" id="date3ip3" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip3.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[2]);?>">
    <input name="date3ip4" id="date3ip4" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip3.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[3]);?>">
    FEC number<input name="datefecnumber3" id="datefecnumber3" size="3" type="text" value="3"><br>
    FEC IP:
    <input name="date4ip1" id="date4ip1" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip4.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[0]);?>">
    <input name="date4ip2" id="date4ip2" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip4.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[1]);?>">
    <input name="date4ip3" id="date4ip3" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip4.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[2]);?>">
    <input name="date4ip4" id="date4ip4" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip4.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[3]);?>">
    FEC number<input name="datefecnumber4" id="datefecnumber4" size="3" type="text" value="4"><br>
    FEC IP:
    <input name="date5ip1" id="date5ip1" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip5.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[0]);?>">
    <input name="date5ip2" id="date5ip2" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip5.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[1]);?>">
    <input name="date5ip3" id="date5ip3" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip5.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[2]);?>">
    <input name="date5ip4" id="date5ip4" size="3" type="text" value="<?php
    $file='/srsconfig/set_ip5.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    $line = str_replace(array("\n", "\r"), ' ', $line);
    $ip = explode(".", $line);
    echo rtrim($ip[3]);?>">
    FEC number<input name="datefecnumber5" id="datefecnumber5" size="3" type="text" value="5"><br>
    <br><input name="writedate" value="Apply configuration" type="submit">
  </form>
  <?php
if (isset($_POST['writedate'])) {
	if (isset($_POST['sruyesno'])) {
	   $sruyesno = $_POST['sruyesno'];
           $sruip1 = $_POST['sruip1'];
           $sruip2 = $_POST['sruip2'];
           $sruip3 = $_POST['sruip3'];
           $sruip4 = $_POST['sruip4'];
	   $fsru = fopen('/srsconfig/sru_ip.txt', 'w');
           fwrite($fsru, $sruip1.".".$sruip2.".".$sruip3.".".$sruip4);
           fclose($fsru);
	}
	else {
		system('rm /srsconfig/sru_ip.txt');
	}
    $datetotfecnumber = $_POST['datetotfecnumber'];

   $date1ip1 = $_POST['date1ip1'];
   $date1ip2 = $_POST['date1ip2'];
   $date1ip3 = $_POST['date1ip3'];
   $date1ip4 = $_POST['date1ip4'];

   $date2ip1 = $_POST['date2ip1'];
   $date2ip2 = $_POST['date2ip2'];
   $date2ip3 = $_POST['date2ip3'];
   $date2ip4 = $_POST['date2ip4'];

   $date3ip1 = $_POST['date3ip1'];
   $date3ip2 = $_POST['date3ip2'];
   $date3ip3 = $_POST['date3ip3'];
   $date3ip4 = $_POST['date3ip4'];

   $date4ip1 = $_POST['date4ip1'];
   $date4ip2 = $_POST['date4ip2'];
   $date4ip3 = $_POST['date4ip3'];
   $date4ip4 = $_POST['date4ip4'];

   $date5ip1 = $_POST['date5ip1'];
   $date5ip2 = $_POST['date5ip2'];
   $date5ip3 = $_POST['date5ip3'];
   $date5ip4 = $_POST['date5ip4'];

   $datefecnumber1 = $_POST['datefecnumber1'];
   $datefecnumber2 = $_POST['datefecnumber2'];
   $datefecnumber3 = $_POST['datefecnumber3'];
   $datefecnumber4 = $_POST['datefecnumber4'];
   $datefecnumber5 = $_POST['datefecnumber5'];
   
   $fp = fopen('/srsconfig/fecnum.txt', 'w');
   fwrite($fp, $datetotfecnumber);
   fclose($fp);

   $datecmd = '/var/www/cgi-bin/script_date.sh '.$date1ip1.' '.$date1ip2.' '.$date1ip3.' '.$date1ip4.' '.$datefecnumber1;
   system($datecmd);

   $datecmd = '/var/www/cgi-bin/script_date.sh '.$date2ip1.' '.$date2ip2.' '.$date2ip3.' '.$date2ip4.' '.$datefecnumber2;
   system($datecmd);

   $datecmd = '/var/www/cgi-bin/script_date.sh '.$date3ip1.' '.$date3ip2.' '.$date3ip3.' '.$date3ip4.' '.$datefecnumber3;
   system($datecmd);

   $datecmd = '/var/www/cgi-bin/script_date.sh '.$date4ip1.' '.$date4ip2.' '.$date4ip3.' '.$date4ip4.' '.$datefecnumber4;
   system($datecmd);

   $datecmd = '/var/www/cgi-bin/script_date.sh '.$date5ip1.' '.$date5ip2.' '.$date5ip3.' '.$date5ip4.' '.$datefecnumber5;
   system($datecmd);
}
?>
    </td>
  </tr>
</table> 

</div>
<div class="tabContent" style="color:#FF0000" id="srsstatus" ></div>
<div class="tabContent hide" id="apvs">
  <table style="width:100%">
    <tr>
      <td width="50%" valign="top">
        <br>
        <table border="1">
          <tr>
            <td>Address (HEX) - Value to Write (HEX)</td>
            <td>ReadBack value</td>
          </tr>
          <tr>
            <td><form id="writeaddress0" method="post" action="">
                <input name="address0" id="address0" size="9" type="text" value="0" readonly="readonly">
                <input name="value0" id="value0" size="9" type="text" value="0x4">
                <input name="startwrite0" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite0'])) {
    $address0 = $_POST['address0'];
    $value0   = $_POST['value0'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address0 . ' ' . $value0 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
    //system("/var/www/cgi-bin/elog.sh");
}
?></td>
            <td><div id="ValueRead0" >Loading data...</div></td>
            <td><div id="divcolor0">&nbsp &nbsp </div></td>
            <td bgcolor="99C68E"><text id="bclkmodehelpshow">BCLK_MODE</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress1" method="post" action="">
               <input name="address1" id="address1" size="9" type="text" value="1" readonly="readonly">
              <input name="valuetowrite1" id="valuetowrite1" size="9" type="text" value="0x4">
              <input name="startwrite1" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite1'])) {
    $address1 = $_POST['address1'];
    $value1   = $_POST['valuetowrite1'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address1 . ' ' . $value1 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead1" >Loading data...</div></td>
            <td><div id="divcolor1">&nbsp &nbsp </div></td>
            <td bgcolor="99C68E"><text id="bclktrgbursthelpshow">BCLK_TRGBURST</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress2" method="post" action="">
              <input name="address2" id="address2" size="9" type="text" value="2" readonly="readonly">
              <input name="valuetowrite2" id="valuetowrite2" size="9" type="text" value="0x9C40">
              <input name="startwrite2" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite2'])) {
    $address2 = $_POST['address2'];
    $value2   = $_POST['valuetowrite2'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address2 . ' ' . $value2 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead2" >Loading data...</div></td>
            <td><div id="divcolor2">&nbsp &nbsp </div></td>
            <td bgcolor="99C68E"><text id="bclkfreqhelpshow">BCLK_FREQ</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress3" method="post" action="">
              <input name="address3" id="address3" size="9" type="text" value="3" readonly="readonly">
              <input name="valuetowrite3" id="valuetowrite3" size="9" type="text" value="0x18">
              <input name="startwrite3" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite3'])) {
    $address3 = $_POST['address3'];
    $value3   = $_POST['valuetowrite3'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address3 . ' ' . $value3 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead3" >Loading data...</div></td>
            <td><div id="divcolor3">&nbsp &nbsp </div></td>
            <td bgcolor="99C68E"><text id="bclktrgdelayhelpshow">BCLK_TRGDELAY</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress4" method="post" action="">
              <input name="address4" id="address4" size="9" type="text" value="4" readonly="readonly">
              <input name="valuetowrite4" id="valuetowrite4" size="9" type="text" value="0x80">
              <input name="startwrite4" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite4'])) {
    $address4 = $_POST['address4'];
    $value4   = $_POST['valuetowrite4'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address4 . ' ' . $value4 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead4" >Loading data...</div></td>
            <td><div id="divcolor4">&nbsp &nbsp </div></td>
            <td bgcolor="99C68E"><text id="bclktpdelayhelpshow">BCLK_TPDELAY</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress5" method="post" action="">
              <input name="address5" id="address5" size="9" type="text" value="5" readonly="readonly">
              <input name="valuetowrite5" id="valuetowrite5" size="9" type="text" value="0x12C">
              <input name="startwrite5" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite5'])) {
    $address5 = $_POST['address5'];
    $value5   = $_POST['valuetowrite5'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address5 . ' ' . $value5 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead5" >Loading data...</div></td>
            <td><div id="divcolor5">&nbsp &nbsp </div></td>
            <td bgcolor="99C68E"><text id="bclkrosynchelpshow">BCLK_ROSYNC</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress6" method="post" action="">
              <input name="address6" id="address6" size="9" type="text" value="6" readonly="readonly">
              <input name="valuetowrite6" id="valuetowrite6" size="9" type="text" value="">
              <input name="startwrite6" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite6'])) {
    $address6 = $_POST['address6'];
    $value6   = $_POST['valuetowrite6'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address6 . ' ' . $value6 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead6" >Loading data...</div></td>
            <td><div id="divcolor6">&nbsp &nbsp </div></td>
            <td>reserved</td>
          </tr>
          <tr>
            <td><form id="writeaddress7" method="post" action="">
              <input name="address7" id="address7" size="9" type="text" value="7" readonly="readonly">
              <input name="valuetowrite7" id="valuetowrite7" size="9" type="text" value="0x3FFF">
              <input name="startwrite7" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite7'])) {
    $address7 = $_POST['address7'];
    $value7   = $_POST['valuetowrite7'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address7 . ' ' . $value7 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead7" >Loading data...</div></td>
            <td><div id="divcolor7">&nbsp &nbsp </div></td>
            <td><text id="adcstatushelpshow">ADC_STATUS</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress8" method="post" action="">
              <input name="address8" id="address8" size="9" type="text" value="8" readonly="readonly">
              <input name="valuetowrite8" id="valuetowrite8" size="9" type="text" value="0xFFFF">
              <input name="startwrite8" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite8'])) {
    $address8 = $_POST['address8'];
    $value8   = $_POST['valuetowrite8'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address8 . ' ' . $value8 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead8" >Loading data...</div></td>
            <td><div id="divcolor8">&nbsp &nbsp</div></td>
            <td bgcolor="C7B097"><text id="evbldchenablehelpshow">EVBLD_CHENABLE</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress9" method="post" action="">
              <input name="address9" id="address9" size="9" type="text" value="9" readonly="readonly">
              <input name="valuetowrite9" id="valuetowrite9" size="9" type="text" value="0x9c4">
              <input name="startwrite9" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite9'])) {
    $address9 = $_POST['address9'];
    $value9   = $_POST['valuetowrite9'];
    $ip1      = file_get_contents("/srsconfig/ip1");
    $ip2      = file_get_contents("/srsconfig/ip2");
    $ip3      = file_get_contents("/srsconfig/ip3");
    $ip4      = file_get_contents("/srsconfig/ip4");
    $port     = file_get_contents("/srsconfig/port");
    $command  = '/var/www/cgi-bin/do.sh' . ' ' . $address9 . ' ' . $value9 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead9" >Loading data...</div></td>
            <td><div id="divcolor9">&nbsp &nbsp</div></td>
            <td bgcolor="C7B097"><text id="evblddatalenghthelpshow">EVBLD_DATALENGHT</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress0a" method="post" action="">
              <input name="address0a" id="address0a" size="9" type="text" value="0a" readonly="readonly">
              <input name="valuetowrite0a" id="valuetowrite0a" size="9" type="text" value="0x0">
              <input name="startwrite0a" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite0a'])) {
    $address0a = $_POST['address0a'];
    $value0a   = $_POST['valuetowrite0a'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address0a . ' ' . $value0a . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead0a" >Loading data...</div></td>
            <td><div id="divcolor0a">&nbsp &nbsp</div></td>
            <td bgcolor="C7B097"><text id="evbldmodehelpshow">EVBLD_MODE</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress0b" method="post" action="">
              <input name="address0b" id="address0b" size="9" type="text" value="0b" readonly="readonly">
              <input name="valuetowrite0b" id="valuetowrite0b" size="9" type="text" value="0x0">
              <input name="startwrite0b" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite0b'])) {
    $address0b = $_POST['address0b'];
    $value0b   = $_POST['valuetowrite0b'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address0b . ' ' . $value0b . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead0b" >Loading data...</div></td>
            <td><div id="divcolor0b">&nbsp &nbsp</div></td>
            <td bgcolor="C7B097"><text id="evbldeventinfotypehelpshow">EVBLD_EVENT_INFO_TYPE</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress0c" method="post" action="">
              <input name="address0c" id="address0c" size="9" type="text" value="0c" readonly="readonly">
              <input name="valuetowrite0c" id="valuetowrite0c" size="9" type="text" value="">
              <input name="startwrite0c" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite0c'])) {
    $address0c = $_POST['address0c'];
    $value0c   = $_POST['valuetowrite0c'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address0c . ' ' . $value0c . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead0c" >Loading data...</div></td>
            <td><div id="divcolor0c">&nbsp &nbsp</div></td>
            <td bgcolor="C7B097"><text id="evbldeventinfodatahelpshow">EVBLD_EVENT_INFO_DATA</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress0d" method="post" action="">
              <input name="address0d" id="address0d" size="9" type="text" value="0d" readonly="readonly">
              <input name="valuetowrite0d" id="valuetowrite0d" size="9" type="text" value="">
              <input name="startwrite0d" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite0d'])) {
    $address0d = $_POST['address0d'];
    $value0d   = $_POST['valuetowrite0d'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address0d . ' ' . $value0d . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead0d" >Loading data...</div></td>
            <td><div id="divcolor0d">&nbsp &nbsp</div></td>
            <td>reserved</td>
          </tr>
          <tr>
            <td><form id="writeaddress0e" method="post" action="">
              <input name="address0e" id="address0e" size="9" type="text" value="0e" readonly="readonly">
              <input name="valuetowrite0e" id="valuetowrite0c" size="9" type="text" value="">
              <input name="startwrite0e" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite0e'])) {
    $address0e = $_POST['address0e'];
    $value0e   = $_POST['valuetowrite0e'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address0e . ' ' . $value0e . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead0e" >Loading data...</div></td>
            <td><div id="divcolor0e">&nbsp &nbsp</div></td>
            <td>reserved</td>
          </tr>
          <tr>
            <td><form id="writeaddress0f" method="post" action="">
              <input name="address0f" id="address0f" size="9" type="text" value="0f" readonly="readonly">
              <input name="valuetowrite0f" id="valuetowrite0f" size="9" type="text" value="0x0">
              <input name="startwrite0f" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite0f'])) {
    $address0f = $_POST['address0f'];
    $value0f   = $_POST['valuetowrite0f'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address0f . ' ' . $value0f . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead0f" >Loading data...</div></td>
            <td><div id="divcolor0f">&nbsp &nbsp</div></td>
            <td><text id="roenabledhelpshow">RO_ENABLED</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress10" method="post" action="">
              <input name="address10" id="address10" size="9" type="text" value="10" readonly="readonly">
              <input name="valuetowrite10" id="valuetowrite10" size="9" type="text" value="0x0">
              <input name="startwrite10" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite10'])) {
    $address10 = $_POST['address10'];
    $value10   = $_POST['valuetowrite10'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address10 . ' ' . $value10 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead10" >Loading data...</div></td>
            <td><div id="divcolor10">&nbsp &nbsp</div></td>
            <td bgcolor="#98AFC7"><text id="apzsyncdethelpshow">APZ_SYNC_DET</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress11" method="post" action="">
              <input name="address11" id="address11" size="9" type="text" value="11" readonly="readonly">
              <input name="valuetowrite11" id="valuetowrite11" size="9" type="text" value="0x80">
              <input name="startwrite11" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite11'])) {
    $address11 = $_POST['address11'];
    $value11   = $_POST['valuetowrite11'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address11 . ' ' . $value11 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead11" >Loading data...</div></td>
            <td><div id="divcolor11">&nbsp &nbsp</div></td>
            <td bgcolor="#98AFC7"><text id="apzstatushelpshow">APZ_STATUS</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress12" method="post" action="">
              <input name="address12" id="address12" size="9" type="text" value="12" readonly="readonly">
              <input name="valuetowrite12" id="valuetowrite12" size="9" type="text" value="0x0">
              <input name="startwrite12" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite12'])) {
    $address12 = $_POST['address12'];
    $value12   = $_POST['valuetowrite12'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address12 . ' ' . $value12 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead12" >Loading data...</div></td>
            <td><div id="divcolor12">&nbsp &nbsp</div></td>
            <td bgcolor="#98AFC7"><text id="apzapvselecthelpshow">APZ_APVSELECT</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress13" method="post" action="">
              <input name="address13" id="address13" size="9" type="text" value="13" readonly="readonly">
              <input name="valuetowrite13" id="valuetowrite13" size="9" type="text" value="0x0">
              <input name="startwrite13" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite13'])) {
    $address13 = $_POST['address13'];
    $value13   = $_POST['valuetowrite13'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address13 . ' ' . $value13 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead13" >Loading data...</div></td>
            <td><div id="divcolor13">&nbsp &nbsp </div></td>
            <td bgcolor="#98AFC7"><text id="apznsampleshelpshow">APZ_NSAMPLES</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress14" method="post" action="">
              <input name="address14" id="address14" size="9" type="text" value="14" readonly="readonly">
              <input name="valuetowrite14" id="valuetowrite13" size="9" type="text" value="0x0">
              <input name="startwrite14" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite14'])) {
    $address14 = $_POST['address14'];
    $value14   = $_POST['valuetowrite14'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address14 . ' ' . $value14 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead14" >Loading data...</div></td>
            <td><div id="divcolor14">&nbsp &nbsp </div></td>
            <td bgcolor="#98AFC7"><text id="apzzerosuppthrhelpshow">APZ_ZEROSUPP_THR</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress15" method="post" action="">
              <input name="address15" id="address15" size="9" type="text" value="15" readonly="readonly">
              <input name="valuetowrite15" id="valuetowrite15" size="9" type="text" value="0x0">
              <input name="startwrite15" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite15'])) {
    $address15 = $_POST['address15'];
    $value15   = $_POST['valuetowrite15'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address15 . ' ' . $value15 . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead15" >Loading data...</div></td>
            <td><div id="divcolor15">&nbsp &nbsp</div></td>
            <td bgcolor="#98AFC7"><text id="apzzerosuppprmshelpshow">
              APZ_ZERO_SUPP_PRMS
              <text></td>
          </tr>
          <tr>
            <td><form id="writeaddress1d" method="post" action="">
              <input name="address1d" id="address1d" size="9" type="text" value="1d" readonly="readonly">
              <input name="valuetowrite1d" id="valuetowrite1d" size="9" type="text" value="0x0">
              <input name="startwrite1d" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite1d'])) {
    $address1d = $_POST['address1d'];
    $value1d   = $_POST['valuetowrite1d'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address1d . ' ' . $value1d . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead1d" >Loading data...</div></td>
            <td><div id="divcolor1d">&nbsp &nbsp</div></td>
            <td bgcolor="#98AFC7"><text id="apzsynclowthrhelpshow">APZ_SYNC_LOW_THR</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress1e" method="post" action="">
              <input name="address1e" id="address1e" size="9" type="text" value="1e" readonly="readonly">
              <input name="valuetowrite1e" id="valuetowrite1e" size="9" type="text" value="0x0">
              <input name="startwrite1e" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite1e'])) {
    $address1e = $_POST['address1e'];
    $value1e   = $_POST['valuetowrite1e'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address1e . ' ' . $value1e . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead1e" >Loading data...</div></td>
            <td><div id="divcolor1e">&nbsp &nbsp</div></td>
            <td bgcolor="#98AFC7"><text id="apzsynchighthrhelpshow">APZ_SYNC_HIGH_THR</text></td>
          </tr>
          <tr>
            <td><form id="writeaddress1f" method="post" action="">
              <input name="address1f" id="address1f" size="9" type="text" value="1f" readonly="readonly">
              <input name="valuetowrite1f" id="valuetowrite1f" size="9" type="text" value="0x0">
              <input name="startwrite1f" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['startwrite1f'])) {
    $address1f = $_POST['address1f'];
    $value1f   = $_POST['valuetowrite1f'];
    $ip1       = file_get_contents("/srsconfig/ip1");
    $ip2       = file_get_contents("/srsconfig/ip2");
    $ip3       = file_get_contents("/srsconfig/ip3");
    $ip4       = file_get_contents("/srsconfig/ip4");
    $port      = file_get_contents("/srsconfig/port");
    $command   = '/var/www/cgi-bin/do.sh' . ' ' . $address1f . ' ' . $value1f . ' ' . $port . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($command);
}
?></td>
            <td><div id="ValueRead1f" >Loading data...</div></td>
            <td><div id="divcolor1f">&nbsp &nbsp</div></td>
            <td bgcolor="#98AFC7"><text id="apzcmdhelpshow">APZ_CMD</text></td>
          </tr>
        </table></td>
        
        
      <td valign="top"><h2>Online Help</h2>
        
        <h2 class="bclkmodehelptext">BCLK MODE</h2>
        <table border="1" class="bclkmodehelptext" style="width:100%">
          <tr>
            <th>Bit</th>
            <th>7 - 4</th>
            <th>3</th>
            <th>2</th>
            <th>1</th>
            <th>0</th>
          </tr>
          <tr>
            <th>Descr.</th>
            <th>reserved</th>
            <th>TRGIN polarity</th>
            <th>TRIGGER MODE</th>
            <th>APV Test Pulse</th>
            <th>APV Reset</th>
          </tr>
          <tr>
            <td>V = 0</td>
            <td></td>
            <td>NIM</td>
            <td>Internally generated continuous loop</td>
            <td>Test pulse disabled</td>
            <td>Disabled. Default for run mode.</td>
          </tr>
          <tr>
            <td>V = 1</td>
            <td></td>
            <td>inverse NIM</td>
            <td>External. Controlled by TRGIN </td>
            <td>Test pulse enabled</td>
            <td>Enabled. Used with the test-pulse. Do not use in run mode</td>
          </tr>
        </table>
        <p class="bclkmodehelptext">Example:<br>
          3 (b00000011) => continuous loop with test pulse and reset (test mode)<br>
          4 (b00000100) => triggered externally, no test-pulse, no reset (running mode - acquisition controlled by external trigger)</p>
        </p>
        <p class="bclktrgbursthelptext">
        
        <h2 class="bclktrgbursthelptext">BCLK TRG BURST</h2>
        </p>
        <p class="bclktrgbursthelptext">It controls how many time slots the APV chip is reading from its
          memory for each trigger. The formula is (n + 1) x 3. Setting this to 4 means a number of 15 time slots. The
          maximum is 30 time slots (n = 9).</p>
        <p class="bclkfreqhelptext">
        
        <h2 class="bclkfreqhelptext">BCLK FREQ</h2>
        </p>
        <p class="bclkfreqhelptext">a) (APVAPP_PORT.BCLK_MODE.TRIGGER_MODE = 1) When trigger source is set to external this parameter controls the deadtime introduced by the FPGA. After accepting a trigger, the FPGA will ignore all triggers incoming for Bclk_freq x 64 x 25ns time. 40000 means 1ms. This time shouldcnot be lower than the total acquisition time of one event which is about 222 us (with defaultcparameters).<br><br>
          b) (APVAPP_PORT.BCLK_MODE.TRIGGER_MODE = 0) When the trigger source is set to internal this
          parameter controls the repetition rate of the internal generated trigger.<br><br>

DEC = (1/RATE) /  (64*25e-9)<br>
HEX = DEC2HEX(DEC)<br>
<br>
<table class="bclkfreqhelptext" border="1" width="100%">
  <tr>
    <td>Hz</td>
    <td>DEC</td>
    <td>HEX</td>		
  </tr>
  <tr>
    <td>1</td>
    <td>625000</td>
    <td>00098968</td>
  </tr>
  <tr>
    <td>10</td>
    <td>62500</td>
    <td>0000F424</td>
  </tr>
  <tr>
    <td>50</td>
    <td>12500</td>
    <td> 000030D4</td>
  </tr>
  <tr>
    <td>100</td>
    <td>6250 </td>
    <td>0000186A</td>
  </tr>
  <tr>
    <td>150</td>
    <td>4166.67 </td>
    <td>00001046</td>
  </tr>
  <tr>
    <td>200</td>
    <td>3125 </td>
    <td>00000C35</td>
  </tr>
  <tr>
    <td>250</td>
    <td>2500 </td>
    <td>000009C4</td>
  </tr>
  <tr>
    <td>300</td>
    <td>2083.33 </td>
    <td>00000823</td>
  </tr>
  <tr>
    <td>350</td>
    <td>1785.71 </td>
    <td>000006F9</td>
  </tr>
  <tr>
    <td>400</td>
    <td>1562.5 </td>
    <td>0000061A</td>
  </tr>
  <tr>
    <td>450</td>
    <td>1388.89 </td>
    <td>0000056C</td>
  </tr>
  <tr>
    <td>500</td>
    <td>1250 </td>
    <td>000004E2</td>
  </tr>
  <tr>
    <td>600</td>
    <td>1041.67</td>
    <td> 00000411</td>
  </tr>
  <tr>
    <td>700</td>
    <td>892.86 </td>
    <td>0000037C</td>
  </tr>
  <tr>
    <td>800</td>
    <td>781.25 </td>
    <td>0000030D</td>
  </tr>
  <tr>
    <td>900</td>
    <td>694.44 </td>
    <td>000002B6</td>
  </tr>
  <tr>
    <td>1000</td>
    <td>625 </td>
    <td>00000271</td>
  </tr>
  <tr>
    <td>1500</td>
    <td>416.66 </td>
    <td>000001A0</td>
  </tr>
  <tr>
    <td>2000</td>
    <td>312.50 </td>
    <td>00000138</td>
  </tr>
  <tr>
    <td>3000</td>
    <td>208.33 </td>
    <td>000000D0</td>
  </tr>
  <tr>
    <td>3500</td>
    <td>178.57 </td>
    <td>000000B2</td>
  </tr>
  <tr>
    <td>4000</td>
    <td>156.25 </td>
    <td>0000009C</td>
  </tr>
  <tr>
    <td>4500</td>
    <td>138.88 </td>
    <td>0000008A</td>
  </tr>
  <tr>
    <td>5000</td>
    <td>125 </td>
    <td>0000007D</td>
  </tr>
  <tr>
    <td>6000</td>
    <td>104.16 </td>
    <td>00000068</td>
  </tr>
  <tr>
    <td>7000</td>
    <td>89.28 </td>
    <td>00000059</td>
  </tr>
  <tr>
    <td>8000</td>
    <td>78.12</td>
    <td>0000004E</td>
  </tr>
  <tr>
    <td>9000</td>
    <td>69.44</td>
    <td>00000045</td>
  </tr>
  <tr>
    <td>10000</td>
    <td>62.5</td>
    <td>0000003E</td>
  </tr>
</table>
</p>

        <p class="bclktrgdelayhelptext">
        
        <h2 class="bclktrgdelayhelptext">BCLK TRG DELAY</h2>
        </p>
        <p class="bclktrgdelayhelptext">The FPGA delays the trigger for this number of clock-cycles (25ns)
          until propagating it to the chip. When used with the APV25 front-end ASIC, the effective latency of the
          trigger is the difference between APV_PORT.APV_LATENCY and APVAPP_PORT.BCLK_TRGDELAY.</p>
        <p class="bclktpdelayhelptext">
        
        <h2 class="bclktpdelayhelptext">BCLK TP DELAY</h2>
        </p>
        <p class="bclkrosynchelptext">
        
        <h2 class="bclkrosynchelptext">BCLK RO SYNC</h2>
        </p>
        <p class="adcstatushelptext">
        
        <h2 class="adcstatushelptext">ADC STATUS</h2>
        </p>
        <p class="evbldchenablehelptext">
        <h2 class="evbldchenablehelptext">EVBLD CH ENABLE</h2>
        </p>
        <p class="evbldchenablehelptext">Channel-enable mask for the data transmission. Even bits are
          masters and odd bits are slaves. If bit is set, corresponding channel is enabled. Channel mapping:
        <table border="1" class="evbldchenablehelptext" style="width:100%">
          <tr>
            <th>Bit</th>
            <th>15</th>
            <th>14</th>
            <th>13</th>
            <th>12</th>
            <th>11</th>
            <th>10</th>
            <th>9</th>
            <th>8</th>
            <th>7</th>
            <th>6</th>
            <th>5</th>
            <th>4</th>
            <th>3</th>
            <th>2</th>
            <th>1</th>
            <th>0</th>
          </tr>
          <tr>
            <th>HDMI channel</th>
            <td colspan="2"><center>
                7
              </center></td>
            <td colspan="2"><center>
                6
              </center></td>
            <td colspan="2"><center>
                5
              </center></td>
            <td colspan="2"><center>
                4
              </center></td>
            <td colspan="2"><center>
                3
              </center></td>
            <td colspan="2"><center>
                2
              </center></td>
            <td colspan="2"><center>
                1
              </center></td>
            <td colspan="2"><center>
                0
              </center></td>
          </tr>
          <tr>
            <td>Master/Slave</td>
            <td>S</td>
            <td>M</td>
            <td>S</td>
            <td>M</td>
            <td>S</td>
            <td>M</td>
            <td>S</td>
            <td>M</td>
            <td>S</td>
            <td>M</td>
            <td>S</td>
            <td>M</td>
            <td>S</td>
            <td>M</td>
            <td>S</td>
            <td>M</td>
          </tr>
        </table>
        </p>
        <p class="evblddatalenghthelptext">
        <h2 class="evblddatalenghthelptext">EVBLD DATA LENGHT</h2>
        </p>
        <p class="evblddatalenghthelptext">Length of the data capture window in words (16-bit), in raw
          data (ADC) mode or bypass mode of the APZ code. Maximum allowed value without exceeding the UDP
          jumbo frame limit is 4000.</p>
        <p class="evbldmodehelptext">
        <h2 class="evbldmodehelptext">EVBLD MODE</h2>
        </p>
        <p class="evbldmodehelptext">Event Builder mode register. Controls the format of the FRAME
          COUNTER field of the SRS data format.</p>
        <table border="1" class="evbldmodehelptext" style="width:100%">
          <tr>
            <th>EVBLD MODE</th>
            <th>MODE</th>
            <th colspan="4">FRAME COUNTER field</th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>Byte 3</td>
            <td>Byte 2</td>
            <td>Byte 1</td>
            <td>Byte 0</td>
          </tr>
          <tr>
            <td>0</td>
            <td>Single-FEC mode (default)</td>
            <td>0x00</td>
            <td>0x00</td>
            <td>0x00</td>
            <td>F#</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Test Mode</td>
            <td colspan="4"><center>
                GF#
              </center></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Multiple-FEC Mode</td>
            <td colspan="3"><center>
                TS
              </center></td>
            <td><center>
                F#
              </center></td>
          </tr>
        </table>
        <p class="evbldmodehelptext"> F# = frame-of-event counter (1 byte): starts from 0 for a new event and increases for every frame
          of the same event.<br>
          <br>
          GF# = frame-of-run counter: 4-byte global frame counter which starts from 0 at the beginning of the
          run and and counts continuously (does not reset for each event).<br>
          <br>
          TS = 3-byte timestamp tag attributed to each event.</p>
        <p class="evbldeventinfotypehelptext">
        <h2 class="evbldeventinfotypehelptext">EVBLD EVENT INFO TYPE</h2>
        </p>
        <p class="evbldeventinfodatahelptext">
        <h2 class="evbldeventinfodatahelptext">EVBLD EVENT INFO DATA</h2>
        </p>
        <p class="evbldeventinfodatahelptext">Controls the content of the HEADER INFO FIELD of the SRS Data Format.</p>
        <table border="1" class="evbldeventinfodatahelptext" style="width:100%">
          <tr>
            <th>Bit</th>
            <th>31 - 16</th>
            <th>15 - 8</th>
            <th>7 - 0</th>
          </tr>
          <tr>
            <th>Name</th>
            <th>HINFO_LABEL</th>
            <th>HINFO_SEL</th>
            <th>reserved</th>
          </tr>
          <tr>
            <td>Descr.</td>
            <td>Run label that can be copied in the most significant bytes of HEADER INFO FIELD of every event</td>
            <td>elects the content of HEADER INFO FIELD (see table)</td>
            <td></td>
          </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <table border="1" class="evbldeventinfodatahelptext" style="width:100%">
          <tr>
            <th>HINFO_SEL</th>
            <th colspan="4">HEADER INFO</th>
          </tr>
          <tr>
            <td>0x01</td>
            <td colspan="2">TRIGGER COUNTER (2 bytes)</td>
            <td colspan="2">EVBLD_DATALENGHT</td>
          </tr>
          <tr>
            <td>0x02</td>
            <td colspan="4">TRIGGER COUNTER (4 bytes)</td>
          </tr>
          <tr>
            <td>other</td>
            <td colspan="2">HINFO LABEL</td>
            <td colspan="2">EVBLD_DATALENGHT</td>
          </tr>
        </table>
        <p class="roenabledhelptext">
        <h2 class="roenabledhelptext">RO ENABLED</h2>
        </p>
        <p class="apzsyncdethelptext">
        <h2 class="apzsyncdethelptext">APZ SYNC DET</h2>
        </p>
        <p class="apzsyncdethelptext">Detects if an APV front-end ASIC is present at each ADC channel and is
          correctly configured for 40MHz acquisition. Each of the 16 bits of the register corresponds to one
          channel, with the same mapping as for the EVBLD_CHENABLE register.</p>
        <p class="apzstatushelptext">
        <h2 class="apzstatushelptext">APZ STATUS</h2>
        </p>
        <p class="apzstatushelptext">Status of the APV processor</p>
        <table border="1" class="apzstatushelptext" style="width:100%">
          <tr>
            <th>Bit</th>
            <th colspan="16">31 - 16</th>
            <th>15 - 12</th>
            <th>11 - 8</th>
            <th>7</th>
            <th>6</th>
            <th>5</th>
            <th>4</th>
            <th>3</th>
            <th>2</th>
            <th>1</th>
            <th>0</th>
          </tr>
          <tr class="spaceUnder">
            <td rowspan="2"><header>
                <hh>
                Name</header>
              <hh></td>
            <td><header>
                <hh>
                CH15</header>
              <hh></td>
            <td><header>
                <hh>
                CH14</header>
              <hh></td>
            <td><header>
                <hh>
                CH13</header>
              <hh></td>
            <td><header>
                <hh>
                CH12</header>
              <hh></td>
            <td><header>
                <hh>
                CH11</header>
              <hh></td>
            <td><header>
                <hh>
                CH10</header>
              <hh></td>
            <td><header>
                <hh>
                CH9</header>
              <hh></td>
            <td><header>
                <hh>
                CH8</header>
              <hh></td>
            <td><header>
                <hh>
                CH7</header>
              <hh></td>
            <td><header>
                <hh>
                CH6</header>
              <hh></td>
            <td><header>
                <hh>
                CH5</header>
              <hh></td>
            <td><header>
                <hh>
                CH4</header>
              <hh></td>
            <td><header>
                <hh>
                CH3</header>
              <hh></td>
            <td><header>
                <hh>
                CH2</header>
              <hh></td>
            <td><header>
                <hh>
                CH1</header>
              <hh></td>
            <td><header>
                <hh>
                CH0</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                reserved</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                CALIB_ALL_CRT</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                APZ_ENABLED</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                APZ_BYPASS</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                CMD DONE</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                CALIB_ALL_DONE</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                WATCHDOG FLAG</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                PHASE ALIGNED</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                PEDCAL BUSY</header>
              <hh></td>
            <td rowspan="2"><header>
                <hh>
                PHASECAL BUSY</header>
              <hh></td>
          </tr>
          <tr>
            <td colspan="16">APZ_CHANNEL_STATUS</td>
          </tr>
        </table>
        <br>
        <br>
        <table border="1" class="apzstatushelptext" style="width:100%">
          <tr>
            <th>Bit</th>
            <th>Name</th>
            <th>Description</th>
          </tr>
          <tr>
            <td>0</td>
            <td>PHASECAL_BUSY</td>
            <td>Clock-phase calibration running</td>
          </tr>
          <tr>
            <td>1</td>
            <td>PEDCAL_BUSY</td>
            <td>Pedestal calibration running</td>
          </tr>
          <tr>
            <td>2</td>
            <td>PHASE_ALIGNED</td>
            <td>Clock-phase calibration routine completed successfully</td>
          </tr>
          <tr>
            <td>3</td>
            <td>WATCHDOG_FLAG</td>
            <td>Last pedestal calibration terminated by a watchdog reset</td>
          </tr>
          <tr>
            <td>4</td>
            <td>CALIB_ALL_DONE</td>
            <td>"Calibrate All" command finished</td>
          </tr>
          <tr>
            <td>5</td>
            <td>CMD_DONE</td>
            <td>Command finished</td>
          </tr>
          <tr>
            <td>6</td>
            <td>APZ_BYPASS_N</td>
            <td>Bypassing APZ code. Reading out raw data from channel APZ_APVSELECT</td>
          </tr>
          <tr>
            <td>7</td>
            <td>APZ_ENABLED</td>
            <td>APZ code enabled. Reading out zero-suppressed data</td>
          </tr>
          <tr>
            <td>11 - 8</td>
            <td>CALIB_ALL_CRT</td>
            <td>When "Calibrate All" command is active this field indicates the current channel being treated</td>
          </tr>
          <tr>
            <td>31 - 16</td>
            <td>APZ_CHANNEL_STATUS</td>
            <td>Indicates channels that were successfully calibrated by either
              "calibrate all" or "calibrate single" commands. When channels are
              calibrated one by one the corresponding bit is updated each time
              "calibrate single" command is executed. All bits are cleared by a "APZ reset" command.</td>
          </tr>
        </table>
        <p class="apzapvselecthelptext">
        <h2 class="apzapvselecthelptext">APZ APV SELECT</h2>
        </p>
        <p class="apzapvselecthelptext">Selects the APV for the pedestal calibration, clock-phase calibration
          (“calibrate single” command), and raw data monitoring (in APZ bypass mode). Valid range: 0 -15.</p>
        <p class="apznsampleshelptext">
        <h2 class="apznsampleshelptext">APZ N SAMPLES</h2>
        </p>
        <p class="apznsampleshelptext">Tells the APV processor how many time-samples to process for each
          trigger. If set to 0 the register is set internally using the BCLK_TRGBURST value, using the (n + 1) x 3
          formula. The register is provided to allow the user to limit the acquisition to a specific number of time-
          samples from the APV output stream.<br>
          <br>
          Note: Experimental use only, use with care. If the register is set to a
          higher number of samples than the APV, the data processor may hang.</p>
        <p class="apzzerosuppthrhelptext">
        <h2 class="apzzerosuppthrhelptext">APZ ZERO SUPP THR</h2>
        </p>
        <p class="apzzerosuppthrhelptext">Optional threshold register for the zero-suppression operation.
          The value of the register is multiplied with the sigma value of each channel, and the result is used as threshold for the zero-suppression. This register is only used when bit 4 (threshold mode) of register
          APZ_ZEROSUPP_PRMS.</p>
        <br>
        <br>
        <br>
        <table border="1" class="apzzerosuppthrhelptext" style="width:100%">
          <tr>
            <th>Bit</th>
            <th colspan="4">15 - 0</th>
          </tr>
          <tr>
            <th>Name</th>
            <th colspan="4">Zero-suppression threshold (APZ_ZEROSUPP_THR)</th>
          </tr>
          <tr>
            <td rowspan="2">Descr.</td>
            <td><center>
                15 - 14
              </center></td>
            <td><center>
                13 - 8
              </center></td>
            <td><center>
                7 - 2
              </center></td>
            <td><center>
                1 - 0
              </center></td>
          </tr>
          <tr>
            <td>reserved</td>
            <td>Integer part of the threshold</td>
            <td>Fractional part of the threshold </td>
            <td>reserved</td>
          </tr>
        </table>
        <p class="apzzerosuppprmshelptext">
        <h2 class="apzzerosuppprmshelptext">APZ ZERO SUPP RMS</h2>
        </p>
        <p class="apzzerosuppprmshelptext">Configuration register for the zero-suppression unit.</p>
        <table border="1" class="apzzerosuppprmshelptext" style="width:100%">
          <tr>
            <th>Bit</th>
            <th>..5</th>
            <th>4</th>
            <th>3</th>
            <th>2</th>
            <th>1</th>
            <th>0</th>
          </tr>
          <tr>
            <td>Name</td>
            <td></td>
            <td>Threshold mode</td>
            <td>Force signal</td>
            <td>Disable pedestal correction </td>
            <td></td>
            <td>Peak find mode</td>
          </tr>
          <tr>
            <td>Descr.</td>
            <td>reserved</td>
            <td>0 = auto<br>
              1 = APZ_ZEROSUPP_THR</td>
            <td>No channel is suppressed. All 128 APV channels are acquired in APZ format </td>
            <td>Pedestal value is forced to 0 for all channels, therefore uncorrected data is acquired. </td>
            <td>reserved</td>
            <td>Data is further reduced by acquiring only the peak sample and its relative sample position</td>
          </tr>
        </table>
        <p class="apzsynclowthrhelptext">
        <h2 class="apzsynclowthrhelptext">APZ SYNC LOW THR</h2>
        </p>
        <p class="apzsynchighthrhelptext">
        <h2 class="apzsynchighthrhelptext">APZ SYNC HIGH THR</h2>
        </p>
        <p class="apzcmdhelptext">
        <h2 class="apzcmdhelptext">APZ CMD</h2>
        </p>
        <p class="apzcmdhelptext"> Command register for the APV processor. (Note. This register was revised and
          moved from address 0x11 (for the alpha release) to 0x1F).This register is used to trigger different
          calibration routines of the APZ processor. Calibration commands are can be run on single channels
          (identified by APZ_APVSELECT register) or on multiple channels (enabled channels in EVBLD_CHENABLE
          register).</p>
        <table border="1" class="apzcmdhelptext" style="width:100%">
          <tr>
            <th>CMD</th>
            <th>Name></th>
            <th>Description</th>
            <th>Channel(s) defined by</th>
          </tr>
          <tr>
            <td>0x00</td>
            <td>Run/Abort</td>
            <td>Default run mode. Any other can be aborted by writing 0 to the APZ_CMD register</td>
            <td>EVBLD_CHENABLE</td>
          </tr>
          <tr>
            <td>0x00</td>
            <td>Run/Abort</td>
            <td>Default run mode. Any other can be aborted by writing 0 to the APZ_CMD register</td>
            <td>EVBLD_CHENABLE</td>
          </tr>
          <tr>
            <td>0x01</td>
            <td>CAL_PHASE_SINGLE</td>
            <td>Calibrate phase, single channel</td>
            <td>APZ_APVSELECT</td>
          </tr>
          <tr>
            <td>0x02</td>
            <td>CAL_PED_SINGLE</td>
            <td>Calibrate pedestal (and sigma), single channel</td>
            <td>APZ_APVSELECT</td>
          </tr>
          <tr>
            <td>0x03</td>
            <td>CAL_FULL_SINGLE</td>
            <td>Calibrate both phase and pedestal (and sigma) values, single channel</td>
            <td>APZ_APVSELECT</td>
          </tr>
          <tr>
            <td>0x0F</td>
            <td>BYPASS</td>
            <td>Bypass APZ processor. Data is readout in raw format from a single channel</td>
            <td>APZ_APVSELECT</td>
          </tr>
          <tr>
            <td>0x10</td>
            <td>CAL_FULL_ALL</td>
            <td>Calibrate all channels enabled by EVBLD_CHENABLE (full calibration). Channels are treated sequentially; current channel being treated is displayed in CALIB_ALL_CRT field of APZ_STATUS register. <b>Return to run mode (APZ_CMD = 0) after this command is compulsory</b></td>
            <td>EVBLD_CHENABLE</td>
          </tr>
          <tr>
            <td>0x11</td>
            <td>CAL_PHASE_ALL</td>
            <td>As above, phase only</td>
            <td>EVBLD_CHENABLE</td>
          </tr>
          <tr>
            <td>0x12</td>
            <td>CAL_PED_ALL</td>
            <td>As above, pedestal and sigma only</td>
            <td>EVBLD_CHENABLE</td>
          </tr>
          <tr>
            <td>0xFF</td>
            <td>RESET</td>
            <td>Reset APZ processor</td>
            <td></td>
          </tr>
        </table></td>
    </tr>
  </table>
</div>



<div class="tabContent hide" id="system">
  <table border="1" >
    <tr>
      <td>Address (HEX) - Value to Write (HEX)</td>
      <td>ReadBack value</td>
    </tr>

    <tr>
      <td><form id="syswriteaddress0" method="post" action="">
        <input name="sysaddress0" id="sysaddress0" size="9" type="text" value="0" readonly="readonly">
        <input name="sysvaluetowrite0" id="sysvaluetowrite0" size="9" type="text" value="">
        <input name="sysstartwrite0" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress0'])) {
    $sysaddress0 = $_POST['sysaddress0'];
    $sysvalue0   = $_POST['sysvaluetowrite0'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress0 . ' ' . $sysvalue0 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>
      <td><div id="sysValueRead0" >Loading data...</div></td>
      <td>Firmware version identifier</td>
    </tr>

    <tr>
      <td><form id="syswriteaddress1" method="post" action="">
        <input name="sysaddress1" id="sysaddress1" size="9" type="text" value="0" readonly="readonly">
        <input name="sysvaluetowrite1" id="sysvaluetowrite1" size="9" type="text" value="">
        <input name="sysstartwrite1" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress1'])) {
    $sysaddress1 = $_POST['sysaddress1'];
    $sysvalue1   = $_POST['sysvaluetowrite1'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress1 . ' ' . $sysvalue1 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead1" >Loading data...</div></td>
      <td>Local MAC address, vendor identifier part</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress2" method="post" action="">
        <input name="sysaddress2" id="sysaddress2" size="9" type="text" value="0" readonly="readonly">
        <input name="sysvaluetowrite2" id="sysvaluetowrite2" size="9" type="text" value="">
        <input name="sysstartwrite2" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress2'])) {
    $sysaddress2 = $_POST['sysaddress2'];
    $sysvalue2   = $_POST['sysvaluetowrite2'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress2 . ' ' . $sysvalue2 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead2" >Loading data...</div></td>
      <td>Local MAC address, device identifier part</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress3" method="post" action="">
        <input name="sysaddress3" id="sysaddress3" size="9" type="text" value="0" readonly="readonly">
        <input name="sysvaluetowrite3" id="sysvaluetowrite3" size="9" type="text" value="">
        <input name="sysstartwrite3" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress3'])) {
    $sysaddress3 = $_POST['sysaddress3'];
    $sysvalue3   = $_POST['sysvaluetowrite3'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress3 . ' ' . $sysvalue3 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead3" >Loading data...</div></td>
      <td>Local (FEC) IP address</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress4" method="post" action="">
        <input name="sysaddress4" id="sysaddress4" size="9" type="text" value="0" readonly="readonly">
        <input name="sysvaluetowrite4" id="sysvaluetowrite4" size="9" type="text" value="">
        <input name="sysstartwrite4" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress4'])) {
    $sysaddress4 = $_POST['sysaddress4'];
    $sysvalue4   = $_POST['sysvaluetowrite4'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress4 . ' ' . $sysvalue4 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead4" >Loading data...</div></td>
      <td>UDP port for data transfer</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress5" method="post" action="">
        <input name="sysaddress5" id="sysaddress5" size="9" type="text" value="5" readonly="readonly">
        <input name="sysvaluetowrite5" id="sysvaluetowrite5" size="9" type="text" value="">
        <input name="sysstartwrite5" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress5'])) {
    $sysaddress5 = $_POST['sysaddress0'];
    $sysvalue5   = $_POST['sysvaluetowrite0'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress5 . ' ' . $sysvalue5 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead5" >Loading data...</div></td>
      <td>UDP port for slow control</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress6" method="post" action="">
        <input name="sysaddress6" id="sysaddress6" size="9" type="text" value="6" readonly="readonly">
        <input name="sysvaluetowrite6" id="sysvaluetowrite6" size="9" type="text" value="">
        <input name="sysstartwrite6" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress0'])) {
    $sysaddress6 = $_POST['sysaddress6'];
    $sysvalue6   = $_POST['sysvaluetowrite6'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress6 . ' ' . $sysvalue6 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead6" >Loading data...</div></td>
      <td>Delay between UDP frames.</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress7" method="post" action="">
        <input name="sysaddress7" id="sysaddress7" size="9" type="text" value="7" readonly="readonly">
        <input name="sysvaluetowrite7" id="sysvaluetowrite7" size="9" type="text" value="">
        <input name="sysstartwrite7" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress7'])) {
    $sysaddress7 = $_POST['sysaddress0'];
    $sysvalue7   = $_POST['sysvaluetowrite7'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress7 . ' ' . $sysvalue7 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead7" >Loading data...</div></td>
      <td>DATE flow control parameter. Experimental!</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress8" method="post" action="">
        <input name="sysaddress8" id="sysaddress8" size="9" type="text" value="8" readonly="readonly">
        <input name="sysvaluetowrite8" id="sysvaluetowrite8" size="9" type="text" value="">
        <input name="sysstartwrite8" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress8'])) {
    $sysaddress8 = $_POST['sysaddress8'];
    $sysvalue8   = $_POST['sysvaluetowrite8'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress8 . ' ' . $sysvalue8 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead8" >Loading data...</div></td>
      <td>Ethernet control register. Reserved!</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress9" method="post" action="">
        <input name="sysaddress9" id="sysaddress9" size="9" type="text" value="9" readonly="readonly">
        <input name="sysvaluetowrite9" id="sysvaluetowrite9" size="9" type="text" value="">
        <input name="sysstartwrite9" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress9'])) {
    $sysaddress9 = $_POST['sysaddress9'];
    $sysvalue9   = $_POST['sysvaluetowrite9'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress9 . ' ' . $sysvalue9 . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead9" >Loading data...</div></td>
      <td>Slow control control register. Reserved!</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress0a" method="post" action="">
        <input name="sysaddress0a" id="sysaddress0" size="9" type="text" value="0a" readonly="readonly">
        <input name="sysvaluetowrite0a" id="sysvaluetowrite0a" size="9" type="text" value="">
        <input name="sysstartwrite0a" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress0'])) {
    $sysaddress0a = $_POST['sysaddress0a'];
    $sysvalue0a   = $_POST['sysvaluetowrite0a'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress0a . ' ' . $sysvalue0a . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead0a" >Loading data...</div></td>
      <td>DAQ destination IP</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress0b" method="post" action="">
        <input name="sysaddress0b" id="sysaddress0b" size="9" type="text" value="0b" readonly="readonly">
        <input name="sysvaluetowrite0b" id="sysvaluetowrite0" size="9" type="text" value="">
        <input name="sysstartwrite0b" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress0b'])) {
    $sysaddress0b = $_POST['sysaddress0b'];
    $sysvalue0b   = $_POST['sysvaluetowrite0'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress0b . ' ' . $sysvalue0b . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead0b" >Loading data...</div></td>
      <td>Control register for the DTCC link (only with DTC fw)</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress0c" method="post" action="">
        <input name="sysaddress0c" id="sysaddress0c" size="9" type="text" value="0c" readonly="readonly">
        <input name="sysvaluetowrite0c" id="sysvaluetowrite0c" size="9" type="text" value="">
        <input name="sysstartwrite0c" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress0c'])) {
    $sysaddress0c = $_POST['sysaddress0c'];
    $sysvalue0c   = $_POST['sysvaluetowrite0c'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress0c . ' ' . $sysvalue0c . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead0c" >Loading data...</div></td>
      <td>Main clock selection register</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress0d" method="post" action="">
        <input name="sysaddress0d" id="sysaddress0" size="9" type="text" value="0d" readonly="readonly">
        <input name="sysvaluetowrite0d" id="sysvaluetowrite0d" size="9" type="text" value="">
        <input name="sysstartwrite0d" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress0'])) {
    $sysaddress0d = $_POST['sysaddress0d'];
    $sysvalue0d   = $_POST['sysvaluetowrite0d'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress0d . ' ' . $sysvalue0d . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead0d" >Loading data...</div></td>
      <td>Main clock status register (read/only)</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress0e" method="post" action="">
        <input name="sysaddress0e" id="sysaddress0" size="9" type="text" value="0e" readonly="readonly">
        <input name="sysvaluetowrite0e" id="sysvaluetowrite0e" size="9" type="text" value="">
        <input name="sysstartwrite0e" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress0'])) {
    $sysaddress0e = $_POST['sysaddress0e'];
    $sysvalue0e  = $_POST['sysvaluetowrite0e'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress0e . ' ' . $sysvalue0e . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead0e" >Loading data...</div></td>
      <td>reserved</td>
    </tr>
    <tr>
      <td><form id="syswriteaddress0f" method="post" action="">
        <input name="sysaddress0f" id="sysaddress0f" size="9" type="text" value="0f" readonly="readonly">
        <input name="sysvaluetowrite0f" id="sysvaluetowrite0f" size="9" type="text" value="">
        <input name="sysstartwrite0f" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['sysaddress0f'])) {
    $sysaddress0f = $_POST['sysaddress0f'];
    $sysvalue0f   = $_POST['sysvaluetowrite0f'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $sysport     = file_get_contents("/srsconfig/adcport");
    $syscommand = '/var/www/cgi-bin/do.sh' . ' ' . $sysaddress0f . ' ' . $sysvalue0f . ' ' . $sysport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>      <td><div id="sysValueRead0f" >Loading data...</div></td>
      <td>FW version register (hardwired read-only)</td>
    </tr>
  </table>
</div>


<div class="tabContent hide" id="adc">
  <table border="1">
    <tr>
      <td>Address (HEX) - Value to Write (HEX)</td>
      <td>ReadBack value</td>
    </tr>
    <tr>
      <td><form id="writeadcaddress0" method="post" action="">
        <input name="adcaddress0" id="adcaddress0" size="9" type="text" value="0" readonly="readonly">
        <input name="adcvaluetowrite0" id="adcvaluetowrite0" size="9" type="text" value="0xff">
        <input name="adcstartwrite0" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['adcstartwrite0'])) {
    $adcaddress0 = $_POST['adcaddress0'];
    $adcvalue0   = $_POST['adcvaluetowrite0'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $adcport     = file_get_contents("/srsconfig/adcport");
    $adccommand = '/var/www/cgi-bin/do.sh' . ' ' . $adcaddress0 . ' ' . $adcvalue0 . ' ' . $adcport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>
      <td><div id="adcValueRead0" >Loading data...</div></td>
      <td>HYBRID_RST_N</td>
      <td>Reset pin for each HDMI channel. Valid low for the APV hybrid.</td>
    </tr>
    <tr>
      <td><form id="writeadcaddress1" method="post" action="">
        <input name="adcaddress1" id="adcaddress1" size="9" type="text" value="1" readonly="readonly">
        <input name="adcvaluetowrite1" id="adcvaluetowrite1" size="9" type="text" value="0x0">
        <input name="adcstartwrite1" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['adcstartwrite1'])) {
    $adcaddress1 = $_POST['adcaddress1'];
    $adcvalue1   = $_POST['adcvaluetowrite1'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $adcport     = file_get_contents("/srsconfig/adcport");
    $adccommand  = '/var/www/cgi-bin/do.sh' . ' ' . $adcaddress1 . ' ' . $adcvalue1 . ' ' . $adcport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>
      <td><div id="adcValueRead1">Loading data...</div></td>
      <td>PWRDOWN_CH0</td>
      <td>Power-down control of the analog circuitry for the master path for each HDMI channel</td>
    </tr>
    <tr>
      <td><form id="writeadcaddress2" method="post" action="">
        <input name="adcaddress2" id="adcaddress2" size="9" type="text" value="2" readonly="readonly">
        <input name="adcvaluetowrite2" id="adcvaluetowrite2" size="9" type="text" value="0x0">
        <input name="adcstartwrite2" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['adcstartwrite2'])) {
    $adcaddress2 = $_POST['adcaddress2'];
    $adcvalue2   = $_POST['adcvaluetowrite2'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $adcport     = file_get_contents("/srsconfig/adcport");
    $adccommand  = '/var/www/cgi-bin/do.sh' . ' ' . $adcaddress2 . ' ' . $adcvalue2 . ' ' . $adcport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>
      <td><div id="adcValueRead2" >Loading data...</div></td>
      <td>PWRDOWN_CH1</td>
      <td>Power-down control of the analog circuitry for the slave path for each HDMI channel</td>
    </tr>
    <tr>
      <td><form id="writeadcaddress3" method="post" action="">
        <input name="adcaddress3" id="adcaddress3" size="9" type="text" value="3" readonly="readonly">
        <input name="adcvaluetowrite3" id="adcvaluetowrite3" size="9" type="text" value="0x0">
        <input name="adcstartwrite3" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['adcstartwrite3'])) {
    $adcaddress3 = $_POST['adcaddress3'];
    $adcvalue3   = $_POST['adcvaluetowrite3'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $adcport     = file_get_contents("/srsconfig/adcport");
    $adccommand  = '/var/www/cgi-bin/do.sh' . ' ' . $adcaddress3 . ' ' . $adcvalue3 . ' ' . $adcport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>
      <td><div id="adcValueRead3" >Loading data...</div></td>
      <td>EQ_LEVEL_0</td>
      <td>Equalization control (bit 0) for each HDMI channel</td>
    </tr>
    <tr>
      <td><form id="writeadcaddress4" method="post" action="">
        <input name="adcaddress4" id="adcaddress4" size="9" type="text" value="4" readonly="readonly">
        <input name="adcvaluetowrite4" id="adcvaluetowrite0" size="9" type="text" value="0x0">
        <input name="adcstartwrite4" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['adcstartwrite4'])) {
    $adcaddress4 = $_POST['adcaddress4'];
    $adcvalue4   = $_POST['adcvaluetowrite4'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $adcport     = file_get_contents("/srsconfig/adcport");
    $adccommand  = '/var/www/cgi-bin/do.sh' . ' ' . $adcaddress4 . ' ' . $adcvalue4 . ' ' . $adcport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>
      <td><div id="adcValueRead10" >Loading data...</div></td>
      <td>EQ_LEVEL_1</td>
      <td>Equalization control (bit 1) for each HDMI channel</td>
    </tr>
    <tr>
      <td><form id="writeadcaddress5" method="post" action="">
        <input name="adcaddress5" id="adcaddress5" size="9" type="text" value="5" readonly="readonly">
        <input name="adcvaluetowrite5" id="adcvaluetowrite5" size="9" type="text" value="0x0">
        <input name="adcstartwrite5" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['adcstartwrite5'])) {
    $adcaddress5 = $_POST['adcaddress5'];
    $adcvalue5   = $_POST['adcvaluetowrite5'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $adcport     = file_get_contents("/srsconfig/adcport");
    $adccommand  = '/var/www/cgi-bin/do.sh' . ' ' . $adcaddress5 . ' ' . $adcvalue5 . ' ' . $adcport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>
      <td><div id="adcValueRead11" >Loading data...</div></td>
      <td>TRGOUT_ENABLE</td>
      <td>Enables TRGOUT buffer for each HDMI channel</td>
    </tr>
    <tr>
      <td><form id="writeadcaddress6" method="post" action="">
        <input name="adcaddress6" id="adcaddress6" size="9" type="text" value="6" readonly="readonly">
        <input name="adcvaluetowrite6" id="adcvaluetowrite6" size="9" type="text" value="0xff">
        <input name="adcstartwrite6" value="Write value" type="submit">
        </form>
        <?php
if (isset($_POST['adcstartwrite6'])) {
    $adcaddress6 = $_POST['adcaddress6'];
    $adcvalue6   = $_POST['adcvaluetowrite6'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $adcport     = file_get_contents("/srsconfig/adcport");
    $adccommand  = '/var/www/cgi-bin/do.sh' . ' ' . $adcaddress6 . ' ' . $adcvalue6 . ' ' . $adcport . ' ' . $ip1 . ' ' . $ip2 . ' ' . $ip3 . ' ' . $ip4;
    system($adccommand);
}
?></td>
      <td><div id="adcValueRead12" >Loading data...</div></td>
      <td>BCLK_ENABLE</td>
      <td>Enables BCLK buffer for each HDMI channel</td>
    </tr>
  </table>
  <br><br>
  
  <h2>Online help</h2>
  <table style="width:50%" border="1">
    <tr>
      <th>Register Bit</th>
      <th>7</th>
      <th>6</th>
      <th>5</th>
      <th>4</th>
      <th>3</th>
      <th>2</th>
      <th>1</th>
      <th>0</th>
    </tr>
    <tr>
      <th>Corresponding HDMI cable</th>
      <td>4</td>
      <td>5</td>
      <td>6</td>
      <td>7</td>
      <td>0</td>
      <td>1</td>
      <td>2</td>
      <td>3</td>
    </tr>
  </table>
</div>



<div class="tabContent hide" id="hybrid">
<br>
  <table width="100%">
    <tr>
      <td width="50%">
        <br>
        <table border="1">
          <tr>
            <td>Address (HEX) - Value to Write (HEX)</td>
            <td>ReadBack value</td>
          </tr>
          <tr>
            <td><form id="writehybaddress0" method="post" action="">
              <input name="hybaddress0" id="hybaddress0" size="9" type="text" value="0" readonly="readonly">
              <input name="hybvaluetowrite0" id="hybvaluetowrite0" size="9" type="text" value="">
              <input name="hybstartwrite0" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite0'])) {
    $hybaddress0 = $_POST['hybaddress0'];
    $hybvalue0   = $_POST['hybvaluetowrite0'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $hybport     = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress0.' '.$hybvalue0.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead0" >Loading data...</div></td>
            <td>ERROR</td>
          </tr>
          <tr>
            <td><form id="writehybaddress1" method="post" action="">
              <input name="hybaddress1" id="hybaddress1" size="9" type="text" value="1" readonly="readonly">
              <input name="hybvaluetowrite1" id="hybvaluetowrite1" size="9" type="text" value="19">
              <input name="hybstartwrite1" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite1'])) {
    $hybaddress1 = $_POST['hybaddress1'];
    $hybvalue1   = $_POST['hybvaluetowrite1'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $hybport     = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress1.' '.$hybvalue1.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead1">Loading data...</div></td>
            <td><text id="hybmodehelpshow">MODE</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress2" method="post" action="">
              <input name="hybaddress2" id="hybaddress2" size="9" type="text" value="2" readonly="readonly">
              <input name="hybvaluetowrite2" id="hybvaluetowrite2" size="9" type="text" value="80">
              <input name="hybstartwrite2" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite2'])) {
    $hybaddress2 = $_POST['hybaddress2'];
    $hybvalue2   = $_POST['hybvaluetowrite2'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $hybport     = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress2.' '.$hybvalue2.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead2" >Loading data...</div></td>
            <td><text id="hyblatencyhelpshow">LATENCY</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress3" method="post" action="">
              <input name="hybaddress3" id="hybaddress3" size="9" type="text" value="3" readonly="readonly">
              <input name="hybvaluetowrite3" id="hybvaluetowrite3" size="9" type="text" value="4">
              <input name="hybstartwrite3" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite3'])) {
    $hybaddress3 = $_POST['hybaddress3'];
    $hybvalue3   = $_POST['hybvaluetowrite3'];
    $ip1         = file_get_contents("/srsconfig/ip1");
    $ip2         = file_get_contents("/srsconfig/ip2");
    $ip3         = file_get_contents("/srsconfig/ip3");
    $ip4         = file_get_contents("/srsconfig/ip4");
    $hybport     = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress3.' '.$hybvalue3.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead3" >Loading data...</div></td>
            <td><text id="hybmuxgainhelpshow">MUX_GAIN</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress10" method="post" action="">
              <input name="hybaddress10" id="hybaddress10" size="9" type="text" value="10" readonly="readonly">
              <input name="hybvaluetowrite10" id="hybvaluetowrite10" size="9" type="text" value="98">
              <input name="hybstartwrite10" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite10'])) {
    $hybaddress10 = $_POST['hybaddress10'];
    $hybvalue10   = $_POST['hybvaluetowrite10'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress10.' '.$hybvalue10.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead10" >Loading data...</div></td>
            <td><text id="hybiprehelpshow">IPRE</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress11" method="post" action="">
              <input name="hybaddress11" id="hybaddress11" size="9" type="text" value="11" readonly="readonly">
              <input name="hybvaluetowrite11" id="hybvaluetowrite11" size="9" type="text" value="52">
              <input name="hybstartwrite11" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite11'])) {
    $hybaddress11 = $_POST['hybaddress11'];
    $hybvalue11   = $_POST['hybvaluetowrite11'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress11.' '.$hybvalue11.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead11" >Loading data...</div></td>
            <td><text id="hybipcaschelpshow">IPCASC</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress12" method="post" action="">
              <input name="hybaddress12" id="hybaddress12" size="9" type="text" value="12" readonly="readonly">
              <input name="hybvaluetowrite12" id="hybvaluetowrite12" size="9" type="text" value="34">
              <input name="hybstartwrite12" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite12'])) {
    $hybaddress12 = $_POST['hybaddress12'];
    $hybvalue12   = $_POST['hybvaluetowrite12'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress12.' '.$hybvalue12.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead12" >Loading data...</div></td>
            <td><text id="hybipsfhelpshow">IPSF</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress13" method="post" action="">
              <input name="hybaddress13" id="hybaddress13" size="9" type="text" value="13" readonly="readonly">
              <input name="hybvaluetowrite13" id="hybvaluetowrite13" size="9" type="text" value="34">
              <input name="hybstartwrite13" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite13'])) {
    $hybaddress13 = $_POST['hybaddress13'];
    $hybvalue13   = $_POST['hybvaluetowrite13'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress13.' '.$hybvalue13.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead13" >Loading data...</div></td>
            <td><text id="hybishahelpshow">ISHA</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress14" method="post" action="">
              <input name="hybaddress14" id="hybaddress14" size="9" type="text" value="14" readonly="readonly">
              <input name="hybvaluetowrite14" id="hybvaluetowrite13" size="9" type="text" value="34">
              <input name="hybstartwrite14" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite14'])) {
    $hybaddress14 = $_POST['hybaddress14'];
    $hybvalue14   = $_POST['hybvaluetowrite14'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress14.' '.$hybvalue14.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead14" >Loading data...</div></td>
            <td><text id="hybissfhelpshow">ISSF</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress15" method="post" action="">
              <input name="hybaddress15" id="hybaddress15" size="9" type="text" value="15" readonly="readonly">
              <input name="hybvaluetowrite15" id="hybvaluetowrite15" size="9" type="text" value="55">
              <input name="hybstartwrite15" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite15'])) {
    $hybaddress15 = $_POST['hybaddress15'];
    $hybvalue15   = $_POST['hybvaluetowrite15'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress15.' '.$hybvalue15.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead15" >Loading data...</div></td>
            <td><text id="hybipsphelpshow">IPSP</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress16" method="post" action="">
              <input name="hybaddress16" id="hybaddress16" size="9" type="text" value="16" readonly="readonly">
              <input name="hybvaluetowrite16" id="hybvaluetowrite16" size="9" type="text" value="16">
              <input name="hybstartwrite16" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite16'])) {
    $hybaddress16 = $_POST['hybaddress16'];
    $hybvalue16   = $_POST['hybvaluetowrite16'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress16.' '.$hybvalue16.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead16" >Loading data...</div></td>
            <td><text id="hybimuxinhelpshow">I_MUX_IN</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress18" method="post" action="">
              <input name="hybaddress18" id="hybaddress18" size="9" type="text" value="18" readonly="readonly">
              <input name="hybvaluetowrite18" id="hybvaluetowrite18" size="9" type="text" value="100">
              <input name="hybstartwrite18" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite18'])) {
    $hybaddress18 = $_POST['hybaddress18'];
    $hybvalue18   = $_POST['hybvaluetowrite18'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress18.' '.$hybvalue18.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead18" >Loading data...</div></td>
            <td><text id="hybicalhelpshow">ICAL</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress19" method="post" action="">
              <input name="hybaddress19" id="hybaddress19" size="9" type="text" value="19" readonly="readonly">
              <input name="hybvaluetowrite19" id="hybvaluetowrite19" size="9" type="text" value="40">
              <input name="hybstartwrite19" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite19'])) {
    $hybaddress19 = $_POST['hybaddress19'];
    $hybvalue19   = $_POST['hybvaluetowrite19'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress19.' '.$hybvalue19.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead19" >Loading data...</div></td>
            <td><text id="hybvpsphelpshow">VPSP<text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress1a" method="post" action="">
              <input name="hybaddress1a" id="hybaddress1a" size="9" type="text" value="1a" readonly="readonly">
              <input name="hybvaluetowrite1a" id="hybvaluetowrite1a" size="9" type="text" value="60">
              <input name="hybstartwrite1a" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite1a'])) {
    $hybaddress1a = $_POST['hybaddress1a'];
    $hybvalue1a   = $_POST['hybvaluetowrite1a'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress1a.' '.$hybvalue1a.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead1a" >Loading data...</div></td>
            <td><text id="hybvfshelpshow">VFS</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress1b" method="post" action="">
              <input name="hybaddress1b" id="hybaddress1b" size="9" type="text" value="1b" readonly="readonly">
              <input name="hybvaluetowrite1b" id="hybvaluetowrite1b" size="9" type="text" value="30">
              <input name="hybstartwrite1b" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite1b'])) {
    $hybaddress1b = $_POST['hybaddress1b'];
    $hybvalue1b   = $_POST['hybvaluetowrite1b'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress1b.' '.$hybvalue1b.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead1b" >Loading data...</div></td>
            <td><text id="hybvfphelptext">VFP</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress1c" method="post" action="">
              <input name="hybaddress1c" id="hybaddress1c" size="9" type="text" value="1c" readonly="readonly">
              <input name="hybvaluetowrite1c" id="hybvaluetowrite1c" size="9" type="text" value="EF">
              <input name="hybstartwrite1c" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite1c'])) {
    $hybaddress1c = $_POST['hybaddress1c'];
    $hybvalue1c   = $_POST['hybvaluetowrite1c'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress1c.' '.$hybvalue1c.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead1c" >Loading data...</div></td>
            <td><text id="hybcdrvhelpshow">CDRV</text></td>
          </tr>
          <tr>
            <td><form id="writehybaddress1d" method="post" action="">
              <input name="hybaddress1d" id="hybaddress1d" size="9" type="text" value="1d" readonly="readonly">
              <input name="hybvaluetowrite1d" id="hybvaluetowrite1d" size="9" type="text" value="F7">
              <input name="hybstartwrite1d" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['hybstartwrite1d'])) {
    $hybaddress1d = $_POST['hybaddress1d'];
    $hybvalue1d   = $_POST['hybvaluetowrite1d'];
    $ip1          = file_get_contents("/srsconfig/ip1");
    $ip2          = file_get_contents("/srsconfig/ip2");
    $ip3          = file_get_contents("/srsconfig/ip3");
    $ip4          = file_get_contents("/srsconfig/ip4");
    $hybport      = file_get_contents("/srsconfig/hybport");
    $hybsubadr     = file_get_contents("/srsconfig/subaddress");
    $whichapvselector = array("801", "802", "401", "402", "201", "202", "101", "102", "8001", "8002", "4001", "4002", "2001", "2002", "1001", "1002");
    $hybcommand  = '/var/www/cgi-bin/do.sh '.$hybaddress1d.' '.$hybvalue1d.' '.$hybport.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$whichapvselector[$hybsubadr];
    system($hybcommand);
}
?></td>
            <td><div id="hybValueRead1d" >Loading data...</div></td>
            <td><text id="hybcselhelpshow">CSEL</text></td>
          </tr>
        </table></td>
        
      <td valign="top"><h2>Online Help</h2>
        <h2 class="hybsubadrhelptext">SubAddress Stucture</h2>
        <p class="hybsubadrhelptext">The SubAddress is used to identify the location of the peripheral to be programmed. The
          syntax of this field is defined differently for each peripheral type (port).</p>
        <table class="hybsubadrhelptext" width="100%" border="1">
          <tr>
            <th>31-24</th>
            <th>23-16</th>
            <th colspan="8">15-8</th>
            <th colspan="8">7-0</th>
          </tr>
          <tr>
            <td>XX</td>
            <td>XX</td>
            <th colspan="8">Channel Mask</th>
            <th colspan="8">Device</th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="8">HDMI channel mapping</td>
            <td>R</td>
            <td>R</td>
            <td>R</td>
            <td>R</td>
            <td>R</td>
            <td>R</td>
            <td>D</td>
            <td>D</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>0</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td colspan="8">R=Reserved, D=Device</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="8"></td>
            <td colspan="6">PLL</td>
            <td>0</td>
            <td>0</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="8"></td>
            <td colspan="6">Master APV</td>
            <td>0</td>
            <td>0</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="8"></td>
            <td colspan="6">Slave APV</td>
            <td>0</td>
            <td>0</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="8"></td>
            <td colspan="6">Both APVs</td>
            <td>0</td>
            <td>0</td>
          </tr>
        </table>        
        <h2 class="hybmodehelptext">APV_MODE register description</h2>
        <table class="hybmodehelptext" border="1">
          <tr>
            <th>Bit Number</th>
            <th>Function</th>
            <th>Value = 0</th>
            <th>Value = 1</th>
          </tr>
          <tr>
            <td>7</td>
            <td>not used</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td>6</td>
            <td>not used</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Preamp Polarity</td>
            <td>Non-inverting</td>
            <td>Inverting</td>
          </tr>
          <tr>
            <td>4</td>
            <td>not used</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td>3</td>
            <td>not used</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td>2</td>
            <td>not used</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td>1</td>
            <td>not used</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td>0</td>
            <td>not used</td>
            <td>-</td>
            <td>-</td>
          </tr>
        </table>
        <p class="hybmodehelptext">00011001 (hex: 19) => 40 MHz, peak-mode, 3 samples-per-trigger with calibration pulse (test mode)<br></p>
        <p class="hybmodehelptext">00011101 (hex: 1D) => same, without calibration pulse (running mode)<br></p>
        <p class="hyblatencyhelptext">Aiuto2</p>
        <p class="hybmuxgainhelptext">Aiuto3</p>
        <p class="hybiprehelptext">Aiuto4</p>
        <p class="hybipcaschelptext">Aiuto5</p>
        <p class="hybipsfhelptext">Aiuto6</p>
        <p class="hybishahelptext">Aiuto7</p>
        <p class="hybissfhelptext">Aiuto8</p>
        <p class="hybipsphelptext">Aiuto9</p>
        <p class="hybimuxinhelptext">Aiuto10</p>
        <p class="hybicalhelptext">Aiuto11</p>
        <p class="hybvpsphelptext">Aiuto12</p>
        <p class="hybvfshelptext">Aiuto13</p>
        <p class="hybvfphelptext">Aiuto14</p>
        <p class="hybcdrvhelptext">Aiuto15</p>
        <p class="hybcselhelptext">Aiuto16</p>
      </td>
    </tr>
  </table>
</div>


<div class="tabContent hide" id="zsregisters">
<br>
<table width="100%">
<tr>
  <td width="50%">
   <table border="1" width="100%">
    <tr>
      <td><h2>Pedestals</h2>
        <table border="1">
          <tr>
            <td>Address</td>
            <td>ReadBack value</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress0" method="post" action="">
              <input name="apzaddressAPZ_0" id="apzaddressAPZ_0" size="9" type="text" value="0" readonly>
              <input name="apzvaluetowriteAPZ_0" id="apzvaluetowriteAPZ_0" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_0" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_0'])) {
    $apzaddressAPZ_0 = $_POST['apzaddressAPZ_0'];
    $apzvalueAPZ_0   = $_POST['apzvaluetowriteAPZ_0'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand='/var/www/cgi-bin/do.sh '.$apzaddressAPZ_0.' '.$apzvalueAPZ_0.' '.$apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_0" >Loading data...</div></td>
            <td>PED CH0</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress1" method="post" action="">
              <input name="apzaddressAPZ_1" id="apzaddressAPZ_1" size="9" type="text" value="16" readonly>
              <input name="apzvaluetowriteAPZ_1" id="apzvaluetowriteAPZ_1" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_1" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_1'])) {
    $apzaddressAPZ_1 = $_POST['apzaddressAPZ_1'];
    $apzvalueAPZ_1   = $_POST['apzvaluetowriteAPZ_1'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_1 . ' ' . $apzvalueAPZ_1 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_1" >Loading data...</div></td>
            <td>PED CH 1</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress2" method="post" action="">
              <input name="apzaddressAPZ_2" id="apzaddressAPZ_2" size="9" type="text" value="32" readonly>
              <input name="apzvaluetowriteAPZ_2" id="apzvaluetowriteAPZ_2" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_2" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_2'])) {
    $apzaddressAPZ_2 = $_POST['apzaddressAPZ_2'];
    $apzvalueAPZ_2   = $_POST['apzvaluetowriteAPZ_2'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_2 . ' ' . $apzvalueAPZ_2 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_2" >Loading data...</div></td>
            <td>PED CH 2</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress3" method="post" action="">
              <input name="apzaddressAPZ_3" id="apzaddressAPZ_3" size="9" type="text" value="48" readonly>
              <input name="apzvaluetowriteAPZ_3" id="apzvaluetowriteAPZ_3" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_3" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_3'])) {
    $apzaddressAPZ_3 = $_POST['apzaddressAPZ_3'];
    $apzvalueAPZ_3   = $_POST['apzvaluetowriteAPZ_3'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_3 . ' ' . $apzvalueAPZ_3 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_3" >Loading data...</div></td>
            <td>PED CH 3</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress4" method="post" action="">
              <input name="apzaddressAPZ_4" id="apzaddressAPZ_4" size="9" type="text" value="64" readonly>
              <input name="apzvaluetowriteAPZ_4" id="apzvaluetowriteAPZ_4" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_4" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_4'])) {
    $apzaddressAPZ_4 = $_POST['apzaddressAPZ_4'];
    $apzvalueAPZ_4   = $_POST['apzvaluetowriteAPZ_4'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_4 . ' ' . $apzvalueAPZ_4 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_4" >Loading data...</div></td>
            <td>PED CH 4</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress5" method="post" action="">
              <input name="apzaddressAPZ_5" id="apzaddressAPZ_5" size="9" type="text" value="80" readonly>
              <input name="apzvaluetowriteAPZ_5" id="apzvaluetowriteAPZ_5" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_5" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_5'])) {
    $apzaddressAPZ_5 = $_POST['apzaddressAPZ_5'];
    $apzvalueAPZ_5   = $_POST['apzvaluetowriteAPZ_5'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_5 . ' ' . $apzvalueAPZ_5 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_5" >Loading data...</div></td>
            <td>PED CH 5</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress6" method="post" action="">
              <input name="apzaddressAPZ_6" id="apzaddressAPZ_6" size="9" type="text" value="96" readonly>
              <input name="apzvaluetowriteAPZ_6" id="apzvaluetowriteAPZ_6" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_6" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_6'])) {
    $apzaddressAPZ_6 = $_POST['apzaddressAPZ_6'];
    $apzvalueAPZ_6   = $_POST['apzvaluetowriteAPZ_6'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_6 . ' ' . $apzvalueAPZ_6 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_6" >Loading data...</div></td>
            <td>PED CH 6</td>
          </tr>
          <tr>
            <td><input name="apzaddressAPZ_7" id="apzaddressAPZ_7" size="9" type="text" value="112" readonly>
              <input name="apzvaluetowriteAPZ_7" id="apzvaluetowriteAPZ_7" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_7" value="Write value" type="submit">
              <br>
              <?php
if (isset($_POST['apzstartwriteAPZ_7'])) {
    $apzaddressAPZ_7 = $_POST['apzaddressAPZ_7'];
    $apzvalueAPZ_7   = $_POST['apzvaluetowriteAPZ_7'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_7 . ' ' . $apzvalueAPZ_7 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_7" >Loading data...</div></td>
            <td>PED CH 7</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress8" method="post" action="">
              <input name="apzaddressAPZ_8" id="apzaddressAPZ_8" size="9" type="text" value="4" readonly>
              <input name="apzvaluetowriteAPZ_8" id="apzvaluetowriteAPZ_8" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_8" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_8'])) {
    $apzaddressAPZ_8 = $_POST['apzaddressAPZ_8'];
    $apzvalueAPZ_8   = $_POST['apzvaluetowriteAPZ_8'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_8 . ' ' . $apzvalueAPZ_8 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_8" >Loading data...</div></td>
            <td>PED CH 8</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress9" method="post" action="">
              <input name="apzaddressAPZ_9" id="apzaddressAPZ_9" size="9" type="text" value="20" readonly>
              <input name="apzvaluetowriteAPZ_9" id="apzvaluetowriteAPZ_9" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_9" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_9'])) {
    $apzaddressAPZ_9 = $_POST['apzaddressAPZ_9'];
    $apzvalueAPZ_9   = $_POST['apzvaluetowriteAPZ_9'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_9 . ' ' . $apzvalueAPZ_9 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_9" >Loading data...</div></td>
            <td>PED CH 9</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress10" method="post" action="">
              <input name="apzaddressAPZ_10" id="apzaddressAPZ_10" size="9" type="text" value="36" readonly>
              <input name="apzvaluetowriteAPZ_10" id="apzvaluetowriteAPZ_10" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_10" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_10'])) {
    $apzaddressAPZ_10 = $_POST['apzaddressAPZ_10'];
    $apzvalueAPZ_10   = $_POST['apzvaluetowriteAPZ_10'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_10 . ' ' . $apzvalueAPZ_10 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_10" >Loading data...</div></td>
            <td>PED CH 10</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress11" method="post" action="">
              <input name="apzaddressAPZ_11" id="apzaddressAPZ_11" size="9" type="text" value="52" readonly>
              <input name="apzvaluetowriteAPZ_11" id="apzvaluetowriteAPZ_11" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_11" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_11'])) {
    $apzaddressAPZ_11 = $_POST['apzaddressAPZ_11'];
    $apzvalueAPZ_11   = $_POST['apzvaluetowriteAPZ_11'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_11 . ' ' . $apzvalueAPZ_11 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_11" >Loading data...</div></td>
            <td>PED CH 11</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress12" method="post" action="">
              <input name="apzaddressAPZ_12" id="apzaddressAPZ_12" size="9" type="text" value="68" readonly>
              <input name="apzvaluetowriteAPZ_12" id="apzvaluetowriteAPZ_12" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_12" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_12'])) {
    $apzaddressAPZ_12 = $_POST['apzaddressAPZ_12'];
    $apzvalueAPZ_12   = $_POST['apzvaluetowriteAPZ_12'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_12 . ' ' . $apzvalueAPZ_12 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_12" >Loading data...</div></td>
            <td>PED CH 12</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress13" method="post" action="">
              <input name="apzaddressAPZ_13" id="apzaddressAPZ_13" size="9" type="text" value="84" readonly>
              <input name="apzvaluetowriteAPZ_13" id="apzvaluetowriteAPZ_13" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_13" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_13'])) {
    $apzaddressAPZ_13 = $_POST['apzaddressAPZ_13'];
    $apzvalueAPZ_13   = $_POST['apzvaluetowriteAPZ_13'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_13 . ' ' . $apzvalueAPZ_13 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_13" >Loading data...</div></td>
            <td>PED CH 13</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress14" method="post" action="">
              <input name="apzaddressAPZ_14" id="apzaddressAPZ_14" size="9" type="text" value="100" readonly>
              <input name="apzvaluetowriteAPZ_14" id="apzvaluetowriteAPZ_14" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_14" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_14'])) {
    $apzaddressAPZ_14 = $_POST['apzaddressAPZ_14'];
    $apzvalueAPZ_14   = $_POST['apzvaluetowriteAPZ_14'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_14 . ' ' . $apzvalueAPZ_14 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_14" >Loading data...</div></td>
            <td>PED CH 14</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress15" method="post" action="">
              <input name="apzaddressAPZ_15" id="apzaddressAPZ_15" size="9" type="text" value="116" readonly>
              <input name="apzvaluetowriteAPZ_15" id="apzvaluetowriteAPZ_15" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_15" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_15'])) {
    $apzaddressAPZ_15 = $_POST['apzaddressAPZ_15'];
    $apzvalueAPZ_15   = $_POST['apzvaluetowriteAPZ_15'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_15 . ' ' . $apzvalueAPZ_15 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_15" >Loading data...</div></td>
            <td>PED CH 15</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress16" method="post" action="">
              <input name="apzaddressAPZ_16" id="apzaddressAPZ_16" size="9" type="text" value="8" readonly>
              <input name="apzvaluetowriteAPZ_16" id="apzvaluetowriteAPZ_16" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_16" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_16'])) {
    $apzaddressAPZ_16 = $_POST['apzaddressAPZ_16'];
    $apzvalueAPZ_16   = $_POST['apzvaluetowriteAPZ_16'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_16 . ' ' . $apzvalueAPZ_16 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_16" >Loading data...</div></td>
            <td>PED CH 16</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress17" method="post" action="">
              <input name="apzaddressAPZ_17" id="apzaddressAPZ_17" size="9" type="text" value="24" readonly>
              <input name="apzvaluetowriteAPZ_17" id="apzvaluetowriteAPZ_17" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_17" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_17'])) {
    $apzaddressAPZ_17 = $_POST['apzaddressAPZ_17'];
    $apzvalueAPZ_17   = $_POST['apzvaluetowriteAPZ_17'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_17 . ' ' . $apzvalueAPZ_17 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_17" >Loading data...</div></td>
            <td>PED CH 17</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress18" method="post" action="">
              <input name="apzaddressAPZ_18" id="apzaddressAPZ_18" size="9" type="text" value="40" readonly>
              <input name="apzvaluetowriteAPZ_18" id="apzvaluetowriteAPZ_18" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_18" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_18'])) {
    $apzaddressAPZ_18 = $_POST['apzaddressAPZ_18'];
    $apzvalueAPZ_18   = $_POST['apzvaluetowriteAPZ_18'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_18 . ' ' . $apzvalueAPZ_18 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_18" >Loading data...</div></td>
            <td>PED CH 18</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress19" method="post" action="">
              <input name="apzaddressAPZ_19" id="apzaddressAPZ_19" size="9" type="text" value="56" readonly>
              <input name="apzvaluetowriteAPZ_19" id="apzvaluetowriteAPZ_19" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_19" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_19'])) {
    $apzaddressAPZ_19 = $_POST['apzaddressAPZ_19'];
    $apzvalueAPZ_19   = $_POST['apzvaluetowriteAPZ_19'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_19 . ' ' . $apzvalueAPZ_19 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_19" >Loading data...</div></td>
            <td>PED CH 19</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress20" method="post" action="">
              <input name="apzaddressAPZ_20" id="apzaddressAPZ_20" size="9" type="text" value="72" readonly>
              <input name="apzvaluetowriteAPZ_20" id="apzvaluetowriteAPZ_20" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_20" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_20'])) {
    $apzaddressAPZ_20 = $_POST['apzaddressAPZ_20'];
    $apzvalueAPZ_20   = $_POST['apzvaluetowriteAPZ_20'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_20 . ' ' . $apzvalueAPZ_20 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_20" >Loading data...</div></td>
            <td>PED CH 20</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress21" method="post" action="">
              <input name="apzaddressAPZ_21" id="apzaddressAPZ_21" size="9" type="text" value="88" readonly>
              <input name="apzvaluetowriteAPZ_21" id="apzvaluetowriteAPZ_21" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_21" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_21'])) {
    $apzaddressAPZ_21 = $_POST['apzaddressAPZ_21'];
    $apzvalueAPZ_21   = $_POST['apzvaluetowriteAPZ_21'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_21 . ' ' . $apzvalueAPZ_21 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_21" >Loading data...</div></td>
            <td>PED CH 21</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress22" method="post" action="">
              <input name="apzaddressAPZ_22" id="apzaddressAPZ_22" size="9" type="text" value="104" readonly>
              <input name="apzvaluetowriteAPZ_22" id="apzvaluetowriteAPZ_22" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_22" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_22'])) {
    $apzaddressAPZ_22 = $_POST['apzaddressAPZ_22'];
    $apzvalueAPZ_22   = $_POST['apzvaluetowriteAPZ_22'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_22 . ' ' . $apzvalueAPZ_22 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_22" >Loading data...</div></td>
            <td>PED CH 22</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress23" method="post" action="">
              <input name="apzaddressAPZ_23" id="apzaddressAPZ_23" size="9" type="text" value="120" readonly>
              <input name="apzvaluetowriteAPZ_23" id="apzvaluetowriteAPZ_23" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_23" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_23'])) {
    $apzaddressAPZ_23 = $_POST['apzaddressAPZ_23'];
    $apzvalueAPZ_23   = $_POST['apzvaluetowriteAPZ_23'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_23 . ' ' . $apzvalueAPZ_23 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_23" >Loading data...</div></td>
            <td>PED CH 23</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress24" method="post" action="">
              <input name="apzaddressAPZ_24" id="apzaddressAPZ_24" size="9" type="text" value="12" readonly>
              <input name="apzvaluetowriteAPZ_24" id="apzvaluetowriteAPZ_24" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_24" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_24'])) {
    $apzaddressAPZ_24 = $_POST['apzaddressAPZ_24'];
    $apzvalueAPZ_24   = $_POST['apzvaluetowriteAPZ_24'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_24 . ' ' . $apzvalueAPZ_24 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_24" >Loading data...</div></td>
            <td>PED CH 24</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress25" method="post" action="">
              <input name="apzaddressAPZ_25" id="apzaddressAPZ_25" size="9" type="text" value="28" readonly>
              <input name="apzvaluetowriteAPZ_25" id="apzvaluetowriteAPZ_25" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_25" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_25'])) {
    $apzaddressAPZ_25 = $_POST['apzaddressAPZ_25'];
    $apzvalueAPZ_25   = $_POST['apzvaluetowriteAPZ_25'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_25 . ' ' . $apzvalueAPZ_25 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_25" >Loading data...</div></td>
            <td>PED CH 25</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress26" method="post" action="">
              <input name="apzaddressAPZ_26" id="apzaddressAPZ_26" size="9" type="text" value="44" readonly>
              <input name="apzvaluetowriteAPZ_26" id="apzvaluetowriteAPZ_26" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_26" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_26'])) {
    $apzaddressAPZ_26 = $_POST['apzaddressAPZ_26'];
    $apzvalueAPZ_26   = $_POST['apzvaluetowriteAPZ_26'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_26 . ' ' . $apzvalueAPZ_26 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_26" >Loading data...</div></td>
            <td>PED CH 26</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress27" method="post" action="">
              <input name="apzaddressAPZ_27" id="apzaddressAPZ_27" size="9" type="text" value="60" readonly>
              <input name="apzvaluetowriteAPZ_27" id="apzvaluetowriteAPZ_27" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_27" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_27'])) {
    $apzaddressAPZ_27 = $_POST['apzaddressAPZ_27'];
    $apzvalueAPZ_27   = $_POST['apzvaluetowriteAPZ_27'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_27 . ' ' . $apzvalueAPZ_27 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_27" >Loading data...</div></td>
            <td>PED CH 27</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress28" method="post" action="">
              <input name="apzaddressAPZ_28" id="apzaddressAPZ_28" size="9" type="text" value="76" readonly>
              <input name="apzvaluetowriteAPZ_28" id="apzvaluetowriteAPZ_28" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_28" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_28'])) {
    $apzaddressAPZ_28 = $_POST['apzaddressAPZ_28'];
    $apzvalueAPZ_28   = $_POST['apzvaluetowriteAPZ_28'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_28 . ' ' . $apzvalueAPZ_28 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_28" >Loading data...</div></td>
            <td>PED CH 28</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress29" method="post" action="">
              <input name="apzaddressAPZ_29" id="apzaddressAPZ_29" size="9" type="text" value="92" readonly>
              <input name="apzvaluetowriteAPZ_29" id="apzvaluetowriteAPZ_29" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_29" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_29'])) {
    $apzaddressAPZ_29 = $_POST['apzaddressAPZ_29'];
    $apzvalueAPZ_29   = $_POST['apzvaluetowriteAPZ_29'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_29 . ' ' . $apzvalueAPZ_29 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_29" >Loading data...</div></td>
            <td>PED CH 29</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress30" method="post" action="">
              <input name="apzaddressAPZ_30" id="apzaddressAPZ_30" size="9" type="text" value="108" readonly>
              <input name="apzvaluetowriteAPZ_30" id="apzvaluetowriteAPZ_30" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_30" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_30'])) {
    $apzaddressAPZ_30 = $_POST['apzaddressAPZ_30'];
    $apzvalueAPZ_30   = $_POST['apzvaluetowriteAPZ_30'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_30 . ' ' . $apzvalueAPZ_30 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_30" >Loading data...</div></td>
            <td>PED CH 30</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress31" method="post" action="">
              <input name="apzaddressAPZ_31" id="apzaddressAPZ_31" size="9" type="text" value="124" readonly>
              <input name="apzvaluetowriteAPZ_31" id="apzvaluetowriteAPZ_31" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_31" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_31'])) {
    $apzaddressAPZ_31 = $_POST['apzaddressAPZ_31'];
    $apzvalueAPZ_31   = $_POST['apzvaluetowriteAPZ_31'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_31 . ' ' . $apzvalueAPZ_31 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_31" >Loading data...</div></td>
            <td>PED CH 31</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress32" method="post" action="">
              <input name="apzaddressAPZ_32" id="apzaddressAPZ_32" size="9" type="text" value="1" readonly>
              <input name="apzvaluetowriteAPZ_32" id="apzvaluetowriteAPZ_32" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_32" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_32'])) {
    $apzaddressAPZ_32 = $_POST['apzaddressAPZ_32'];
    $apzvalueAPZ_32   = $_POST['apzvaluetowriteAPZ_32'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_32 . ' ' . $apzvalueAPZ_32 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_32" >Loading data...</div></td>
            <td>PED CH 32</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress33" method="post" action="">
              <input name="apzaddressAPZ_33" id="apzaddressAPZ_33" size="9" type="text" value="17" readonly>
              <input name="apzvaluetowriteAPZ_33" id="apzvaluetowriteAPZ_33" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_33" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_33'])) {
    $apzaddressAPZ_33 = $_POST['apzaddressAPZ_33'];
    $apzvalueAPZ_33   = $_POST['apzvaluetowriteAPZ_33'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_33 . ' ' . $apzvalueAPZ_33 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_33" >Loading data...</div></td>
            <td>PED CH 33</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress34" method="post" action="">
              <input name="apzaddressAPZ_34" id="apzaddressAPZ_34" size="9" type="text" value="33" readonly>
              <input name="apzvaluetowriteAPZ_34" id="apzvaluetowriteAPZ_34" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_34" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_34'])) {
    $apzaddressAPZ_34 = $_POST['apzaddressAPZ_34'];
    $apzvalueAPZ_34   = $_POST['apzvaluetowriteAPZ_34'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_34 . ' ' . $apzvalueAPZ_34 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_34" >Loading data...</div></td>
            <td>PED CH 34</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress35" method="post" action="">
              <input name="apzaddressAPZ_35" id="apzaddressAPZ_35" size="9" type="text" value="49" readonly>
              <input name="apzvaluetowriteAPZ_35" id="apzvaluetowriteAPZ_35" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_35" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_35'])) {
    $apzaddressAPZ_35 = $_POST['apzaddressAPZ_35'];
    $apzvalueAPZ_35   = $_POST['apzvaluetowriteAPZ_35'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_35 . ' ' . $apzvalueAPZ_35 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_35" >Loading data...</div></td>
            <td>PED CH 35</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress36" method="post" action="">
              <input name="apzaddressAPZ_36" id="apzaddressAPZ_36" size="9" type="text" value="65" readonly>
              <input name="apzvaluetowriteAPZ_36" id="apzvaluetowriteAPZ_36" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_36" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_36'])) {
    $apzaddressAPZ_36 = $_POST['apzaddressAPZ_36'];
    $apzvalueAPZ_36   = $_POST['apzvaluetowriteAPZ_36'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_36 . ' ' . $apzvalueAPZ_36 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_36" >Loading data...</div></td>
            <td>PED CH 36</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress37" method="post" action="">
              <input name="apzaddressAPZ_37" id="apzaddressAPZ_37" size="9" type="text" value="81" readonly>
              <input name="apzvaluetowriteAPZ_37" id="apzvaluetowriteAPZ_37" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_37" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_37'])) {
    $apzaddressAPZ_37 = $_POST['apzaddressAPZ_37'];
    $apzvalueAPZ_37   = $_POST['apzvaluetowriteAPZ_37'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_37 . ' ' . $apzvalueAPZ_37 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_37" >Loading data...</div></td>
            <td>PED CH 37</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress38" method="post" action="">
              <input name="apzaddressAPZ_38" id="apzaddressAPZ_38" size="9" type="text" value="97" readonly>
              <input name="apzvaluetowriteAPZ_38" id="apzvaluetowriteAPZ_38" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_38" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_38'])) {
    $apzaddressAPZ_38 = $_POST['apzaddressAPZ_38'];
    $apzvalueAPZ_38   = $_POST['apzvaluetowriteAPZ_38'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_38 . ' ' . $apzvalueAPZ_38 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_38" >Loading data...</div></td>
            <td>PED CH 38</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress39" method="post" action="">
              <input name="apzaddressAPZ_39" id="apzaddressAPZ_39" size="9" type="text" value="113" readonly>
              <input name="apzvaluetowriteAPZ_39" id="apzvaluetowriteAPZ_39" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_39" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_39'])) {
    $apzaddressAPZ_39 = $_POST['apzaddressAPZ_39'];
    $apzvalueAPZ_39   = $_POST['apzvaluetowriteAPZ_39'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_39 . ' ' . $apzvalueAPZ_39 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_39" >Loading data...</div></td>
            <td>PED CH 39</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress40" method="post" action="">
              <input name="apzaddressAPZ_40" id="apzaddressAPZ_40" size="9" type="text" value="5" readonly>
              <input name="apzvaluetowriteAPZ_40" id="apzvaluetowriteAPZ_40" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_40" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_40'])) {
    $apzaddressAPZ_40 = $_POST['apzaddressAPZ_40'];
    $apzvalueAPZ_40   = $_POST['apzvaluetowriteAPZ_40'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_40 . ' ' . $apzvalueAPZ_40 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_40" >Loading data...</div></td>
            <td>PED CH 40</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress41" method="post" action="">
              <input name="apzaddressAPZ_41" id="apzaddressAPZ_41" size="9" type="text" value="21" readonly>
              <input name="apzvaluetowriteAPZ_41" id="apzvaluetowriteAPZ_41" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_41" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_41'])) {
    $apzaddressAPZ_41 = $_POST['apzaddressAPZ_41'];
    $apzvalueAPZ_41   = $_POST['apzvaluetowriteAPZ_41'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_41 . ' ' . $apzvalueAPZ_41 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_41" >Loading data...</div></td>
            <td>PED CH 41</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress42" method="post" action="">
              <input name="apzaddressAPZ_42" id="apzaddressAPZ_42" size="9" type="text" value="37" readonly>
              <input name="apzvaluetowriteAPZ_42" id="apzvaluetowriteAPZ_42" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_42" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_42'])) {
    $apzaddressAPZ_42 = $_POST['apzaddressAPZ_42'];
    $apzvalueAPZ_42   = $_POST['apzvaluetowriteAPZ_42'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_42 . ' ' . $apzvalueAPZ_42 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_42" >Loading data...</div></td>
            <td>PED CH 42</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress43" method="post" action="">
              <input name="apzaddressAPZ_43" id="apzaddressAPZ_43" size="9" type="text" value="53" readonly>
              <input name="apzvaluetowriteAPZ_43" id="apzvaluetowriteAPZ_43" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_43" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_43'])) {
    $apzaddressAPZ_43 = $_POST['apzaddressAPZ_43'];
    $apzvalueAPZ_43   = $_POST['apzvaluetowriteAPZ_43'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_43 . ' ' . $apzvalueAPZ_43 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_43" >Loading data...</div></td>
            <td>PED CH 43</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress44" method="post" action="">
              <input name="apzaddressAPZ_44" id="apzaddressAPZ_44" size="9" type="text" value="69" readonly>
              <input name="apzvaluetowriteAPZ_44" id="apzvaluetowriteAPZ_44" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_44" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_44'])) {
    $apzaddressAPZ_44 = $_POST['apzaddressAPZ_44'];
    $apzvalueAPZ_44   = $_POST['apzvaluetowriteAPZ_44'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_44 . ' ' . $apzvalueAPZ_44 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_44" >Loading data...</div></td>
            <td>PED CH 44</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress45" method="post" action="">
              <input name="apzaddressAPZ_45" id="apzaddressAPZ_45" size="9" type="text" value="85" readonly>
              <input name="apzvaluetowriteAPZ_45" id="apzvaluetowriteAPZ_45" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_45" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_45'])) {
    $apzaddressAPZ_45 = $_POST['apzaddressAPZ_45'];
    $apzvalueAPZ_45   = $_POST['apzvaluetowriteAPZ_45'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_45 . ' ' . $apzvalueAPZ_45 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_45" >Loading data...</div></td>
            <td>PED CH 45</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress46" method="post" action="">
              <input name="apzaddressAPZ_46" id="apzaddressAPZ_46" size="9" type="text" value="101" readonly>
              <input name="apzvaluetowriteAPZ_46" id="apzvaluetowriteAPZ_46" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_46" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_46'])) {
    $apzaddressAPZ_46 = $_POST['apzaddressAPZ_46'];
    $apzvalueAPZ_46   = $_POST['apzvaluetowriteAPZ_46'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_46 . ' ' . $apzvalueAPZ_46 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_46" >Loading data...</div></td>
            <td>PED CH 46</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress47" method="post" action="">
              <input name="apzaddressAPZ_47" id="apzaddressAPZ_47" size="9" type="text" value="117" readonly>
              <input name="apzvaluetowriteAPZ_47" id="apzvaluetowriteAPZ_47" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_47" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_47'])) {
    $apzaddressAPZ_47 = $_POST['apzaddressAPZ_47'];
    $apzvalueAPZ_47   = $_POST['apzvaluetowriteAPZ_47'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_47 . ' ' . $apzvalueAPZ_47 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_47" >Loading data...</div></td>
            <td>PED CH 47</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress48" method="post" action="">
              <input name="apzaddressAPZ_48" id="apzaddressAPZ_48" size="9" type="text" value="9" readonly>
              <input name="apzvaluetowriteAPZ_48" id="apzvaluetowriteAPZ_48" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_48" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_48'])) {
    $apzaddressAPZ_48 = $_POST['apzaddressAPZ_48'];
    $apzvalueAPZ_48   = $_POST['apzvaluetowriteAPZ_48'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_48 . ' ' . $apzvalueAPZ_48 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_48" >Loading data...</div></td>
            <td>PED CH 48</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress49" method="post" action="">
              <input name="apzaddressAPZ_49" id="apzaddressAPZ_49" size="9" type="text" value="25" readonly>
              <input name="apzvaluetowriteAPZ_49" id="apzvaluetowriteAPZ_49" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_49" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_49'])) {
    $apzaddressAPZ_49 = $_POST['apzaddressAPZ_49'];
    $apzvalueAPZ_49   = $_POST['apzvaluetowriteAPZ_49'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_49 . ' ' . $apzvalueAPZ_49 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_49" >Loading data...</div></td>
            <td>PED CH 49</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress50" method="post" action="">
              <input name="apzaddressAPZ_50" id="apzaddressAPZ_50" size="9" type="text" value="41" readonly>
              <input name="apzvaluetowriteAPZ_50" id="apzvaluetowriteAPZ_50" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_50" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_50'])) {
    $apzaddressAPZ_50 = $_POST['apzaddressAPZ_50'];
    $apzvalueAPZ_50   = $_POST['apzvaluetowriteAPZ_50'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_50 . ' ' . $apzvalueAPZ_50 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_50" >Loading data...</div></td>
            <td>PED CH 50</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress51" method="post" action="">
              <input name="apzaddressAPZ_51" id="apzaddressAPZ_51" size="9" type="text" value="57" readonly>
              <input name="apzvaluetowriteAPZ_51" id="apzvaluetowriteAPZ_51" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_51" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_51'])) {
    $apzaddressAPZ_51 = $_POST['apzaddressAPZ_51'];
    $apzvalueAPZ_51   = $_POST['apzvaluetowriteAPZ_51'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_51 . ' ' . $apzvalueAPZ_51 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_51" >Loading data...</div></td>
            <td>PED CH 51</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress52" method="post" action="">
              <input name="apzaddressAPZ_52" id="apzaddressAPZ_52" size="9" type="text" value="73" readonly>
              <input name="apzvaluetowriteAPZ_52" id="apzvaluetowriteAPZ_52" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_52" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_52'])) {
    $apzaddressAPZ_52 = $_POST['apzaddressAPZ_52'];
    $apzvalueAPZ_52   = $_POST['apzvaluetowriteAPZ_52'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_52 . ' ' . $apzvalueAPZ_52 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_52" >Loading data...</div></td>
            <td>PED CH 52</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress53" method="post" action="">
              <input name="apzaddressAPZ_53" id="apzaddressAPZ_53" size="9" type="text" value="89" readonly>
              <input name="apzvaluetowriteAPZ_53" id="apzvaluetowriteAPZ_53" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_53" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_53'])) {
    $apzaddressAPZ_53 = $_POST['apzaddressAPZ_53'];
    $apzvalueAPZ_53   = $_POST['apzvaluetowriteAPZ_53'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_53 . ' ' . $apzvalueAPZ_53 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_53" >Loading data...</div></td>
            <td>PED CH 53</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress54" method="post" action="">
              <input name="apzaddressAPZ_54" id="apzaddressAPZ_54" size="9" type="text" value="105" readonly>
              <input name="apzvaluetowriteAPZ_54" id="apzvaluetowriteAPZ_54" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_54" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_54'])) {
    $apzaddressAPZ_54 = $_POST['apzaddressAPZ_54'];
    $apzvalueAPZ_54   = $_POST['apzvaluetowriteAPZ_54'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_54 . ' ' . $apzvalueAPZ_54 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_54" >Loading data...</div></td>
            <td>PED CH 54</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress55" method="post" action="">
              <input name="apzaddressAPZ_55" id="apzaddressAPZ_55" size="9" type="text" value="121" readonly>
              <input name="apzvaluetowriteAPZ_55" id="apzvaluetowriteAPZ_55" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_55" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_55'])) {
    $apzaddressAPZ_55 = $_POST['apzaddressAPZ_55'];
    $apzvalueAPZ_55   = $_POST['apzvaluetowriteAPZ_55'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_55 . ' ' . $apzvalueAPZ_55 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_55" >Loading data...</div></td>
            <td>PED CH 55</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress56" method="post" action="">
              <input name="apzaddressAPZ_56" id="apzaddressAPZ_56" size="9" type="text" value="13" readonly>
              <input name="apzvaluetowriteAPZ_56" id="apzvaluetowriteAPZ_56" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_56" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_56'])) {
    $apzaddressAPZ_56 = $_POST['apzaddressAPZ_56'];
    $apzvalueAPZ_56   = $_POST['apzvaluetowriteAPZ_56'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_56 . ' ' . $apzvalueAPZ_56 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_56" >Loading data...</div></td>
            <td>PED CH 56</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress57" method="post" action="">
              <input name="apzaddressAPZ_57" id="apzaddressAPZ_57" size="9" type="text" value="29" readonly>
              <input name="apzvaluetowriteAPZ_57" id="apzvaluetowriteAPZ_57" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_57" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_57'])) {
    $apzaddressAPZ_57 = $_POST['apzaddressAPZ_57'];
    $apzvalueAPZ_57   = $_POST['apzvaluetowriteAPZ_57'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_57 . ' ' . $apzvalueAPZ_57 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_57" >Loading data...</div></td>
            <td>PED CH 57</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress58" method="post" action="">
              <input name="apzaddressAPZ_58" id="apzaddressAPZ_58" size="9" type="text" value="45" readonly>
              <input name="apzvaluetowriteAPZ_58" id="apzvaluetowriteAPZ_58" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_58" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_58'])) {
    $apzaddressAPZ_58 = $_POST['apzaddressAPZ_58'];
    $apzvalueAPZ_58   = $_POST['apzvaluetowriteAPZ_58'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_58 . ' ' . $apzvalueAPZ_58 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_58" >Loading data...</div></td>
            <td>PED CH 58</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress59" method="post" action="">
              <input name="apzaddressAPZ_59" id="apzaddressAPZ_59" size="9" type="text" value="61" readonly>
              <input name="apzvaluetowriteAPZ_59" id="apzvaluetowriteAPZ_59" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_59" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_59'])) {
    $apzaddressAPZ_59 = $_POST['apzaddressAPZ_59'];
    $apzvalueAPZ_59   = $_POST['apzvaluetowriteAPZ_59'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_59 . ' ' . $apzvalueAPZ_59 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_59" >Loading data...</div></td>
            <td>PED CH 59</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress60" method="post" action="">
              <input name="apzaddressAPZ_60" id="apzaddressAPZ_60" size="9" type="text" value="77" readonly>
              <input name="apzvaluetowriteAPZ_60" id="apzvaluetowriteAPZ_60" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_60" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_60'])) {
    $apzaddressAPZ_60 = $_POST['apzaddressAPZ_60'];
    $apzvalueAPZ_60   = $_POST['apzvaluetowriteAPZ_60'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_60 . ' ' . $apzvalueAPZ_60 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_60" >Loading data...</div></td>
            <td>PED CH 60</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress61" method="post" action="">
              <input name="apzaddressAPZ_61" id="apzaddressAPZ_61" size="9" type="text" value="93" readonly>
              <input name="apzvaluetowriteAPZ_61" id="apzvaluetowriteAPZ_61" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_61" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_61'])) {
    $apzaddressAPZ_61 = $_POST['apzaddressAPZ_61'];
    $apzvalueAPZ_61   = $_POST['apzvaluetowriteAPZ_61'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_61 . ' ' . $apzvalueAPZ_61 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_61" >Loading data...</div></td>
            <td>PED CH 61</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress62" method="post" action="">
              <input name="apzaddressAPZ_62" id="apzaddressAPZ_62" size="9" type="text" value="109" readonly>
              <input name="apzvaluetowriteAPZ_62" id="apzvaluetowriteAPZ_62" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_62" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_62'])) {
    $apzaddressAPZ_62 = $_POST['apzaddressAPZ_62'];
    $apzvalueAPZ_62   = $_POST['apzvaluetowriteAPZ_62'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_62 . ' ' . $apzvalueAPZ_62 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_62" >Loading data...</div></td>
            <td>PED CH 62</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress63" method="post" action="">
              <input name="apzaddressAPZ_63" id="apzaddressAPZ_63" size="9" type="text" value="125" readonly>
              <input name="apzvaluetowriteAPZ_63" id="apzvaluetowriteAPZ_63" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_63" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_63'])) {
    $apzaddressAPZ_63 = $_POST['apzaddressAPZ_63'];
    $apzvalueAPZ_63   = $_POST['apzvaluetowriteAPZ_63'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_63 . ' ' . $apzvalueAPZ_63 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_63" >Loading data...</div></td>
            <td>PED CH 63</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress64" method="post" action="">
              <input name="apzaddressAPZ_64" id="apzaddressAPZ_64" size="9" type="text" value="2" readonly>
              <input name="apzvaluetowriteAPZ_64" id="apzvaluetowriteAPZ_64" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_64" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_64'])) {
    $apzaddressAPZ_64 = $_POST['apzaddressAPZ_64'];
    $apzvalueAPZ_64   = $_POST['apzvaluetowriteAPZ_64'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_64 . ' ' . $apzvalueAPZ_64 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_64" >Loading data...</div></td>
            <td>PED CH 64</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress65" method="post" action="">
              <input name="apzaddressAPZ_65" id="apzaddressAPZ_65" size="9" type="text" value="18" readonly>
              <input name="apzvaluetowriteAPZ_65" id="apzvaluetowriteAPZ_65" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_65" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_65'])) {
    $apzaddressAPZ_65 = $_POST['apzaddressAPZ_65'];
    $apzvalueAPZ_65   = $_POST['apzvaluetowriteAPZ_65'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_65 . ' ' . $apzvalueAPZ_65 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_65" >Loading data...</div></td>
            <td>PED CH 65</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress66" method="post" action="">
              <input name="apzaddressAPZ_66" id="apzaddressAPZ_66" size="9" type="text" value="34" readonly>
              <input name="apzvaluetowriteAPZ_66" id="apzvaluetowriteAPZ_66" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_66" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_66'])) {
    $apzaddressAPZ_66 = $_POST['apzaddressAPZ_66'];
    $apzvalueAPZ_66   = $_POST['apzvaluetowriteAPZ_66'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_66 . ' ' . $apzvalueAPZ_66 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_66" >Loading data...</div></td>
            <td>PED CH 66</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress67" method="post" action="">
              <input name="apzaddressAPZ_67" id="apzaddressAPZ_67" size="9" type="text" value="50" readonly>
              <input name="apzvaluetowriteAPZ_67" id="apzvaluetowriteAPZ_67" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_67" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_67'])) {
    $apzaddressAPZ_67 = $_POST['apzaddressAPZ_67'];
    $apzvalueAPZ_67   = $_POST['apzvaluetowriteAPZ_67'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_67 . ' ' . $apzvalueAPZ_67 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_67" >Loading data...</div></td>
            <td>PED CH 67</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress68" method="post" action="">
              <input name="apzaddressAPZ_68" id="apzaddressAPZ_68" size="9" type="text" value="66" readonly>
              <input name="apzvaluetowriteAPZ_68" id="apzvaluetowriteAPZ_68" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_68" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_68'])) {
    $apzaddressAPZ_68 = $_POST['apzaddressAPZ_68'];
    $apzvalueAPZ_68   = $_POST['apzvaluetowriteAPZ_68'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_68 . ' ' . $apzvalueAPZ_68 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_68" >Loading data...</div></td>
            <td>PED CH 68</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress69" method="post" action="">
              <input name="apzaddressAPZ_69" id="apzaddressAPZ_69" size="9" type="text" value="82" readonly>
              <input name="apzvaluetowriteAPZ_69" id="apzvaluetowriteAPZ_69" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_69" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_69'])) {
    $apzaddressAPZ_69 = $_POST['apzaddressAPZ_69'];
    $apzvalueAPZ_69   = $_POST['apzvaluetowriteAPZ_69'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_69 . ' ' . $apzvalueAPZ_69 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_69" >Loading data...</div></td>
            <td>PED CH 69</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress70" method="post" action="">
              <input name="apzaddressAPZ_70" id="apzaddressAPZ_70" size="9" type="text" value="98" readonly>
              <input name="apzvaluetowriteAPZ_70" id="apzvaluetowriteAPZ_70" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_70" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_70'])) {
    $apzaddressAPZ_70 = $_POST['apzaddressAPZ_70'];
    $apzvalueAPZ_70   = $_POST['apzvaluetowriteAPZ_70'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_70 . ' ' . $apzvalueAPZ_70 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_70" >Loading data...</div></td>
            <td>PED CH 70</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress71" method="post" action="">
              <input name="apzaddressAPZ_71" id="apzaddressAPZ_71" size="9" type="text" value="114" readonly>
              <input name="apzvaluetowriteAPZ_71" id="apzvaluetowriteAPZ_71" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_71" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_71'])) {
    $apzaddressAPZ_71 = $_POST['apzaddressAPZ_71'];
    $apzvalueAPZ_71   = $_POST['apzvaluetowriteAPZ_71'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_71 . ' ' . $apzvalueAPZ_71 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_71" >Loading data...</div></td>
            <td>PED CH 71</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress72" method="post" action="">
              <input name="apzaddressAPZ_72" id="apzaddressAPZ_72" size="9" type="text" value="6" readonly>
              <input name="apzvaluetowriteAPZ_72" id="apzvaluetowriteAPZ_72" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_72" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_72'])) {
    $apzaddressAPZ_72 = $_POST['apzaddressAPZ_72'];
    $apzvalueAPZ_72   = $_POST['apzvaluetowriteAPZ_72'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_72 . ' ' . $apzvalueAPZ_72 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_72" >Loading data...</div></td>
            <td>PED CH 72</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress73" method="post" action="">
              <input name="apzaddressAPZ_73" id="apzaddressAPZ_73" size="9" type="text" value="22" readonly>
              <input name="apzvaluetowriteAPZ_73" id="apzvaluetowriteAPZ_73" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_73" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_73'])) {
    $apzaddressAPZ_73 = $_POST['apzaddressAPZ_73'];
    $apzvalueAPZ_73   = $_POST['apzvaluetowriteAPZ_73'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_73 . ' ' . $apzvalueAPZ_73 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_73" >Loading data...</div></td>
            <td>PED CH 73</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress74" method="post" action="">
              <input name="apzaddressAPZ_74" id="apzaddressAPZ_74" size="9" type="text" value="38" readonly>
              <input name="apzvaluetowriteAPZ_74" id="apzvaluetowriteAPZ_74" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_74" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_74'])) {
    $apzaddressAPZ_74 = $_POST['apzaddressAPZ_74'];
    $apzvalueAPZ_74   = $_POST['apzvaluetowriteAPZ_74'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_74 . ' ' . $apzvalueAPZ_74 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_74" >Loading data...</div></td>
            <td>PED CH 74</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress75" method="post" action="">
              <input name="apzaddressAPZ_75" id="apzaddressAPZ_75" size="9" type="text" value="54" readonly>
              <input name="apzvaluetowriteAPZ_75" id="apzvaluetowriteAPZ_75" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_75" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_75'])) {
    $apzaddressAPZ_75 = $_POST['apzaddressAPZ_75'];
    $apzvalueAPZ_75   = $_POST['apzvaluetowriteAPZ_75'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_75 . ' ' . $apzvalueAPZ_75 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_75" >Loading data...</div></td>
            <td>PED CH 75</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress76" method="post" action="">
              <input name="apzaddressAPZ_76" id="apzaddressAPZ_76" size="9" type="text" value="70" readonly>
              <input name="apzvaluetowriteAPZ_76" id="apzvaluetowriteAPZ_76" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_76" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_76'])) {
    $apzaddressAPZ_76 = $_POST['apzaddressAPZ_76'];
    $apzvalueAPZ_76   = $_POST['apzvaluetowriteAPZ_76'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_76 . ' ' . $apzvalueAPZ_76 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_76" >Loading data...</div></td>
            <td>PED CH 76</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress77" method="post" action="">
              <input name="apzaddressAPZ_77" id="apzaddressAPZ_77" size="9" type="text" value="86" readonly>
              <input name="apzvaluetowriteAPZ_77" id="apzvaluetowriteAPZ_77" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_77" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_77'])) {
    $apzaddressAPZ_77 = $_POST['apzaddressAPZ_77'];
    $apzvalueAPZ_77   = $_POST['apzvaluetowriteAPZ_77'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_77 . ' ' . $apzvalueAPZ_77 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_77" >Loading data...</div></td>
            <td>PED CH 77</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress78" method="post" action="">
              <input name="apzaddressAPZ_78" id="apzaddressAPZ_78" size="9" type="text" value="102" readonly>
              <input name="apzvaluetowriteAPZ_78" id="apzvaluetowriteAPZ_78" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_78" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_78'])) {
    $apzaddressAPZ_78 = $_POST['apzaddressAPZ_78'];
    $apzvalueAPZ_78   = $_POST['apzvaluetowriteAPZ_78'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_78 . ' ' . $apzvalueAPZ_78 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_78" >Loading data...</div></td>
            <td>PED CH 78</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress79" method="post" action="">
              <input name="apzaddressAPZ_79" id="apzaddressAPZ_79" size="9" type="text" value="118" readonly>
              <input name="apzvaluetowriteAPZ_79" id="apzvaluetowriteAPZ_79" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_79" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_79'])) {
    $apzaddressAPZ_79 = $_POST['apzaddressAPZ_79'];
    $apzvalueAPZ_79   = $_POST['apzvaluetowriteAPZ_79'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_79 . ' ' . $apzvalueAPZ_79 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_79" >Loading data...</div></td>
            <td>PED CH 79</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress80" method="post" action="">
              <input name="apzaddressAPZ_80" id="apzaddressAPZ_80" size="9" type="text" value="10" readonly>
              <input name="apzvaluetowriteAPZ_80" id="apzvaluetowriteAPZ_80" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_80" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_80'])) {
    $apzaddressAPZ_80 = $_POST['apzaddressAPZ_80'];
    $apzvalueAPZ_80   = $_POST['apzvaluetowriteAPZ_80'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_80 . ' ' . $apzvalueAPZ_80 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_80" >Loading data...</div></td>
            <td>PED CH 80</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress81" method="post" action="">
              <input name="apzaddressAPZ_81" id="apzaddressAPZ_81" size="9" type="text" value="26" readonly>
              <input name="apzvaluetowriteAPZ_81" id="apzvaluetowriteAPZ_81" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_81" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_81'])) {
    $apzaddressAPZ_81 = $_POST['apzaddressAPZ_81'];
    $apzvalueAPZ_81   = $_POST['apzvaluetowriteAPZ_81'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_81 . ' ' . $apzvalueAPZ_81 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_81" >Loading data...</div></td>
            <td>PED CH 81</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress82" method="post" action="">
              <input name="apzaddressAPZ_82" id="apzaddressAPZ_82" size="9" type="text" value="42" readonly>
              <input name="apzvaluetowriteAPZ_82" id="apzvaluetowriteAPZ_82" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_82" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_82'])) {
    $apzaddressAPZ_82 = $_POST['apzaddressAPZ_82'];
    $apzvalueAPZ_82   = $_POST['apzvaluetowriteAPZ_82'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_82 . ' ' . $apzvalueAPZ_82 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_82" >Loading data...</div></td>
            <td>PED CH 82</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress83" method="post" action="">
              <input name="apzaddressAPZ_83" id="apzaddressAPZ_83" size="9" type="text" value="58" readonly>
              <input name="apzvaluetowriteAPZ_83" id="apzvaluetowriteAPZ_83" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_83" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_83'])) {
    $apzaddressAPZ_83 = $_POST['apzaddressAPZ_83'];
    $apzvalueAPZ_83   = $_POST['apzvaluetowriteAPZ_83'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_83 . ' ' . $apzvalueAPZ_83 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_83" >Loading data...</div></td>
            <td>PED CH 83</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress84" method="post" action="">
              <input name="apzaddressAPZ_84" id="apzaddressAPZ_84" size="9" type="text" value="74" readonly>
              <input name="apzvaluetowriteAPZ_84" id="apzvaluetowriteAPZ_84" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_84" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_84'])) {
    $apzaddressAPZ_84 = $_POST['apzaddressAPZ_84'];
    $apzvalueAPZ_84   = $_POST['apzvaluetowriteAPZ_84'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_84 . ' ' . $apzvalueAPZ_84 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_84" >Loading data...</div></td>
            <td>PED CH 84</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress85" method="post" action="">
              <input name="apzaddressAPZ_85" id="apzaddressAPZ_85" size="9" type="text" value="90" readonly>
              <input name="apzvaluetowriteAPZ_85" id="apzvaluetowriteAPZ_85" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_85" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_85'])) {
    $apzaddressAPZ_85 = $_POST['apzaddressAPZ_85'];
    $apzvalueAPZ_85   = $_POST['apzvaluetowriteAPZ_85'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_85 . ' ' . $apzvalueAPZ_85 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_85" >Loading data...</div></td>
            <td>PED CH 85</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress86" method="post" action="">
              <input name="apzaddressAPZ_86" id="apzaddressAPZ_86" size="9" type="text" value="106" readonly>
              <input name="apzvaluetowriteAPZ_86" id="apzvaluetowriteAPZ_86" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_86" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_86'])) {
    $apzaddressAPZ_86 = $_POST['apzaddressAPZ_86'];
    $apzvalueAPZ_86   = $_POST['apzvaluetowriteAPZ_86'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_86 . ' ' . $apzvalueAPZ_86 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_86" >Loading data...</div></td>
            <td>PED CH 86</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress87" method="post" action="">
              <input name="apzaddressAPZ_87" id="apzaddressAPZ_87" size="9" type="text" value="122" readonly>
              <input name="apzvaluetowriteAPZ_87" id="apzvaluetowriteAPZ_87" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_87" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_87'])) {
    $apzaddressAPZ_87 = $_POST['apzaddressAPZ_87'];
    $apzvalueAPZ_87   = $_POST['apzvaluetowriteAPZ_87'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_87 . ' ' . $apzvalueAPZ_87 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_87" >Loading data...</div></td>
            <td>PED CH 87</td>
          </tr>
          <tr>
            <td>
              <form id="writeapzaddress88" method="post" action="">
              <input name="apzaddressAPZ_88" id="apzaddressAPZ_88" size="9" type="text" value="14" readonly>
              <input name="apzvaluetowriteAPZ_88" id="apzvaluetowriteAPZ_88" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_88" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_88'])) {
    $apzaddressAPZ_88 = $_POST['apzaddressAPZ_88'];
    $apzvalueAPZ_88   = $_POST['apzvaluetowriteAPZ_88'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_88 . ' ' . $apzvalueAPZ_88 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_88" >Loading data...</div></td>
            <td>PED CH 88</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress89" method="post" action="">
              <input name="apzaddressAPZ_89" id="apzaddressAPZ_89" size="9" type="text" value="30" readonly>
              <input name="apzvaluetowriteAPZ_89" id="apzvaluetowriteAPZ_89" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_89" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_89'])) {
    $apzaddressAPZ_89 = $_POST['apzaddressAPZ_89'];
    $apzvalueAPZ_89   = $_POST['apzvaluetowriteAPZ_89'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_89 . ' ' . $apzvalueAPZ_89 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_89" >Loading data...</div></td>
            <td>PED CH 89</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress90" method="post" action="">
              <input name="apzaddressAPZ_90" id="apzaddressAPZ_90" size="9" type="text" value="46" readonly>
              <input name="apzvaluetowriteAPZ_90" id="apzvaluetowriteAPZ_90" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_90" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_90'])) {
    $apzaddressAPZ_90 = $_POST['apzaddressAPZ_90'];
    $apzvalueAPZ_90   = $_POST['apzvaluetowriteAPZ_90'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_90 . ' ' . $apzvalueAPZ_90 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_90" >Loading data...</div></td>
            <td>PED CH 90</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress91" method="post" action="">
              <input name="apzaddressAPZ_91" id="apzaddressAPZ_91" size="9" type="text" value="62" readonly>
              <input name="apzvaluetowriteAPZ_91" id="apzvaluetowriteAPZ_91" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_91" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_91'])) {
    $apzaddressAPZ_91 = $_POST['apzaddressAPZ_91'];
    $apzvalueAPZ_91   = $_POST['apzvaluetowriteAPZ_91'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_91 . ' ' . $apzvalueAPZ_91 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_91" >Loading data...</div></td>
            <td>PED CH 91</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress92" method="post" action="">
              <input name="apzaddressAPZ_92" id="apzaddressAPZ_92" size="9" type="text" value="78" readonly>
              <input name="apzvaluetowriteAPZ_92" id="apzvaluetowriteAPZ_92" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_92" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_92'])) {
    $apzaddressAPZ_92 = $_POST['apzaddressAPZ_92'];
    $apzvalueAPZ_92   = $_POST['apzvaluetowriteAPZ_92'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_92 . ' ' . $apzvalueAPZ_92 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_92" >Loading data...</div></td>
            <td>PED CH 92</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress93" method="post" action="">
              <input name="apzaddressAPZ_93" id="apzaddressAPZ_93" size="9" type="text" value="94" readonly>
              <input name="apzvaluetowriteAPZ_93" id="apzvaluetowriteAPZ_93" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_93" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_93'])) {
    $apzaddressAPZ_93 = $_POST['apzaddressAPZ_93'];
    $apzvalueAPZ_93   = $_POST['apzvaluetowriteAPZ_93'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_93 . ' ' . $apzvalueAPZ_93 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_93" >Loading data...</div></td>
            <td>PED CH 93</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress94" method="post" action="">
              <input name="apzaddressAPZ_94" id="apzaddressAPZ_94" size="9" type="text" value="110" readonly>
              <input name="apzvaluetowriteAPZ_94" id="apzvaluetowriteAPZ_94" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_94" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_94'])) {
    $apzaddressAPZ_94 = $_POST['apzaddressAPZ_94'];
    $apzvalueAPZ_94   = $_POST['apzvaluetowriteAPZ_94'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_94 . ' ' . $apzvalueAPZ_94 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_94" >Loading data...</div></td>
            <td>PED CH 94</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress95" method="post" action="">
              <input name="apzaddressAPZ_95" id="apzaddressAPZ_95" size="9" type="text" value="126" readonly>
              <input name="apzvaluetowriteAPZ_95" id="apzvaluetowriteAPZ_95" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_95" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_95'])) {
    $apzaddressAPZ_95 = $_POST['apzaddressAPZ_95'];
    $apzvalueAPZ_95   = $_POST['apzvaluetowriteAPZ_95'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_95 . ' ' . $apzvalueAPZ_95 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_95" >Loading data...</div></td>
            <td>PED CH 95</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress97" method="post" action="">
              <input name="apzaddressAPZ_96" id="apzaddressAPZ_96" size="9" type="text" value="3" readonly>
              <input name="apzvaluetowriteAPZ_96" id="apzvaluetowriteAPZ_96" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_96" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_96'])) {
    $apzaddressAPZ_96 = $_POST['apzaddressAPZ_96'];
    $apzvalueAPZ_96   = $_POST['apzvaluetowriteAPZ_96'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_96 . ' ' . $apzvalueAPZ_96 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_96" >Loading data...</div></td>
            <td>PED CH 96</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress97" method="post" action="">
              <input name="apzaddressAPZ_97" id="apzaddressAPZ_97" size="9" type="text" value="19" readonly>
              <input name="apzvaluetowriteAPZ_97" id="apzvaluetowriteAPZ_97" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_97" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_97'])) {
    $apzaddressAPZ_97 = $_POST['apzaddressAPZ_97'];
    $apzvalueAPZ_97   = $_POST['apzvaluetowriteAPZ_97'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_97 . ' ' . $apzvalueAPZ_97 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_97" >Loading data...</div></td>
            <td>PED CH 97</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress98" method="post" action="">
              <input name="apzaddressAPZ_98" id="apzaddressAPZ_98" size="9" type="text" value="35" readonly>
              <input name="apzvaluetowriteAPZ_98" id="apzvaluetowriteAPZ_98" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_98" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_98'])) {
    $apzaddressAPZ_98 = $_POST['apzaddressAPZ_98'];
    $apzvalueAPZ_98   = $_POST['apzvaluetowriteAPZ_98'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_98 . ' ' . $apzvalueAPZ_98 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_98" >Loading data...</div></td>
            <td>PED CH 98</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress99" method="post" action="">
              <input name="apzaddressAPZ_99" id="apzaddressAPZ_99" size="9" type="text" value="51" readonly>
              <input name="apzvaluetowriteAPZ_99" id="apzvaluetowriteAPZ_99" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_99" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_99'])) {
    $apzaddressAPZ_99 = $_POST['apzaddressAPZ_99'];
    $apzvalueAPZ_99   = $_POST['apzvaluetowriteAPZ_99'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_99 . ' ' . $apzvalueAPZ_99 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_99" >Loading data...</div></td>
            <td>PED CH 99</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress100" method="post" action="">
              <input name="apzaddressAPZ_100" id="apzaddressAPZ_100" size="9" type="text" value="67" readonly>
              <input name="apzvaluetowriteAPZ_100" id="apzvaluetowriteAPZ_100" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_100" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_100'])) {
    $apzaddressAPZ_100 = $_POST['apzaddressAPZ_100'];
    $apzvalueAPZ_100   = $_POST['apzvaluetowriteAPZ_100'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_100 . ' ' . $apzvalueAPZ_100 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_100" >Loading data...</div></td>
            <td>PED CH 100</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress101" method="post" action="">
              <input name="apzaddressAPZ_101" id="apzaddressAPZ_101" size="9" type="text" value="83" readonly>
              <input name="apzvaluetowriteAPZ_101" id="apzvaluetowriteAPZ_101" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_101" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_101'])) {
    $apzaddressAPZ_101 = $_POST['apzaddressAPZ_101'];
    $apzvalueAPZ_101   = $_POST['apzvaluetowriteAPZ_101'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_101 . ' ' . $apzvalueAPZ_101 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_101" >Loading data...</div></td>
            <td>PED CH 101</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress102" method="post" action="">
              <input name="apzaddressAPZ_102" id="apzaddressAPZ_102" size="9" type="text" value="99" readonly>
              <input name="apzvaluetowriteAPZ_102" id="apzvaluetowriteAPZ_102" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_102" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_102'])) {
    $apzaddressAPZ_102 = $_POST['apzaddressAPZ_102'];
    $apzvalueAPZ_102   = $_POST['apzvaluetowriteAPZ_102'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_102 . ' ' . $apzvalueAPZ_102 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_102" >Loading data...</div></td>
            <td>PED CH 102</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress103" method="post" action="">
              <input name="apzaddressAPZ_103" id="apzaddressAPZ_103" size="9" type="text" value="115" readonly>
              <input name="apzvaluetowriteAPZ_103" id="apzvaluetowriteAPZ_103" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_103" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_103'])) {
    $apzaddressAPZ_103 = $_POST['apzaddressAPZ_103'];
    $apzvalueAPZ_103   = $_POST['apzvaluetowriteAPZ_103'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_103 . ' ' . $apzvalueAPZ_103 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_103" >Loading data...</div></td>
            <td>PED CH 103</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress104" method="post" action="">
              <input name="apzaddressAPZ_104" id="apzaddressAPZ_104" size="9" type="text" value="7" readonly>
              <input name="apzvaluetowriteAPZ_104" id="apzvaluetowriteAPZ_104" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_104" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_104'])) {
    $apzaddressAPZ_104 = $_POST['apzaddressAPZ_104'];
    $apzvalueAPZ_104   = $_POST['apzvaluetowriteAPZ_104'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_104 . ' ' . $apzvalueAPZ_104 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_104" >Loading data...</div></td>
            <td>PED CH 104</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress105" method="post" action="">
              <input name="apzaddressAPZ_105" id="apzaddressAPZ_105" size="9" type="text" value="23" readonly>
              <input name="apzvaluetowriteAPZ_105" id="apzvaluetowriteAPZ_105" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_105" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_105'])) {
    $apzaddressAPZ_105 = $_POST['apzaddressAPZ_105'];
    $apzvalueAPZ_105   = $_POST['apzvaluetowriteAPZ_105'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_105 . ' ' . $apzvalueAPZ_105 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_105" >Loading data...</div></td>
            <td>PED CH 105</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress106" method="post" action="">
              <input name="apzaddressAPZ_106" id="apzaddressAPZ_106" size="9" type="text" value="39" readonly>
              <input name="apzvaluetowriteAPZ_106" id="apzvaluetowriteAPZ_106" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_106" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_106'])) {
    $apzaddressAPZ_106 = $_POST['apzaddressAPZ_106'];
    $apzvalueAPZ_106   = $_POST['apzvaluetowriteAPZ_106'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_106 . ' ' . $apzvalueAPZ_106 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_106" >Loading data...</div></td>
            <td>PED CH 106</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress107" method="post" action="">
              <input name="apzaddressAPZ_107" id="apzaddressAPZ_107" size="9" type="text" value="55" readonly>
              <input name="apzvaluetowriteAPZ_107" id="apzvaluetowriteAPZ_107" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_107" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_107'])) {
    $apzaddressAPZ_107 = $_POST['apzaddressAPZ_107'];
    $apzvalueAPZ_107   = $_POST['apzvaluetowriteAPZ_107'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_107 . ' ' . $apzvalueAPZ_107 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_107" >Loading data...</div></td>
            <td>PED CH 107</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress108" method="post" action="">
              <input name="apzaddressAPZ_108" id="apzaddressAPZ_108" size="9" type="text" value="71" readonly>
              <input name="apzvaluetowriteAPZ_108" id="apzvaluetowriteAPZ_108" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_108" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_108'])) {
    $apzaddressAPZ_108 = $_POST['apzaddressAPZ_108'];
    $apzvalueAPZ_108   = $_POST['apzvaluetowriteAPZ_108'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_108 . ' ' . $apzvalueAPZ_108 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_108" >Loading data...</div></td>
            <td>PED CH 108</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress109" method="post" action="">
              <input name="apzaddressAPZ_109" id="apzaddressAPZ_109" size="9" type="text" value="87" readonly>
              <input name="apzvaluetowriteAPZ_109" id="apzvaluetowriteAPZ_109" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_109" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_109'])) {
    $apzaddressAPZ_109 = $_POST['apzaddressAPZ_109'];
    $apzvalueAPZ_109   = $_POST['apzvaluetowriteAPZ_109'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_109 . ' ' . $apzvalueAPZ_109 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_109" >Loading data...</div></td>
            <td>PED CH 109</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress110" method="post" action="">
              <input name="apzaddressAPZ_110" id="apzaddressAPZ_110" size="9" type="text" value="103" readonly>
              <input name="apzvaluetowriteAPZ_110" id="apzvaluetowriteAPZ_110" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_110" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_110'])) {
    $apzaddressAPZ_110 = $_POST['apzaddressAPZ_110'];
    $apzvalueAPZ_110   = $_POST['apzvaluetowriteAPZ_110'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_110 . ' ' . $apzvalueAPZ_110 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_110" >Loading data...</div></td>
            <td>PED CH 110</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress111" method="post" action="">
              <input name="apzaddressAPZ_111" id="apzaddressAPZ_111" size="9" type="text" value="119" readonly>
              <input name="apzvaluetowriteAPZ_111" id="apzvaluetowriteAPZ_111" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_111" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_111'])) {
    $apzaddressAPZ_111 = $_POST['apzaddressAPZ_111'];
    $apzvalueAPZ_111   = $_POST['apzvaluetowriteAPZ_111'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_111 . ' ' . $apzvalueAPZ_111 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_111" >Loading data...</div></td>
            <td>PED CH 111</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress112" method="post" action="">
              <input name="apzaddressAPZ_112" id="apzaddressAPZ_112" size="9" type="text" value="11" readonly>
              <input name="apzvaluetowriteAPZ_112" id="apzvaluetowriteAPZ_112" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_112" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_112'])) {
    $apzaddressAPZ_112 = $_POST['apzaddressAPZ_112'];
    $apzvalueAPZ_112   = $_POST['apzvaluetowriteAPZ_112'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_112 . ' ' . $apzvalueAPZ_112 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_112" >Loading data...</div></td>
            <td>PED CH 112</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress113" method="post" action="">
              <input name="apzaddressAPZ_113" id="apzaddressAPZ_113" size="9" type="text" value="27" readonly>
              <input name="apzvaluetowriteAPZ_113" id="apzvaluetowriteAPZ_113" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_113" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_113'])) {
    $apzaddressAPZ_113 = $_POST['apzaddressAPZ_113'];
    $apzvalueAPZ_113   = $_POST['apzvaluetowriteAPZ_113'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_113 . ' ' . $apzvalueAPZ_113 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_113" >Loading data...</div></td>
            <td>PED CH 113</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress114" method="post" action="">
              <input name="apzaddressAPZ_114" id="apzaddressAPZ_114" size="9" type="text" value="43" readonly>
              <input name="apzvaluetowriteAPZ_114" id="apzvaluetowriteAPZ_114" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_114" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_114'])) {
    $apzaddressAPZ_114 = $_POST['apzaddressAPZ_114'];
    $apzvalueAPZ_114   = $_POST['apzvaluetowriteAPZ_114'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_114 . ' ' . $apzvalueAPZ_114 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_114" >Loading data...</div></td>
            <td>PED CH 114</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress115" method="post" action="">
              <input name="apzaddressAPZ_115" id="apzaddressAPZ_115" size="9" type="text" value="59" readonly>
              <input name="apzvaluetowriteAPZ_115" id="apzvaluetowriteAPZ_115" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_115" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_115'])) {
    $apzaddressAPZ_115 = $_POST['apzaddressAPZ_115'];
    $apzvalueAPZ_115   = $_POST['apzvaluetowriteAPZ_115'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_115 . ' ' . $apzvalueAPZ_115 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_115" >Loading data...</div></td>
            <td>PED CH 115</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress116" method="post" action="">
              <input name="apzaddressAPZ_116" id="apzaddressAPZ_116" size="9" type="text" value="75" readonly>
              <input name="apzvaluetowriteAPZ_116" id="apzvaluetowriteAPZ_116" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_116" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_116'])) {
    $apzaddressAPZ_116 = $_POST['apzaddressAPZ_116'];
    $apzvalueAPZ_116   = $_POST['apzvaluetowriteAPZ_116'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_116 . ' ' . $apzvalueAPZ_116 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_116" >Loading data...</div></td>
            <td>PED CH 116</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress117" method="post" action="">
              <input name="apzaddressAPZ_117" id="apzaddressAPZ_117" size="9" type="text" value="91" readonly>
              <input name="apzvaluetowriteAPZ_117" id="apzvaluetowriteAPZ_117" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_117" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_117'])) {
    $apzaddressAPZ_117 = $_POST['apzaddressAPZ_117'];
    $apzvalueAPZ_117   = $_POST['apzvaluetowriteAPZ_117'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_117 . ' ' . $apzvalueAPZ_117 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_117" >Loading data...</div></td>
            <td>PED CH 117</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress118" method="post" action="">
              <input name="apzaddressAPZ_118" id="apzaddressAPZ_118" size="9" type="text" value="107" readonly>
              <input name="apzvaluetowriteAPZ_118" id="apzvaluetowriteAPZ_118" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_118" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_118'])) {
    $apzaddressAPZ_118 = $_POST['apzaddressAPZ_118'];
    $apzvalueAPZ_118   = $_POST['apzvaluetowriteAPZ_118'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_118 . ' ' . $apzvalueAPZ_118 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_118" >Loading data...</div></td>
            <td>PED CH 118</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress119" method="post" action="">
              <input name="apzaddressAPZ_119" id="apzaddressAPZ_119" size="9" type="text" value="123" readonly>
              <input name="apzvaluetowriteAPZ_119" id="apzvaluetowriteAPZ_119" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_119" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_119'])) {
    $apzaddressAPZ_119 = $_POST['apzaddressAPZ_119'];
    $apzvalueAPZ_119   = $_POST['apzvaluetowriteAPZ_119'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_119 . ' ' . $apzvalueAPZ_119 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_119" >Loading data...</div></td>
            <td>PED CH 119</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress120" method="post" action="">
              <input name="apzaddressAPZ_120" id="apzaddressAPZ_120" size="9" type="text" value="15" readonly>
              <input name="apzvaluetowriteAPZ_120" id="apzvaluetowriteAPZ_120" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_120" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_120'])) {
    $apzaddressAPZ_120 = $_POST['apzaddressAPZ_120'];
    $apzvalueAPZ_120   = $_POST['apzvaluetowriteAPZ_120'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_120 . ' ' . $apzvalueAPZ_120 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_120" >Loading data...</div></td>
            <td>PED CH 120</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress121" method="post" action="">
              <input name="apzaddressAPZ_121" id="apzaddressAPZ_121" size="9" type="text" value="31" readonly>
              <input name="apzvaluetowriteAPZ_121" id="apzvaluetowriteAPZ_121" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_121" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_121'])) {
    $apzaddressAPZ_121 = $_POST['apzaddressAPZ_121'];
    $apzvalueAPZ_121   = $_POST['apzvaluetowriteAPZ_121'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_121 . ' ' . $apzvalueAPZ_121 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_121" >Loading data...</div></td>
            <td>PED CH 121</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress122" method="post" action="">
              <input name="apzaddressAPZ_122" id="apzaddressAPZ_122" size="9" type="text" value="47" readonly>
              <input name="apzvaluetowriteAPZ_122" id="apzvaluetowriteAPZ_122" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_122" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_122'])) {
    $apzaddressAPZ_122 = $_POST['apzaddressAPZ_122'];
    $apzvalueAPZ_122   = $_POST['apzvaluetowriteAPZ_122'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_122 . ' ' . $apzvalueAPZ_122 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_122" >Loading data...</div></td>
            <td>PED CH 122</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress123" method="post" action="">
              <input name="apzaddressAPZ_123" id="apzaddressAPZ_123" size="9" type="text" value="63" readonly>
              <input name="apzvaluetowriteAPZ_123" id="apzvaluetowriteAPZ_123" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_123" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_123'])) {
    $apzaddressAPZ_123 = $_POST['apzaddressAPZ_123'];
    $apzvalueAPZ_123   = $_POST['apzvaluetowriteAPZ_123'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_123 . ' ' . $apzvalueAPZ_123 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_123" >Loading data...</div></td>
            <td>PED CH 123</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress124" method="post" action="">
              <input name="apzaddressAPZ_124" id="apzaddressAPZ_124" size="9" type="text" value="79" readonly>
              <input name="apzvaluetowriteAPZ_124" id="apzvaluetowriteAPZ_124" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_124" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_124'])) {
    $apzaddressAPZ_124 = $_POST['apzaddressAPZ_124'];
    $apzvalueAPZ_124   = $_POST['apzvaluetowriteAPZ_124'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_124 . ' ' . $apzvalueAPZ_124 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_124" >Loading data...</div></td>
            <td>PED CH 124</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress125" method="post" action="">
              <input name="apzaddressAPZ_125" id="apzaddressAPZ_125" size="9" type="text" value="95" readonly>
              <input name="apzvaluetowriteAPZ_125" id="apzvaluetowriteAPZ_125" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_125" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_125'])) {
    $apzaddressAPZ_125 = $_POST['apzaddressAPZ_125'];
    $apzvalueAPZ_125   = $_POST['apzvaluetowriteAPZ_125'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_125 . ' ' . $apzvalueAPZ_125 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_125" >Loading data...</div></td>
            <td>PED CH 125</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress126" method="post" action="">
              <input name="apzaddressAPZ_126" id="apzaddressAPZ_126" size="9" type="text" value="111" readonly>
              <input name="apzvaluetowriteAPZ_126" id="apzvaluetowriteAPZ_126" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_126" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_126'])) {
    $apzaddressAPZ_126 = $_POST['apzaddressAPZ_126'];
    $apzvalueAPZ_126   = $_POST['apzvaluetowriteAPZ_126'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_126 . ' ' . $apzvalueAPZ_126 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_126" >Loading data...</div></td>
            <td>PED CH 126</td>
          </tr>
          <tr>
            <td><form id="writeapzaddress127" method="post" action="">
              <input name="apzaddressAPZ_127" id="apzaddressAPZ_127" size="9" type="text" value="127" readonly>
              <input name="apzvaluetowriteAPZ_127" id="apzvaluetowriteAPZ_127" size="9" type="text" value="">
              <input name="apzstartwriteAPZ_127" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apzstartwriteAPZ_127'])) {
    $apzaddressAPZ_127 = $_POST['apzaddressAPZ_127'];
    $apzvalueAPZ_127   = $_POST['apzvaluetowriteAPZ_127'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");

    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apzaddressAPZ_127 . ' ' . $apzvalueAPZ_127 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZ_127" >Loading data...</div></td>
            <td>PED CH 127</td>
          </tr>
        </table>
      </td>
      
      <td><h2>Sigma</h2>
        <table border="1">
          <tr>
            <td>Address</td>
            <td>ReadBack value</td>
          </tr>
          <tr>
            <td><form id="writeapz2address0" method="post" action="">
              <input name="apz2addressAPZ_0" id="apz2addressAPZ_0" size="9" type="text" value="80000000" readonly>
              <input name="apz2valuetowriteAPZ_0" id="apz2valuetowriteAPZ_0" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_0" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_0'])) {
    $apz2addressAPZ_0 = $_POST['apz2addressAPZ_0'];
    $apz2valueAPZ_0   = $_POST['apz2valuetowriteAPZ_0'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
 
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_0 . ' ' . $apz2valueAPZ_0 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_0" >Loading data...</div></td>
            <td>PED CH0</td>
          </tr>
          <tr>
            <td><form id="writeapz2address1" method="post" action="">
              <input name="apz2addressAPZ_1" id="apz2addressAPZ_1" size="9" type="text" value="80000016" readonly>
              <input name="apz2valuetowriteAPZ_1" id="apz2valuetowriteAPZ_1" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_1" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_1'])) {
    $apz2addressAPZ_1 = $_POST['apz2addressAPZ_1'];
    $apz2valueAPZ_1   = $_POST['apz2valuetowriteAPZ_1'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
 
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_1 . ' ' . $apz2valueAPZ_1 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_1" >Loading data...</div></td>
            <td>PED CH 1</td>
          </tr>
          <tr>
            <td><form id="writeapz2address2" method="post" action="">
              <input name="apz2addressAPZ_2" id="apz2addressAPZ_2" size="9" type="text" value="80000032" readonly>
              <input name="apz2valuetowriteAPZ_2" id="apz2valuetowriteAPZ_2" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_2" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_2'])) {
    $apz2addressAPZ_2 = $_POST['apz2addressAPZ_2'];
    $apz2valueAPZ_2   = $_POST['apz2valuetowriteAPZ_2'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
 
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_2 . ' ' . $apz2valueAPZ_2 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_2" >Loading data...</div></td>
            <td>PED CH 2</td>
          </tr>
          <tr>
            <td><form id="writeapz2address3" method="post" action="">
              <input name="apz2addressAPZ_3" id="apz2addressAPZ_3" size="9" type="text" value="80000048" readonly>
              <input name="apz2valuetowriteAPZ_3" id="apz2valuetowriteAPZ_3" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_3" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_3'])) {
    $apz2addressAPZ_3 = $_POST['apz2addressAPZ_3'];
    $apz2valueAPZ_3   = $_POST['apz2valuetowriteAPZ_3'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
 
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_3 . ' ' . $apz2valueAPZ_3 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_3" >Loading data...</div></td>
            <td>PED CH 3</td>
          </tr>
          <tr>
            <td><form id="writeapz2address4" method="post" action="">
              <input name="apz2addressAPZ_4" id="apz2addressAPZ_4" size="9" type="text" value="80000064" readonly>
              <input name="apz2valuetowriteAPZ_4" id="apz2valuetowriteAPZ_4" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_4" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_4'])) {
    $apz2addressAPZ_4 = $_POST['apz2addressAPZ_4'];
    $apz2valueAPZ_4   = $_POST['apz2valuetowriteAPZ_4'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
 
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_4 . ' ' . $apz2valueAPZ_4 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_4" >Loading data...</div></td>
            <td>PED CH 4</td>
          </tr>
          <tr>
            <td><form id="writeapz2address5" method="post" action="">
              <input name="apz2addressAPZ_5" id="apz2addressAPZ_5" size="9" type="text" value="80000080" readonly>
              <input name="apz2valuetowriteAPZ_5" id="apz2valuetowriteAPZ_5" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_5" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_5'])) {
    $apz2addressAPZ_5 = $_POST['apz2addressAPZ_5'];
    $apz2valueAPZ_5   = $_POST['apz2valuetowriteAPZ_5'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
 
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_5 . ' ' . $apz2valueAPZ_5 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_5" >Loading data...</div></td>
            <td>PED CH 5</td>
          </tr>
          <tr>
            <td><form id="writeapz2address6" method="post" action="">
              <input name="apz2addressAPZ_6" id="apz2addressAPZ_6" size="9" type="text" value="80000096" readonly>
              <input name="apz2valuetowriteAPZ_6" id="apz2valuetowriteAPZ_6" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_6" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_6'])) {
    $apz2addressAPZ_6 = $_POST['apz2addressAPZ_6'];
    $apz2valueAPZ_6   = $_POST['apz2valuetowriteAPZ_6'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_6 . ' ' . $apz2valueAPZ_6 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_6" >Loading data...</div></td>
            <td>PED CH 6</td>
          </tr>
          <tr>
            <td><input name="apz2addressAPZ_7" id="apz2addressAPZ_7" size="9" type="text" value="80000112" readonly>
              <input name="apz2valuetowriteAPZ_7" id="apz2valuetowriteAPZ_7" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_7" value="Write value" type="submit">
              <br>
              <?php
if (isset($_POST['apz2startwriteAPZ_7'])) {
    $apz2addressAPZ_7 = $_POST['apz2addressAPZ_7'];
    $apz2valueAPZ_7   = $_POST['apz2valuetowriteAPZ_7'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_7 . ' ' . $apz2valueAPZ_7 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_7" >Loading data...</div></td>
            <td>PED CH 7</td>
          </tr>
          <tr>
            <td><form id="writeapz2address8" method="post" action="">
              <input name="apz2addressAPZ_8" id="apz2addressAPZ_8" size="9" type="text" value="80000004" readonly>
              <input name="apz2valuetowriteAPZ_8" id="apz2valuetowriteAPZ_8" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_8" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_8'])) {
    $apz2addressAPZ_8 = $_POST['apz2addressAPZ_8'];
    $apz2valueAPZ_8   = $_POST['apz2valuetowriteAPZ_8'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_8 . ' ' . $apz2valueAPZ_8 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_8" >Loading data...</div></td>
            <td>PED CH 8</td>
          </tr>
          <tr>
            <td><form id="writeapz2address9" method="post" action="">
              <input name="apz2addressAPZ_9" id="apz2addressAPZ_9" size="9" type="text" value="80000020" readonly>
              <input name="apz2valuetowriteAPZ_9" id="apz2valuetowriteAPZ_9" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_9" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_9'])) {
    $apz2addressAPZ_9 = $_POST['apz2addressAPZ_9'];
    $apz2valueAPZ_9   = $_POST['apz2valuetowriteAPZ_9'];
    $ip1             = file_get_contents("/srsconfig/ip1");
    $ip2             = file_get_contents("/srsconfig/ip2");
    $ip3             = file_get_contents("/srsconfig/ip3");
    $ip4             = file_get_contents("/srsconfig/ip4");
    $apzport         = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand      = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_9 . ' ' . $apz2valueAPZ_9 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_9" >Loading data...</div></td>
            <td>PED CH 9</td>
          </tr>
          <tr>
            <td><form id="writeapz2address10" method="post" action="">
              <input name="apz2addressAPZ_10" id="apz2addressAPZ_10" size="9" type="text" value="80000036" readonly>
              <input name="apz2valuetowriteAPZ_10" id="apz2valuetowriteAPZ_10" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_10" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_10'])) {
    $apz2addressAPZ_10 = $_POST['apz2addressAPZ_10'];
    $apz2valueAPZ_10   = $_POST['apz2valuetowriteAPZ_10'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_10 . ' ' . $apz2valueAPZ_10 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_10" >Loading data...</div></td>
            <td>PED CH 10</td>
          </tr>
          <tr>
            <td><form id="writeapz2address11" method="post" action="">
              <input name="apz2addressAPZ_11" id="apz2addressAPZ_11" size="9" type="text" value="80000052" readonly>
              <input name="apz2valuetowriteAPZ_11" id="apz2valuetowriteAPZ_11" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_11" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_11'])) {
    $apz2addressAPZ_11 = $_POST['apz2addressAPZ_11'];
    $apz2valueAPZ_11   = $_POST['apz2valuetowriteAPZ_11'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_11 . ' ' . $apz2valueAPZ_11 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_11" >Loading data...</div></td>
            <td>PED CH 11</td>
          </tr>
          <tr>
            <td><form id="writeapz2address12" method="post" action="">
              <input name="apz2addressAPZ_12" id="apz2addressAPZ_12" size="9" type="text" value="80000068" readonly>
              <input name="apz2valuetowriteAPZ_12" id="apz2valuetowriteAPZ_12" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_12" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_12'])) {
    $apz2addressAPZ_12 = $_POST['apz2addressAPZ_12'];
    $apz2valueAPZ_12   = $_POST['apz2valuetowriteAPZ_12'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_12 . ' ' . $apz2valueAPZ_12 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_12" >Loading data...</div></td>
            <td>PED CH 12</td>
          </tr>
          <tr>
            <td><form id="writeapz2address13" method="post" action="">
              <input name="apz2addressAPZ_13" id="apz2addressAPZ_13" size="9" type="text" value="80000084" readonly>
              <input name="apz2valuetowriteAPZ_13" id="apz2valuetowriteAPZ_13" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_13" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_13'])) {
    $apz2addressAPZ_13 = $_POST['apz2addressAPZ_13'];
    $apz2valueAPZ_13   = $_POST['apz2valuetowriteAPZ_13'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_13 . ' ' . $apz2valueAPZ_13 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_13" >Loading data...</div></td>
            <td>PED CH 13</td>
          </tr>
          <tr>
            <td><form id="writeapz2address14" method="post" action="">
              <input name="apz2addressAPZ_14" id="apz2addressAPZ_14" size="9" type="text" value="80000100" readonly>
              <input name="apz2valuetowriteAPZ_14" id="apz2valuetowriteAPZ_14" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_14" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_14'])) {
    $apz2addressAPZ_14 = $_POST['apz2addressAPZ_14'];
    $apz2valueAPZ_14   = $_POST['apz2valuetowriteAPZ_14'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_14 . ' ' . $apz2valueAPZ_14 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_14" >Loading data...</div></td>
            <td>PED CH 14</td>
          </tr>
          <tr>
            <td><form id="writeapz2address15" method="post" action="">
              <input name="apz2addressAPZ_15" id="apz2addressAPZ_15" size="9" type="text" value="80000116" readonly>
              <input name="apz2valuetowriteAPZ_15" id="apz2valuetowriteAPZ_15" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_15" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_15'])) {
    $apz2addressAPZ_15 = $_POST['apz2addressAPZ_15'];
    $apz2valueAPZ_15   = $_POST['apz2valuetowriteAPZ_15'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_15 . ' ' . $apz2valueAPZ_15 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_15" >Loading data...</div></td>
            <td>PED CH 15</td>
          </tr>
          <tr>
            <td><form id="writeapz2address16" method="post" action="">
              <input name="apz2addressAPZ_16" id="apz2addressAPZ_16" size="9" type="text" value="80000008" readonly>
              <input name="apz2valuetowriteAPZ_16" id="apz2valuetowriteAPZ_16" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_16" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_16'])) {
    $apz2addressAPZ_16 = $_POST['apz2addressAPZ_16'];
    $apz2valueAPZ_16   = $_POST['apz2valuetowriteAPZ_16'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_16 . ' ' . $apz2valueAPZ_16 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_16" >Loading data...</div></td>
            <td>PED CH 16</td>
          </tr>
          <tr>
            <td><form id="writeapz2address17" method="post" action="">
              <input name="apz2addressAPZ_17" id="apz2addressAPZ_17" size="9" type="text" value="80000024" readonly>
              <input name="apz2valuetowriteAPZ_17" id="apz2valuetowriteAPZ_17" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_17" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_17'])) {
    $apz2addressAPZ_17 = $_POST['apz2addressAPZ_17'];
    $apz2valueAPZ_17   = $_POST['apz2valuetowriteAPZ_17'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_17 . ' ' . $apz2valueAPZ_17 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_17" >Loading data...</div></td>
            <td>PED CH 17</td>
          </tr>
          <tr>
            <td><form id="writeapz2address18" method="post" action="">
              <input name="apz2addressAPZ_18" id="apz2addressAPZ_18" size="9" type="text" value="80000040" readonly>
              <input name="apz2valuetowriteAPZ_18" id="apz2valuetowriteAPZ_18" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_18" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_18'])) {
    $apz2addressAPZ_18 = $_POST['apz2addressAPZ_18'];
    $apz2valueAPZ_18   = $_POST['apz2valuetowriteAPZ_18'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_18 . ' ' . $apz2valueAPZ_18 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_18" >Loading data...</div></td>
            <td>PED CH 18</td>
          </tr>
          <tr>
            <td><form id="writeapz2address19" method="post" action="">
              <input name="apz2addressAPZ_19" id="apz2addressAPZ_19" size="9" type="text" value="80000056" readonly>
              <input name="apz2valuetowriteAPZ_19" id="apz2valuetowriteAPZ_19" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_19" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_19'])) {
    $apz2addressAPZ_19 = $_POST['apz2addressAPZ_19'];
    $apz2valueAPZ_19   = $_POST['apz2valuetowriteAPZ_19'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_19 . ' ' . $apz2valueAPZ_19 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_19" >Loading data...</div></td>
            <td>PED CH 19</td>
          </tr>
          <tr>
            <td><form id="writeapz2address20" method="post" action="">
              <input name="apz2addressAPZ_20" id="apz2addressAPZ_20" size="9" type="text" value="80000072" readonly>
              <input name="apz2valuetowriteAPZ_20" id="apz2valuetowriteAPZ_20" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_20" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_20'])) {
    $apz2addressAPZ_20 = $_POST['apz2addressAPZ_20'];
    $apz2valueAPZ_20   = $_POST['apz2valuetowriteAPZ_20'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_20 . ' ' . $apz2valueAPZ_20 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_20" >Loading data...</div></td>
            <td>PED CH 20</td>
          </tr>
          <tr>
            <td><form id="writeapz2address21" method="post" action="">
              <input name="apz2addressAPZ_21" id="apz2addressAPZ_21" size="9" type="text" value="80000088" readonly>
              <input name="apz2valuetowriteAPZ_21" id="apz2valuetowriteAPZ_21" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_21" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_21'])) {
    $apz2addressAPZ_21 = $_POST['apz2addressAPZ_21'];
    $apz2valueAPZ_21   = $_POST['apz2valuetowriteAPZ_21'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_21 . ' ' . $apz2valueAPZ_21 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_21" >Loading data...</div></td>
            <td>PED CH 21</td>
          </tr>
          <tr>
            <td><form id="writeapz2address22" method="post" action="">
              <input name="apz2addressAPZ_22" id="apz2addressAPZ_22" size="9" type="text" value="80000104" readonly>
              <input name="apz2valuetowriteAPZ_22" id="apz2valuetowriteAPZ_22" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_22" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_22'])) {
    $apz2addressAPZ_22 = $_POST['apz2addressAPZ_22'];
    $apz2valueAPZ_22   = $_POST['apz2valuetowriteAPZ_22'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_22 . ' ' . $apz2valueAPZ_22 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_22" >Loading data...</div></td>
            <td>PED CH 22</td>
          </tr>
          <tr>
            <td><form id="writeapz2address23" method="post" action="">
              <input name="apz2addressAPZ_23" id="apz2addressAPZ_23" size="9" type="text" value="80000120" readonly>
              <input name="apz2valuetowriteAPZ_23" id="apz2valuetowriteAPZ_23" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_23" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_23'])) {
    $apz2addressAPZ_23 = $_POST['apz2addressAPZ_23'];
    $apz2valueAPZ_23   = $_POST['apz2valuetowriteAPZ_23'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_23 . ' ' . $apz2valueAPZ_23 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_23" >Loading data...</div></td>
            <td>PED CH 23</td>
          </tr>
          <tr>
            <td><form id="writeapz2address24" method="post" action="">
              <input name="apz2addressAPZ_24" id="apz2addressAPZ_24" size="9" type="text" value="80000012" readonly>
              <input name="apz2valuetowriteAPZ_24" id="apz2valuetowriteAPZ_24" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_24" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_24'])) {
    $apz2addressAPZ_24 = $_POST['apz2addressAPZ_24'];
    $apz2valueAPZ_24   = $_POST['apz2valuetowriteAPZ_24'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_24 . ' ' . $apz2valueAPZ_24 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_24" >Loading data...</div></td>
            <td>PED CH 24</td>
          </tr>
          <tr>
            <td><form id="writeapz2address25" method="post" action="">
              <input name="apz2addressAPZ_25" id="apz2addressAPZ_25" size="9" type="text" value="80000028" readonly>
              <input name="apz2valuetowriteAPZ_25" id="apz2valuetowriteAPZ_25" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_25" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_25'])) {
    $apz2addressAPZ_25 = $_POST['apz2addressAPZ_25'];
    $apz2valueAPZ_25   = $_POST['apz2valuetowriteAPZ_25'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_25 . ' ' . $apz2valueAPZ_25 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_25" >Loading data...</div></td>
            <td>PED CH 25</td>
          </tr>
          <tr>
            <td><form id="writeapz2address26" method="post" action="">
              <input name="apz2addressAPZ_26" id="apz2addressAPZ_26" size="9" type="text" value="80000044" readonly>
              <input name="apz2valuetowriteAPZ_26" id="apz2valuetowriteAPZ_26" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_26" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_26'])) {
    $apz2addressAPZ_26 = $_POST['apz2addressAPZ_26'];
    $apz2valueAPZ_26   = $_POST['apz2valuetowriteAPZ_26'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_26 . ' ' . $apz2valueAPZ_26 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_26" >Loading data...</div></td>
            <td>PED CH 26</td>
          </tr>
          <tr>
            <td><form id="writeapz2address27" method="post" action="">
              <input name="apz2addressAPZ_27" id="apz2addressAPZ_27" size="9" type="text" value="80000060" readonly>
              <input name="apz2valuetowriteAPZ_27" id="apz2valuetowriteAPZ_27" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_27" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_27'])) {
    $apz2addressAPZ_27 = $_POST['apz2addressAPZ_27'];
    $apz2valueAPZ_27   = $_POST['apz2valuetowriteAPZ_27'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_27 . ' ' . $apz2valueAPZ_27 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_27" >Loading data...</div></td>
            <td>PED CH 27</td>
          </tr>
          <tr>
            <td><form id="writeapz2address28" method="post" action="">
              <input name="apz2addressAPZ_28" id="apz2addressAPZ_28" size="9" type="text" value="80000076" readonly>
              <input name="apz2valuetowriteAPZ_28" id="apz2valuetowriteAPZ_28" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_28" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_28'])) {
    $apz2addressAPZ_28 = $_POST['apz2addressAPZ_28'];
    $apz2valueAPZ_28   = $_POST['apz2valuetowriteAPZ_28'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_28 . ' ' . $apz2valueAPZ_28 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_28" >Loading data...</div></td>
            <td>PED CH 28</td>
          </tr>
          <tr>
            <td><form id="writeapz2address29" method="post" action="">
              <input name="apz2addressAPZ_29" id="apz2addressAPZ_29" size="9" type="text" value="80000092" readonly>
              <input name="apz2valuetowriteAPZ_29" id="apz2valuetowriteAPZ_29" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_29" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_29'])) {
    $apz2addressAPZ_29 = $_POST['apz2addressAPZ_29'];
    $apz2valueAPZ_29   = $_POST['apz2valuetowriteAPZ_29'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_29 . ' ' . $apz2valueAPZ_29 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_29" >Loading data...</div></td>
            <td>PED CH 29</td>
          </tr>
          <tr>
            <td><form id="writeapz2address30" method="post" action="">
              <input name="apz2addressAPZ_30" id="apz2addressAPZ_30" size="9" type="text" value="80000108" readonly>
              <input name="apz2valuetowriteAPZ_30" id="apz2valuetowriteAPZ_30" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_30" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_30'])) {
    $apz2addressAPZ_30 = $_POST['apz2addressAPZ_30'];
    $apz2valueAPZ_30   = $_POST['apz2valuetowriteAPZ_30'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_30 . ' ' . $apz2valueAPZ_30 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_30" >Loading data...</div></td>
            <td>PED CH 30</td>
          </tr>
          <tr>
            <td><form id="writeapz2address31" method="post" action="">
              <input name="apz2addressAPZ_31" id="apz2addressAPZ_31" size="9" type="text" value="80000124" readonly>
              <input name="apz2valuetowriteAPZ_31" id="apz2valuetowriteAPZ_31" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_31" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_31'])) {
    $apz2addressAPZ_31 = $_POST['apz2addressAPZ_31'];
    $apz2valueAPZ_31   = $_POST['apz2valuetowriteAPZ_31'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_31 . ' ' . $apz2valueAPZ_31 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_31" >Loading data...</div></td>
            <td>PED CH 31</td>
          </tr>
          <tr>
            <td><form id="writeapz2address32" method="post" action="">
              <input name="apz2addressAPZ_32" id="apz2addressAPZ_32" size="9" type="text" value="80000001" readonly>
              <input name="apz2valuetowriteAPZ_32" id="apz2valuetowriteAPZ_32" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_32" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_32'])) {
    $apz2addressAPZ_32 = $_POST['apz2addressAPZ_32'];
    $apz2valueAPZ_32   = $_POST['apz2valuetowriteAPZ_32'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_32 . ' ' . $apz2valueAPZ_32 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_32" >Loading data...</div></td>
            <td>PED CH 32</td>
          </tr>
          <tr>
            <td><form id="writeapz2address33" method="post" action="">
              <input name="apz2addressAPZ_33" id="apz2addressAPZ_33" size="9" type="text" value="80000017" readonly>
              <input name="apz2valuetowriteAPZ_33" id="apz2valuetowriteAPZ_33" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_33" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_33'])) {
    $apz2addressAPZ_33 = $_POST['apz2addressAPZ_33'];
    $apz2valueAPZ_33   = $_POST['apz2valuetowriteAPZ_33'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_33 . ' ' . $apz2valueAPZ_33 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_33" >Loading data...</div></td>
            <td>PED CH 33</td>
          </tr>
          <tr>
            <td><form id="writeapz2address34" method="post" action="">
              <input name="apz2addressAPZ_34" id="apz2addressAPZ_34" size="9" type="text" value="80000033" readonly>
              <input name="apz2valuetowriteAPZ_34" id="apz2valuetowriteAPZ_34" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_34" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_34'])) {
    $apz2addressAPZ_34 = $_POST['apz2addressAPZ_34'];
    $apz2valueAPZ_34   = $_POST['apz2valuetowriteAPZ_34'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_34 . ' ' . $apz2valueAPZ_34 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_34" >Loading data...</div></td>
            <td>PED CH 34</td>
          </tr>
          <tr>
            <td><form id="writeapz2address35" method="post" action="">
              <input name="apz2addressAPZ_35" id="apz2addressAPZ_35" size="9" type="text" value="80000049" readonly>
              <input name="apz2valuetowriteAPZ_35" id="apz2valuetowriteAPZ_35" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_35" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_35'])) {
    $apz2addressAPZ_35 = $_POST['apz2addressAPZ_35'];
    $apz2valueAPZ_35   = $_POST['apz2valuetowriteAPZ_35'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_35 . ' ' . $apz2valueAPZ_35 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_35" >Loading data...</div></td>
            <td>PED CH 35</td>
          </tr>
          <tr>
            <td><form id="writeapz2address36" method="post" action="">
              <input name="apz2addressAPZ_36" id="apz2addressAPZ_36" size="9" type="text" value="80000065" readonly>
              <input name="apz2valuetowriteAPZ_36" id="apz2valuetowriteAPZ_36" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_36" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_36'])) {
    $apz2addressAPZ_36 = $_POST['apz2addressAPZ_36'];
    $apz2valueAPZ_36   = $_POST['apz2valuetowriteAPZ_36'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_36 . ' ' . $apz2valueAPZ_36 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_36" >Loading data...</div></td>
            <td>PED CH 36</td>
          </tr>
          <tr>
            <td><form id="writeapz2address37" method="post" action="">
              <input name="apz2addressAPZ_37" id="apz2addressAPZ_37" size="9" type="text" value="80000081" readonly>
              <input name="apz2valuetowriteAPZ_37" id="apz2valuetowriteAPZ_37" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_37" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_37'])) {
    $apz2addressAPZ_37 = $_POST['apz2addressAPZ_37'];
    $apz2valueAPZ_37   = $_POST['apz2valuetowriteAPZ_37'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_37 . ' ' . $apz2valueAPZ_37 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_37" >Loading data...</div></td>
            <td>PED CH 37</td>
          </tr>
          <tr>
            <td><form id="writeapz2address38" method="post" action="">
              <input name="apz2addressAPZ_38" id="apz2addressAPZ_38" size="9" type="text" value="80000097" readonly>
              <input name="apz2valuetowriteAPZ_38" id="apz2valuetowriteAPZ_38" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_38" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_38'])) {
    $apz2addressAPZ_38 = $_POST['apz2addressAPZ_38'];
    $apz2valueAPZ_38   = $_POST['apz2valuetowriteAPZ_38'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_38 . ' ' . $apz2valueAPZ_38 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_38" >Loading data...</div></td>
            <td>PED CH 38</td>
          </tr>
          <tr>
            <td><form id="writeapz2address39" method="post" action="">
              <input name="apz2addressAPZ_39" id="apz2addressAPZ_39" size="9" type="text" value="80000113" readonly>
              <input name="apz2valuetowriteAPZ_39" id="apz2valuetowriteAPZ_39" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_39" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_39'])) {
    $apz2addressAPZ_39 = $_POST['apz2addressAPZ_39'];
    $apz2valueAPZ_39   = $_POST['apz2valuetowriteAPZ_39'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_39 . ' ' . $apz2valueAPZ_39 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_39" >Loading data...</div></td>
            <td>PED CH 39</td>
          </tr>
          <tr>
            <td><form id="writeapz2address40" method="post" action="">
              <input name="apz2addressAPZ_40" id="apz2addressAPZ_40" size="9" type="text" value="80000005" readonly>
              <input name="apz2valuetowriteAPZ_40" id="apz2valuetowriteAPZ_40" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_40" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_40'])) {
    $apz2addressAPZ_40 = $_POST['apz2addressAPZ_40'];
    $apz2valueAPZ_40   = $_POST['apz2valuetowriteAPZ_40'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_40 . ' ' . $apz2valueAPZ_40 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_40" >Loading data...</div></td>
            <td>PED CH 40</td>
          </tr>
          <tr>
            <td><form id="writeapz2address41" method="post" action="">
              <input name="apz2addressAPZ_41" id="apz2addressAPZ_41" size="9" type="text" value="80000021" readonly>
              <input name="apz2valuetowriteAPZ_41" id="apz2valuetowriteAPZ_41" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_41" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_41'])) {
    $apz2addressAPZ_41 = $_POST['apz2addressAPZ_41'];
    $apz2valueAPZ_41   = $_POST['apz2valuetowriteAPZ_41'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_41 . ' ' . $apz2valueAPZ_41 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_41" >Loading data...</div></td>
            <td>PED CH 41</td>
          </tr>
          <tr>
            <td><form id="writeapz2address42" method="post" action="">
              <input name="apz2addressAPZ_42" id="apz2addressAPZ_42" size="9" type="text" value="80000037" readonly>
              <input name="apz2valuetowriteAPZ_42" id="apz2valuetowriteAPZ_42" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_42" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_42'])) {
    $apz2addressAPZ_42 = $_POST['apz2addressAPZ_42'];
    $apz2valueAPZ_42   = $_POST['apz2valuetowriteAPZ_42'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_42 . ' ' . $apz2valueAPZ_42 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_42" >Loading data...</div></td>
            <td>PED CH 42</td>
          </tr>
          <tr>
            <td><form id="writeapz2address43" method="post" action="">
              <input name="apz2addressAPZ_43" id="apz2addressAPZ_43" size="9" type="text" value="80000053" readonly>
              <input name="apz2valuetowriteAPZ_43" id="apz2valuetowriteAPZ_43" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_43" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_43'])) {
    $apz2addressAPZ_43 = $_POST['apz2addressAPZ_43'];
    $apz2valueAPZ_43   = $_POST['apz2valuetowriteAPZ_43'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_43 . ' ' . $apz2valueAPZ_43 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_43" >Loading data...</div></td>
            <td>PED CH 43</td>
          </tr>
          <tr>
            <td><form id="writeapz2address44" method="post" action="">
              <input name="apz2addressAPZ_44" id="apz2addressAPZ_44" size="9" type="text" value="80000069" readonly>
              <input name="apz2valuetowriteAPZ_44" id="apz2valuetowriteAPZ_44" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_44" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_44'])) {
    $apz2addressAPZ_44 = $_POST['apz2addressAPZ_44'];
    $apz2valueAPZ_44   = $_POST['apz2valuetowriteAPZ_44'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_44 . ' ' . $apz2valueAPZ_44 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_44" >Loading data...</div></td>
            <td>PED CH 44</td>
          </tr>
          <tr>
            <td><form id="writeapz2address45" method="post" action="">
              <input name="apz2addressAPZ_45" id="apz2addressAPZ_45" size="9" type="text" value="80000085" readonly>
              <input name="apz2valuetowriteAPZ_45" id="apz2valuetowriteAPZ_45" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_45" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_45'])) {
    $apz2addressAPZ_45 = $_POST['apz2addressAPZ_45'];
    $apz2valueAPZ_45   = $_POST['apz2valuetowriteAPZ_45'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_45 . ' ' . $apz2valueAPZ_45 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_45" >Loading data...</div></td>
            <td>PED CH 45</td>
          </tr>
          <tr>
            <td><form id="writeapz2address46" method="post" action="">
              <input name="apz2addressAPZ_46" id="apz2addressAPZ_46" size="9" type="text" value="80000101" readonly>
              <input name="apz2valuetowriteAPZ_46" id="apz2valuetowriteAPZ_46" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_46" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_46'])) {
    $apz2addressAPZ_46 = $_POST['apz2addressAPZ_46'];
    $apz2valueAPZ_46   = $_POST['apz2valuetowriteAPZ_46'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_46 . ' ' . $apz2valueAPZ_46 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_46" >Loading data...</div></td>
            <td>PED CH 46</td>
          </tr>
          <tr>
            <td><form id="writeapz2address47" method="post" action="">
              <input name="apz2addressAPZ_47" id="apz2addressAPZ_47" size="9" type="text" value="80000117" readonly>
              <input name="apz2valuetowriteAPZ_47" id="apz2valuetowriteAPZ_47" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_47" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_47'])) {
    $apz2addressAPZ_47 = $_POST['apz2addressAPZ_47'];
    $apz2valueAPZ_47   = $_POST['apz2valuetowriteAPZ_47'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_47 . ' ' . $apz2valueAPZ_47 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_47" >Loading data...</div></td>
            <td>PED CH 47</td>
          </tr>
          <tr>
            <td><form id="writeapz2address48" method="post" action="">
              <input name="apz2addressAPZ_48" id="apz2addressAPZ_48" size="9" type="text" value="80000009" readonly>
              <input name="apz2valuetowriteAPZ_48" id="apz2valuetowriteAPZ_48" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_48" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_48'])) {
    $apz2addressAPZ_48 = $_POST['apz2addressAPZ_48'];
    $apz2valueAPZ_48   = $_POST['apz2valuetowriteAPZ_48'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_48 . ' ' . $apz2valueAPZ_48 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_48" >Loading data...</div></td>
            <td>PED CH 48</td>
          </tr>
          <tr>
            <td><form id="writeapz2address49" method="post" action="">
              <input name="apz2addressAPZ_49" id="apz2addressAPZ_49" size="9" type="text" value="80000025" readonly>
              <input name="apz2valuetowriteAPZ_49" id="apz2valuetowriteAPZ_49" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_49" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_49'])) {
    $apz2addressAPZ_49 = $_POST['apz2addressAPZ_49'];
    $apz2valueAPZ_49   = $_POST['apz2valuetowriteAPZ_49'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_49 . ' ' . $apz2valueAPZ_49 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_49" >Loading data...</div></td>
            <td>PED CH 49</td>
          </tr>
          <tr>
            <td><form id="writeapz2address50" method="post" action="">
              <input name="apz2addressAPZ_50" id="apz2addressAPZ_50" size="9" type="text" value="80000041" readonly>
              <input name="apz2valuetowriteAPZ_50" id="apz2valuetowriteAPZ_50" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_50" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_50'])) {
    $apz2addressAPZ_50 = $_POST['apz2addressAPZ_50'];
    $apz2valueAPZ_50   = $_POST['apz2valuetowriteAPZ_50'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_50 . ' ' . $apz2valueAPZ_50 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_50" >Loading data...</div></td>
            <td>PED CH 50</td>
          </tr>
          <tr>
            <td><form id="writeapz2address51" method="post" action="">
              <input name="apz2addressAPZ_51" id="apz2addressAPZ_51" size="9" type="text" value="80000057" readonly>
              <input name="apz2valuetowriteAPZ_51" id="apz2valuetowriteAPZ_51" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_51" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_51'])) {
    $apz2addressAPZ_51 = $_POST['apz2addressAPZ_51'];
    $apz2valueAPZ_51   = $_POST['apz2valuetowriteAPZ_51'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_51 . ' ' . $apz2valueAPZ_51 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_51" >Loading data...</div></td>
            <td>PED CH 51</td>
          </tr>
          <tr>
            <td><form id="writeapz2address52" method="post" action="">
              <input name="apz2addressAPZ_52" id="apz2addressAPZ_52" size="9" type="text" value="80000073" readonly>
              <input name="apz2valuetowriteAPZ_52" id="apz2valuetowriteAPZ_52" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_52" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_52'])) {
    $apz2addressAPZ_52 = $_POST['apz2addressAPZ_52'];
    $apz2valueAPZ_52   = $_POST['apz2valuetowriteAPZ_52'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_52 . ' ' . $apz2valueAPZ_52 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_52" >Loading data...</div></td>
            <td>PED CH 52</td>
          </tr>
          <tr>
            <td><form id="writeapz2address53" method="post" action="">
              <input name="apz2addressAPZ_53" id="apz2addressAPZ_53" size="9" type="text" value="80000089" readonly>
              <input name="apz2valuetowriteAPZ_53" id="apz2valuetowriteAPZ_53" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_53" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_53'])) {
    $apz2addressAPZ_53 = $_POST['apz2addressAPZ_53'];
    $apz2valueAPZ_53   = $_POST['apz2valuetowriteAPZ_53'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_53 . ' ' . $apz2valueAPZ_53 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_53" >Loading data...</div></td>
            <td>PED CH 53</td>
          </tr>
          <tr>
            <td><form id="writeapz2address54" method="post" action="">
              <input name="apz2addressAPZ_54" id="apz2addressAPZ_54" size="9" type="text" value="80000105" readonly>
              <input name="apz2valuetowriteAPZ_54" id="apz2valuetowriteAPZ_54" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_54" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_54'])) {
    $apz2addressAPZ_54 = $_POST['apz2addressAPZ_54'];
    $apz2valueAPZ_54   = $_POST['apz2valuetowriteAPZ_54'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_54 . ' ' . $apz2valueAPZ_54 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_54" >Loading data...</div></td>
            <td>PED CH 54</td>
          </tr>
          <tr>
            <td><form id="writeapz2address55" method="post" action="">
              <input name="apz2addressAPZ_55" id="apz2addressAPZ_55" size="9" type="text" value="80000121" readonly>
              <input name="apz2valuetowriteAPZ_55" id="apz2valuetowriteAPZ_55" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_55" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_55'])) {
    $apz2addressAPZ_55 = $_POST['apz2addressAPZ_55'];
    $apz2valueAPZ_55   = $_POST['apz2valuetowriteAPZ_55'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_55 . ' ' . $apz2valueAPZ_55 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_55" >Loading data...</div></td>
            <td>PED CH 55</td>
          </tr>
          <tr>
            <td><form id="writeapz2address56" method="post" action="">
              <input name="apz2addressAPZ_56" id="apz2addressAPZ_56" size="9" type="text" value="80000013" readonly>
              <input name="apz2valuetowriteAPZ_56" id="apz2valuetowriteAPZ_56" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_56" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_56'])) {
    $apz2addressAPZ_56 = $_POST['apz2addressAPZ_56'];
    $apz2valueAPZ_56   = $_POST['apz2valuetowriteAPZ_56'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_56 . ' ' . $apz2valueAPZ_56 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_56" >Loading data...</div></td>
            <td>PED CH 56</td>
          </tr>
          <tr>
            <td><form id="writeapz2address57" method="post" action="">
              <input name="apz2addressAPZ_57" id="apz2addressAPZ_57" size="9" type="text" value="80000029" readonly>
              <input name="apz2valuetowriteAPZ_57" id="apz2valuetowriteAPZ_57" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_57" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_57'])) {
    $apz2addressAPZ_57 = $_POST['apz2addressAPZ_57'];
    $apz2valueAPZ_57   = $_POST['apz2valuetowriteAPZ_57'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_57 . ' ' . $apz2valueAPZ_57 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_57" >Loading data...</div></td>
            <td>PED CH 57</td>
          </tr>
          <tr>
            <td><form id="writeapz2address58" method="post" action="">
              <input name="apz2addressAPZ_58" id="apz2addressAPZ_58" size="9" type="text" value="80000045" readonly>
              <input name="apz2valuetowriteAPZ_58" id="apz2valuetowriteAPZ_58" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_58" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_58'])) {
    $apz2addressAPZ_58 = $_POST['apz2addressAPZ_58'];
    $apz2valueAPZ_58   = $_POST['apz2valuetowriteAPZ_58'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_58 . ' ' . $apz2valueAPZ_58 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_58" >Loading data...</div></td>
            <td>PED CH 58</td>
          </tr>
          <tr>
            <td><form id="writeapz2address59" method="post" action="">
              <input name="apz2addressAPZ_59" id="apz2addressAPZ_59" size="9" type="text" value="80000061" readonly>
              <input name="apz2valuetowriteAPZ_59" id="apz2valuetowriteAPZ_59" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_59" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_59'])) {
    $apz2addressAPZ_59 = $_POST['apz2addressAPZ_59'];
    $apz2valueAPZ_59   = $_POST['apz2valuetowriteAPZ_59'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_59 . ' ' . $apz2valueAPZ_59 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_59" >Loading data...</div></td>
            <td>PED CH 59</td>
          </tr>
          <tr>
            <td><form id="writeapz2address60" method="post" action="">
              <input name="apz2addressAPZ_60" id="apz2addressAPZ_60" size="9" type="text" value="80000077" readonly>
              <input name="apz2valuetowriteAPZ_60" id="apz2valuetowriteAPZ_60" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_60" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_60'])) {
    $apz2addressAPZ_60 = $_POST['apz2addressAPZ_60'];
    $apz2valueAPZ_60   = $_POST['apz2valuetowriteAPZ_60'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_60 . ' ' . $apz2valueAPZ_60 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_60" >Loading data...</div></td>
            <td>PED CH 60</td>
          </tr>
          <tr>
            <td><form id="writeapz2address61" method="post" action="">
              <input name="apz2addressAPZ_61" id="apz2addressAPZ_61" size="9" type="text" value="80000093" readonly>
              <input name="apz2valuetowriteAPZ_61" id="apz2valuetowriteAPZ_61" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_61" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_61'])) {
    $apz2addressAPZ_61 = $_POST['apz2addressAPZ_61'];
    $apz2valueAPZ_61   = $_POST['apz2valuetowriteAPZ_61'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_61 . ' ' . $apz2valueAPZ_61 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_61" >Loading data...</div></td>
            <td>PED CH 61</td>
          </tr>
          <tr>
            <td><form id="writeapz2address62" method="post" action="">
              <input name="apz2addressAPZ_62" id="apz2addressAPZ_62" size="9" type="text" value="80000109" readonly>
              <input name="apz2valuetowriteAPZ_62" id="apz2valuetowriteAPZ_62" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_62" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_62'])) {
    $apz2addressAPZ_62 = $_POST['apz2addressAPZ_62'];
    $apz2valueAPZ_62   = $_POST['apz2valuetowriteAPZ_62'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_62 . ' ' . $apz2valueAPZ_62 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_62" >Loading data...</div></td>
            <td>PED CH 62</td>
          </tr>
          <tr>
            <td><form id="writeapz2address63" method="post" action="">
              <input name="apz2addressAPZ_63" id="apz2addressAPZ_63" size="9" type="text" value="80000125" readonly>
              <input name="apz2valuetowriteAPZ_63" id="apz2valuetowriteAPZ_63" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_63" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_63'])) {
    $apz2addressAPZ_63 = $_POST['apz2addressAPZ_63'];
    $apz2valueAPZ_63   = $_POST['apz2valuetowriteAPZ_63'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_63 . ' ' . $apz2valueAPZ_63 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_63" >Loading data...</div></td>
            <td>PED CH 63</td>
          </tr>
          <tr>
            <td><form id="writeapz2address64" method="post" action="">
              <input name="apz2addressAPZ_64" id="apz2addressAPZ_64" size="9" type="text" value="80000002" readonly>
              <input name="apz2valuetowriteAPZ_64" id="apz2valuetowriteAPZ_64" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_64" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_64'])) {
    $apz2addressAPZ_64 = $_POST['apz2addressAPZ_64'];
    $apz2valueAPZ_64   = $_POST['apz2valuetowriteAPZ_64'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_64 . ' ' . $apz2valueAPZ_64 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_64" >Loading data...</div></td>
            <td>PED CH 64</td>
          </tr>
          <tr>
            <td><form id="writeapz2address65" method="post" action="">
              <input name="apz2addressAPZ_65" id="apz2addressAPZ_65" size="9" type="text" value="80000018" readonly>
              <input name="apz2valuetowriteAPZ_65" id="apz2valuetowriteAPZ_65" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_65" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_65'])) {
    $apz2addressAPZ_65 = $_POST['apz2addressAPZ_65'];
    $apz2valueAPZ_65   = $_POST['apz2valuetowriteAPZ_65'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_65 . ' ' . $apz2valueAPZ_65 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_65" >Loading data...</div></td>
            <td>PED CH 65</td>
          </tr>
          <tr>
            <td><form id="writeapz2address66" method="post" action="">
              <input name="apz2addressAPZ_66" id="apz2addressAPZ_66" size="9" type="text" value="80000034" readonly>
              <input name="apz2valuetowriteAPZ_66" id="apz2valuetowriteAPZ_66" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_66" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_66'])) {
    $apz2addressAPZ_66 = $_POST['apz2addressAPZ_66'];
    $apz2valueAPZ_66   = $_POST['apz2valuetowriteAPZ_66'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_66 . ' ' . $apz2valueAPZ_66 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_66" >Loading data...</div></td>
            <td>PED CH 66</td>
          </tr>
          <tr>
            <td><form id="writeapz2address67" method="post" action="">
              <input name="apz2addressAPZ_67" id="apz2addressAPZ_67" size="9" type="text" value="80000050" readonly>
              <input name="apz2valuetowriteAPZ_67" id="apz2valuetowriteAPZ_67" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_67" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_67'])) {
    $apz2addressAPZ_67 = $_POST['apz2addressAPZ_67'];
    $apz2valueAPZ_67   = $_POST['apz2valuetowriteAPZ_67'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_67 . ' ' . $apz2valueAPZ_67 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_67" >Loading data...</div></td>
            <td>PED CH 67</td>
          </tr>
          <tr>
            <td><form id="writeapz2address68" method="post" action="">
              <input name="apz2addressAPZ_68" id="apz2addressAPZ_68" size="9" type="text" value="80000066" readonly>
              <input name="apz2valuetowriteAPZ_68" id="apz2valuetowriteAPZ_68" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_68" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_68'])) {
    $apz2addressAPZ_68 = $_POST['apz2addressAPZ_68'];
    $apz2valueAPZ_68   = $_POST['apz2valuetowriteAPZ_68'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_68 . ' ' . $apz2valueAPZ_68 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_68" >Loading data...</div></td>
            <td>PED CH 68</td>
          </tr>
          <tr>
            <td><form id="writeapz2address69" method="post" action="">
              <input name="apz2addressAPZ_69" id="apz2addressAPZ_69" size="9" type="text" value="80000082" readonly>
              <input name="apz2valuetowriteAPZ_69" id="apz2valuetowriteAPZ_69" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_69" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_69'])) {
    $apz2addressAPZ_69 = $_POST['apz2addressAPZ_69'];
    $apz2valueAPZ_69   = $_POST['apz2valuetowriteAPZ_69'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_69 . ' ' . $apz2valueAPZ_69 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_69" >Loading data...</div></td>
            <td>PED CH 69</td>
          </tr>
          <tr>
            <td><form id="writeapz2address70" method="post" action="">
              <input name="apz2addressAPZ_70" id="apz2addressAPZ_70" size="9" type="text" value="80000098" readonly>
              <input name="apz2valuetowriteAPZ_70" id="apz2valuetowriteAPZ_70" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_70" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_70'])) {
    $apz2addressAPZ_70 = $_POST['apz2addressAPZ_70'];
    $apz2valueAPZ_70   = $_POST['apz2valuetowriteAPZ_70'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_70 . ' ' . $apz2valueAPZ_70 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_70" >Loading data...</div></td>
            <td>PED CH 70</td>
          </tr>
          <tr>
            <td><form id="writeapz2address71" method="post" action="">
              <input name="apz2addressAPZ_71" id="apz2addressAPZ_71" size="9" type="text" value="80000114" readonly>
              <input name="apz2valuetowriteAPZ_71" id="apz2valuetowriteAPZ_71" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_71" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_71'])) {
    $apz2addressAPZ_71 = $_POST['apz2addressAPZ_71'];
    $apz2valueAPZ_71   = $_POST['apz2valuetowriteAPZ_71'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_71 . ' ' . $apz2valueAPZ_71 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_71" >Loading data...</div></td>
            <td>PED CH 71</td>
          </tr>
          <tr>
            <td><form id="writeapz2address72" method="post" action="">
              <input name="apz2addressAPZ_72" id="apz2addressAPZ_72" size="9" type="text" value="80000006" readonly>
              <input name="apz2valuetowriteAPZ_72" id="apz2valuetowriteAPZ_72" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_72" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_72'])) {
    $apz2addressAPZ_72 = $_POST['apz2addressAPZ_72'];
    $apz2valueAPZ_72   = $_POST['apz2valuetowriteAPZ_72'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_72 . ' ' . $apz2valueAPZ_72 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_72" >Loading data...</div></td>
            <td>PED CH 72</td>
          </tr>
          <tr>
            <td><form id="writeapz2address73" method="post" action="">
              <input name="apz2addressAPZ_73" id="apz2addressAPZ_73" size="9" type="text" value="80000022" readonly>
              <input name="apz2valuetowriteAPZ_73" id="apz2valuetowriteAPZ_73" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_73" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_73'])) {
    $apz2addressAPZ_73 = $_POST['apz2addressAPZ_73'];
    $apz2valueAPZ_73   = $_POST['apz2valuetowriteAPZ_73'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_73 . ' ' . $apz2valueAPZ_73 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_73" >Loading data...</div></td>
            <td>PED CH 73</td>
          </tr>
          <tr>
            <td><form id="writeapz2address74" method="post" action="">
              <input name="apz2addressAPZ_74" id="apz2addressAPZ_74" size="9" type="text" value="80000038" readonly>
              <input name="apz2valuetowriteAPZ_74" id="apz2valuetowriteAPZ_74" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_74" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_74'])) {
    $apz2addressAPZ_74 = $_POST['apz2addressAPZ_74'];
    $apz2valueAPZ_74   = $_POST['apz2valuetowriteAPZ_74'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_74 . ' ' . $apz2valueAPZ_74 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_74" >Loading data...</div></td>
            <td>PED CH 74</td>
          </tr>
          <tr>
            <td><form id="writeapz2address75" method="post" action="">
              <input name="apz2addressAPZ_75" id="apz2addressAPZ_75" size="9" type="text" value="80000054" readonly>
              <input name="apz2valuetowriteAPZ_75" id="apz2valuetowriteAPZ_75" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_75" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_75'])) {
    $apz2addressAPZ_75 = $_POST['apz2addressAPZ_75'];
    $apz2valueAPZ_75   = $_POST['apz2valuetowriteAPZ_75'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_75 . ' ' . $apz2valueAPZ_75 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_75" >Loading data...</div></td>
            <td>PED CH 75</td>
          </tr>
          <tr>
            <td><form id="writeapz2address76" method="post" action="">
              <input name="apz2addressAPZ_76" id="apz2addressAPZ_76" size="9" type="text" value="80000070" readonly>
              <input name="apz2valuetowriteAPZ_76" id="apz2valuetowriteAPZ_76" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_76" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_76'])) {
    $apz2addressAPZ_76 = $_POST['apz2addressAPZ_76'];
    $apz2valueAPZ_76   = $_POST['apz2valuetowriteAPZ_76'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_76 . ' ' . $apz2valueAPZ_76 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_76" >Loading data...</div></td>
            <td>PED CH 76</td>
          </tr>
          <tr>
            <td><form id="writeapz2address77" method="post" action="">
              <input name="apz2addressAPZ_77" id="apz2addressAPZ_77" size="9" type="text" value="80000086" readonly>
              <input name="apz2valuetowriteAPZ_77" id="apz2valuetowriteAPZ_77" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_77" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_77'])) {
    $apz2addressAPZ_77 = $_POST['apz2addressAPZ_77'];
    $apz2valueAPZ_77   = $_POST['apz2valuetowriteAPZ_77'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_77 . ' ' . $apz2valueAPZ_77 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_77" >Loading data...</div></td>
            <td>PED CH 77</td>
          </tr>
          <tr>
            <td><form id="writeapz2address78" method="post" action="">
              <input name="apz2addressAPZ_78" id="apz2addressAPZ_78" size="9" type="text" value="80000102" readonly>
              <input name="apz2valuetowriteAPZ_78" id="apz2valuetowriteAPZ_78" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_78" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_78'])) {
    $apz2addressAPZ_78 = $_POST['apz2addressAPZ_78'];
    $apz2valueAPZ_78   = $_POST['apz2valuetowriteAPZ_78'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_78 . ' ' . $apz2valueAPZ_78 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_78" >Loading data...</div></td>
            <td>PED CH 78</td>
          </tr>
          <tr>
            <td><form id="writeapz2address79" method="post" action="">
              <input name="apz2addressAPZ_79" id="apz2addressAPZ_79" size="9" type="text" value="80000118" readonly>
              <input name="apz2valuetowriteAPZ_79" id="apz2valuetowriteAPZ_79" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_79" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_79'])) {
    $apz2addressAPZ_79 = $_POST['apz2addressAPZ_79'];
    $apz2valueAPZ_79   = $_POST['apz2valuetowriteAPZ_79'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_79 . ' ' . $apz2valueAPZ_79 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_79" >Loading data...</div></td>
            <td>PED CH 79</td>
          </tr>
          <tr>
            <td><form id="writeapz2address80" method="post" action="">
              <input name="apz2addressAPZ_80" id="apz2addressAPZ_80" size="9" type="text" value="80000010" readonly>
              <input name="apz2valuetowriteAPZ_80" id="apz2valuetowriteAPZ_80" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_80" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_80'])) {
    $apz2addressAPZ_80 = $_POST['apz2addressAPZ_80'];
    $apz2valueAPZ_80   = $_POST['apz2valuetowriteAPZ_80'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_80 . ' ' . $apz2valueAPZ_80 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_80" >Loading data...</div></td>
            <td>PED CH 80</td>
          </tr>
          <tr>
            <td><form id="writeapz2address81" method="post" action="">
              <input name="apz2addressAPZ_81" id="apz2addressAPZ_81" size="9" type="text" value="80000026" readonly>
              <input name="apz2valuetowriteAPZ_81" id="apz2valuetowriteAPZ_81" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_81" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_81'])) {
    $apz2addressAPZ_81 = $_POST['apz2addressAPZ_81'];
    $apz2valueAPZ_81   = $_POST['apz2valuetowriteAPZ_81'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_81 . ' ' . $apz2valueAPZ_81 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_81" >Loading data...</div></td>
            <td>PED CH 81</td>
          </tr>
          <tr>
            <td><form id="writeapz2address82" method="post" action="">
              <input name="apz2addressAPZ_82" id="apz2addressAPZ_82" size="9" type="text" value="80000042" readonly>
              <input name="apz2valuetowriteAPZ_82" id="apz2valuetowriteAPZ_82" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_82" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_82'])) {
    $apz2addressAPZ_82 = $_POST['apz2addressAPZ_82'];
    $apz2valueAPZ_82   = $_POST['apz2valuetowriteAPZ_82'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_82 . ' ' . $apz2valueAPZ_82 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_82" >Loading data...</div></td>
            <td>PED CH 82</td>
          </tr>
          <tr>
            <td><form id="writeapz2address83" method="post" action="">
              <input name="apz2addressAPZ_83" id="apz2addressAPZ_83" size="9" type="text" value="80000058" readonly>
              <input name="apz2valuetowriteAPZ_83" id="apz2valuetowriteAPZ_83" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_83" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_83'])) {
    $apz2addressAPZ_83 = $_POST['apz2addressAPZ_83'];
    $apz2valueAPZ_83   = $_POST['apz2valuetowriteAPZ_83'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_83 . ' ' . $apz2valueAPZ_83 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_83" >Loading data...</div></td>
            <td>PED CH 83</td>
          </tr>
          <tr>
            <td><form id="writeapz2address84" method="post" action="">
              <input name="apz2addressAPZ_84" id="apz2addressAPZ_84" size="9" type="text" value="80000074" readonly>
              <input name="apz2valuetowriteAPZ_84" id="apz2valuetowriteAPZ_84" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_84" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_84'])) {
    $apz2addressAPZ_84 = $_POST['apz2addressAPZ_84'];
    $apz2valueAPZ_84   = $_POST['apz2valuetowriteAPZ_84'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_84 . ' ' . $apz2valueAPZ_84 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_84" >Loading data...</div></td>
            <td>PED CH 84</td>
          </tr>
          <tr>
            <td><form id="writeapz2address85" method="post" action="">
              <input name="apz2addressAPZ_85" id="apz2addressAPZ_85" size="9" type="text" value="80000090" readonly>
              <input name="apz2valuetowriteAPZ_85" id="apz2valuetowriteAPZ_85" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_85" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_85'])) {
    $apz2addressAPZ_85 = $_POST['apz2addressAPZ_85'];
    $apz2valueAPZ_85   = $_POST['apz2valuetowriteAPZ_85'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_85 . ' ' . $apz2valueAPZ_85 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_85" >Loading data...</div></td>
            <td>PED CH 85</td>
          </tr>
          <tr>
            <td><form id="writeapz2address86" method="post" action="">
              <input name="apz2addressAPZ_86" id="apz2addressAPZ_86" size="9" type="text" value="80000106" readonly>
              <input name="apz2valuetowriteAPZ_86" id="apz2valuetowriteAPZ_86" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_86" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_86'])) {
    $apz2addressAPZ_86 = $_POST['apz2addressAPZ_86'];
    $apz2valueAPZ_86   = $_POST['apz2valuetowriteAPZ_86'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_86 . ' ' . $apz2valueAPZ_86 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_86" >Loading data...</div></td>
            <td>PED CH 86</td>
          </tr>
          <tr>
            <td><form id="writeapz2address87" method="post" action="">
              <input name="apz2addressAPZ_87" id="apz2addressAPZ_87" size="9" type="text" value="80000122" readonly>
              <input name="apz2valuetowriteAPZ_87" id="apz2valuetowriteAPZ_87" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_87" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_87'])) {
    $apz2addressAPZ_87 = $_POST['apz2addressAPZ_87'];
    $apz2valueAPZ_87   = $_POST['apz2valuetowriteAPZ_87'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_87 . ' ' . $apz2valueAPZ_87 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_87" >Loading data...</div></td>
            <td>PED CH 87</td>
          </tr>
          <tr>
            <td>
              <form id="writeapz2address88" method="post" action="">
              <input name="apz2addressAPZ_88" id="apz2addressAPZ_88" size="9" type="text" value="80000014" readonly>
              <input name="apz2valuetowriteAPZ_88" id="apz2valuetowriteAPZ_88" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_88" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_88'])) {
    $apz2addressAPZ_88 = $_POST['apz2addressAPZ_88'];
    $apz2valueAPZ_88   = $_POST['apz2valuetowriteAPZ_88'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_88 . ' ' . $apz2valueAPZ_88 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_88" >Loading data...</div></td>
            <td>PED CH 88</td>
          </tr>
          <tr>
            <td><form id="writeapz2address89" method="post" action="">
              <input name="apz2addressAPZ_89" id="apz2addressAPZ_89" size="9" type="text" value="80000030" readonly>
              <input name="apz2valuetowriteAPZ_89" id="apz2valuetowriteAPZ_89" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_89" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_89'])) {
    $apz2addressAPZ_89 = $_POST['apz2addressAPZ_89'];
    $apz2valueAPZ_89   = $_POST['apz2valuetowriteAPZ_89'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_89 . ' ' . $apz2valueAPZ_89 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_89" >Loading data...</div></td>
            <td>PED CH 89</td>
          </tr>
          <tr>
            <td><form id="writeapz2address90" method="post" action="">
              <input name="apz2addressAPZ_90" id="apz2addressAPZ_90" size="9" type="text" value="80000046" readonly>
              <input name="apz2valuetowriteAPZ_90" id="apz2valuetowriteAPZ_90" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_90" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_90'])) {
    $apz2addressAPZ_90 = $_POST['apz2addressAPZ_90'];
    $apz2valueAPZ_90   = $_POST['apz2valuetowriteAPZ_90'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_90 . ' ' . $apz2valueAPZ_90 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_90" >Loading data...</div></td>
            <td>PED CH 90</td>
          </tr>
          <tr>
            <td><form id="writeapz2address91" method="post" action="">
              <input name="apz2addressAPZ_91" id="apz2addressAPZ_91" size="9" type="text" value="80000062" readonly>
              <input name="apz2valuetowriteAPZ_91" id="apz2valuetowriteAPZ_91" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_91" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_91'])) {
    $apz2addressAPZ_91 = $_POST['apz2addressAPZ_91'];
    $apz2valueAPZ_91   = $_POST['apz2valuetowriteAPZ_91'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_91 . ' ' . $apz2valueAPZ_91 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_91" >Loading data...</div></td>
            <td>PED CH 91</td>
          </tr>
          <tr>
            <td><form id="writeapz2address92" method="post" action="">
              <input name="apz2addressAPZ_92" id="apz2addressAPZ_92" size="9" type="text" value="80000078" readonly>
              <input name="apz2valuetowriteAPZ_92" id="apz2valuetowriteAPZ_92" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_92" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_92'])) {
    $apz2addressAPZ_92 = $_POST['apz2addressAPZ_92'];
    $apz2valueAPZ_92   = $_POST['apz2valuetowriteAPZ_92'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_92 . ' ' . $apz2valueAPZ_92 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_92" >Loading data...</div></td>
            <td>PED CH 92</td>
          </tr>
          <tr>
            <td><form id="writeapz2address93" method="post" action="">
              <input name="apz2addressAPZ_93" id="apz2addressAPZ_93" size="9" type="text" value="80000094" readonly>
              <input name="apz2valuetowriteAPZ_93" id="apz2valuetowriteAPZ_93" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_93" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_93'])) {
    $apz2addressAPZ_93 = $_POST['apz2addressAPZ_93'];
    $apz2valueAPZ_93   = $_POST['apz2valuetowriteAPZ_93'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_93 . ' ' . $apz2valueAPZ_93 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_93" >Loading data...</div></td>
            <td>PED CH 93</td>
          </tr>
          <tr>
            <td><form id="writeapz2address94" method="post" action="">
              <input name="apz2addressAPZ_94" id="apz2addressAPZ_94" size="9" type="text" value="80000110" readonly>
              <input name="apz2valuetowriteAPZ_94" id="apz2valuetowriteAPZ_94" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_94" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_94'])) {
    $apz2addressAPZ_94 = $_POST['apz2addressAPZ_94'];
    $apz2valueAPZ_94   = $_POST['apz2valuetowriteAPZ_94'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_94 . ' ' . $apz2valueAPZ_94 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_94" >Loading data...</div></td>
            <td>PED CH 94</td>
          </tr>
          <tr>
            <td><form id="writeapz2address95" method="post" action="">
              <input name="apz2addressAPZ_95" id="apz2addressAPZ_95" size="9" type="text" value="80000126" readonly>
              <input name="apz2valuetowriteAPZ_95" id="apz2valuetowriteAPZ_95" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_95" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_95'])) {
    $apz2addressAPZ_95 = $_POST['apz2addressAPZ_95'];
    $apz2valueAPZ_95   = $_POST['apz2valuetowriteAPZ_95'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_95 . ' ' . $apz2valueAPZ_95 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_95" >Loading data...</div></td>
            <td>PED CH 95</td>
          </tr>
          <tr>
            <td><form id="writeapz2address97" method="post" action="">
              <input name="apz2addressAPZ_96" id="apz2addressAPZ_96" size="9" type="text" value="80000003" readonly>
              <input name="apz2valuetowriteAPZ_96" id="apz2valuetowriteAPZ_96" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_96" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_96'])) {
    $apz2addressAPZ_96 = $_POST['apz2addressAPZ_96'];
    $apz2valueAPZ_96   = $_POST['apz2valuetowriteAPZ_96'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_96 . ' ' . $apz2valueAPZ_96 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_96" >Loading data...</div></td>
            <td>PED CH 96</td>
          </tr>
          <tr>
            <td><form id="writeapz2address97" method="post" action="">
              <input name="apz2addressAPZ_97" id="apz2addressAPZ_97" size="9" type="text" value="80000019" readonly>
              <input name="apz2valuetowriteAPZ_97" id="apz2valuetowriteAPZ_97" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_97" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_97'])) {
    $apz2addressAPZ_97 = $_POST['apz2addressAPZ_97'];
    $apz2valueAPZ_97   = $_POST['apz2valuetowriteAPZ_97'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_97 . ' ' . $apz2valueAPZ_97 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_97" >Loading data...</div></td>
            <td>PED CH 97</td>
          </tr>
          <tr>
            <td><form id="writeapz2address98" method="post" action="">
              <input name="apz2addressAPZ_98" id="apz2addressAPZ_98" size="9" type="text" value="80000035" readonly>
              <input name="apz2valuetowriteAPZ_98" id="apz2valuetowriteAPZ_98" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_98" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_98'])) {
    $apz2addressAPZ_98 = $_POST['apz2addressAPZ_98'];
    $apz2valueAPZ_98   = $_POST['apz2valuetowriteAPZ_98'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_98 . ' ' . $apz2valueAPZ_98 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_98" >Loading data...</div></td>
            <td>PED CH 98</td>
          </tr>
          <tr>
            <td><form id="writeapz2address99" method="post" action="">
              <input name="apz2addressAPZ_99" id="apz2addressAPZ_99" size="9" type="text" value="80000051" readonly>
              <input name="apz2valuetowriteAPZ_99" id="apz2valuetowriteAPZ_99" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_99" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_99'])) {
    $apz2addressAPZ_99 = $_POST['apz2addressAPZ_99'];
    $apz2valueAPZ_99   = $_POST['apz2valuetowriteAPZ_99'];
    $ip1              = file_get_contents("/srsconfig/ip1");
    $ip2              = file_get_contents("/srsconfig/ip2");
    $ip3              = file_get_contents("/srsconfig/ip3");
    $ip4              = file_get_contents("/srsconfig/ip4");
    $apzport          = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand       = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_99 . ' ' . $apz2valueAPZ_99 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_99" >Loading data...</div></td>
            <td>PED CH 99</td>
          </tr>
          <tr>
            <td><form id="writeapz2address100" method="post" action="">
              <input name="apz2addressAPZ_100" id="apz2addressAPZ_100" size="9" type="text" value="80000067" readonly>
              <input name="apz2valuetowriteAPZ_100" id="apz2valuetowriteAPZ_100" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_100" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_100'])) {
    $apz2addressAPZ_100 = $_POST['apz2addressAPZ_100'];
    $apz2valueAPZ_100   = $_POST['apz2valuetowriteAPZ_100'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_100 . ' ' . $apz2valueAPZ_100 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_100" >Loading data...</div></td>
            <td>PED CH 100</td>
          </tr>
          <tr>
            <td><form id="writeapz2address101" method="post" action="">
              <input name="apz2addressAPZ_101" id="apz2addressAPZ_101" size="9" type="text" value="80000083" readonly>
              <input name="apz2valuetowriteAPZ_101" id="apz2valuetowriteAPZ_101" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_101" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_101'])) {
    $apz2addressAPZ_101 = $_POST['apz2addressAPZ_101'];
    $apz2valueAPZ_101   = $_POST['apz2valuetowriteAPZ_101'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_101 . ' ' . $apz2valueAPZ_101 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_101" >Loading data...</div></td>
            <td>PED CH 101</td>
          </tr>
          <tr>
            <td><form id="writeapz2address102" method="post" action="">
              <input name="apz2addressAPZ_102" id="apz2addressAPZ_102" size="9" type="text" value="80000099" readonly>
              <input name="apz2valuetowriteAPZ_102" id="apz2valuetowriteAPZ_102" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_102" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_102'])) {
    $apz2addressAPZ_102 = $_POST['apz2addressAPZ_102'];
    $apz2valueAPZ_102   = $_POST['apz2valuetowriteAPZ_102'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_102 . ' ' . $apz2valueAPZ_102 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_102" >Loading data...</div></td>
            <td>PED CH 102</td>
          </tr>
          <tr>
            <td><form id="writeapz2address103" method="post" action="">
              <input name="apz2addressAPZ_103" id="apz2addressAPZ_103" size="9" type="text" value="80000115" readonly>
              <input name="apz2valuetowriteAPZ_103" id="apz2valuetowriteAPZ_103" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_103" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_103'])) {
    $apz2addressAPZ_103 = $_POST['apz2addressAPZ_103'];
    $apz2valueAPZ_103   = $_POST['apz2valuetowriteAPZ_103'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_103 . ' ' . $apz2valueAPZ_103 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_103" >Loading data...</div></td>
            <td>PED CH 103</td>
          </tr>
          <tr>
            <td><form id="writeapz2address104" method="post" action="">
              <input name="apz2addressAPZ_104" id="apz2addressAPZ_104" size="9" type="text" value="80000007" readonly>
              <input name="apz2valuetowriteAPZ_104" id="apz2valuetowriteAPZ_104" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_104" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_104'])) {
    $apz2addressAPZ_104 = $_POST['apz2addressAPZ_104'];
    $apz2valueAPZ_104   = $_POST['apz2valuetowriteAPZ_104'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_104 . ' ' . $apz2valueAPZ_104 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_104" >Loading data...</div></td>
            <td>PED CH 104</td>
          </tr>
          <tr>
            <td><form id="writeapz2address105" method="post" action="">
              <input name="apz2addressAPZ_105" id="apz2addressAPZ_105" size="9" type="text" value="80000023" readonly>
              <input name="apz2valuetowriteAPZ_105" id="apz2valuetowriteAPZ_105" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_105" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_105'])) {
    $apz2addressAPZ_105 = $_POST['apz2addressAPZ_105'];
    $apz2valueAPZ_105   = $_POST['apz2valuetowriteAPZ_105'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_105 . ' ' . $apz2valueAPZ_105 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_105" >Loading data...</div></td>
            <td>PED CH 105</td>
          </tr>
          <tr>
            <td><form id="writeapz2address106" method="post" action="">
              <input name="apz2addressAPZ_106" id="apz2addressAPZ_106" size="9" type="text" value="80000039" readonly>
              <input name="apz2valuetowriteAPZ_106" id="apz2valuetowriteAPZ_106" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_106" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_106'])) {
    $apz2addressAPZ_106 = $_POST['apz2addressAPZ_106'];
    $apz2valueAPZ_106   = $_POST['apz2valuetowriteAPZ_106'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_106 . ' ' . $apz2valueAPZ_106 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_106" >Loading data...</div></td>
            <td>PED CH 106</td>
          </tr>
          <tr>
            <td><form id="writeapz2address107" method="post" action="">
              <input name="apz2addressAPZ_107" id="apz2addressAPZ_107" size="9" type="text" value="80000055" readonly>
              <input name="apz2valuetowriteAPZ_107" id="apz2valuetowriteAPZ_107" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_107" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_107'])) {
    $apz2addressAPZ_107 = $_POST['apz2addressAPZ_107'];
    $apz2valueAPZ_107   = $_POST['apz2valuetowriteAPZ_107'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_107 . ' ' . $apz2valueAPZ_107 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_107" >Loading data...</div></td>
            <td>PED CH 107</td>
          </tr>
          <tr>
            <td><form id="writeapz2address108" method="post" action="">
              <input name="apz2addressAPZ_108" id="apz2addressAPZ_108" size="9" type="text" value="80000071" readonly>
              <input name="apz2valuetowriteAPZ_108" id="apz2valuetowriteAPZ_108" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_108" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_108'])) {
    $apz2addressAPZ_108 = $_POST['apz2addressAPZ_108'];
    $apz2valueAPZ_108   = $_POST['apz2valuetowriteAPZ_108'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_108 . ' ' . $apz2valueAPZ_108 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_108" >Loading data...</div></td>
            <td>PED CH 108</td>
          </tr>
          <tr>
            <td><form id="writeapz2address109" method="post" action="">
              <input name="apz2addressAPZ_109" id="apz2addressAPZ_109" size="9" type="text" value="80000087" readonly>
              <input name="apz2valuetowriteAPZ_109" id="apz2valuetowriteAPZ_109" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_109" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_109'])) {
    $apz2addressAPZ_109 = $_POST['apz2addressAPZ_109'];
    $apz2valueAPZ_109   = $_POST['apz2valuetowriteAPZ_109'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_109 . ' ' . $apz2valueAPZ_109 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_109" >Loading data...</div></td>
            <td>PED CH 109</td>
          </tr>
          <tr>
            <td><form id="writeapz2address110" method="post" action="">
              <input name="apz2addressAPZ_110" id="apz2addressAPZ_110" size="9" type="text" value="80000103" readonly>
              <input name="apz2valuetowriteAPZ_110" id="apz2valuetowriteAPZ_110" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_110" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_110'])) {
    $apz2addressAPZ_110 = $_POST['apz2addressAPZ_110'];
    $apz2valueAPZ_110   = $_POST['apz2valuetowriteAPZ_110'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_110 . ' ' . $apz2valueAPZ_110 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_110" >Loading data...</div></td>
            <td>PED CH 110</td>
          </tr>
          <tr>
            <td><form id="writeapz2address111" method="post" action="">
              <input name="apz2addressAPZ_111" id="apz2addressAPZ_111" size="9" type="text" value="80000119" readonly>
              <input name="apz2valuetowriteAPZ_111" id="apz2valuetowriteAPZ_111" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_111" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_111'])) {
    $apz2addressAPZ_111 = $_POST['apz2addressAPZ_111'];
    $apz2valueAPZ_111   = $_POST['apz2valuetowriteAPZ_111'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_111 . ' ' . $apz2valueAPZ_111 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_111" >Loading data...</div></td>
            <td>PED CH 111</td>
          </tr>
          <tr>
            <td><form id="writeapz2address112" method="post" action="">
              <input name="apz2addressAPZ_112" id="apz2addressAPZ_112" size="9" type="text" value="80000011" readonly>
              <input name="apz2valuetowriteAPZ_112" id="apz2valuetowriteAPZ_112" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_112" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_112'])) {
    $apz2addressAPZ_112 = $_POST['apz2addressAPZ_112'];
    $apz2valueAPZ_112   = $_POST['apz2valuetowriteAPZ_112'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_112 . ' ' . $apz2valueAPZ_112 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_112" >Loading data...</div></td>
            <td>PED CH 112</td>
          </tr>
          <tr>
            <td><form id="writeapz2address113" method="post" action="">
              <input name="apz2addressAPZ_113" id="apz2addressAPZ_113" size="9" type="text" value="80000027" readonly>
              <input name="apz2valuetowriteAPZ_113" id="apz2valuetowriteAPZ_113" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_113" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_113'])) {
    $apz2addressAPZ_113 = $_POST['apz2addressAPZ_113'];
    $apz2valueAPZ_113   = $_POST['apz2valuetowriteAPZ_113'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_113 . ' ' . $apz2valueAPZ_113 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_113" >Loading data...</div></td>
            <td>PED CH 113</td>
          </tr>
          <tr>
            <td><form id="writeapz2address114" method="post" action="">
              <input name="apz2addressAPZ_114" id="apz2addressAPZ_114" size="9" type="text" value="80000043" readonly>
              <input name="apz2valuetowriteAPZ_114" id="apz2valuetowriteAPZ_114" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_114" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_114'])) {
    $apz2addressAPZ_114 = $_POST['apz2addressAPZ_114'];
    $apz2valueAPZ_114   = $_POST['apz2valuetowriteAPZ_114'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_114 . ' ' . $apz2valueAPZ_114 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_114" >Loading data...</div></td>
            <td>PED CH 114</td>
          </tr>
          <tr>
            <td><form id="writeapz2address115" method="post" action="">
              <input name="apz2addressAPZ_115" id="apz2addressAPZ_115" size="9" type="text" value="80000059" readonly>
              <input name="apz2valuetowriteAPZ_115" id="apz2valuetowriteAPZ_115" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_115" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_115'])) {
    $apz2addressAPZ_115 = $_POST['apz2addressAPZ_115'];
    $apz2valueAPZ_115   = $_POST['apz2valuetowriteAPZ_115'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_115 . ' ' . $apz2valueAPZ_115 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_115" >Loading data...</div></td>
            <td>PED CH 115</td>
          </tr>
          <tr>
            <td><form id="writeapz2address116" method="post" action="">
              <input name="apz2addressAPZ_116" id="apz2addressAPZ_116" size="9" type="text" value="80000075" readonly>
              <input name="apz2valuetowriteAPZ_116" id="apz2valuetowriteAPZ_116" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_116" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_116'])) {
    $apz2addressAPZ_116 = $_POST['apz2addressAPZ_116'];
    $apz2valueAPZ_116   = $_POST['apz2valuetowriteAPZ_116'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_116 . ' ' . $apz2valueAPZ_116 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_116" >Loading data...</div></td>
            <td>PED CH 116</td>
          </tr>
          <tr>
            <td><form id="writeapz2address117" method="post" action="">
              <input name="apz2addressAPZ_117" id="apz2addressAPZ_117" size="9" type="text" value="80000091" readonly>
              <input name="apz2valuetowriteAPZ_117" id="apz2valuetowriteAPZ_117" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_117" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_117'])) {
    $apz2addressAPZ_117 = $_POST['apz2addressAPZ_117'];
    $apz2valueAPZ_117   = $_POST['apz2valuetowriteAPZ_117'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_117 . ' ' . $apz2valueAPZ_117 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_117" >Loading data...</div></td>
            <td>PED CH 117</td>
          </tr>
          <tr>
            <td><form id="writeapz2address118" method="post" action="">
              <input name="apz2addressAPZ_118" id="apz2addressAPZ_118" size="9" type="text" value="80000107" readonly>
              <input name="apz2valuetowriteAPZ_118" id="apz2valuetowriteAPZ_118" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_118" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_118'])) {
    $apz2addressAPZ_118 = $_POST['apz2addressAPZ_118'];
    $apz2valueAPZ_118   = $_POST['apz2valuetowriteAPZ_118'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_118 . ' ' . $apz2valueAPZ_118 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_118" >Loading data...</div></td>
            <td>PED CH 118</td>
          </tr>
          <tr>
            <td><form id="writeapz2address119" method="post" action="">
              <input name="apz2addressAPZ_119" id="apz2addressAPZ_119" size="9" type="text" value="80000123" readonly>
              <input name="apz2valuetowriteAPZ_119" id="apz2valuetowriteAPZ_119" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_119" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_119'])) {
    $apz2addressAPZ_119 = $_POST['apz2addressAPZ_119'];
    $apz2valueAPZ_119   = $_POST['apz2valuetowriteAPZ_119'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_119 . ' ' . $apz2valueAPZ_119 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_119" >Loading data...</div></td>
            <td>PED CH 119</td>
          </tr>
          <tr>
            <td><form id="writeapz2address120" method="post" action="">
              <input name="apz2addressAPZ_120" id="apz2addressAPZ_120" size="9" type="text" value="80000015" readonly>
              <input name="apz2valuetowriteAPZ_120" id="apz2valuetowriteAPZ_120" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_120" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_120'])) {
    $apz2addressAPZ_120 = $_POST['apz2addressAPZ_120'];
    $apz2valueAPZ_120   = $_POST['apz2valuetowriteAPZ_120'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_120 . ' ' . $apz2valueAPZ_120 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_120" >Loading data...</div></td>
            <td>PED CH 120</td>
          </tr>
          <tr>
            <td><form id="writeapz2address121" method="post" action="">
              <input name="apz2addressAPZ_121" id="apz2addressAPZ_121" size="9" type="text" value="80000031" readonly>
              <input name="apz2valuetowriteAPZ_121" id="apz2valuetowriteAPZ_121" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_121" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_121'])) {
    $apz2addressAPZ_121 = $_POST['apz2addressAPZ_121'];
    $apz2valueAPZ_121   = $_POST['apz2valuetowriteAPZ_121'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_121 . ' ' . $apz2valueAPZ_121 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_121" >Loading data...</div></td>
            <td>PED CH 121</td>
          </tr>
          <tr>
            <td><form id="writeapz2address122" method="post" action="">
              <input name="apz2addressAPZ_122" id="apz2addressAPZ_122" size="9" type="text" value="80000047" readonly>
              <input name="apz2valuetowriteAPZ_122" id="apz2valuetowriteAPZ_122" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_122" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_122'])) {
    $apz2addressAPZ_122 = $_POST['apz2addressAPZ_122'];
    $apz2valueAPZ_122   = $_POST['apz2valuetowriteAPZ_122'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_122 . ' ' . $apz2valueAPZ_122 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_122" >Loading data...</div></td>
            <td>PED CH 122</td>
          </tr>
          <tr>
            <td><form id="writeapz2address123" method="post" action="">
              <input name="apz2addressAPZ_123" id="apz2addressAPZ_123" size="9" type="text" value="80000063" readonly>
              <input name="apz2valuetowriteAPZ_123" id="apz2valuetowriteAPZ_123" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_123" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_123'])) {
    $apz2addressAPZ_123 = $_POST['apz2addressAPZ_123'];
    $apz2valueAPZ_123   = $_POST['apz2valuetowriteAPZ_123'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_123 . ' ' . $apz2valueAPZ_123 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_123" >Loading data...</div></td>
            <td>PED CH 123</td>
          </tr>
          <tr>
            <td><form id="writeapz2address124" method="post" action="">
              <input name="apz2addressAPZ_124" id="apz2addressAPZ_124" size="9" type="text" value="80000079" readonly>
              <input name="apz2valuetowriteAPZ_124" id="apz2valuetowriteAPZ_124" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_124" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_124'])) {
    $apz2addressAPZ_124 = $_POST['apz2addressAPZ_124'];
    $apz2valueAPZ_124   = $_POST['apz2valuetowriteAPZ_124'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_124 . ' ' . $apz2valueAPZ_124 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_124" >Loading data...</div></td>
            <td>PED CH 124</td>
          </tr>
          <tr>
            <td><form id="writeapz2address125" method="post" action="">
              <input name="apz2addressAPZ_125" id="apz2addressAPZ_125" size="9" type="text" value="80000095" readonly>
              <input name="apz2valuetowriteAPZ_125" id="apz2valuetowriteAPZ_125" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_125" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_125'])) {
    $apz2addressAPZ_125 = $_POST['apz2addressAPZ_125'];
    $apz2valueAPZ_125   = $_POST['apz2valuetowriteAPZ_125'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_125 . ' ' . $apz2valueAPZ_125 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_125" >Loading data...</div></td>
            <td>PED CH 125</td>
          </tr>
          <tr>
            <td><form id="writeapz2address126" method="post" action="">
              <input name="apz2addressAPZ_126" id="apz2addressAPZ_126" size="9" type="text" value="80000111" readonly>
              <input name="apz2valuetowriteAPZ_126" id="apz2valuetowriteAPZ_126" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_126" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_126'])) {
    $apz2addressAPZ_126 = $_POST['apz2addressAPZ_126'];
    $apz2valueAPZ_126   = $_POST['apz2valuetowriteAPZ_126'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_126 . ' ' . $apz2valueAPZ_126 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_126" >Loading data...</div></td>
            <td>PED CH 126</td>
          </tr>
          <tr>
            <td><form id="writeapz2address127" method="post" action="">
              <input name="apz2addressAPZ_127" id="apz2addressAPZ_127" size="9" type="text" value="80000127" readonly>
              <input name="apz2valuetowriteAPZ_127" id="apz2valuetowriteAPZ_127" size="9" type="text" value="">
              <input name="apz2startwriteAPZ_127" value="Write value" type="submit">
              </form>
              <?php
if (isset($_POST['apz2startwriteAPZ_127'])) {
    $apz2addressAPZ_127 = $_POST['apz2addressAPZ_127'];
    $apz2valueAPZ_127   = $_POST['apz2valuetowriteAPZ_127'];
    $ip1               = file_get_contents("/srsconfig/ip1");
    $ip2               = file_get_contents("/srsconfig/ip2");
    $ip3               = file_get_contents("/srsconfig/ip3");
    $ip4               = file_get_contents("/srsconfig/ip4");
    $apzport           = file_get_contents("/srsconfig/apzport");
    $apzsubadr       = file_get_contents("/srsconfig/subaddress");
    $apzcommand        = '/var/www/cgi-bin/do.sh' . ' ' . $apz2addressAPZ_127 . ' ' . $apz2valueAPZ_127 . ' ' . $apzport.' '.$ip1.' '.$ip2.' '. $ip3. ' '.$ip4.' '.$apzsubadr;
    system($apzcommand);
}
?></td>
            <td><div id="apzValueReadAPZp_127" >Loading data...</div></td>
            <td>PED CH 127</td>
          </tr>
        </table>    
      </td>
    
    </tr>
   </table>
  </td>
 </table>
</div>


<div class="tabContent hide" id="daq">
<h3>DAQ CONFIGURATION</h3>
<div class="tabContent" style="color:#FF0000" id="srsdaq" ></div>

<form id="filename" method="post" action="">
<?php
$file='/srsconfig/detectorsn.txt';
$f = fopen($file, "r");
$detectorselected = fgets($f);
fclose($f);

$file='/srsconfig/detectorid.txt';
$f = fopen($file, "r");
$detectoridselected = fgets($f);
fclose($f);

$file='/srsconfig/assembly.txt';
$f = fopen($file, "r");
$assemblyselected = fgets($f);
fclose($f);

$file='/srsconfig/runtype.txt';
$f = fopen($file, "r");
$runtypeselected = fgets($f);
fclose($f);

$file='/srsconfig/trigger.txt';
$f = fopen($file, "r");
$triggerselected = fgets($f);
fclose($f);

$file='/srsconfig/source.txt';
$f = fopen($file, "r");
$sourceselected = fgets($f);
fclose($f);

$file='/srsconfig/xraykv.txt';
$f = fopen($file, "r");
$xraykvselected = fgets($f);
fclose($f);

$file='/srsconfig/xrayua.txt';
$f = fopen($file, "r");
$xrayuaselected = fgets($f);
fclose($f);

$file='/srsconfig/current.txt';
$f = fopen($file, "r");
$currentselected = fgets($f);
fclose($f);

$file='/srsconfig/stati.txt';
$f = fopen($file, "r");
$statiselected = fgets($f);
fclose($f);
?>

Detector type <select name="detectorsn">
<option <?php if($detectorselected == 'GE11-VII-S'){echo("selected");}?>>GE11-VII-S</option>
<option <?php if($detectorselected == 'GE11-VII-L'){echo("selected");}?>>GE11-VII-L</option></select>
<br>
Detector ID <select name="detectorid">
<option <?php if($detectoridselected == '1'){echo("selected");}?>>1</option>
<option <?php if($detectoridselected == '2'){echo("selected");}?>>2</option>
<option <?php if($detectoridselected == '3'){echo("selected");}?>>3</option>
<option <?php if($detectoridselected == '4'){echo("selected");}?>>4</option>
<option <?php if($detectoridselected == '5'){echo("selected");}?>>5</option>
<option <?php if($detectoridselected == '6'){echo("selected");}?>>6</option>
<option <?php if($detectoridselected == '7'){echo("selected");}?>>7</option>
<option <?php if($detectoridselected == '8'){echo("selected");}?>>8</option>
<option <?php if($detectoridselected == '9'){echo("selected");}?>>9</option>
<option <?php if($detectoridselected == '10'){echo("selected");}?>>10</option>
<option <?php if($detectoridselected == '11'){echo("selected");}?>>11</option>
<option <?php if($detectoridselected == '12'){echo("selected");}?>>12</option>
<option <?php if($detectoridselected == '13'){echo("selected");}?>>13</option>
<option <?php if($detectoridselected == '14'){echo("selected");}?>>14</option>
<option <?php if($detectoridselected == '15'){echo("selected");}?>>15</option>
<option <?php if($detectoridselected == '16'){echo("selected");}?>>16</option>
<option <?php if($detectoridselected == '17'){echo("selected");}?>>17</option>
<option <?php if($detectoridselected == '18'){echo("selected");}?>>18</option>
<option <?php if($detectoridselected == '19'){echo("selected");}?>>19</option>
<option <?php if($detectoridselected == '20'){echo("selected");}?>>20</option>
<option <?php if($detectoridselected == '21'){echo("selected");}?>>21</option>
<option <?php if($detectoridselected == '22'){echo("selected");}?>>22</option>
<option <?php if($detectoridselected == '23'){echo("selected");}?>>23</option>
<option <?php if($detectoridselected == '24'){echo("selected");}?>>24</option>
<option <?php if($detectoridselected == '25'){echo("selected");}?>>25</option>
<option <?php if($detectoridselected == '26'){echo("selected");}?>>26</option>
<option <?php if($detectoridselected == '27'){echo("selected");}?>>27</option>
<option <?php if($detectoridselected == '28'){echo("selected");}?>>28</option>
<option <?php if($detectoridselected == '29'){echo("selected");}?>>29</option>
<option <?php if($detectoridselected == '30'){echo("selected");}?>>30</option>
<option <?php if($detectoridselected == '31'){echo("selected");}?>>31</option>
<option <?php if($detectoridselected == '32'){echo("selected");}?>>32</option>
<option <?php if($detectoridselected == '33'){echo("selected");}?>>33</option>
<option <?php if($detectoridselected == '34'){echo("selected");}?>>34</option>
<option <?php if($detectoridselected == '35'){echo("selected");}?>>35</option>
<option <?php if($detectoridselected == '36'){echo("selected");}?>>36</option>
<option <?php if($detectoridselected == '37'){echo("selected");}?>>37</option>
<option <?php if($detectoridselected == '38'){echo("selected");}?>>38</option>
<option <?php if($detectoridselected == '39'){echo("selected");}?>>39</option>
<option <?php if($detectoridselected == '40'){echo("selected");}?>>40</option>
<option <?php if($detectoridselected == '41'){echo("selected");}?>>41</option>
<option <?php if($detectoridselected == '42'){echo("selected");}?>>42</option>
<option <?php if($detectoridselected == '43'){echo("selected");}?>>43</option>
<option <?php if($detectoridselected == '44'){echo("selected");}?>>44</option>
<option <?php if($detectoridselected == '45'){echo("selected");}?>>45</option>
<option <?php if($detectoridselected == '46'){echo("selected");}?>>46</option>
<option <?php if($detectoridselected == '47'){echo("selected");}?>>47</option>
<option <?php if($detectoridselected == '48'){echo("selected");}?>>48</option>
<option <?php if($detectoridselected == '49'){echo("selected");}?>>49</option>
<option <?php if($detectoridselected == '50'){echo("selected");}?>>50</option>
<option <?php if($detectoridselected == '51'){echo("selected");}?>>51</option>
<option <?php if($detectoridselected == '52'){echo("selected");}?>>52</option>
<option <?php if($detectoridselected == '53'){echo("selected");}?>>53</option>
<option <?php if($detectoridselected == '54'){echo("selected");}?>>54</option>
<option <?php if($detectoridselected == '55'){echo("selected");}?>>55</option>
<option <?php if($detectoridselected == '56'){echo("selected");}?>>56</option>
<option <?php if($detectoridselected == '57'){echo("selected");}?>>57</option>
<option <?php if($detectoridselected == '58'){echo("selected");}?>>58</option>
<option <?php if($detectoridselected == '59'){echo("selected");}?>>59</option>
<option <?php if($detectoridselected == '60'){echo("selected");}?>>60</option>
<option <?php if($detectoridselected == '61'){echo("selected");}?>>61</option>
<option <?php if($detectoridselected == '62'){echo("selected");}?>>62</option>
<option <?php if($detectoridselected == '63'){echo("selected");}?>>63</option>
<option <?php if($detectoridselected == '64'){echo("selected");}?>>64</option>
<option <?php if($detectoridselected == '65'){echo("selected");}?>>65</option>
<option <?php if($detectoridselected == '66'){echo("selected");}?>>66</option>
<option <?php if($detectoridselected == '67'){echo("selected");}?>>67</option>
<option <?php if($detectoridselected == '68'){echo("selected");}?>>68</option>
<option <?php if($detectoridselected == '69'){echo("selected");}?>>69</option>
<option <?php if($detectoridselected == '70'){echo("selected");}?>>70</option>
<option <?php if($detectoridselected == '71'){echo("selected");}?>>71</option>
<option <?php if($detectoridselected == '72'){echo("selected");}?>>72</option>
<option <?php if($detectoridselected == '73'){echo("selected");}?>>73</option>
<option <?php if($detectoridselected == '74'){echo("selected");}?>>74</option>
<option <?php if($detectoridselected == '75'){echo("selected");}?>>75</option>
<option <?php if($detectoridselected == '76'){echo("selected");}?>>76</option>
<option <?php if($detectoridselected == '77'){echo("selected");}?>>77</option>
<option <?php if($detectoridselected == '78'){echo("selected");}?>>78</option>
<option <?php if($detectoridselected == '79'){echo("selected");}?>>79</option>
<option <?php if($detectoridselected == '80'){echo("selected");}?>>80</option>
<option <?php if($detectoridselected == '81'){echo("selected");}?>>81</option>
<option <?php if($detectoridselected == '82'){echo("selected");}?>>82</option>
<option <?php if($detectoridselected == '83'){echo("selected");}?>>83</option>
<option <?php if($detectoridselected == '84'){echo("selected");}?>>84</option>
<option <?php if($detectoridselected == '85'){echo("selected");}?>>85</option>
<option <?php if($detectoridselected == '86'){echo("selected");}?>>86</option>
<option <?php if($detectoridselected == '87'){echo("selected");}?>>87</option>
<option <?php if($detectoridselected == '88'){echo("selected");}?>>88</option>
<option <?php if($detectoridselected == '89'){echo("selected");}?>>89</option>
<option <?php if($detectoridselected == '90'){echo("selected");}?>>90</option>
<option <?php if($detectoridselected == '91'){echo("selected");}?>>91</option>
<option <?php if($detectoridselected == '92'){echo("selected");}?>>92</option>
<option <?php if($detectoridselected == '93'){echo("selected");}?>>93</option>
<option <?php if($detectoridselected == '94'){echo("selected");}?>>94</option>
<option <?php if($detectoridselected == '95'){echo("selected");}?>>95</option>
<option <?php if($detectoridselected == '96'){echo("selected");}?>>96</option>
<option <?php if($detectoridselected == '97'){echo("selected");}?>>97</option>
<option <?php if($detectoridselected == '98'){echo("selected");}?>>98</option>
<option <?php if($detectoridselected == '99'){echo("selected");}?>>99</option>
<option <?php if($detectoridselected == '100'){echo("selected");}?>>100</option>
<option <?php if($detectoridselected == '101'){echo("selected");}?>>101</option>
<option <?php if($detectoridselected == '102'){echo("selected");}?>>102</option>
<option <?php if($detectoridselected == '103'){echo("selected");}?>>103</option>
<option <?php if($detectoridselected == '104'){echo("selected");}?>>104</option>
<option <?php if($detectoridselected == '105'){echo("selected");}?>>105</option>
<option <?php if($detectoridselected == '106'){echo("selected");}?>>106</option>
<option <?php if($detectoridselected == '107'){echo("selected");}?>>107</option>
<option <?php if($detectoridselected == '108'){echo("selected");}?>>108</option>
<option <?php if($detectoridselected == '109'){echo("selected");}?>>109</option>
<option <?php if($detectoridselected == '110'){echo("selected");}?>>110</option>
<option <?php if($detectoridselected == '111'){echo("selected");}?>>111</option>
<option <?php if($detectoridselected == '112'){echo("selected");}?>>112</option>
<option <?php if($detectoridselected == '113'){echo("selected");}?>>113</option>
<option <?php if($detectoridselected == '114'){echo("selected");}?>>114</option>
<option <?php if($detectoridselected == '115'){echo("selected");}?>>115</option>
<option <?php if($detectoridselected == '116'){echo("selected");}?>>116</option>
<option <?php if($detectoridselected == '117'){echo("selected");}?>>117</option>
<option <?php if($detectoridselected == '118'){echo("selected");}?>>118</option>
<option <?php if($detectoridselected == '119'){echo("selected");}?>>119</option>
<option <?php if($detectoridselected == '120'){echo("selected");}?>>120</option>
<option <?php if($detectoridselected == '121'){echo("selected");}?>>121</option>
<option <?php if($detectoridselected == '122'){echo("selected");}?>>122</option>
<option <?php if($detectoridselected == '123'){echo("selected");}?>>123</option>
<option <?php if($detectoridselected == '124'){echo("selected");}?>>124</option>
<option <?php if($detectoridselected == '125'){echo("selected");}?>>125</option>
<option <?php if($detectoridselected == '126'){echo("selected");}?>>126</option>
<option <?php if($detectoridselected == '127'){echo("selected");}?>>127</option>
<option <?php if($detectoridselected == '128'){echo("selected");}?>>128</option>
<option <?php if($detectoridselected == 'proto'){echo("selected");}?>>proto</option></select>
<br>
Assembly Site = <select name="assembly">
<option <?php if($assemblyselected == 'CERN'){echo("selected");}?>>CERN</option>
<option <?php if($assemblyselected == 'FIT'){echo("selected");}?>>FIT</option>
<option <?php if($assemblyselected == 'Ghent'){echo("selected");}?>>Ghent</option>
<option <?php if($assemblyselected == 'BARC'){echo("selected");}?>>BARC</option>
<option <?php if($assemblyselected == 'BARI'){echo("selected");}?>>BARI</option>
<option <?php if($assemblyselected == 'LNF'){echo("selected");}?>>LNF</option></select>
<br>
Run Type = <select name="runtype">
<option <?php if($runtypeselected == 'Physics'){echo("selected");}?>>Physics</option>
<option <?php if($runtypeselected == 'Cosmics'){echo("selected");}?>>Cosmics</option></select>
<br>
Trigger <select name="trigger">
<option <?php if($triggerselected == 'Random'){echo("selected");}?>>Random</option>
<option <?php if($triggerselected == 'GEM3bottom'){echo("selected");}?>>GEM3bottom</option></select>
<br>
Source <select name="source">
<option <?php if($sourceselected == 'AgXRay'){echo("selected");}?>>AgXRay</option>
<option <?php if($sourceselected == 'AuXRay'){echo("selected");}?>>AuXRay</option></select>
<br>
Xray (kV)<select name="xraykv">
<option <?php if($xraykvselected == '0'){echo("selected");}?>>0</option>
<option <?php if($xraykvselected == '5'){echo("selected");}?>>5</option>
<option <?php if($xraykvselected == '10'){echo("selected");}?>>10</option>
<option <?php if($xraykvselected == '15'){echo("selected");}?>>15</option>
<option <?php if($xraykvselected == '20'){echo("selected");}?>>20</option>
<option <?php if($xraykvselected == '25'){echo("selected");}?>>25</option>
<option <?php if($xraykvselected == '30'){echo("selected");}?>>30</option>
<option <?php if($xraykvselected == '35'){echo("selected");}?>>35</option>
<option <?php if($xraykvselected == '40'){echo("selected");}?>>40</option>
<option <?php if($xraykvselected == '45'){echo("selected");}?>>45</option>
<option <?php if($xraykvselected == '50'){echo("selected");}?>>50</option>
<option <?php if($xraykvselected == '55'){echo("selected");}?>>55</option>
<option <?php if($xraykvselected == '60'){echo("selected");}?>>60</option>
<option <?php if($xraykvselected == '65'){echo("selected");}?>>65</option>
<option <?php if($xraykvselected == '70'){echo("selected");}?>>70</option></select>
<br>
Xray (kV)<select name="xrayua">
<option <?php if($xrayuaselected == '0'){echo("selected");}?>>0</option>
<option <?php if($xrayuaselected == '5'){echo("selected");}?>>5</option>
<option <?php if($xrayuaselected == '10'){echo("selected");}?>>10</option>
<option <?php if($xrayuaselected == '15'){echo("selected");}?>>15</option>
<option <?php if($xrayuaselected == '20'){echo("selected");}?>>20</option>
<option <?php if($xrayuaselected == '25'){echo("selected");}?>>25</option>
<option <?php if($xrayuaselected == '30'){echo("selected");}?>>30</option>
<option <?php if($xrayuaselected == '35'){echo("selected");}?>>35</option>
<option <?php if($xrayuaselected == '40'){echo("selected");}?>>40</option>
<option <?php if($xrayuaselected == '45'){echo("selected");}?>>45</option>
<option <?php if($xrayuaselected == '50'){echo("selected");}?>>50</option>
<option <?php if($xrayuaselected == '55'){echo("selected");}?>>55</option>
<option <?php if($xrayuaselected == '60'){echo("selected");}?>>60</option>
<option <?php if($xrayuaselected == '65'){echo("selected");}?>>65</option>
<option <?php if($xrayuaselected == '70'){echo("selected");}?>>70</option>
<option <?php if($xrayuaselected == '75'){echo("selected");}?>>75</option>
<option <?php if($xrayuaselected == '80'){echo("selected");}?>>80</option>
<option <?php if($xrayuaselected == '85'){echo("selected");}?>>85</option>
<option <?php if($xrayuaselected == '90'){echo("selected");}?>>90</option>
<option <?php if($xrayuaselected == '95'){echo("selected");}?>>95</option>
<option <?php if($xrayuaselected == '100'){echo("selected");}?>>100</option></select>
<br>
Divider Current (uA) <select name="current">
<option <?php if($currentselected == '500'){echo("selected");}?>>500</option>
<option <?php if($currentselected == '501'){echo("selected");}?>>501</option>
<option <?php if($currentselected == '502'){echo("selected");}?>>502</option>
<option <?php if($currentselected == '503'){echo("selected");}?>>503</option>
<option <?php if($currentselected == '504'){echo("selected");}?>>504</option>
<option <?php if($currentselected == '505'){echo("selected");}?>>505</option>
<option <?php if($currentselected == '506'){echo("selected");}?>>506</option>
<option <?php if($currentselected == '507'){echo("selected");}?>>507</option>
<option <?php if($currentselected == '508'){echo("selected");}?>>508</option>
<option <?php if($currentselected == '509'){echo("selected");}?>>509</option>
<option <?php if($currentselected == '510'){echo("selected");}?>>510</option>
<option <?php if($currentselected == '511'){echo("selected");}?>>511</option>
<option <?php if($currentselected == '512'){echo("selected");}?>>512</option>
<option <?php if($currentselected == '513'){echo("selected");}?>>513</option>
<option <?php if($currentselected == '514'){echo("selected");}?>>514</option>
<option <?php if($currentselected == '515'){echo("selected");}?>>515</option>
<option <?php if($currentselected == '516'){echo("selected");}?>>516</option>
<option <?php if($currentselected == '517'){echo("selected");}?>>517</option>
<option <?php if($currentselected == '518'){echo("selected");}?>>518</option>
<option <?php if($currentselected == '519'){echo("selected");}?>>519</option>
<option <?php if($currentselected == '520'){echo("selected");}?>>520</option>
<option <?php if($currentselected == '521'){echo("selected");}?>>521</option>
<option <?php if($currentselected == '522'){echo("selected");}?>>522</option>
<option <?php if($currentselected == '523'){echo("selected");}?>>523</option>
<option <?php if($currentselected == '524'){echo("selected");}?>>524</option>
<option <?php if($currentselected == '525'){echo("selected");}?>>525</option>
<option <?php if($currentselected == '526'){echo("selected");}?>>526</option>
<option <?php if($currentselected == '527'){echo("selected");}?>>527</option>
<option <?php if($currentselected == '528'){echo("selected");}?>>528</option>
<option <?php if($currentselected == '529'){echo("selected");}?>>529</option>
<option <?php if($currentselected == '530'){echo("selected");}?>>530</option>
<option <?php if($currentselected == '531'){echo("selected");}?>>531</option>
<option <?php if($currentselected == '532'){echo("selected");}?>>532</option>
<option <?php if($currentselected == '533'){echo("selected");}?>>533</option>
<option <?php if($currentselected == '534'){echo("selected");}?>>534</option>
<option <?php if($currentselected == '535'){echo("selected");}?>>535</option>
<option <?php if($currentselected == '536'){echo("selected");}?>>536</option>
<option <?php if($currentselected == '537'){echo("selected");}?>>537</option>
<option <?php if($currentselected == '538'){echo("selected");}?>>538</option>
<option <?php if($currentselected == '539'){echo("selected");}?>>539</option>
<option <?php if($currentselected == '540'){echo("selected");}?>>540</option>
<option <?php if($currentselected == '541'){echo("selected");}?>>541</option>
<option <?php if($currentselected == '542'){echo("selected");}?>>542</option>
<option <?php if($currentselected == '543'){echo("selected");}?>>543</option>
<option <?php if($currentselected == '544'){echo("selected");}?>>544</option>
<option <?php if($currentselected == '545'){echo("selected");}?>>545</option>
<option <?php if($currentselected == '546'){echo("selected");}?>>546</option>
<option <?php if($currentselected == '547'){echo("selected");}?>>547</option>
<option <?php if($currentselected == '548'){echo("selected");}?>>548</option>
<option <?php if($currentselected == '549'){echo("selected");}?>>549</option>
<option <?php if($currentselected == '550'){echo("selected");}?>>550</option>
<option <?php if($currentselected == '551'){echo("selected");}?>>551</option>
<option <?php if($currentselected == '552'){echo("selected");}?>>552</option>
<option <?php if($currentselected == '553'){echo("selected");}?>>553</option>
<option <?php if($currentselected == '554'){echo("selected");}?>>554</option>
<option <?php if($currentselected == '555'){echo("selected");}?>>555</option>
<option <?php if($currentselected == '556'){echo("selected");}?>>556</option>
<option <?php if($currentselected == '557'){echo("selected");}?>>557</option>
<option <?php if($currentselected == '558'){echo("selected");}?>>558</option>
<option <?php if($currentselected == '559'){echo("selected");}?>>559</option>
<option <?php if($currentselected == '560'){echo("selected");}?>>560</option>
<option <?php if($currentselected == '561'){echo("selected");}?>>561</option>
<option <?php if($currentselected == '562'){echo("selected");}?>>562</option>
<option <?php if($currentselected == '563'){echo("selected");}?>>563</option>
<option <?php if($currentselected == '564'){echo("selected");}?>>564</option>
<option <?php if($currentselected == '565'){echo("selected");}?>>565</option>
<option <?php if($currentselected == '566'){echo("selected");}?>>566</option>
<option <?php if($currentselected == '567'){echo("selected");}?>>567</option>
<option <?php if($currentselected == '568'){echo("selected");}?>>568</option>
<option <?php if($currentselected == '569'){echo("selected");}?>>569</option>
<option <?php if($currentselected == '570'){echo("selected");}?>>570</option>
<option <?php if($currentselected == '571'){echo("selected");}?>>571</option>
<option <?php if($currentselected == '572'){echo("selected");}?>>572</option>
<option <?php if($currentselected == '573'){echo("selected");}?>>573</option>
<option <?php if($currentselected == '574'){echo("selected");}?>>574</option>
<option <?php if($currentselected == '575'){echo("selected");}?>>575</option>
<option <?php if($currentselected == '576'){echo("selected");}?>>576</option>
<option <?php if($currentselected == '577'){echo("selected");}?>>577</option>
<option <?php if($currentselected == '578'){echo("selected");}?>>578</option>
<option <?php if($currentselected == '579'){echo("selected");}?>>579</option>
<option <?php if($currentselected == '580'){echo("selected");}?>>580</option>
<option <?php if($currentselected == '581'){echo("selected");}?>>581</option>
<option <?php if($currentselected == '582'){echo("selected");}?>>582</option>
<option <?php if($currentselected == '583'){echo("selected");}?>>583</option>
<option <?php if($currentselected == '584'){echo("selected");}?>>584</option>
<option <?php if($currentselected == '585'){echo("selected");}?>>585</option>
<option <?php if($currentselected == '586'){echo("selected");}?>>586</option>
<option <?php if($currentselected == '587'){echo("selected");}?>>587</option>
<option <?php if($currentselected == '588'){echo("selected");}?>>588</option>
<option <?php if($currentselected == '589'){echo("selected");}?>>589</option>
<option <?php if($currentselected == '590'){echo("selected");}?>>590</option>
<option <?php if($currentselected == '591'){echo("selected");}?>>591</option>
<option <?php if($currentselected == '592'){echo("selected");}?>>592</option>
<option <?php if($currentselected == '593'){echo("selected");}?>>593</option>
<option <?php if($currentselected == '594'){echo("selected");}?>>594</option>
<option <?php if($currentselected == '595'){echo("selected");}?>>595</option>
<option <?php if($currentselected == '596'){echo("selected");}?>>596</option>
<option <?php if($currentselected == '597'){echo("selected");}?>>597</option>
<option <?php if($currentselected == '598'){echo("selected");}?>>598</option>
<option <?php if($currentselected == '599'){echo("selected");}?>>599</option>
<option <?php if($currentselected == '600'){echo("selected");}?>>600</option>
<option <?php if($currentselected == '601'){echo("selected");}?>>601</option>
<option <?php if($currentselected == '602'){echo("selected");}?>>602</option>
<option <?php if($currentselected == '603'){echo("selected");}?>>603</option>
<option <?php if($currentselected == '604'){echo("selected");}?>>604</option>
<option <?php if($currentselected == '605'){echo("selected");}?>>605</option>
<option <?php if($currentselected == '606'){echo("selected");}?>>606</option>
<option <?php if($currentselected == '607'){echo("selected");}?>>607</option>
<option <?php if($currentselected == '608'){echo("selected");}?>>608</option>
<option <?php if($currentselected == '609'){echo("selected");}?>>609</option>
<option <?php if($currentselected == '610'){echo("selected");}?>>610</option>
<option <?php if($currentselected == '611'){echo("selected");}?>>611</option>
<option <?php if($currentselected == '612'){echo("selected");}?>>612</option>
<option <?php if($currentselected == '613'){echo("selected");}?>>613</option>
<option <?php if($currentselected == '614'){echo("selected");}?>>614</option>
<option <?php if($currentselected == '615'){echo("selected");}?>>615</option>
<option <?php if($currentselected == '616'){echo("selected");}?>>616</option>
<option <?php if($currentselected == '617'){echo("selected");}?>>617</option>
<option <?php if($currentselected == '618'){echo("selected");}?>>618</option>
<option <?php if($currentselected == '619'){echo("selected");}?>>619</option>
<option <?php if($currentselected == '620'){echo("selected");}?>>620</option>
<option <?php if($currentselected == '621'){echo("selected");}?>>621</option>
<option <?php if($currentselected == '622'){echo("selected");}?>>622</option>
<option <?php if($currentselected == '623'){echo("selected");}?>>623</option>
<option <?php if($currentselected == '624'){echo("selected");}?>>624</option>
<option <?php if($currentselected == '625'){echo("selected");}?>>625</option>
<option <?php if($currentselected == '626'){echo("selected");}?>>626</option>
<option <?php if($currentselected == '627'){echo("selected");}?>>627</option>
<option <?php if($currentselected == '628'){echo("selected");}?>>628</option>
<option <?php if($currentselected == '629'){echo("selected");}?>>629</option>
<option <?php if($currentselected == '630'){echo("selected");}?>>630</option>
<option <?php if($currentselected == '631'){echo("selected");}?>>631</option>
<option <?php if($currentselected == '632'){echo("selected");}?>>632</option>
<option <?php if($currentselected == '633'){echo("selected");}?>>633</option>
<option <?php if($currentselected == '634'){echo("selected");}?>>634</option>
<option <?php if($currentselected == '635'){echo("selected");}?>>635</option>
<option <?php if($currentselected == '636'){echo("selected");}?>>636</option>
<option <?php if($currentselected == '637'){echo("selected");}?>>637</option>
<option <?php if($currentselected == '638'){echo("selected");}?>>638</option>
<option <?php if($currentselected == '639'){echo("selected");}?>>639</option>
<option <?php if($currentselected == '640'){echo("selected");}?>>640</option>
<option <?php if($currentselected == '641'){echo("selected");}?>>641</option>
<option <?php if($currentselected == '642'){echo("selected");}?>>642</option>
<option <?php if($currentselected == '643'){echo("selected");}?>>643</option>
<option <?php if($currentselected == '644'){echo("selected");}?>>644</option>
<option <?php if($currentselected == '645'){echo("selected");}?>>645</option>
<option <?php if($currentselected == '646'){echo("selected");}?>>646</option>
<option <?php if($currentselected == '647'){echo("selected");}?>>647</option>
<option <?php if($currentselected == '648'){echo("selected");}?>>648</option>
<option <?php if($currentselected == '649'){echo("selected");}?>>649</option>
<option <?php if($currentselected == '650'){echo("selected");}?>>650</option>
<option <?php if($currentselected == '651'){echo("selected");}?>>651</option>
<option <?php if($currentselected == '652'){echo("selected");}?>>652</option>
<option <?php if($currentselected == '653'){echo("selected");}?>>653</option>
<option <?php if($currentselected == '654'){echo("selected");}?>>654</option>
<option <?php if($currentselected == '655'){echo("selected");}?>>655</option>
<option <?php if($currentselected == '656'){echo("selected");}?>>656</option>
<option <?php if($currentselected == '657'){echo("selected");}?>>657</option>
<option <?php if($currentselected == '658'){echo("selected");}?>>658</option>
<option <?php if($currentselected == '659'){echo("selected");}?>>659</option>
<option <?php if($currentselected == '660'){echo("selected");}?>>660</option>
<option <?php if($currentselected == '661'){echo("selected");}?>>661</option>
<option <?php if($currentselected == '662'){echo("selected");}?>>662</option>
<option <?php if($currentselected == '663'){echo("selected");}?>>663</option>
<option <?php if($currentselected == '664'){echo("selected");}?>>664</option>
<option <?php if($currentselected == '665'){echo("selected");}?>>665</option>
<option <?php if($currentselected == '666'){echo("selected");}?>>666</option>
<option <?php if($currentselected == '667'){echo("selected");}?>>667</option>
<option <?php if($currentselected == '668'){echo("selected");}?>>668</option>
<option <?php if($currentselected == '669'){echo("selected");}?>>669</option>
<option <?php if($currentselected == '670'){echo("selected");}?>>670</option>
<option <?php if($currentselected == '671'){echo("selected");}?>>671</option>
<option <?php if($currentselected == '672'){echo("selected");}?>>672</option>
<option <?php if($currentselected == '673'){echo("selected");}?>>673</option>
<option <?php if($currentselected == '674'){echo("selected");}?>>674</option>
<option <?php if($currentselected == '675'){echo("selected");}?>>675</option>
<option <?php if($currentselected == '676'){echo("selected");}?>>676</option>
<option <?php if($currentselected == '677'){echo("selected");}?>>677</option>
<option <?php if($currentselected == '678'){echo("selected");}?>>678</option>
<option <?php if($currentselected == '679'){echo("selected");}?>>679</option>
<option <?php if($currentselected == '680'){echo("selected");}?>>680</option>
<option <?php if($currentselected == '681'){echo("selected");}?>>681</option>
<option <?php if($currentselected == '682'){echo("selected");}?>>682</option>
<option <?php if($currentselected == '683'){echo("selected");}?>>683</option>
<option <?php if($currentselected == '684'){echo("selected");}?>>684</option>
<option <?php if($currentselected == '685'){echo("selected");}?>>685</option>
<option <?php if($currentselected == '686'){echo("selected");}?>>686</option>
<option <?php if($currentselected == '687'){echo("selected");}?>>687</option>
<option <?php if($currentselected == '688'){echo("selected");}?>>688</option>
<option <?php if($currentselected == '689'){echo("selected");}?>>689</option>
<option <?php if($currentselected == '690'){echo("selected");}?>>690</option>
<option <?php if($currentselected == '691'){echo("selected");}?>>691</option>
<option <?php if($currentselected == '692'){echo("selected");}?>>692</option>
<option <?php if($currentselected == '693'){echo("selected");}?>>693</option>
<option <?php if($currentselected == '694'){echo("selected");}?>>694</option>
<option <?php if($currentselected == '695'){echo("selected");}?>>695</option>
<option <?php if($currentselected == '696'){echo("selected");}?>>696</option>
<option <?php if($currentselected == '697'){echo("selected");}?>>697</option>
<option <?php if($currentselected == '698'){echo("selected");}?>>698</option>
<option <?php if($currentselected == '699'){echo("selected");}?>>699</option>
<option <?php if($currentselected == '700'){echo("selected");}?>>700</option>
<option <?php if($currentselected == '701'){echo("selected");}?>>701</option>
<option <?php if($currentselected == '702'){echo("selected");}?>>702</option>
<option <?php if($currentselected == '703'){echo("selected");}?>>703</option>
<option <?php if($currentselected == '704'){echo("selected");}?>>704</option>
<option <?php if($currentselected == '705'){echo("selected");}?>>705</option>
<option <?php if($currentselected == '706'){echo("selected");}?>>706</option>
<option <?php if($currentselected == '707'){echo("selected");}?>>707</option>
<option <?php if($currentselected == '708'){echo("selected");}?>>708</option>
<option <?php if($currentselected == '709'){echo("selected");}?>>709</option>
<option <?php if($currentselected == '710'){echo("selected");}?>>710</option>
<option <?php if($currentselected == '711'){echo("selected");}?>>711</option>
<option <?php if($currentselected == '712'){echo("selected");}?>>712</option>
<option <?php if($currentselected == '713'){echo("selected");}?>>713</option>
<option <?php if($currentselected == '714'){echo("selected");}?>>714</option>
<option <?php if($currentselected == '715'){echo("selected");}?>>715</option>
<option <?php if($currentselected == '716'){echo("selected");}?>>716</option>
<option <?php if($currentselected == '717'){echo("selected");}?>>717</option>
<option <?php if($currentselected == '718'){echo("selected");}?>>718</option>
<option <?php if($currentselected == '719'){echo("selected");}?>>719</option>
<option <?php if($currentselected == '720'){echo("selected");}?>>720</option>
<option <?php if($currentselected == '721'){echo("selected");}?>>721</option>
<option <?php if($currentselected == '722'){echo("selected");}?>>722</option>
<option <?php if($currentselected == '723'){echo("selected");}?>>723</option>
<option <?php if($currentselected == '724'){echo("selected");}?>>724</option>
<option <?php if($currentselected == '725'){echo("selected");}?>>725</option>
<option <?php if($currentselected == '726'){echo("selected");}?>>726</option>
<option <?php if($currentselected == '727'){echo("selected");}?>>727</option>
<option <?php if($currentselected == '728'){echo("selected");}?>>728</option>
<option <?php if($currentselected == '729'){echo("selected");}?>>729</option>
<option <?php if($currentselected == '730'){echo("selected");}?>>730</option>
<option <?php if($currentselected == '731'){echo("selected");}?>>731</option>
<option <?php if($currentselected == '732'){echo("selected");}?>>732</option>
<option <?php if($currentselected == '733'){echo("selected");}?>>733</option>
<option <?php if($currentselected == '734'){echo("selected");}?>>734</option>
<option <?php if($currentselected == '735'){echo("selected");}?>>735</option>
<option <?php if($currentselected == '736'){echo("selected");}?>>736</option>
<option <?php if($currentselected == '737'){echo("selected");}?>>737</option>
<option <?php if($currentselected == '738'){echo("selected");}?>>738</option>
<option <?php if($currentselected == '739'){echo("selected");}?>>739</option>
<option <?php if($currentselected == '740'){echo("selected");}?>>740</option>
<option <?php if($currentselected == '741'){echo("selected");}?>>741</option>
<option <?php if($currentselected == '742'){echo("selected");}?>>742</option>
<option <?php if($currentselected == '743'){echo("selected");}?>>743</option>
<option <?php if($currentselected == '744'){echo("selected");}?>>744</option>
<option <?php if($currentselected == '745'){echo("selected");}?>>745</option>
<option <?php if($currentselected == '746'){echo("selected");}?>>746</option>
<option <?php if($currentselected == '747'){echo("selected");}?>>747</option>
<option <?php if($currentselected == '748'){echo("selected");}?>>748</option>
<option <?php if($currentselected == '749'){echo("selected");}?>>749</option>
<option <?php if($currentselected == '750'){echo("selected");}?>>750</option>
<option <?php if($currentselected == '751'){echo("selected");}?>>751</option>
<option <?php if($currentselected == '752'){echo("selected");}?>>752</option>
<option <?php if($currentselected == '753'){echo("selected");}?>>753</option>
<option <?php if($currentselected == '754'){echo("selected");}?>>754</option>
<option <?php if($currentselected == '755'){echo("selected");}?>>755</option>
<option <?php if($currentselected == '756'){echo("selected");}?>>756</option>
<option <?php if($currentselected == '757'){echo("selected");}?>>757</option>
<option <?php if($currentselected == '758'){echo("selected");}?>>758</option>
<option <?php if($currentselected == '759'){echo("selected");}?>>759</option>
<option <?php if($currentselected == '760'){echo("selected");}?>>760</option>
<option <?php if($currentselected == '761'){echo("selected");}?>>761</option>
<option <?php if($currentselected == '762'){echo("selected");}?>>762</option>
<option <?php if($currentselected == '763'){echo("selected");}?>>763</option>
<option <?php if($currentselected == '764'){echo("selected");}?>>764</option>
<option <?php if($currentselected == '765'){echo("selected");}?>>765</option>
<option <?php if($currentselected == '766'){echo("selected");}?>>766</option>
<option <?php if($currentselected == '767'){echo("selected");}?>>767</option>
<option <?php if($currentselected == '768'){echo("selected");}?>>768</option>
<option <?php if($currentselected == '769'){echo("selected");}?>>769</option>
<option <?php if($currentselected == '770'){echo("selected");}?>>770</option>
<option <?php if($currentselected == '771'){echo("selected");}?>>771</option>
<option <?php if($currentselected == '772'){echo("selected");}?>>772</option>
<option <?php if($currentselected == '773'){echo("selected");}?>>773</option>
<option <?php if($currentselected == '774'){echo("selected");}?>>774</option>
<option <?php if($currentselected == '775'){echo("selected");}?>>775</option>
<option <?php if($currentselected == '776'){echo("selected");}?>>776</option>
<option <?php if($currentselected == '777'){echo("selected");}?>>777</option>
<option <?php if($currentselected == '778'){echo("selected");}?>>778</option>
<option <?php if($currentselected == '779'){echo("selected");}?>>779</option>
<option <?php if($currentselected == '780'){echo("selected");}?>>780</option>
<option <?php if($currentselected == '781'){echo("selected");}?>>781</option>
<option <?php if($currentselected == '782'){echo("selected");}?>>782</option>
<option <?php if($currentselected == '783'){echo("selected");}?>>783</option>
<option <?php if($currentselected == '784'){echo("selected");}?>>784</option>
<option <?php if($currentselected == '785'){echo("selected");}?>>785</option>
<option <?php if($currentselected == '786'){echo("selected");}?>>786</option>
<option <?php if($currentselected == '787'){echo("selected");}?>>787</option>
<option <?php if($currentselected == '788'){echo("selected");}?>>788</option>
<option <?php if($currentselected == '789'){echo("selected");}?>>789</option>
<option <?php if($currentselected == '790'){echo("selected");}?>>790</option>
<option <?php if($currentselected == '791'){echo("selected");}?>>791</option>
<option <?php if($currentselected == '792'){echo("selected");}?>>792</option>
<option <?php if($currentselected == '793'){echo("selected");}?>>793</option>
<option <?php if($currentselected == '794'){echo("selected");}?>>794</option>
<option <?php if($currentselected == '795'){echo("selected");}?>>795</option>
<option <?php if($currentselected == '796'){echo("selected");}?>>796</option>
<option <?php if($currentselected == '797'){echo("selected");}?>>797</option>
<option <?php if($currentselected == '798'){echo("selected");}?>>798</option>
<option <?php if($currentselected == '799'){echo("selected");}?>>799</option>
<option <?php if($currentselected == '800'){echo("selected");}?>>800</option>
<option <?php if($currentselected == '801'){echo("selected");}?>>801</option>
<option <?php if($currentselected == '802'){echo("selected");}?>>802</option>
<option <?php if($currentselected == '803'){echo("selected");}?>>803</option>
<option <?php if($currentselected == '804'){echo("selected");}?>>804</option>
<option <?php if($currentselected == '805'){echo("selected");}?>>805</option>
<option <?php if($currentselected == '806'){echo("selected");}?>>806</option>
<option <?php if($currentselected == '807'){echo("selected");}?>>807</option>
<option <?php if($currentselected == '808'){echo("selected");}?>>808</option>
<option <?php if($currentselected == '809'){echo("selected");}?>>809</option>
<option <?php if($currentselected == '810'){echo("selected");}?>>810</option>
<option <?php if($currentselected == '811'){echo("selected");}?>>811</option>
<option <?php if($currentselected == '812'){echo("selected");}?>>812</option>
<option <?php if($currentselected == '813'){echo("selected");}?>>813</option>
<option <?php if($currentselected == '814'){echo("selected");}?>>814</option>
<option <?php if($currentselected == '815'){echo("selected");}?>>815</option>
<option <?php if($currentselected == '816'){echo("selected");}?>>816</option>
<option <?php if($currentselected == '817'){echo("selected");}?>>817</option>
<option <?php if($currentselected == '818'){echo("selected");}?>>818</option>
<option <?php if($currentselected == '819'){echo("selected");}?>>819</option>
<option <?php if($currentselected == '820'){echo("selected");}?>>820</option></select>
<br>
Statistics (k events)<select name="stat">
<option <?php if($statiselected == '50'){echo("selected");}?>>50</option>
<option <?php if($statiselected == '100'){echo("selected");}?>>100</option>
<option <?php if($statiselected == '150'){echo("selected");}?>>150</option>
<option <?php if($statiselected == '200'){echo("selected");}?>>200</option>
<option <?php if($statiselected == '250'){echo("selected");}?>>250</option>
<option <?php if($statiselected == '300'){echo("selected");}?>>300</option>
<option <?php if($statiselected == '350'){echo("selected");}?>>350</option>
<option <?php if($statiselected == '400'){echo("selected");}?>>400</option>
<option <?php if($statiselected == '450'){echo("selected");}?>>450</option>
<option <?php if($statiselected == '500'){echo("selected");}?>>500</option>
<option <?php if($statiselected == '550'){echo("selected");}?>>550</option>
<option <?php if($statiselected == '600'){echo("selected");}?>>600</option>
<option <?php if($statiselected == '650'){echo("selected");}?>>650</option>
<option <?php if($statiselected == '700'){echo("selected");}?>>700</option>
<option <?php if($statiselected == '750'){echo("selected");}?>>750</option>
<option <?php if($statiselected == '800'){echo("selected");}?>>800</option>
<option <?php if($statiselected == '850'){echo("selected");}?>>850</option>
<option <?php if($statiselected == '900'){echo("selected");}?>>900</option>
<option <?php if($statiselected == '1000'){echo("selected");}?>>1000</option></select>
<br>
Submit <input name="filenamewrite" value="Save values" type="submit">
</form>
<?php
if (isset($_POST['filenamewrite'])) {
$detectorsn = $_POST['detectorsn']; 
$detectorid = $_POST['detectorid'];
$assembly = $_POST['assembly'];
$runtype = $_POST['runtype'];
$trigger = $_POST['trigger'];
$source = $_POST['source'];
$xraykv = $_POST['xraykv']; 
$xrayua = $_POST['xrayua']; 
$current = $_POST['current'];
$stat = $_POST['stat'];
    
$fp = fopen('/srsconfig/detectorsn.txt', 'w');
fwrite($fp, $detectorsn);
fclose($fp);

$fp = fopen('/srsconfig/detectorid.txt', 'w');
fwrite($fp, $detectorid);
fclose($fp);

$fp = fopen('/srsconfig/assembly.txt', 'w');
fwrite($fp, $assembly);
fclose($fp);

$fp = fopen('/srsconfig/runtype.txt', 'w');
fwrite($fp, $runtype);
fclose($fp);

$fp = fopen('/srsconfig/trigger.txt', 'w');
fwrite($fp, $trigger);
fclose($fp);

$fp = fopen('/srsconfig/source.txt', 'w');
fwrite($fp, $source);
fclose($fp);

$fp = fopen('/srsconfig/xraykv.txt', 'w');
fwrite($fp, $xraykv);
fclose($fp);

$fp = fopen('/srsconfig/xrayua.txt', 'w');
fwrite($fp, $xrayua);
fclose($fp);

$fp = fopen('/srsconfig/current.txt', 'w');
fwrite($fp, $current);
fclose($fp);

$fp = fopen('/srsconfig/stati.txt', 'w');
fwrite($fp, $stat);
fclose($fp);
}
?>
<br><br>
<form id="runcontrol" method="post" action="">
    <br>Rawdata folder<input name="rawdatafolder" id="rawdatafolder" size="30" type="text" 
value="<?php
    $file='/srsconfig/rawdatadir.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    echo $line;?>">(this location must be fully r/w i.e. chmod 777)<br />
    Rawdata filename<input name="rawdatafile" id="rawdatafile" size="15" type="text" 
value="<?php
    $file='/srsconfig/rawdatafile.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    echo $line;?>"><br />
    Number of runs<input name="numberofruns" id="numberofruns" size="9" type="text" value="<?php
    $file='/srsconfig/numberofruns.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    echo $line;?>">
    <br>Number of events per run<input name="numberofeventx" id="numberofeventx" size="9" type="text" 
value="<?php
    $file='/srsconfig/eventxfile.txt';
    $f = fopen($file, "r");
    $line = fgets($f);
    fclose($f);
    echo $line;?>">
<input name="updatedatapath" value="Update values" type="submit"><br><br>
<input name="zsrunconfigure" value="Configure ZS" type="submit"><br><br>
<input name="daqon" value="Activate DAQ" type="submit">
<input name="daqoff" value="Deactivate DAQ" type="submit"><br>
<input name="dateon" value="DATE ON" type="submit">
<input name="startrun" value="Start run" type="submit">
<input name="stoprun" value="Stop run" type="submit">
<input name="dateoff" value="DATE RESET" type="submit"><br><br><br>
<input name="multiplestartrun" value="Start multiple runs" type="submit">
<input name="multipleoff" value="Stop multiple runs" type="submit"><br>
Enable/Disable smart scan<input name="superscan" size="3" type="checkbox" value="999"><br>
Port<input name="superscanport" id="superscanport" size="5" type="text" value="">
Address<input name="superscanadr" id="superscanadr" size="5" type="text" value="">
Start<input name="superscanstart" id="superscanstart" size="6" type="text" value="">
Stop<input name="superscanfinish" id="superscanfinish" size="6" type="text" value=""><br>
Use HEX instead of DEC<input name="superhex" size="3" type="checkbox" value="999">
</form>

<?php
if (isset($_POST['superhex'])) {
   system("echo 1 > /srsconfig/superhex");
}
else {
   system("rm /srsconfig/superhex");
}
if (isset($_POST['superscan'])) {
$superscanport = $_POST['superscanport'];
$superscanadr = $_POST['superscanadr'];
$superscanstart = $_POST['superscanstart'];
$superscanfinish = $_POST['superscanfinish'];
           $fscan = fopen('/srsconfig/superscan.txt', 'w');
           fwrite($fscan, $superscanport." ".$superscanadr." ".$superscanstart." ".$superscanfinish);
           fclose($fscan);
        }
else{
system("rm /srsconfig/superscan.txt");
}
if (isset($_POST['daqon'])) {
    $daqstring='echo 1 > /srsconfig/daqon.txt';
    system($daqstring);
    system("/var/www/cgi-bin/info.sh");
}
if (isset($_POST['daqoff'])) {
    $daqstring='rm /srsconfig/daqon.txt';
    system($daqstring);
    system("/var/www/cgi-bin/info.sh");
}
if (isset($_POST['updatedatapath'])) {
    $rawdatafolder = $_POST['rawdatafolder'];
    $rawdatafile = $_POST['rawdatafile'];
    $numberofruns = $_POST['numberofruns'];
    $numberofeventx = $_POST['numberofeventx'];
    $updatepathstring = 'echo '. $rawdatafolder . ' > /srsconfig/rawdatadir.txt';
    system($updatepathstring);
	$updatepathstring = 'echo '. $rawdatafile . ' > /srsconfig/rawdatafile.txt';
    system($updatepathstring);
    $updatepathstring = 'echo '. $numberofruns . ' > /srsconfig/numberofruns.txt';
    system($updatepathstring);
    $updatepathstring = 'echo '. $numberofeventx . ' > /srsconfig/eventxfile.txt';
    system($updatepathstring);
    system("/var/www/cgi-bin/info.sh");
}

if (isset($_POST['startrun'])) {
system("date +%s > /srsconfig/unixstart");
system("/var/www/cgi-bin/slow_control /var/www/cgi-bin/startTest.txt");
}
if (isset($_POST['multiplestartrun'])) {
system("/var/www/cgi-bin/multiplerunstart.sh");
}
if (isset($_POST['amultiplestartrun'])) {
system("/var/www/cgi-bin/amultiplerunstart.sh");
}
if (isset($_POST['dateon'])) {
system("/var/www/cgi-bin/runstart.sh");
}
if (isset($_POST['dateoff'])) {
system("/var/www/cgi-bin/reset.sh");
}
if (isset($_POST['stoprun'])) {
system("/var/www/cgi-bin/slow_control /var/www/cgi-bin/stopTest.txt");
}
if (isset($_POST['zsrunconfigure'])) {
system("/var/www/cgi-bin/zs_script.sh");
}

if (isset($_POST['multipleoff'])) {
    $multioff='/var/www/cgi-bin/multiplekill.sh';
    system($multioff);
    system("/var/www/cgi-bin/slow_control /var/www/cgi-bin/stopTest.txt");
    system("/var/www/cgi-bin/runstop.sh");
}
?>
</div>

<div class="tabContent hide" id="amorelog">
<h3>AMORE CONFIGURATION</h3>
<div class="tabContent" style="color:#FF0000" id="srsamore" ></div>
<form id="amorecontrol" method="post" action="">
Rawdata folder<input name="rawdatafolder" id="rawdatafolder" size="30" type="text" 
readonly value="<?php
$file='/srsconfig/rawdatadir.txt';
$f = fopen($file, "r");
$dirtoread = fgets($f);
fclose($f);
echo $dirtoread;?>">(to change this settings, go to DAQ tab)<br><br>
Events per cycle <input name="amoreevents" id="amoreevents" size="6" type="text" value="<?php
$file='/srsconfig/amoreevents.txt';
$f = fopen($file, "r");
$amoreline1 = fgets($f);
fclose($f);
echo $amoreline1;?>"><br />
Cycles <input name="amorecycles" id="amorecycles" size="4" type="text" value="<?php
$file='/srsconfig/amorecycles.txt';
$f = fopen($file, "r");
$amoreline2 = fgets($f);
fclose($f);
echo $amoreline2;?>"><br />
Process 1<input type="checkbox" name="core1" value="1" checked />
Process 2<input type="checkbox" name="core2" value="1" checked/>
Process 3<input type="checkbox" name="core3" value="1" checked/>
Process 4<input type="checkbox" name="core4" value="1" checked />
Process 5<input type="checkbox" name="core5" value="1" checked/>
Process 6<input type="checkbox" name="core6" value="1" checked/><br>
<input name="amoreupdate" value="Update AMORE settings" type="submit"><br><br>
Single Run to analyze <input name="amoreruntoana" id="amoreruntoana" size="6" type="text" value="">
offset events <input name="amoresingleoffset" id="amoresingleoffset" size="6" type="text" value="0">
<input name="amorerunnami" value="Run on this" type="submit"><br>
Multiple-merged runs to analyze from <input name="amoreruntoanas" id="amoreruntoanas" size="6" type="text" 
value="">for runs <input name="amorehowmany" id="amorehowmany" size="6" 
type="text"
value="<?php
$file='/srsconfig/amoremultifiles.txt';
$f = fopen($file, "r");
$amoreline1 = fgets($f);
fclose($f);
echo $amoreline1;?>">with events<input name="amoreeventsmerged" id="amoreeventsmerged" 
size="6" type="text"
value="<?php
$file='/srsconfig/amoreeventxfile.txt';
$f = fopen($file, "r");
$amoreline1 = fgets($f);
fclose($f);
echo $amoreline1;?>"><input name="amorerunnamis" value="Run on these" 
type="submit"><br>
<br>
<input name="amoreempty" value="Empty run pool" type="submit">
<input name="amoreautoon" value="Activate automatic analysis" type="submit">
<input name="amoreautooff" value="Deactivate automatic analysis" type="submit"><br>
<input name="amorekill1" value="Kill process 1" type="submit">
<input name="amorekill2" value="Kill process 2" type="submit">
<input name="amorekill3" value="Kill process 3" type="submit">
<input name="amorekill4" value="Kill process 4" type="submit">
<input name="amorekill5" value="Kill process 5" type="submit">
<input name="amorekill6" value="Kill process 6" type="submit">
</form>
<?php
    if (isset($_POST['amoreautoon'])) {
        $amoreonstring='echo 1 > /srsconfig/amoreautoon.txt';
        system($amoreonstring);
        system("/var/www/cgi-bin/info.sh");
    }
    if (isset($_POST['amoreempty'])) {
        $rawdatafolder = $_POST['rawdatafolder'];
        $amorebyepool = 'rm '.$rawdatafolder.'/todo/*';
        system($amorebyepool);
    }
    if (isset($_POST['amoreautooff'])) {
        $amoreoffstring='rm /srsconfig/amoreautoon.txt';
        system($amoreoffstring);
        system("/var/www/cgi-bin/info.sh");
    }
    if (isset($_POST['amorekill1'])) {
        $amoreoffstring='echo 1 > /srsconfig/amorekill1.txt';
        system($amoreoffstring);
        $amorekill = 'chmod 777 /srsconfig/amorekill1.txt';
        system($amorekill);
    }
    if (isset($_POST['amorekill2'])) {
        $amoreoffstring='echo 1 > /srsconfig/amorekill2.txt';
        system($amoreoffstring);
        $amorekill = 'chmod 777 /srsconfig/amorekill2.txt';
        system($amorekill);
    }
    if (isset($_POST['amorekill3'])) {
        $amoreoffstring='echo 1 > /srsconfig/amorekill3.txt';
        system($amoreoffstring);
        $amorekill = 'chmod 777 /srsconfig/amorekill3.txt';
        system($amorekill);
    }
    if (isset($_POST['amorekill4'])) {
        $amoreoffstring='echo 1 > /srsconfig/amorekill4.txt';
        system($amoreoffstring);
        $amorekill = 'chmod 777 /srsconfig/amorekill4.txt';
        system($amorekill);
    }
    if (isset($_POST['amorekill5'])) {
        $amoreoffstring='echo 1 > /srsconfig/amorekill5.txt';
        system($amoreoffstring);
        $amorekill = 'chmod 777 /srsconfig/amorekill5.txt';
        system($amorekill);
    }
    if (isset($_POST['amorekill6'])) {
        $amoreoffstring='echo 1 > /srsconfig/amorekill6.txt';
        system($amoreoffstring);
        $amorekill = 'chmod 777 /srsconfig/amorekill6.txt';
        system($amorekill);
    }
    if (isset($_POST['amorerunnami'])) {
        $amoreruntoana = $_POST['amoreruntoana'];
        $rawdatafolder = $_POST['rawdatafolder'];
        $amoresingleoffset = $_POST['amoresingleoffset'];
        $updateamoreanap = 'echo '.$amoresingleoffset.' > '.$rawdatafolder.'/todo/'.$amoreruntoana;
        system($updateamoreanap);
        $updateamoreanap2 = 'chmod 777 '.$rawdatafolder.'/todo/'.$amoreruntoana;
        system($updateamoreanap2);
    }
    if (isset($_POST['amorerunnamis'])) {
        $amoreruntoanas = $_POST['amoreruntoanas'];
        $amorehowmany = $_POST['amorehowmany'];
        $amoreeventsmerged = $_POST['amoreeventsmerged'];

        $amoremassive = 'echo '.$amorehowmany.' > /srsconfig/amoremultifiles.txt';
        system($amoremassive);
        
        $amoremassive = 'echo '.$amoreeventsmerged.' > /srsconfig/amoreeventxfile.txt';
        system($amoremassive);

        $amoremassive='/var/www/cgi-bin/amoreredo.sh '.$amoreruntoanas; 
        system($amoremassive);
    }
    if (isset($_POST['amoreupdate'])) {
        if( isset($_POST['core1']) && $_POST['core1'] = '1') {
            $updatecore = 'echo 1 > /srsconfig/core1.txt';
            system($updatecore);
        }
        else {
            $updatecore='rm /srsconfig/core1.txt';
            system($updatecore);
        }
        if(isset($_POST['core2']) &&$_POST['core2'] = '1') {
            $updatecore = 'echo 1 > /srsconfig/core2.txt';
            system($updatecore);
        }
        else {
            $updatecore='rm /srsconfig/core2.txt';
            system($updatecore);
        }
        if(isset($_POST['core3']) && $_POST['core3'] = '1') {
            $updatecore = 'echo 1 > /srsconfig/core3.txt';
            system($updatecore);
        }
        else {
            $updatecore='rm /srsconfig/core3.txt';
            system($updatecore);
        }
        if(isset($_POST['core4']) && $_POST['core4'] = '1') {
            $updatecore = 'echo 1 > /srsconfig/core4.txt';
            system($updatecore);
        }
        else {
            $updatecore='rm /srsconfig/core4.txt';
            system($updatecore);
        }
        if(isset($_POST['core5']) && $_POST['core5'] = '1') {
            $updatecore = 'echo 1 > /srsconfig/core5.txt';
            system($updatecore);
        }
        else {
            $updatecore='rm /srsconfig/core5.txt';
            system($updatecore);
        }
        if(isset($_POST['core6']) && $_POST['core6'] = '1') {
            $updatecore = 'echo 1 > /srsconfig/core6.txt';
            system($updatecore);
        }
        else {
            $updatecore='rm /srsconfig/core6.txt';
            system($updatecore);
        }
        $amoreevents = $_POST['amoreevents'];
        $amorecycles = $_POST['amorecycles'];
        $updatelove = 'echo '. $amoreevents . ' > /srsconfig/amoreevents.txt';
        system($updatelove);
        $updatelove = 'echo '. $amorecycles . ' > /srsconfig/amorecycles.txt';
        system($updatelove);
    }
?>    
<br><br><br><br>
RUNS IN POOL
<div class="tabContent" style="color:#FF0000" id="srsamoreongoing" ></div>
<br><br><br><br>
AMORE PROCESS 1
<div class="tabContent" style="color:#FF0000" id="srsamorelog1" ></div>
AMORE PROCESS 2
<div class="tabContent" style="color:#FF0000" id="srsamorelog2" ></div>
AMORE PROCESS 3
<div class="tabContent" style="color:#FF0000" id="srsamorelog3" ></div>
AMORE PROCESS 4
<div class="tabContent" style="color:#FF0000" id="srsamorelog4" ></div>
AMORE PROCESS 5
<div class="tabContent" style="color:#FF0000" id="srsamorelog5" ></div>
AMORE PROCESS 6
<div class="tabContent" style="color:#FF0000" id="srsamorelog6" ></div>
</div>

<div class="tabContent hide" id="dqm">
<?php
//system("ls /mnt/nas1/cmsgem/*.root | grep -v summary | grep -v ped | grep -v info | sort -n | cut -c24- > /srsconfig/filelist.txt");

//$handle = fopen("/srsconfig/filelist.txt", "r");
//if ($handle) {
//    while (($line = fgets($handle)) !== false) {
//        $line = str_replace(".root\n", "", $line);
//        echo "<a href=\"http://163.118.204.139/dqm/".$line."/index.html\" target=\"dqmframe\">$line
//</a>";
//    }
//
//    fclose($handle);
//} else {
    // error opening the file.
//}

?>
<iframe name="dqmframe" src="target.html" onload="this.width=screen.width;this.height=screen.height;"></iframe>
</div>

<div class="tabContent hide" id="zspedestals">

<ul id="tabs">
  <li><a href="#onlyped"><font size="4.5">Pedestals</font></a></li>
  <li><a href="#onlysigma"><font size="4.5">Sigma</font></a></li>
</ul>

<a name="onlyped"></a>
<img src="histo/FEC0_APZ-Pedestal_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img80">
<img src="histo/FEC0_APZ-Pedestal_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img81">
<img src="histo/FEC0_APZ-Pedestal_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img82">
<img src="histo/FEC0_APZ-Pedestal_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img83">
<img src="histo/FEC0_APZ-Pedestal_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img84">
<img src="histo/FEC0_APZ-Pedestal_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img85">
<img src="histo/FEC0_APZ-Pedestal_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img86">
<img src="histo/FEC0_APZ-Pedestal_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img87">
<img src="histo/FEC0_APZ-Pedestal_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img88">
<img src="histo/FEC0_APZ-Pedestal_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img89">
<img src="histo/FEC0_APZ-Pedestal_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img90">
<img src="histo/FEC0_APZ-Pedestal_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img91">
<img src="histo/FEC0_APZ-Pedestal_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img92">
<img src="histo/FEC0_APZ-Pedestal_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img93">
<img src="histo/FEC0_APZ-Pedestal_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img94">
<img src="histo/FEC0_APZ-Pedestal_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img95">

<img src="histo/FEC1_APZ-Pedestal_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img96">
<img src="histo/FEC1_APZ-Pedestal_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img97">
<img src="histo/FEC1_APZ-Pedestal_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img98">
<img src="histo/FEC1_APZ-Pedestal_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img99">
<img src="histo/FEC1_APZ-Pedestal_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img100">
<img src="histo/FEC1_APZ-Pedestal_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img101">
<img src="histo/FEC1_APZ-Pedestal_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img102">
<img src="histo/FEC1_APZ-Pedestal_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img103">
<img src="histo/FEC1_APZ-Pedestal_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img104">
<img src="histo/FEC1_APZ-Pedestal_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img105">
<img src="histo/FEC1_APZ-Pedestal_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img106">
<img src="histo/FEC1_APZ-Pedestal_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img107">
<img src="histo/FEC1_APZ-Pedestal_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img108">
<img src="histo/FEC1_APZ-Pedestal_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img109">
<img src="histo/FEC1_APZ-Pedestal_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img110">
<img src="histo/FEC1_APZ-Pedestal_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img111">

<img src="histo/FEC2_APZ-Pedestal_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img112">
<img src="histo/FEC2_APZ-Pedestal_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img113">
<img src="histo/FEC2_APZ-Pedestal_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img114">
<img src="histo/FEC2_APZ-Pedestal_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img115">
<img src="histo/FEC2_APZ-Pedestal_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img116">
<img src="histo/FEC2_APZ-Pedestal_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img117">
<img src="histo/FEC2_APZ-Pedestal_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img118">
<img src="histo/FEC2_APZ-Pedestal_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img119">
<img src="histo/FEC2_APZ-Pedestal_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img120">
<img src="histo/FEC2_APZ-Pedestal_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img121">
<img src="histo/FEC2_APZ-Pedestal_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img122">
<img src="histo/FEC2_APZ-Pedestal_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img123">
<img src="histo/FEC2_APZ-Pedestal_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img124">
<img src="histo/FEC2_APZ-Pedestal_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img125">
<img src="histo/FEC2_APZ-Pedestal_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img126">
<img src="histo/FEC2_APZ-Pedestal_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img127">

<img src="histo/FEC3_APZ-Pedestal_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img128">
<img src="histo/FEC3_APZ-Pedestal_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img129">
<img src="histo/FEC3_APZ-Pedestal_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img130">
<img src="histo/FEC3_APZ-Pedestal_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img131">
<img src="histo/FEC3_APZ-Pedestal_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img132">
<img src="histo/FEC3_APZ-Pedestal_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img133">
<img src="histo/FEC3_APZ-Pedestal_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img134">
<img src="histo/FEC3_APZ-Pedestal_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img135">
<img src="histo/FEC3_APZ-Pedestal_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img136">
<img src="histo/FEC3_APZ-Pedestal_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img137">
<img src="histo/FEC3_APZ-Pedestal_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img138">
<img src="histo/FEC3_APZ-Pedestal_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img139">
<img src="histo/FEC3_APZ-Pedestal_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img140">
<img src="histo/FEC3_APZ-Pedestal_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img141">
<img src="histo/FEC3_APZ-Pedestal_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img142">
<img src="histo/FEC3_APZ-Pedestal_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img143">

<img src="histo/FEC4_APZ-Pedestal_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img144">
<img src="histo/FEC4_APZ-Pedestal_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img145">
<img src="histo/FEC4_APZ-Pedestal_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img146">
<img src="histo/FEC4_APZ-Pedestal_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img147">
<img src="histo/FEC4_APZ-Pedestal_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img148">
<img src="histo/FEC4_APZ-Pedestal_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img149">
<img src="histo/FEC4_APZ-Pedestal_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img150">
<img src="histo/FEC4_APZ-Pedestal_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img151">
<img src="histo/FEC4_APZ-Pedestal_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img152">
<img src="histo/FEC4_APZ-Pedestal_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img153">
<img src="histo/FEC4_APZ-Pedestal_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img154">
<img src="histo/FEC4_APZ-Pedestal_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img155">
<img src="histo/FEC4_APZ-Pedestal_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img156">
<img src="histo/FEC4_APZ-Pedestal_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img157">
<img src="histo/FEC4_APZ-Pedestal_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img158">
<img src="histo/FEC4_APZ-Pedestal_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img159">


<a name="onlysigma"></a>
<img src="histo/FEC0_APZ-Sigma_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img0">
<img src="histo/FEC0_APZ-Sigma_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img1">
<img src="histo/FEC0_APZ-Sigma_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img2">
<img src="histo/FEC0_APZ-Sigma_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img3">
<img src="histo/FEC0_APZ-Sigma_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img4">
<img src="histo/FEC0_APZ-Sigma_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img5">
<img src="histo/FEC0_APZ-Sigma_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img6">
<img src="histo/FEC0_APZ-Sigma_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img7">
<img src="histo/FEC0_APZ-Sigma_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img8">
<img src="histo/FEC0_APZ-Sigma_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img9">
<img src="histo/FEC0_APZ-Sigma_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img10">
<img src="histo/FEC0_APZ-Sigma_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img11">
<img src="histo/FEC0_APZ-Sigma_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img12">
<img src="histo/FEC0_APZ-Sigma_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img13">
<img src="histo/FEC0_APZ-Sigma_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img14">
<img src="histo/FEC0_APZ-Sigma_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img15">

<img src="histo/FEC1_APZ-Sigma_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img16">
<img src="histo/FEC1_APZ-Sigma_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img17">
<img src="histo/FEC1_APZ-Sigma_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img18">
<img src="histo/FEC1_APZ-Sigma_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img19">
<img src="histo/FEC1_APZ-Sigma_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img20">
<img src="histo/FEC1_APZ-Sigma_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img21">
<img src="histo/FEC1_APZ-Sigma_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img22">
<img src="histo/FEC1_APZ-Sigma_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img23">
<img src="histo/FEC1_APZ-Sigma_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img24">
<img src="histo/FEC1_APZ-Sigma_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img25">
<img src="histo/FEC1_APZ-Sigma_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img26">
<img src="histo/FEC1_APZ-Sigma_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img27">
<img src="histo/FEC1_APZ-Sigma_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img28">
<img src="histo/FEC1_APZ-Sigma_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img29">
<img src="histo/FEC1_APZ-Sigma_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img30">
<img src="histo/FEC1_APZ-Sigma_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img31">

<img src="histo/FEC2_APZ-Sigma_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img32">
<img src="histo/FEC2_APZ-Sigma_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img33">
<img src="histo/FEC2_APZ-Sigma_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img34">
<img src="histo/FEC2_APZ-Sigma_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img35">
<img src="histo/FEC2_APZ-Sigma_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img36">
<img src="histo/FEC2_APZ-Sigma_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img37">
<img src="histo/FEC2_APZ-Sigma_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img38">
<img src="histo/FEC2_APZ-Sigma_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img39">
<img src="histo/FEC2_APZ-Sigma_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img40">
<img src="histo/FEC2_APZ-Sigma_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img41">
<img src="histo/FEC2_APZ-Sigma_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img42">
<img src="histo/FEC2_APZ-Sigma_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img43">
<img src="histo/FEC2_APZ-Sigma_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img44">
<img src="histo/FEC2_APZ-Sigma_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img45">
<img src="histo/FEC2_APZ-Sigma_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img46">
<img src="histo/FEC2_APZ-Sigma_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img47">

<img src="histo/FEC3_APZ-Sigma_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img48">
<img src="histo/FEC3_APZ-Sigma_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img49">
<img src="histo/FEC3_APZ-Sigma_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img50">
<img src="histo/FEC3_APZ-Sigma_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img51">
<img src="histo/FEC3_APZ-Sigma_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img52">
<img src="histo/FEC3_APZ-Sigma_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img53">
<img src="histo/FEC3_APZ-Sigma_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img54">
<img src="histo/FEC3_APZ-Sigma_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img55">
<img src="histo/FEC3_APZ-Sigma_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img56">
<img src="histo/FEC3_APZ-Sigma_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img57">
<img src="histo/FEC3_APZ-Sigma_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img58">
<img src="histo/FEC3_APZ-Sigma_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img59">
<img src="histo/FEC3_APZ-Sigma_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img60">
<img src="histo/FEC3_APZ-Sigma_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img61">
<img src="histo/FEC3_APZ-Sigma_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img62">
<img src="histo/FEC3_APZ-Sigma_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img63">

<img src="histo/FEC4_APZ-Sigma_APV_0.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img64">
<img src="histo/FEC4_APZ-Sigma_APV_1.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img65">
<img src="histo/FEC4_APZ-Sigma_APV_2.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img66">
<img src="histo/FEC4_APZ-Sigma_APV_3.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img67">
<img src="histo/FEC4_APZ-Sigma_APV_4.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img68">
<img src="histo/FEC4_APZ-Sigma_APV_5.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img69">
<img src="histo/FEC4_APZ-Sigma_APV_6.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img70">
<img src="histo/FEC4_APZ-Sigma_APV_7.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img71">
<img src="histo/FEC4_APZ-Sigma_APV_8.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img72">
<img src="histo/FEC4_APZ-Sigma_APV_9.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img73">
<img src="histo/FEC4_APZ-Sigma_APV_10.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img74">
<img src="histo/FEC4_APZ-Sigma_APV_11.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img75">
<img src="histo/FEC4_APZ-Sigma_APV_12.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img76">
<img src="histo/FEC4_APZ-Sigma_APV_13.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img77">
<img src="histo/FEC4_APZ-Sigma_APV_14.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img78">
<img src="histo/FEC4_APZ-Sigma_APV_15.gif" alt="" style="width:304px;height:228px;" name="refresh" id="img79">
</div>

</body>
</html>
