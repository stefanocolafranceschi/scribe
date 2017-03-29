#!/bin/bash
cp /var/www/html/histo/blank.gif /var/www/html/histo/waveforms.gif
cp /var/www/html/histo/blank.gif /var/www/html/histo/latency.gif
cp /var/www/html/histo/blank.gif /var/www/html/histo/charge.gif
rm /srsconfig/scope.txt
read uccidi1 < /srsconfig/scribe_scope_pid1
kill $uccidi1
