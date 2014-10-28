#!/bin/bash

BASEDIR=`dirname $0`/..

cd $BASEDIR
mkdir -p out
cp -p -r tex/* tex/.[!.]* out
cd out
make all > log.txt 2>&1
