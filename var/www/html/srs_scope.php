<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
<title>SRS SLOW CONTROL AND MONITORING APPLICATION</title>
<link rel="stylesheet" type="text/css" href="srsstyle.css">
<script src="jquery.js"></script>
<script src="jquery.form.js"></script>
<script src="scripts_scope.js"></script>
<script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script>
</head>

<body onload="init()">
<table style="width:100%">
  <tr>
    <td><img align="left" src="fit.jpg" height="90px"></td>
    <td><center>
      <font size="6"><font size="7" color="red">S</font>low <font size="7" color="red">C</font>ontrol & <font size="7" color="red">R</font>un <font size="7" 
color="red">I</font>nitialization <font size="7" color="red">B</font>yte-wise <font size="7" color="red">E</font>nvironment </font><font size="7" color="red">SCOPE</font>
      </center></td>
    <td><img align="right"src="cmslogo.jpg" height="90px"></td>
  </tr>
</table>

<center>
<form id="scopecontrol" method="post" action="">
<input name="startscope" value="Start scope" type="submit">
<input name="stopscope" value="Stop scope" type="submit"><br>
Events: <input name="eventscope" size="6" id="eventscope" type="text" value="100">
<input name="eventset" value="set" type="submit">
</form>
<?php
if (isset($_POST['startscope'])) {
system("/var/www/cgi-bin/start_scribescope.sh");
}
if (isset($_POST['stopscope'])) {
system("/var/www/cgi-bin/stop_scribescope.sh");
}
if (isset($_POST['eventset'])) {
    $eventscope  = $_POST['eventscope'];

    $fp = fopen('/srsconfig/eventscope.txt', 'w');
    fwrite($fp, $eventscope);
    fclose($fp);
}
?>
</center>
<br><br><br>
<font size="6"><center>WAVEFORMS</center></font>
<img src="histo/waveforms.gif" alt="" style="width:1200px;height:700px;" name="refresh" id="amg0">
<br>

<font size="6"><center>LATENCIES</center></font>
<img src="histo/latency.gif" alt="" style="width:1200px;height:700px;" name="refresh" id="amg1">
<br>

<font size="6"><center>CHARGE DISTRIBUTIONS</center></font>
<img src="histo/charge.gif" alt="" style="width:1200px;height:700px;" name="refresh" id="amg2">
<br>

</body>
</html>
