#!/bin/sh
amore="/home/SRSUser/amoreSRS"
if [ "$#" -eq 3 ]; then 
    cp $amore/configFileDir/amore_std.cfg $amore/configFileDir/amore.cfg
    amoreAgent -a SRS02 -s /mnt/nas1/cmsgem/fitgem$1.raw -e $2 -c $3
    mv /home/SRSUser/amoreSRS/results/tempfitgem.root /mnt/nas1/cmsgem/fitgem$1.root
else
   echo "Usage ./runZS RUN_NUMBER EVENTS_PER CYCLE CYCLES"
fi
