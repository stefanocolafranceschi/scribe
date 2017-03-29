#!/bin/bash
source /var/www/cgi-bin/init.sh
ps -ef | grep start_DATE.sh | grep -v grep | awk '{print $2}' | xargs kill -9
rm /srsconfig/startdate.txt
sleep 1

SMI_STATE=datedaq_test_daq::daq_test_control

/opt/smi/linux/smiSendCommand $SMI_STATE STOP_DATA_TAKING

while [ TRUE ]
do
  state=`/ecs/ECS/Linux/smiGetState $SMI_STATE`
  index=`echo \`expr index "$state" /\``
  let index-=1
  state=`echo ${state:0:$index}`
  if [[ "$state" == "READY" ]]
      then
      /opt/smi/linux/smiSendCommand $SMI_STATE UNLOCK_PARAMETERS
      break
  fi
done

while [ TRUE ]
do
  state=`/ecs/ECS/Linux/smiGetState $SMI_STATE`
  index=`echo \`expr index "$state" /\``
  let index-=1
  state=`echo ${state:0:$index}`
  if [[ "$state" == "CONNECTED" ]]
      then
      /opt/smi/linux/smiSendCommand $SMI_STATE DISCONNECT
      break
  fi
done
