read superport superaddress start stop step</srsconfig/superscan.txt
#echo $superport $superaddress $start $stop $step
superaddress=$(printf "%02s" $superaddress | awk '{print toupper($0)}')
superaddress=0${superaddress// /0}
increase=$((stop-start))
increase=$((increase/step+1))
COUNTER=-1

while :
do
      COUNTER=$[$COUNTER +1]
      temp=$((COUNTER*increase))
      if [ $COUNTER -gt $((step-1)) ]; then
         break
      fi
      if [ -f /srsconfig/superhex ]; then
         printf -v temp '%x' $temp
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
      sleep 2
done
