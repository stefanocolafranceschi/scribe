#!/bin/bash
source /var/www/cgi-bin/init.sh
#echo Content-type: text/html

DAQ_ROOT_DOMAIN_NAME=DATE
SMI_STATE=DATEdaq_test_daq::daq_test_control

while [ TRUE ]
do
  state=`/ecs/ECS/Linux/smiGetState $SMI_STATE`
  index=`echo \`expr index "$state" /\``
  let index-=1
  state=`echo ${state:0:$index}`
  if [[ "$state" == "DISCONNECTED" ]]
      then
      /opt/smi/linux/smiSendCommand $SMI_STATE CONNECT/CONFIG=DEFAULT    
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
      /opt/smi/linux/smiSendCommand $SMI_STATE LOCK_PARAMETERS/CONFIG=DEFAULT
      break
fi
done

while [ TRUE ]
do
  state=`/ecs/ECS/Linux/smiGetState $SMI_STATE`
  index=`echo \`expr index "$state" /\``
  let index-=1
  state=`echo ${state:0:$index}`
  if [[ "$state" == "READY" ]]
      then
      /opt/smi/linux/smiSendCommand $SMI_STATE START_PROCESSES/CONFIG=DEFAULT
      break
  fi
done

while [ TRUE ]
do
  state=`/ecs/ECS/Linux/smiGetState $SMI_STATE`
  index=`echo \`expr index "$state" /\``
  let index-=1
  state=`echo ${state:0:$index}`
  if [[ "$state" == "STARTED" ]]
      then
      /opt/smi/linux/smiSendCommand $SMI_STATE START_DATA_TAKING
      break
  fi
done


#/opt/smi/linux/smiSendCommand $SMI_STATE STOP_DATA_TAKING
#while [[ "$state" == "$prev_state" ]]
#  do
#  sleep 1
#  state=`/ecs/ECS/Linux/smiGetState $SMI_STATE`
#done
#prev_state=$state    
#/opt/smi/linux/smiSendCommand $SMI_STATE UNLOCK_PARAMETERS
#while [[ "$state" == "$prev_state" ]]
#  do
#  sleep 1
#  state=`/ecs/ECS/Linux/smiGetState $SMI_STATE`
#done
#prev_state=$state    
#/opt/smi/linux/smiSendCommand $SMI_STATE DISCONNECT
