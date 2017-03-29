#!/bin/bash
source /opt/scribe/init.sh
if [ ! -f /srsconfig/scope.txt ]; then
  echo entering
  touch /srsconfig/scope.txt
  echo $$ > /srsconfig/scribe_scope_pid1
  read datafolder</srsconfig/rawdatadir.txt
  read originalrawfile</srsconfig/rawdatafile.txt
  if [ -f $datafolder/$originalrawfile ]
    then
       while :
       do
       read escope</srsconfig/eventscope.txt
       #echo "eventdumping..."
       /opt/date/monitoring/Linux/eventDump @aloneldc: -f  /srsconfig/temp.raw -n $escope >/dev/null
       sleep 10
       #echo "amore processing..."
       amoreAgent -a SRS01 -s /srsconfig/temp.raw -e $escope -c 1 >/dev/null
       sleep 10
       #source /opt/root/bin/thisroot.sh
       ###string="/var/www/cgi-bin/monitor.C(\"/srsconfig/temp_fitgem_dataTree.root\",\"$escope\")"
       ###echo $string
       #echo "root processing..."
       root -b -q '/var/www/cgi-bin/monitor.C("/srsconfig/temp_fitgem_dataTree.root")' >/dev/null 2>&1
       #echo "sleeping..."
       sleep 10
       ###root -b -q $string
       done
  fi
fi
