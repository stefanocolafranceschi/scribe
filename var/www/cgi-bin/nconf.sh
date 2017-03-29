#First FEC
head -1 /srsconfig/set_ip1.txt > /srsconfig/fec_temp
tail -100 /srsconfig/fec_config.txt >> /srsconfig/fec_temp
/var/www/cgi-bin/slow_control /srsconfig/fec_temp
sleep 1
head -1 /srsconfig/set_ip1.txt > /srsconfig/fec_temp
tail -100 /srsconfig/fec_phase.txt >> /srsconfig/fec_temp
/var/www/cgi-bin/slow_control /srsconfig/fec_temp
sleep 1
head -1 /srsconfig/set_ip1.txt > /srsconfig/apv_temp
tail -100 /srsconfig/apv_config.txt >> /srsconfig/apv_temp
/var/www/cgi-bin/slow_control /srsconfig/apv_temp
sleep 1

#Second FEC
head -1 /srsconfig/set_ip2.txt > /srsconfig/fec_temp
tail -100 /srsconfig/fec_config.txt >> /srsconfig/fec_temp
/var/www/cgi-bin/slow_control /srsconfig/fec_temp
sleep 1
head -1 /srsconfig/set_ip2.txt > /srsconfig/apv_temp
tail -100 /srsconfig/apv_config.txt >> /srsconfig/apv_temp
/var/www/cgi-bin/slow_control /srsconfig/apv_temp
#rm /srsconfig/apv_temp
#rm /srsconfig/fec_temp
