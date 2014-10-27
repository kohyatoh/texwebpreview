#!/bin/bash

mkdir `dirname $0`/out
cd `dirname $0`/out
cp -p ../* .
make all > log.txt 2>&1
