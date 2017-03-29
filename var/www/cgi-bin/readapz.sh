if [ "$#" -eq 6 ]; then
for i in `seq 0 127`;
do
   hex=$(printf "%.2X\n" $i)
   subadr=$(printf "%02d\n" $6)
   /var/www/cgi-bin/read_SRS.out $1.$2.$3.$4 $5 $6 $hex > /srsconfig/registers/$1$2$3$4$5$subadr$i


   if (( $i <= 9 )) ; then
      string=8000000
   elif (( $i <= 99 )) ; then
      string=800000
   else
      string=80000
   fi
   /var/www/cgi-bin/read_SRS.out $1.$2.$3.$4 $5 $6 800000$hex > /srsconfig/registers/$1$2$3$4$5$subadr$string$i
done
fi
