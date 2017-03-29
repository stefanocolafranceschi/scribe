#!/bin/bash
source /var/www/cgi-bin/.bashrc
COUNTER=1
if [ ! -f /srsconfig/multipleon ]; then
read datafolder</srsconfig/rawdatadir.txt
read MAX </srsconfig/numberofruns.txt
runnumber=$datafolder/run.txt
eventstart=/srsconfig/startfromevent.txt
rm /srsconfig/multipleruns.txt
echo "1" >/srsconfig/multipleon
rm /srsconfig/runlock

ps -ef | grep start_DATE.sh | grep -v grep | awk '{print $2}' | xargs kill -9
ps -ef | grep stop_DATE.sh | grep -v grep | awk '{print $2}' | xargs kill -9
rm /srsconfig/startdate.txt
sleep 1

while :
do
   #echo checking if file is locked
   if [ ! -f /srsconfig/runlock ]; then
      #echo "run " $COUNTER
      if [ $COUNTER -gt $MAX ]; then
         #echo run over
         break
      fi
      cat $runnumber >> /srsconfig/multipleruns.txt
if [ -f /srsconfig/eventxfile.txt ]; then
      read eventxfile </srsconfig/eventxfile.txt
else
    eventxfile=0
fi
      num=$(($((COUNTER-1)) * $eventxfile))
      echo $num > $eventstart
      #echo date start
      /var/www/cgi-bin/start_DATE.sh
      tail $runnumber|tr '\n' ' ' >/srsconfig/elogmessage
      #php /var/www/html/elog_daq.php
      echo Run|tr '\n' ' ' > /srsconfig/lock
      tail $runnumber|tr '\n' ' ' >> /srsconfig/lock
      echo started|tr '\n' ' ' >> /srsconfig/lock
      chmod 777 /srsconfig/lock
      #echo asleeping
      sleep 30
      #echo trigger sent
      /var/www/cgi-bin/slow_control /var/www/cgi-bin/startTest.txt
      COUNTER=$[$COUNTER +1]
      #echo run locked
      echo "1" > /srsconfig/runlock
      chmod 777 /srsconfig/runlock
   fi
   sleep 10
done
rm /srsconfig/multipleon
chmod 777 /srsconfig/multipleruns.txt
/var/www/cgi-bin/multiplemerge.sh > /srsconfig/dumpami
fi
