#!/bin/bash
source /var/www/cgi-bin/init.sh
/var/www/cgi-bin/slow_control /var/www/cgi-bin/stopTest.txt
sleep 1

ps -ef | grep multiplerunstart.sh | grep -v grep | awk '{print $2}' | xargs kill -9
rm /srsconfig/multipleon
rm /srsconfig/multipleruns.txt
rm /srsconfig/startfromevent.txt

# RESET
ps -ef | grep start_DATE.sh | grep -v grep | awk '{print $2}' | xargs kill -9
ps -ef | grep stop_DATE.sh | grep -v grep | awk '{print $2}' | xargs kill -9
sleep 2
/var/www/cgi-bin/stop_DATE.sh&
sleep 10
ps -ef | grep stop_DATE.sh | grep -v grep | awk '{print $2}' | xargs kill -9
rm /srsconfig/runlock
