#!/bin/bash

BASEDIR=`dirname $0`/..
NAME=$1
LOG=$2
IN=tex/${NAME}
OUT=out/${NAME}

if [ -d "$IN" ]; then
  {
    cd $BASEDIR
    rm -rf "$OUT"
    cp -p -r "$IN" "$OUT"
    cd "$OUT"
    make all
  } > $LOG 2>&1
else
    echo "not found" > $LOG
    exit 1
fi
