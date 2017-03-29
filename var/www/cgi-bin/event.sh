read rawdatadir</srsconfig/rawdatadir.txt
read rawdatafile</srsconfig/rawdatafile.txt
var=$(/date/monitoring/Linux/eventDump $rawdatadir/$rawdatafile | grep nbInRun | tail -1 | awk -F' ' '{print $2}' | cut -c 9-)
echo $var
