#!/bin/bash
run=$1
read howmany </srsconfig/amoremultifiles.txt
read events </srsconfig/amoreeventxfile.txt
read rawdatadir </srsconfig/amoreeventxfile.txt

read rawdatadir </srsconfig/rawdatadir.txt
wheretostart=0

         COUNTER=0
         while [  $COUNTER -lt $howmany ]; do
             echo $wheretostart > $rawdatadir/todo/$run
             chmod 777 $rawdatadir/todo/$run
             echo run=$run wheretostart=$wheretostart counter=$COUNTER
             let run=run+1
             let wheretostart=wheretostart+events
             let COUNTER=COUNTER+1
         done
