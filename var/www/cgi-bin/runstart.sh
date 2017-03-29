#!/bin/bash
if [ ! -f /srsconfig/startdate.txt ]; then
echo "1" >/srsconfig/startdate.txt
read datafolder</srsconfig/rawdatadir.txt
runnumber=$datafolder/run.txt

if [ ! -f $datafolder/run.txt ]; then
   echo "1">$runnumber
fi

source /var/www/cgi-bin/.bashrc

# RESET
/var/www/cgi-bin/runstop.sh
echo "1" >/srsconfig/startdate.txt
sleep 5

/var/www/cgi-bin/start_DATE.sh
tail $datafolder/run.txt|tr '\n' ' ' >/srsconfig/elogmessage
php /var/www/html/elog_daq.php
echo Run|tr '\n' ' ' > /srsconfig/lock
tail $datafolder/run.txt|tr '\n' ' ' >> /srsconfig/lock
echo started|tr '\n' ' ' >> /srsconfig/lock
echo "1" > /srsconfig/runlock
fi
