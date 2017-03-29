zip -r /srsconfig/config.zip /srsconfig/registers > /dev/null
php elog_working.php
echo "Register snapshopt saved into elog" > /srsconfig/lock
rm /srsconfig/elogmessage
