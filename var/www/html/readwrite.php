<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>SRS register memory utility</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>

<script>

$(document).ready(function() {
			readbackfcn();
 });

$(function(){
  
  $('#startreadform').ajaxForm(function() {
                                });
  });

function readbackfcn()
{
    var ip1 = document.getElementById("ip1");
    var ip2 = document.getElementById("ip2");
    var ip3 = document.getElementById("ip3");
    var ip4 = document.getElementById("ip4");
    var port = document.getElementById("port");
    var valuetowrite0 = document.getElementById("valuetowrite0");
    var valuetowrite1 = document.getElementById("valuetowrite1");
    var color0 = document.getElementById('divcolor0');
    var color1 = document.getElementById('divcolor1');

       $.get('loadvalue.php?partialaddress='+ip1.value+ip2.value+ip3.value+ip4.value+port.value,function(rs)
          {
              var id_numbers = JSON.parse(rs);            
              $('#ValueRead0').html(id_numbers[0])
	      $('#ValueRead1').html(id_numbers[1])
              $('#ValueRead2').html(id_numbers[2])
              $('#ValueRead3').html(id_numbers[3])
              $('#ValueRead4').html(id_numbers[4])
              $('#ValueRead5').html(id_numbers[5])
              $('#ValueRead6').html(id_numbers[6])
              $('#ValueRead7').html(id_numbers[7])
              $('#ValueRead8').html(id_numbers[8])
              $('#ValueRead9').html(id_numbers[9])
              $('#ValueRead0a').html(id_numbers[10])
              $('#ValueRead0b').html(id_numbers[11])
              $('#ValueRead0c').html(id_numbers[12])
              $('#ValueRead0d').html(id_numbers[13])
              $('#ValueRead0e').html(id_numbers[14])
              $('#ValueRead0f').html(id_numbers[15])
              $('#ValueRead10').html(id_numbers[16])
              $('#ValueRead11').html(id_numbers[17])
              $('#ValueRead12').html(id_numbers[18])
              $('#ValueRead13').html(id_numbers[19])
              $('#ValueRead14').html(id_numbers[20])
              $('#ValueRead15').html(id_numbers[21])
              $('#ValueRead16').html(id_numbers[22])
              $('#ValueRead17').html(id_numbers[23])
              $('#ValueRead18').html(id_numbers[24])
              $('#ValueRead19').html(id_numbers[25])
              $('#ValueRead1a').html(id_numbers[26])
              $('#ValueRead1b').html(id_numbers[27])
              $('#ValueRead1c').html(id_numbers[28])
              $('#ValueRead1d').html(id_numbers[29])
              $('#ValueRead1e').html(id_numbers[30])
              $('#ValueRead1f').html(id_numbers[31])

              if ( id_numbers[0].replace(/(\r\n|\n|\r)/gm,"") !== valuetowrite0.value ) {
                 color0.style.backgroundColor='red';
              }
              else {
                 color0.style.backgroundColor='white';
              }
              if ( id_numbers[1].replace(/(\r\n|\n|\r)/gm,"") !== valuetowrite1.value ) {
                 color1.style.backgroundColor='red';              
              }
              else {
                 color1.style.backgroundColor='white';
              }
              setTimeout(function(){readbackfcn();},1000);
          });
    // old method
    //var address = document.getElementById("address1"); 
    //$.get('loadvalue.php?fulladdress='+ip1.value+ip2.value+ip3.value+ip4.value+port.value+address.value,function(rs)
    //      {
    //      $('#ValueRead'+address1.value).html(rs);
    //      setTimeout(function(){readbackfcn();},1000);
    //      });
}


</script>

</head>
<body>

<font size="6">SRS General Settings</font><br><br>

<form id="startreadform" method="post" action="">
FEC IP:<input name="ip1" id="ip1" size="3" type="text" value="10">
<input name="ip2" id="ip2" size="3" type="text" value="0">
<input name="ip3" id="ip3" size="3" type="text" value="1">
<input name="ip4" id="ip4" size="3" type="text" value="2"><br>
Port: <input name="port" id="port" size="9" type="text" value="6039"><br>



<input name="readall" value="Read all value" type="submit"><br>
<?php
    if (isset($_POST['readall'])) {
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/read.sh'.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4.' '.$port;
        system($command);
    }
?>
<br><br>


 <table border="1"">
  <tr>
    <td>Address</td>
    <td>ReadBack value</td>
  </tr>

  <tr>    
    <td>
        <input name="address0" id="address0" size="9" type="text" value="0" readonly="readonly">
        <input name="valuetowrite0" id="valuetowrite0" size="9" type="text" value="0x4">
        <input name="startwrite0" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite0'])) {
        $address0 = $_POST['address0'];
        $value0 = $_POST['valuetowrite0'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address0.' '.$value0.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>    
    <td><div id="ValueRead0" >Loading data...</div></td> <td><div id="divcolor0">&nbsp &nbsp</div></td>
    <td bgcolor="99C68E">BCLK_MODE</td>
  </tr>

  <tr>
    <td>
        <input name="address1" id="address1" size="9" type="text" value="1" readonly="readonly">
        <input name="valuetowrite1" id="valuetowrite1" size="9" type="text" value="0x4">
        <input name="startwrite1" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite1'])) {
        $address1 = $_POST['address1'];
        $value1 = $_POST['valuetowrite1'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address1.' '.$value1.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead1" >Loading data...</div></td><td><div id="divcolor1">&nbsp &nbsp</div></td>
    <td bgcolor="99C68E">BCLK_TRGBURST</td>
  </tr>

  <tr>
    <td>
        <input name="address2" id="address2" size="9" type="text" value="2" readonly="readonly">
        <input name="valuetowrite2" id="valuetowrite2" size="9" type="text" value="0x9C40">
        <input name="startwrite2" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite2'])) {
        $address2 = $_POST['address2'];
        $value2 = $_POST['valuetowrite2'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address2.' '.$value2.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead2" >Loading data...</div></td><td><div id="divcolor2">&nbsp &nbsp</div></td>
    <td bgcolor="99C68E">BCLK_FREQ</td>
  </tr>

  <tr>
    <td>
        <input name="address3" id="address3" size="9" type="text" value="3" readonly="readonly">
        <input name="valuetowrite3" id="valuetowrite3" size="9" type="text" value="0x100">
        <input name="startwrite3" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite3'])) {
        $address3 = $_POST['address3'];
        $value3 = $_POST['valuetowrite3'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address3.' '.$value3.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead3" >Loading data...</div></td><td><div id="divcolor3">&nbsp &nbsp</div></td>
    <td bgcolor="99C68E">BCLK_TRGDELAY</td>
  </tr>

  <tr>
    <td>
        <input name="address4" id="address4" size="9" type="text" value="4" readonly="readonly">
        <input name="valuetowrite4" id="valuetowrite4" size="9" type="text" value="0x80">
        <input name="startwrite4" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite4'])) {
        $address4 = $_POST['address4'];
        $value4 = $_POST['valuetowrite4'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address4.' '.$value4.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead4" >Loading data...</div></td><td><div id="divcolor4">&nbsp &nbsp</div></td>
    <td bgcolor="99C68E">BCLK_TPDELAY</td>
  </tr>

  <tr>
    <td>
        <input name="address5" id="address5" size="9" type="text" value="5" readonly="readonly">
        <input name="valuetowrite5" id="valuetowrite5" size="9" type="text" value="0x12C">
        <input name="startwrite5" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite5'])) {
        $address5 = $_POST['address5'];
        $value5 = $_POST['valuetowrite5'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address5.' '.$value5.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead5" >Loading data...</div></td><td><div id="divcolor5">&nbsp &nbsp</div></td>
    <td bgcolor="99C68E">BCLK_ROSYNC</td>
  </tr>

  <tr>
    <td>
        <input name="address6" id="address6" size="9" type="text" value="6" readonly="readonly">
        <input name="valuetowrite6" id="valuetowrite6" size="9" type="text" value="">
        <input name="startwrite6" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite6'])) {
        $address6 = $_POST['address6'];
        $value6 = $_POST['valuetowrite6'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address6.' '.$value6.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead6" >Loading data...</div></td><td><div id="divcolor6">&nbsp &nbsp</div></td>
    <td>reserved</td>
  </tr>

  <tr>
    <td>
        <input name="address7" id="address7" size="9" type="text" value="7" readonly="readonly">
        <input name="valuetowrite7" id="valuetowrite7" size="9" type="text" value="0x3FFF">
        <input name="startwrite7" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite7'])) {
        $address7 = $_POST['address7'];
        $value7 = $_POST['valuetowrite7'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address7.' '.$value7.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead7" >Loading data...</div></td><td><div id="divcolor7">&nbsp &nbsp</div></td>
    <td>ADC_STATUS</td>
  </tr>

  <tr>
    <td>
        <input name="address8" id="address8" size="9" type="text" value="8" readonly="readonly">
        <input name="valuetowrite8" id="valuetowrite8" size="9" type="text" value="0xFFFF">
        <input name="startwrite8" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite8'])) {
        $address8 = $_POST['address8'];
        $value8 = $_POST['valuetowrite8'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address8.' '.$value8.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead8" >Loading data...</div></td><td><div id="divcolor8">&nbsp &nbsp</div></td>
    <td bgcolor="C7B097">EVBLD_CHENABLE</td>
  </tr>

  <tr>
    <td>
        <input name="address9" id="address9" size="9" type="text" value="9" readonly="readonly">
        <input name="valuetowrite9" id="valuetowrite9" size="9" type="text" value="0x2500">
        <input name="startwrite9" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite9'])) {
        $address9 = $_POST['address9'];
        $value9 = $_POST['valuetowrite9'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address9.' '.$value9.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead9" >Loading data...</div></td><td><div id="divcolor9">&nbsp &nbsp</div></td>
    <td bgcolor="C7B097">EVBLD_DATALENGHT</td>
  </tr>

  <tr>
    <td>
        <input name="address0a" id="address0a" size="9" type="text" value="0a" readonly="readonly">
        <input name="valuetowrite0a" id="valuetowrite0a" size="9" type="text" value="0x0">
        <input name="startwrite0a" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite0a'])) {
        $address0a = $_POST['address0a'];
        $value0a = $_POST['valuetowrite0a'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address0a.' '.$value0a.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead0a" >Loading data...</div></td><td><div id="divcolor0a">&nbsp &nbsp</div></td>
    <td bgcolor="C7B097">EVBLD_MODE</td>
  </tr>

  <tr>
    <td>
        <input name="address0b" id="address0b" size="9" type="text" value="0b" readonly="readonly">
        <input name="valuetowrite0b" id="valuetowrite0b" size="9" type="text" value="0x0">
        <input name="startwrite0b" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite0b'])) {
        $address0b = $_POST['address0b'];
        $value0b = $_POST['valuetowrite0b'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address0b.' '.$value0b.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead0b" >Loading data...</div></td><td><div id="divcolor0b">&nbsp &nbsp</div></td>
    <td bgcolor="C7B097">EVBLD_EVENT_INFO_TYPE</td>
  </tr>

  <tr>
    <td>
        <input name="address0c" id="address0c" size="9" type="text" value="0c" readonly="readonly">
        <input name="valuetowrite0c" id="valuetowrite0c" size="9" type="text" value="">
        <input name="startwrite0c" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite0c'])) {
        $address0c = $_POST['address0c'];
        $value0c = $_POST['valuetowrite0c'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address0c.' '.$value0c.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead0c" >Loading data...</div></td><td><div id="divcolor0c">&nbsp &nbsp</div></td>
    <td bgcolor="C7B097">EVBLD_EVENT_INFO_DATA</td>
  </tr>


  <tr>
    <td>
        <input name="address0d" id="address0d" size="9" type="text" value="0d" readonly="readonly">
        <input name="valuetowrite0d" id="valuetowrite0d" size="9" type="text" value="">
        <input name="startwrite0d" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite0d'])) {
        $address0d = $_POST['address0d'];
        $value0d = $_POST['valuetowrite0d'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address0d.' '.$value0d.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead0d" >Loading data...</div></td><td><div id="divcolor0d">&nbsp &nbsp</div></td>
    <td>reserved</td>
  </tr>


  <tr>
    <td>
        <input name="address0e" id="address0e" size="9" type="text" value="0e" readonly="readonly">
        <input name="valuetowrite0e" id="valuetowrite0c" size="9" type="text" value="">
        <input name="startwrite0e" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite0e'])) {
        $address0e = $_POST['address0e'];
        $value0e = $_POST['valuetowrite0e'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address0e.' '.$value0e.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead0e" >Loading data...</div></td><td><div id="divcolor0e">&nbsp &nbsp</div></td>
    <td>reserved</td>
  </tr>


  <tr>
    <td>

        <input name="address0f" id="address0f" size="9" type="text" value="0f" readonly="readonly">
        <input name="valuetowrite0f" id="valuetowrite0f" size="9" type="text" value="0x0">
        <input name="startwrite0f" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite0f'])) {
        $address0f = $_POST['address0f'];
        $value0f = $_POST['valuetowrite0f'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address0f.' '.$value0f.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead0f" >Loading data...</div></td><td><div id="divcolor0f">&nbsp &nbsp</div></td>
    <td>RO_ENABLED</td>
  </tr>

  <tr>
    <td>

        <input name="address10" id="address10" size="9" type="text" value="10" readonly="readonly">
        <input name="valuetowrite10" id="valuetowrite10" size="9" type="text" value="0x0">
        <input name="startwrite10" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite10'])) {
        $address10 = $_POST['address10'];
        $value10 = $_POST['valuetowrite10'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address10.' '.$value10.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead10" >Loading data...</div></td><td><div id="divcolor10">&nbsp &nbsp</div></td>
    <td bgcolor="#98AFC7">APZ_SYNC_DET</td>
  </tr>

  <tr>
    <td>

        <input name="address11" id="address11" size="9" type="text" value="11" readonly="readonly">
        <input name="valuetowrite11" id="valuetowrite11" size="9" type="text" value="0x80">
        <input name="startwrite11" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite11'])) {
        $address11 = $_POST['address11'];
        $value11 = $_POST['valuetowrite11'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address11.' '.$value11.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead11" >Loading data...</div></td><td><div id="divcolor11">&nbsp &nbsp</div></td>
    <td bgcolor="#98AFC7">APZ_STATUS</td>
  </tr>

  <tr>
    <td>

        <input name="address12" id="address12" size="9" type="text" value="12" readonly="readonly">
        <input name="valuetowrite12" id="valuetowrite12" size="9" type="text" value="0x0">
        <input name="startwrite12" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite12'])) {
        $address12 = $_POST['address12'];
        $value12 = $_POST['valuetowrite12'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address12.' '.$value12.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead12" >Loading data...</div></td><td><div id="divcolor12">&nbsp &nbsp</div></td>
    <td bgcolor="#98AFC7">APZ_APVSELECT</td>
  </tr>

  <tr>
    <td>
        <input name="address13" id="address13" size="9" type="text" value="13" readonly="readonly">
        <input name="valuetowrite13" id="valuetowrite13" size="9" type="text" value="0x0">
        <input name="startwrite13" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite13'])) {
        $address13 = $_POST['address13'];
        $value13 = $_POST['valuetowrite13'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address13.' '.$value13.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead13" >Loading data...</div></td><td><div id="divcolor13">&nbsp &nbsp</div></td>
    <td bgcolor="#98AFC7">APZ_NSAMPLES</td>
  </tr>

  <tr>
    <td>
        <input name="address14" id="address14" size="9" type="text" value="14" readonly="readonly">
        <input name="valuetowrite14" id="valuetowrite13" size="9" type="text" value="0x0">
        <input name="startwrite14" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite14'])) {
        $address14 = $_POST['address14'];
        $value14 = $_POST['valuetowrite14'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address14.' '.$value14.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead14" >Loading data...</div></td><td><div id="divcolor14">&nbsp &nbsp</div></td>
    <td bgcolor="#98AFC7">APZ_ZEROSUPP_THR</td>
  </tr>

  <tr>
    <td>

        <input name="address15" id="address15" size="9" type="text" value="15" readonly="readonly">
        <input name="valuetowrite15" id="valuetowrite15" size="9" type="text" value="0x0">
        <input name="startwrite15" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite15'])) {
        $address15 = $_POST['address15'];
        $value15 = $_POST['valuetowrite15'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address15.' '.$value15.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead15" >Loading data...</div></td><td><div id="divcolor15">&nbsp &nbsp</div></td>
    <td bgcolor="#98AFC7">APZ_ZERO_SUPP_PRMS</td>
  </tr>

  <tr>
    <td>

        <input name="address1d" id="address1d" size="9" type="text" value="1d" readonly="readonly">
        <input name="valuetowrite1d" id="valuetowrite1d" size="9" type="text" value="0x0">
        <input name="startwrite1d" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite1d'])) {
        $address1d = $_POST['address1d'];
        $value1d = $_POST['valuetowrite1d'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address1d.' '.$value1d.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead1d" >Loading data...</div></td><td><div id="divcolor1d">&nbsp &nbsp</div></td>
    <td bgcolor="#98AFC7">APZ_SYNC_LOW_THR</td>
  </tr>

  <tr>
    <td>
        <input name="address1e" id="address1e" size="9" type="text" value="1e" readonly="readonly">
        <input name="valuetowrite1e" id="valuetowrite1e" size="9" type="text" value="0x0">
        <input name="startwrite1e" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite1e'])) {
        $address1e = $_POST['address1e'];
        $value1e = $_POST['valuetowrite1e'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address1e.' '.$value1e.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead1e" >Loading data...</div></td><td><div id="divcolor1e">&nbsp &nbsp</div></td>
    <td bgcolor="#98AFC7">APZ_SYNC_HIGH_THR</td>
  </tr>

  <tr>
    <td>
        <input name="address1f" id="address1f" size="9" type="text" value="1f" readonly="readonly">
        <input name="valuetowrite1f" id="valuetowrite1f" size="9" type="text" value="0x0">
        <input name="startwrite1f" value="Write value" type="submit">
        </form><br>
<?php
    if (isset($_POST['startwrite1f'])) {
        $address1f = $_POST['address1f'];
        $value1f = $_POST['valuetowrite1f'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address1f.' '.$value1f.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>
   </td>
    <td><div id="ValueRead1f" >Loading data...</div></td><td><div id="divcolor1f">&nbsp &nbsp</div></td>
    <td bgcolor="#98AFC7">APZ_CMD</td>
  </tr>
</table>
