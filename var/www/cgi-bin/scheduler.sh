#!/bin/bash
source /var/www/cgi-bin/init.sh
if [ -f "/srsconfig/amoreautoon.txt" ]; then

pidfile1=/srsconfig/run1_pid
pidfile2=/srsconfig/run2_pid
pidfile3=/srsconfig/run3_pid
pidfile4=/srsconfig/run4_pid

if [ -f "/srsconfig/amorekill1.txt" ]; then
   ps -ef | grep SRS01 | grep -v grep | awk '{print $2}' | xargs kill -9
   rm /srsconfig/amorekill1.txt
   rm /tmp/SRS01.pid
   rm /srsconfig/run1_dump
fi
if [ -f "/srsconfig/amorekill2.txt" ]; then
   ps -ef | grep SRS02 | grep -v grep | awk '{print $2}' | xargs kill -9
   rm /srsconfig/amorekill2.txt
   rm /tmp/SRS02.pid
   rm /srsconfig/run2_dump
fi
if [ -f "/srsconfig/amorekill3.txt" ]; then
   ps -ef | grep SRS03 | grep -v grep | awk '{print $2}' | xargs kill -9
   rm /srsconfig/amorekill3.txt
   rm /tmp/SRS03.pid
   rm /srsconfig/run3_dump
fi
if [ -f "/srsconfig/amorekill4.txt" ]; then
   ps -ef | grep SRS04 | grep -v grep | awk '{print $2}' | xargs kill -9
   rm /srsconfig/amorekill4.txt
   rm /tmp/SRS04.pid
   rm /srsconfig/run4_dump
fi
if [ -f "/srsconfig/amorekill5.txt" ]; then
   ps -ef | grep SRS05 | grep -v grep | awk '{print $2}' | xargs kill -9
   rm /srsconfig/amorekill5.txt
   rm /tmp/SRS05.pid
   rm /srsconfig/run5_dump
fi
if [ -f "/srsconfig/amorekill6.txt" ]; then
   ps -ef | grep SRS06 | grep -v grep | awk '{print $2}' | xargs kill -9
   rm /srsconfig/amorekill6.txt
   rm /tmp/SRS06.pid
   rm /srsconfig/run6_dump
fi

if [ -f "$pidfile1" ] && kill -0 `cat $pidfile1` 2>/dev/null; then
    #echo run1 still running
    exit 1
else
   /var/www/cgi-bin/run1.sh &
fi  
#sleep 10
#if [ -f "$pidfile2" ] && kill -0 `cat $pidfile2` 2>/dev/null; then
#    #echo run2 still running
#    exit 1
#else
#   /var/www/cgi-bin/run2.sh &
#fi
#sleep 10
#if [ -f "$pidfile3" ] && kill -0 `cat $pidfile3` 2>/dev/null; then
#    #echo run3 still running
#    exit 1
#else
#   /var/www/cgi-bin/run3.sh &
#fi
#if [ -f "$pidfile4" ] && kill -0 `cat $pidfile4` 2>/dev/null; then
#    #echo run4 still running
#    exit 1
#else
#   /var/www/cgi-bin/run4.sh &
#fi

# RESET
read rawdatadir </srsconfig/rawdatadir.txt
if [ ! -d "$rawdatadir/todo" ]; then
  mkdir $rawdatadir/todo
  chmod 777 $rawdatadir/todo
fi

#Refreshing runs to be analized
#while :
#do
#      if [ -f $runfile ]; then
#         read run <$runfile
#         if [ ! -f /srsconfig/todo/$run ]; then
#            echo " " > /srsconfig/todo/$run
#            echo Adding run $run to TODO list
#         fi
#         rm $runfile
#         echo run $run is already in the TODO list
#      fi
#   sleep 1
#done
else
   /var/www/cgi-bin/amoreanalysis_kill.sh
fi
