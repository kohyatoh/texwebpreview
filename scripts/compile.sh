#!/bin/bash

BASEDIR=`dirname $0`/..
FROM=$1
OUT=${FROM}.out

if [ -d "$FROM" ]; then
    cd $BASEDIR
    mkdir -p "$OUT"
    cp -p -r "$FROM"/* "$FROM"/.[!.]* "$OUT"
    cd "$OUT"
    make all > log.txt 2>&1
else
    exit 1
fi
