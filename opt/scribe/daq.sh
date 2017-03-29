#!/bin/bash
sudo hostname localhost
sudo ./killme.sh DATE
sudo ./killme.sh date
sudo ./srs_eth_init.sh
sudo /sbin/ifconfig eth1 down
sleep 1
pid=`pgrep dns`

    /opt/dim/linux/dns &

export DATE_ROLE_NAME=""
export DATE_SITE=/dateSite
export DATE_ROOT=/date
source /date/setup.sh

if [[ "$1" == "stop" ]]
then
    /date/runControl/stop_daqDomains.sh
    exit 0
fi

if [[ "$@" == "" ]]
    then
        /date/runControl/DAQCONTROL.sh DAQ_TEST

else
    /date/runControl/DAQCONTROL.sh $1
fi
/date/infoLogger/infoLoggerServer.sh start
/date/infoLogger/infoLoggerReader.sh restart
res=`pgrep infoBrowser.tcl`
if [[ "$res" == "" ]]
then
    /date/infoLogger/infoBrowser.sh
fi
sudo /sbin/ifconfig eth1 up
