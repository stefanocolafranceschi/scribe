echo "<ul class=\"tab\">"
ls -1 /mnt/nas1/cmsgem/*.pcinfo | xargs -I % sh -c "echo '<li><a href=\"#\" class=\"tablinks\" onclick=\"openCity(event, '; echo \'%\' ; echo ')\">%</a></li>'  "
echo "</ul>"
ls -1 /mnt/nas1/cmsgem/*.pcinfo | xargs -I % sh -c "echo '<div id=\"%\" class=\"tabcontent\">' ; cat %; echo \"</div>\" "
