#!/bin/bash
read datafolder</srsconfig/rawdatadir.txt
output=$datafolder/`/sbin/ifconfig eth0 | awk '/HWaddr/ {print $5}'`.pcinfo
echo '<font color=\"red\">C O M P U T E R&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspI N F O</font>' > $output
echo "" >> $output
uname -a >> $output
echo SCRIBE package installed is `rpm -qa scribe` >> $output

if [ -f /srsconfig/amoreautoon.txt ]; then
   echo "Computer set for automatic AMORE analysis" >> $output
fi

if [ -f /srsconfig/daqon.txt ]; then
   echo "Computer set as DAQ main node" >> $output
fi

#cat /proc/cpuinfo >> $output
#cat /proc/version >> $output
#cat /proc/devices >> $output
echo "" >> $output
#echo Filesystems >> $output
#cat /proc/filesystems >> $output
#cat /proc/meminfo >> $output
echo "" >> $output
echo Installed partitions: >> $output
cat /proc/partitions >> $output
#cat /proc/swaps >> $output
echo Uptime: `cat /proc/uptime` >> $output
echo - - - - - - - - - - - - - - - - - - - - - >> $output
echo '<font color=\"red\">M E M O R Y</font>' >> $output
echo ""	>> $output
free -m >> $output
echo - - - - - - - - - - - - - - - - - - - - - >> $output
echo '<font color=\"red\">N E T W O R K</font>' >> $output
echo ""	>> $output
/sbin/ifconfig -a >> $output
echo - - - - - - - - - - - - - - - - - - - - - >> $output
sed -i 's/$/<br>/' $output
