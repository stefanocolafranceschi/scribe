#!/bin/bash
adr=$(printf "%02s" $1 | awk '{print toupper($0)}')
adr=${adr// /0}
if [ "$#" -eq 7 ]; then
#echo $4.$5.$6.$7 $3 0 $1 $2 > /srsconfig/temp
/var/www/cgi-bin/write_SRS.out $4.$5.$6.$7 $3 0 $1 $2 > /srsconfig/registers/$4$5$6$7$30$adr
#/var/www/cgi-bin/read_SRS.out $4.$5.$6.$7 $3 0 $1 > /srsconfig/registers/$4$5$6$7$30$adr
fi
if [ "$#" -eq 8 ]; then
var=$8
#echo $4.$5.$6.$7 > /srsconfig/temp
#echo $3  >> /srsconfig/temp
#echo 80000000 >> /srsconfig/temp
#printf "%08d\n" $8 >> /srsconfig/temp
#echo aaaaffff >> /srsconfig/temp
#echo 00000000 >> /srsconfig/temp
#string=$(printf "%08s\n" $1)
#echo "$string" | sed -r 's/ /0/g' >> /srsconfig/temp
#printf "%08x\n" $2 >> /srsconfig/temp
#/var/www/cgi-bin/slow_control /srsconfig/temp
#echo ciao > /srsconfig/registers/$4$5$6$7$3(printf "%03d" $8)
subadr=$(printf "%02d\n" $8)

if (( $1 < 200 )) ; then
   #echo "aaa" > /srsconfig/registers/prova
   hex=$(printf "%.2X\n" $1)
   /var/www/cgi-bin/write_SRS.out $4.$5.$6.$7 $3 $8 $hex $2 > /srsconfig/registers/$4$5$6$7$3$subadr$1
   if [ $3 -eq "6263" ] ; then
      /var/www/cgi-bin/read_SRS.out $4.$5.$6.$7 $3 $8 $hex > /srsconfig/registers/$4$5$6$7$3$subadr$1
   fi
else
   newvalue=$(expr $1 - 80000000)
   hex=$(printf "%.2X\n" $newvalue)
   /var/www/cgi-bin/write_SRS.out $4.$5.$6.$7 $3 $8 800000$hex $2 > /srsconfig/registers/$4$5$6$7$3$subadr$1
fi
fi
#/var/www/cgi-bin/read_SRS.out $4.$5.$6.$7 $3 $8 $1 > /srsconfig/registers/$4$5$6$7$3$subadr$1 
zip -r /srsconfig/config.zip /srsconfig/registers > /dev/null
php elog_working.php
