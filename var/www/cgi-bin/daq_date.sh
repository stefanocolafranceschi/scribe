if [ -f "/srsconfig/daqon.txt" ]; then
read detectorsn</srsconfig/detectorsn.txt
read detectorid</srsconfig/detectorid.txt
read assembly</srsconfig/assembly.txt
read runtype</srsconfig/runtype.txt
read trigger</srsconfig/trigger.txt
read source</srsconfig/source.txt
read xraykv</srsconfig/xraykv.txt
read xrayua</srsconfig/xrayua.txt
read currentua</srsconfig/current.txt
read stati</srsconfig/stati.txt
read datafolder</srsconfig/rawdatadir.txt
read originalrawfile</srsconfig/rawdatafile.txt
runnumber=$datafolder/run.txt
#runfile=/srsconfig/amorerun.txt

read run</$runnumber 
minimumsize=500
time=5

if [ ! -f $runnumber ]; then
   echo "1">$runnumber
fi

if [ -f /srsconfig/startfromevent.txt ]; then
   read eventstart</srsconfig/startfromevent.txt
else
   eventstart=0
fi

if [ -f $datafolder/$originalrawfile ]; then

actualsize1=$(wc -c <"$datafolder/$originalrawfile")
sleep $time
actualsize2=$(wc -c <"$datafolder/$originalrawfile")


if [ $actualsize1 -gt $minimumsize ]; then
    if [ "$actualsize1" = "$actualsize2" ]; then
       #echo "rawfile is not increasing size - archive it"

       # ARCHIVE DATA FILE ALONG WITH PED AND REGISTERS
       #mv $datafolder/$originalrawfile $datafolder/fitgem$run.raw
       #chmod 777 $datafolder/fitgem$run.raw
mv $datafolder/$originalrawfile $datafolder/$detectorsn-$assembly-$detectorid"_Run"$run"_"$assembly"_"$runtype"_"$trigger"_"$source"_"$xraykv"_"$xrayua"_"$currentua"_"$stati.raw

       chmod 777 $datafolder/$detectorsn-$assembly-$detectorid_Run$run_$assembly_$runtype_$trigger_$source_$xraykvkV_$xrayuauA_$currentuA_$statikEvt.raw
       echo $eventstart > $datafolder/todo/$run
       chmod 777 $datafolder/todo/$run
       #cp $runnumber $runfile
       #chmod 777 $runfile
       cp $datafolder/APZ_sigma_pedestal.root $datafolder/$detectorsn-$assembly-$detectorid"_Run"$run"_"$assembly"_"$runtype"_"$trigger"_"$source"_"$xraykv"_"$xrayua"_"$currentua"_"$stati.raw"_ped.root"
       echo Run $run finished > /srsconfig/lock       
       # DUMP ALL SRS REGISTERS (then zip and store)
       #php /var/www/html/init.php
       #zip -r /srsconfig/config.zip /srsconfig/registers > /dev/null       
       #cp /srsconfig/config.zip $datafolder/fitgem$run"_dump.zip"

       # CALCULATING RATEs
       read start</srsconfig/unixstart
       finish=$(date +%s)
       #echo start = $start
       #echo finish = $finish
       let "duration = $finish-$start"
echo $duration > $datafolder/$detectorsn-$assembly-$detectorid"_Run"$run"_"$assembly"_"$runtype"_"$trigger"_"$source"_"$xraykv"_"$xrayua"_"$currentua"_"$stati"_rate.info"
       # UPDATE RUN NUMBER
       run=$((run+1))
       echo $run > $runnumber

       # SEND SIGNAL OFF AND SHUTOFF DATE
       /var/www/cgi-bin/runstop.sh
    fi
fi
fi
fi
