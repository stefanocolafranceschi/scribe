read rawdatadir</srsconfig/rawdatadir.txt
read rawdatafile</srsconfig/rawdatafile.txt
read maxevents</srsconfig/maxevents.txt
read runnumber</srsconfig/run.txt

while true
do 
sleep 1
current=$(/date/monitoring/Linux/eventDump $rawdatadir/$rawdatafile | grep nbInRun | tail -1 | awk -F' ' '{print $2}' | cut -c 9-)

echo $current $maxevents
if [[ $current -gt $maxevents ]]; then

    # STOP SRS
    echo Sending SRS stop signal
    /var/www/cgi-bin/slow_control /var/www/cgi-bin/stopTest.txt
    sleep 1

    echo "rawfile exceeded max number of events, archiving it..."

    # calculating run duration
    #read start<unixstart
    #finish=$(date +%s)
    #echo start = $start
    #echo finish = $finish
    #let "duration = $finish-$start"
    #echo $duration $rawdatadir/gemsrs$runnumber"_rate.info"

    # ARCHIVE DATA FILE ALONG WITH PED AND REGISTERS
    cp $rawdatadir/$rawdatafile $rawdatadir/gemsrs$runnumber.raw
    cp $rawdatadir/APZ_sigma_pedestal.root $rawdatadir/gemsrs$runnumber"_ped.root"
       
    # DUMP ALL SRS REGISTERS (then zip and store)
    #zip -r /srsconfig/config.zip /srsconfig/registers > /dev/null       
    cp /srsconfig/config.zip $rawdatadir/gemsrs$runnumber"_dump.zip"
    echo > $rawdatadir/$rawdatafile

    # UPDATE RUN NUMBER
    echo "Increasing run number.."
    runnumber=$((runnumber+1))
    echo $runnumber > $runnumber
    echo "New run will be" $runnumber
fi

done
