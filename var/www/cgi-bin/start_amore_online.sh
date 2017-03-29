#STARTING AMORE AGEND TO PROCESS THE RUN
amoreAgent -a SRS01 -s @aloneldc: -e 1&>/dev/null
echo $! > /srsconfig/amore_online_pid1
sleep 10
#Opening AMORE GUI
amore -d SRS -m SRSUI&>/dev/null
echo $! > /srsconfig/amore_online_pid2
