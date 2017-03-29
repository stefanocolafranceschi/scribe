source `locate bin/thisroot.sh`

# Put firmware to flash on Desktop
mv /srsconfig/FECv3_APZ_AZ.mcs /opt/scribe

# Compile
g++ /var/www/cgi-bin/read_SRS.cpp -o /var/www/cgi-bin/read_SRS.out
g++ /var/www/cgi-bin/write_SRS.cpp -o /var/www/cgi-bin/write_SRS.out
g++ /var/www/cgi-bin/zs_config.cpp -o /var/www/cgi-bin/zs_config `root-config --glibs --cflags`
gcc /var/www/cgi-bin/slow_control.c -o /var/www/cgi-bin/slow_control


#Setting proper ownership to AMORE and config directory
chmod 777 -R /srsconfig
chown apache -R /srsconfig
chgrp apache -R /srsconfig

#Setting proper ownership to webserver
chmod 777 -R /var/www/cgi-bin
chmod 777 -R /var/www/html
chmod 777 -R /opt/scribe/amoreSRS

# Upload crontab
crontab /var/www/cgi-bin/rootcrontab
crontab -u SRSUser /var/www/cgi-bin/crontab

# AMORE compile
cd /opt/scribe/amoreSRS
make

