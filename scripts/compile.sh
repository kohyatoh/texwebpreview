#!/bin/bash

BASEDIR=`dirname $0`/..
FROM=$1
OUT=${FROM}.out

cd $BASEDIR
mkdir -p $OUT
cp -p -r $FROM/* $FROM/.[!.]* $OUT
cd $OUT
make all > log.txt 2>&1
