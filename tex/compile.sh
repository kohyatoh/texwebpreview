#!/bin/bash

cd `dirname $0`
make all > log.txt 2>&1
