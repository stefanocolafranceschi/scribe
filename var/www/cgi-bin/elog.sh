#!/bin/bash
#echo "ciao" /srsconfig/registers/prova
#zip -r /srsconfig/config.zip /srsconfig/registers
elog -v -h srspc -p 8080 -l fit -a Author=SRSMachine -a Type=Configuration -a Category=General -a Subject=Automatic "message ciao"
