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
    var valuetowrite1 = document.getElementById("valuetowrite1");
    var div1 = document.getElementById('divcolor1');

       $.get('loadvalue.php?partialaddress='+ip1.value+ip2.value+ip3.value+ip4.value+port.value,function(rs)
          {
              var id_numbers = JSON.parse(rs);            
              $('#ValueRead0').html(id_numbers[0])
	      $('#ValueRead1').html(id_numbers[1])

              if ( id_numbers[0].replace(/(\r\n|\n|\r)/gm,"") == valuetowrite1.value ) {
                 div1.style.backgroundColor='green';
              }
              else {
                 div1.style.backgroundColor='red';
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

<font size="6">SRS General Settings</font><br>

<form id="startreadform" method="post" action="">
FEC IP:<input name="ip1" id="ip1" size="3" type="text" value="10">
<input name="ip2" id="ip2" size="3" type="text" value="0">
<input name="ip3" id="ip3" size="3" type="text" value="1">
<input name="ip4" id="ip4" size="3" type="text" value="2"><br>
Port: <input name="port" id="port" size="9" type="text" value="6039"><br><br>

 <table border="1"">
  <tr>
    <td>Address</td>
    <td>ReadBack value</td>
  </tr>
  <tr>
    
    <td>
        <input name="address1" id="address1" size="9" type="text" value="1" readonly="readonly">
        <input name="valuetowrite1" id="valuetowrite1" size="9" type="text" value="0x3">
        <input name="startwrite" value="Write value" type="submit">
        <br>
<?php
    if (isset($_POST['startwrite'])) {
        $address = $_POST['address1'];
        $value = $_POST['valuetowrite1'];
        $port = $_POST['port'];
        $ip1 = $_POST['ip1'];
        $ip2 = $_POST['ip2'];
        $ip3 = $_POST['ip3'];
        $ip4 = $_POST['ip4'];
        $command = '/var/www/cgi-bin/do.sh'.' '.$address.' '.$value.' '.$port.' '.$ip1.' '.$ip2.' '.$ip3.' '.$ip4;
        system($command);
    }
?>




        <input name="address2" id="address2" size="9" type="text" value="2" readonly="readonly">
        <input name="valuetowrite2" id="valuetowrite2" size="9" type="text" value="0x3">
        <input name="startwrite2" value="Write value" type="submit">
        </form><br>
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
    <td>
       <div id="ValueRead0" style="border:2px inset #AAA;cursor:text;height:120px:auto;width:200px;">Loading data...</div>
       <div id="ValueRead1" style="border:2px inset #AAA;cursor:text;height:120px:auto;width:200px;">Loading data...</div>
       <div id="divcolor1" style="border:2px inset #AAA;cursor:text;height:120px:auto;width:200px;">Loading data...</div>
    </td>
  </tr>
</table> 



<form id="startreadform2" method="post" action="">
        <input name="address2" size="9" type="text" value="100" readonly="readonly">
        <input name="valuetowrite2" size="9" type="text" value="a00">
        <input name="startwrite2" value="Write value" type="submit">
        </form>

