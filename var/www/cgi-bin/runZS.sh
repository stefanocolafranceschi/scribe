#!/bin/sh
amore="/opt/scribe/amoreSRS"
if [ "$#" -eq 3 ]; then 
    cp $amore/configFileDir/amore_std.cfg $amore/configFileDir/amore.cfg
    amoreAgent -a SRS03 -s /mnt/nas1/cmsgem/fitgem$1.raw -e $2 -c $3
    mv $amore/results/temp_fitgem_dataTree.root /mnt/nas1/cmsgem/fitgem$1.root
else
   echo "Usage ./runZS RUN_NUMBER EVENTS_PER CYCLE CYCLES"
fi
