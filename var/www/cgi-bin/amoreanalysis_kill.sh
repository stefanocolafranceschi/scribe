ps -ef | grep amoreAgent | grep -v grep | awk '{print $2}' | xargs kill -9
ps -ef | grep run1.sh | grep -v grep | awk '{print $2}' | xargs kill -9
#ps -ef | grep run2.sh | grep -v grep | awk '{print $2}' | xargs kill -9
#ps -ef | grep run3.sh | grep -v grep | awk '{print $2}' | xargs kill -9
#ps -ef | grep run4.sh | grep -v grep | awk '{print $2}' | xargs kill -9
