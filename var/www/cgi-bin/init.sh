#DATE
export DATE_SITE=/dateSite
source /date/setup.sh
export DATE_ROLE_NAME=aloneldc

#AMORE
export AMORE=/opt/amore
export AMORE_SITE=~/amoreSite
export LD_LIBRARY_PATH=${AMORE_SITE}/lib:$LD_LIBRARY_PATH
export LD_LIBRARY_PATH=${AMORE}/lib:$LD_LIBRARY_PATH
export PATH=${AMORE}/bin:$PATH
export DATE_RUN_TYPE=PHYSICS
export DATE_RUN_NUMBER=1
export AMORE_CDB_URI=local:///local/cdb
source amoreSetup $AMORE_SITE/AMORE.params
export AMORESRS=/opt/scribe/amoreSRS

export LD_LIBRARY_PATH=$LD_LIBRARY_PATH:.
