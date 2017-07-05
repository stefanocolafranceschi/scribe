#!/bin/bash
source /var/www/cgi-bin/rootenv.sh
echo ZS script initialization > /srsconfig/lock

#How many FECs?
fecs=$(</srsconfig/fecnum.txt)
rm /srsconfig/allfecs.txt

for i in `seq 1 $fecs`;
do
   #Generating file with FEC IPs

if [ -f /srsconfig/set_ip$i.txt ]
  then
    #echo FEC $i exists
    head -1 /srsconfig/set_ip$i.txt >> /srsconfig/allfecs.txt
fi
done 
rm /srsconfig/fecmask*
#First loop to generate runtime FECMASK (no sru)
if [ -f /srsconfig/sru_ip.txt ]
  then
    /var/www/cgi-bin/zs_config FEC APV APZ SRU
  else
    /var/www/cgi-bin/zs_config FEC APV APZ
fi
sleep 5




# Rebooting all FECs
for j in `seq 1 $fecs`;
do

if [ -f /srsconfig/set_ip$j.txt ]
  then
    /var/www/cgi-bin/write_SRS.out `head -1 /srsconfig/set_ip$j.txt` 6007 0 0xffffffff 0xffffffff
fi
#echo "WAITING FOR REBOOT....................................................................."
sleep 10
done


#Now configuring with real HDMI attached cables
sleep 10
/var/www/cgi-bin/zs_config FEC APV APZ
rm /srsconfig/fecmask*
/var/www/cgi-bin/zs_config SIGPED
echo > /srsconfig/lock
/var/www/cgi-bin/slow_control /var/www/cgi-bin/stopTest.txt
#Now setting correct settings FEC/APV (FIT latency)
sleep 1
/var/www/cgi-bin/nconf.sh
