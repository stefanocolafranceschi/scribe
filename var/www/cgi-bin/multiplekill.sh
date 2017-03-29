ps -ef | grep multiplerunstart.sh | grep -v grep | awk '{print $2}' | xargs kill -9
rm /srsconfig/multipleon
rm /srsconfig/multipleruns.txt
rm /srsconfig/startfromevent.txt
/var/www/cgi-bin/slow_control /var/www/cgi-bin/stopTest.txt
/var/www/cgi-bin/runstop.sh
