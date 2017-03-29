#!/bin/bash
#source /var/www/cgi-bin/init.sh
core1=/srsconfig/core1.txt
core2=/srsconfig/core2.txt
core3=/srsconfig/core3.txt
core4=/srsconfig/core4.txt
core5=/srsconfig/core5.txt
core6=/srsconfig/core6.txt

source /opt/scribe/init.sh
amore="/opt/scribe/amoreSRS"
pidfile="/srsconfig/run1_pid"
echo $$ > /srsconfig/run1_pid
read rawdatadir </srsconfig/rawdatadir.txt
read amoreevents </srsconfig/amoreevents.txt
read amorecycles </srsconfig/amorecycles.txt

pidfile1=/tmp/SRS01.pid
pidfile2=/tmp/SRS02.pid
pidfile3=/tmp/SRS03.pid
pidfile4=/tmp/SRS04.pid
pidfile5=/tmp/SRS05.pid
pidfile6=/tmp/SRS06.pid

cd $rawdatadir/todo
while :
do
sleep 60
amorerunning1=0
amorerunning2=0
amorerunning3=0
amorerunning4=0
amorerunning5=0
amorerunning6=0

if [ -f "$pidfile1" ] && kill -0 `cat $pidfile1` 2>/dev/null; then
   amorerunning1=1
   #echo amore running1
fi
if [ -f "$pidfile2" ] && kill -0 `cat $pidfile2` 2>/dev/null; then
   amorerunning2=1
   #echo amore running2
fi
if [ -f "$pidfile3" ] && kill -0 `cat $pidfile3` 2>/dev/null; then
   amorerunning3=1
   #echo amore running3
fi
if [ -f "$pidfile4" ] && kill -0 `cat $pidfile4` 2>/dev/null; then
   amorerunning4=1
   #echo amore running4
fi
if [ -f "$pidfile5" ] && kill -0 `cat $pidfile5` 2>/dev/null; then
   amorerunning5=1
   #echo amore running5
fi
if [ -f "$pidfile6" ] && kill -0 `cat $pidfile6` 2>/dev/null; then
   amorerunning6=1
   #echo amore running6
fi

if [ $amorerunning1 -eq 0 ]
then
   echo RUN1 Waiting for run to analyze...
   if [ -f "$core1" ]; then
   oldest="$(ls -1t | tail -1 | grep -v core)"
   read rawdatadir </srsconfig/rawdatadir.txt
   if [ -n "$oldest" ]; then
fullname=`ls $rawdatadir/*"Run$oldest"_*.raw | grep -v ped | sed 's/.raw//'`
echo run to analyze $fullname
   if [ -f "$fullname.raw" ]; then
      read amoreevents </srsconfig/amoreevents.txt
      read amorecycles </srsconfig/amorecycles.txt
      read rawdatadir </srsconfig/rawdatadir.txt
      #read eventxfile <$rawdatadir/eventxfile.txt
      read num <$oldest
      #num=$(($num * $eventxfile))
      rm $oldest
      #echo RUN1 Running AMORE on run $oldest

      # HIT/CLUSTER ANALYSIS
      sed -e "s|/opt/scribe/amoreSRS/results/tempfitgem|$fullname|g" $amore/configFileDir/amore_std.cfg > $amore/configFileDir/amore.cfg
      sleep 1
      echo "FROMEVENT $num" >> $amore/configFileDir/amore.cfg
      sleep 3
      amoreAgent -a SRS01 -s $fullname.raw -e $amoreevents -c $amorecycles > /srsconfig/run1_dump&
      #echo RUN1 $oldest OVER
      sleep 30
   else
      rm $oldest
   fi
   fi
   fi
fi
sleep 10
if [ $amorerunning2 -eq 0 ]
then
   if [ -f "$core2" ]; then
   echo RUN2 Waiting for run to analyze...
   oldest="$(ls -1t | tail -1 | grep -v core)"
   read rawdatadir </srsconfig/rawdatadir.txt
   if [ -n "$oldest" ]; then
   fullname=`ls $rawdatadir/*"Run$oldest"_*.raw | grep -v ped | sed 's/.raw//'`
   if [ -f "$fullname.raw" ]; then
      read amoreevents </srsconfig/amoreevents.txt
      read amorecycles </srsconfig/amorecycles.txt
      read rawdatadir </srsconfig/rawdatadir.txt
      #read eventxfile <$rawdatadir/eventxfile.txt
      read num <$oldest
      #num=$(($num * $eventxfile))
      rm $oldest
      #echo RUN2 Running AMORE on run $oldest

      #HIT/CLUSTER ANALYSIS
      sed -e "s|/opt/scribe/amoreSRS/results/tempfitgem|$fullname|g" $amore/configFileDir/amore_std.cfg > $amore/configFileDir/amore.cfg
      sleep 1
      echo "FROMEVENT $num">> $amore/configFileDir/amore.cfg
      sleep 3
      amoreAgent -a SRS02 -s $fullname.raw -e $amoreevents -c $amorecycles > /srsconfig/run2_dump&
      sleep 30
      #echo RUN2 $oldest OVER
   else
      rm $oldest
   fi
   fi
   fi
fi
sleep 10
if [ $amorerunning3 -eq 0 ]
then
   if [ -f "$core3" ]; then
   echo RUN3 Waiting for run to analyze...
   oldest="$(ls -1t | tail -1 | grep -v core)"
   read rawdatadir </srsconfig/rawdatadir.txt
   if [ -n "$oldest" ]; then
   fullname=`ls $rawdatadir/*"Run$oldest"_*.raw | grep -v ped | sed 's/.raw//'`
   if [ -f "$fullname.raw" ]; then
      read amoreevents </srsconfig/amoreevents.txt
      read amorecycles </srsconfig/amorecycles.txt
      read rawdatadir </srsconfig/rawdatadir.txt
      #read eventxfile <$rawdatadir/eventxfile.txt
      read num <$oldest
      #num=$(($num * $eventxfile))
      rm $oldest
      #echo RUN3 Running AMORE on run $oldest

      #HIT/CLUSTER ANALYSIS
      sed -e "s|/opt/scribe/amoreSRS/results/tempfitgem|$fullname|g" $amore/configFileDir/amore_std.cfg > $amore/configFileDir/amore.cfg
      sleep 1
      echo "FROMEVENT $num">> $amore/configFileDir/amore.cfg
      sleep 3
      amoreAgent -a SRS03 -s $fullname.raw -e $amoreevents -c $amorecycles > /srsconfig/run3_dump&
      sleep 30
      #echo RUN3 $oldest OVER
   else
      rm $oldest
   fi
   fi
   fi
fi

sleep 10
if [ $amorerunning4 -eq 0 ]
then
if [ -f "$core4" ]; then
echo RUN4 Waiting for run to analyze...
oldest="$(ls -1t | tail -1 | grep -v core)"
read rawdatadir </srsconfig/rawdatadir.txt
read amoreevents </srsconfig/amoreevents.txt
read amorecycles </srsconfig/amorecycles.txt
if [ -n "$oldest" ]; then
fullname=`ls $rawdatadir/*"Run$oldest"_*.raw | grep -v ped | sed 's/.raw//'`
if [ -f "$fullname.raw" ]; then
read amoreevents </srsconfig/amoreevents.txt
read amorecycles </srsconfig/amorecycles.txt
      #read eventxfile <$rawdatadir/eventxfile.txt
      read num <$oldest
      #num=$(($num * $eventxfile))
rm $oldest
#echo RUN4 Running AMORE on run $oldest

#HIT/CLUSTER ANALYSIS
sed -e "s|/opt/scribe/amoreSRS/results/tempfitgem|$fullname|g" $amore/configFileDir/amore_std.cfg > $amore/configFileDir/amore.cfg
sleep 1
echo "FROMEVENT $num">> $amore/configFileDir/amore.cfg
sleep 3
amoreAgent -a SRS04 -s $fullname.raw -e $amoreevents -c $amorecycles > /srsconfig/run4_dump&
sleep 30
#echo RUN4 $oldest OVER
else
rm $oldest
fi
fi
fi
fi

sleep 10
if [ $amorerunning5 -eq 0 ]
then
if [ -f "$core5" ]; then
echo RUN5 Waiting for run to analyze...
oldest="$(ls -1t | tail -1 | grep -v core)"
read rawdatadir </srsconfig/rawdatadir.txt
read amoreevents </srsconfig/amoreevents.txt
read amorecycles </srsconfig/amorecycles.txt
if [ -n "$oldest" ]; then
fullname=`ls $rawdatadir/*"Run$oldest"_*.raw | grep -v ped | sed 's/.raw//'`
if [ -f "$fullname.raw" ]; then
read amoreevents </srsconfig/amoreevents.txt
read amorecycles </srsconfig/amorecycles.txt
      #read eventxfile <$rawdatadir/eventxfile.txt
      read num <$oldest
      #num=$(($num * $eventxfile))
rm $oldest
#echo RUN5 Running AMORE on run $oldest

#HIT/CLUSTER ANALYSIS
sed -e "s|/opt/scribe/amoreSRS/results/tempfitgem|$fullname|g" $amore/configFileDir/amore_std.cfg > $amore/configFileDir/amore.cfg
sleep 1
echo "FROMEVENT $num">> $amore/configFileDir/amore.cfg
sleep 3
amoreAgent -a SRS05 -s $fullname.raw -e $amoreevents -c $amorecycles > /srsconfig/run5_dump&
sleep 30
#echo RUN5 $oldest OVER
else
rm $oldest
fi
fi
fi
fi

sleep 10
if [ $amorerunning6 -eq 0 ]
then
if [ -f "$core6" ]; then
echo RUN6 Waiting for run to analyze...
oldest="$(ls -1t | tail -1 | grep -v core)"
read rawdatadir </srsconfig/rawdatadir.txt
read amoreevents </srsconfig/amoreevents.txt
read amorecycles </srsconfig/amorecycles.txt
if [ -n "$oldest" ]; then
fullname=`ls $rawdatadir/*"Run$oldest"_*.raw | grep -v ped | sed 's/.raw//'`
if [ -f "$fullname.raw" ]; then
read amoreevents </srsconfig/amoreevents.txt
read amorecycles </srsconfig/amorecycles.txt
      #read eventxfile <$rawdatadir/eventxfile.txt
      read num <$oldest
      #num=$(($num * $eventxfile))
rm $oldest
#echo RUN6 Running AMORE on run $oldest

#HIT/CLUSTER ANALYSIS
sed -e "s|/opt/scribe/amoreSRS/results/tempfitgem|$fullname|g" $amore/configFileDir/amore_std.cfg > $amore/configFileDir/amore.cfg
sleep 1
echo "FROMEVENT $num">> $amore/configFileDir/amore.cfg
sleep 3
amoreAgent -a SRS06 -s $fullname -e $amoreevents -c $amorecycles > /srsconfig/run6_dump&
sleep 30
#echo RUN6 $oldest OVER
else
rm $oldest
fi
fi
fi
fi
done
