#!/bin/bash
source /opt/scribe/init.sh
if [ -f /srsconfig/multipleruns.txt ]; then
   read first </srsconfig/multipleruns.txt
   read rawdatadir </srsconfig/rawdatadir.txt

   counter=0
   while read -r line
   do
      last="$line"
    counter=$[$counter +1]
   done < /srsconfig/multipleruns.txt
   #last=$[$last -1]

while :
do
   sleep 10

   # Check if root files exists and MERGE
fullname=`ls $rawdatadir/*"Run$last"_*.root | grep -v ped`
path="$rawdatadir/$detectorsn-$assembly-$detectorid"_Run
resto="$oldest"_"$assembly"_"$runtype"_"$trigger"_"$source"_"$xraykv"_"$xrayua"_"$currentua"_"$stati"
#echo run to analyze $rawdatadir/$fullname
#echo $path
#echo $fullname
   if [ -f $fullname ]; then
      actualsize1=$(wc -c <"$fullname")
      sleep 60
      actualsize2=$(wc -c <"$fullname")
      if [ "$actualsize1" = "$actualsize2" ]; then
         echo "Last file ready"
         #echo "/var/www/cgi-bin/mergefiles.C(\""$rawdatadir2"\",$rest,$first,$counter)'"
         root -b "/var/www/cgi-bin/mergefiles.C(\""$rawdatadir"\",$first,$counter)'"
         break
      fi
   fi
done

rm /srsconfig/multipleruns.txt
fi
