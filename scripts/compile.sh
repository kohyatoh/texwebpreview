#!/bin/bash

BASEDIR=`dirname $0`/..
FROM=$1
LOG=$2
OUT=${FROM}.out

if [ -d "$FROM" ]; then
  {
    cd $BASEDIR
    mkdir -p "$OUT"
    cp -p -r "$FROM"/* "$FROM"/.[!.]* "$OUT"
    cd "$OUT"
    make all
  } > $LOG 2>&1
else
    echo "not found" > $LOG
    exit 1
fi
