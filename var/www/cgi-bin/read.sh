if [ "$#" -eq 5 ]; then
for i in `seq 0 31`;
do
   hex=$(printf "%.2X\n" $i)
   /var/www/cgi-bin/read_SRS.out $1.$2.$3.$4 $5 0 $hex > /srsconfig/registers/$1$2$3$4$50$hex
   #echo "ciao"  > /srsconfig/registers/$1$2$3$4$50$hex
   #echo $1$2$3$4$5$hex > /srsconfig/registers/prova
done
fi

if [ "$#" -eq 6 ]; then
for i in `seq 0 31`;
do
   hex=$(printf "%.2X\n" $i)
   /var/www/cgi-bin/read_SRS.out $1.$2.$3.$4 $5 $6 $hex > /srsconfig/registers/$1$2$3$4$5$6$i
done
fi
#zip -r /srsconfig/config.zip /srsconfig/registers > /dev/null 2>&1
#elog -v -h srspc -p 8080 -l fit -a Author=''SRSMachine'' -a Type=''Configuration'' -a Category=''General'' -a Subject="Automatic Configuration" "The configuration is available here" -f /srsconfig/config.zip
