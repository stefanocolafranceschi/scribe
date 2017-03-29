#!/bin/bash
source /var/www/cgi-bin/init.sh
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

# CHECK IF USER WANT SUPER SCAN
if [ -f /srsconfig/superscan.txt ]; then
   read superport superaddress start stop</srsconfig/superscan.txt
   #echo $superport $superaddress $start $stop
   superaddress=$(printf "%02s" $superaddress | awk '{print toupper($0)}')
   superaddress=0${superaddress// /0}
   increase=$((stop-start))
   increase=$((increase/MAX+1))
   temp=$start
fi

while :
do

   #echo checking if file is locked
   if [ ! -f /srsconfig/runlock ]; then

### --- START OF SUPER SCAN
if [ -f /srsconfig/superscan.txt ]; then
if [ -f /srsconfig/superhex ]; then
printf -v tempo '%x' $temp
fi

if [ -f /srsconfig/set_ip1.txt ]; then
ip1=`head -1 /srsconfig/set_ip1.txt`
ipn1=${ip1/./}
ipn1=${ipn1/./}
ipn1=${ipn1/./}
ipn1=${ipn1/./}
/var/www/cgi-bin/write_SRS.out $ip1 $superport 0 $superaddress $temp > /srsconfig/registers/$ipn1$superport$superaddress
fi
if [ -f /srsconfig/set_ip2.txt ]; then
ip2=`head -1 /srsconfig/set_ip2.txt`
ipn2=${ip2/./}
ipn2=${ipn2/./}
ipn2=${ipn2/./}
ipn2=${ipn2/./}
/var/www/cgi-bin/write_SRS.out $ip2 $superport 0 $superaddress $temp > /srsconfig/registers/$ipn2$superport$superaddress
fi
if [ -f /srsconfig/set_ip3.txt ]; then
ip3=`head -1 /srsconfig/set_ip3.txt`
ipn3=${ip3/./}
ipn3=${ipn3/./}
ipn3=${ipn3/./}
ipn3=${ipn3/./}
/var/www/cgi-bin/write_SRS.out $ip3 $superport 0 $superaddress $temp > /srsconfig/registers/$ipn3$superport$superaddress
fi
if [ -f /srsconfig/set_ip4.txt ]; then
ip4=`head -1 /srsconfig/set_ip4.txt`
ipn4=${ip4/./}
ipn4=${ipn4/./}
ipn4=${ipn4/./}
ipn4=${ipn4/./}
/var/www/cgi-bin/write_SRS.out $ip4 $superport 0 $superaddress $temp > /srsconfig/registers/$ipn4$superport$superaddress
fi
if [ -f /srsconfig/set_ip5.txt ]; then
ip5=`head -1 /srsconfig/set_ip5.txt`
ipn5=${ip5/./}
ipn5=${ipn5/./}
ipn5=${ipn5/./}
ipn5=${ipn5/./}
/var/www/cgi-bin/write_SRS.out $ip5 $superport 0 $superaddress $temp > /srsconfig/registers/$ipn5$superport$superaddress
fi
fi
temp=$((temp+increase))
### --- END OF SUPER SCAN


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
