#!/bin/bash
if [ "$#" -eq 5 ]
 then
ip1=$1
ip2=$2
ip3=$3
ip4=$4
fecnumber=$5

# Read SRS settings
#read adcport < /srsconfig/adcport
#read fecport < /srsconfig/port
#read apvport < /srsconfig/hybport

# File names
setip=/srsconfig/set_ip$fecnumber.txt
#adccard=/srsconfig/adc_card$fecnumber.txt
#apvconf=/srsconfig/apv_conf$fecnumber.txt
#fecconf=/srsconfig/fec_conf$fecnumber.txt

# Remove all configuration files
if [ -f /srsconfig/set_ip$i.txt ]
  then
     rm $setip
fi
#rm $start
#rm $stop
#rm $adccard
#rm $apvconf
#rm $fecconf

#Write start and stop files
#echo $ip1.$ip2.$ip3.$ip4 > $start
#echo 6039 >> $start
#echo 80000000 >> $start
#echo 00000000 >> $start
#echo aaaaffff >> $start
#echo 00000000 >> $start
#echo 0000000F >> $start
#echo 00000001 >> $start
#echo $ip1.$ip2.$ip3.$ip4 > $stop
#echo 6039 >> $stop
#echo 80000000 >> $stop
#echo 00000000 >> $stop
#echo aaaaffff >> $stop
#echo 00000000 >> $stop
#echo 0000000F >> $stop
#echo 00000000 >> $stop

#Write set_ip file for the FEC
echo $ip1.$ip2.$ip3.$ip4 > $setip
echo 6007 >> $setip
echo 80000000 >> $setip
echo 00000000 >> $setip
echo aaaaffff >> $setip
echo 00000000 >> $setip
echo 0000000a >> $setip

#Write adccard file for the FEC
#echo $ip1.$ip2.$ip3.$ip4 > $adccard
#echo $adcport >> $adccard
#echo 80000000 >> $adccard
#echo 00000000 >> $adccard
#echo aaaaffff >> $adccard
#echo 00000000 >> $adccard
#ADCFILES=/srsconfig/registers/$ip1$ip2$ip3$ip4$adcport*
#for ff in $ADCFILES
#do
#  echo 00000${ff:(-3)} >> $adccard
#  cat $ff >> $adccard
#done

#Write apv file for the FEC
#echo $ip1.$ip2.$ip3.$ip4 > $apvconf
#echo $apvport >> $apvconf
#echo 80000000 >> $apvconf
#echo 00000000 >> $apvconf
#echo aaaaffff >> $apvconf
#echo 00000000 >> $apvconf
#APVFILES=/srsconfig/registers/$ip1$ip2$ip3$ip4$apvport*
#for fff in $APVFILES
#do
#  echo 00000${fff:(-3)} >> $apvconf
#  cat $fff >> $apvconf
#done


#Write FEC file for the FEC
#echo $ip1.$ip2.$ip3.$ip4 > $fecconf
#echo $fecport >> $fecport
#echo 80000000 >> $fecport
#echo 00000000 >> $fecport
#echo aaaaffff >> $fecport
#echo 00000000 >> $fecport
#FECFILES=/srsconfig/registers/$ip1$ip2$ip3$ip4$fecport*
#for f in $FECFILES
#do
#  echo 00000${f:(-3)} >> $fecconf
#  cat $f >> $fecconf
#done
exit
fi
