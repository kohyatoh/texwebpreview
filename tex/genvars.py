#!/usr/bin/env python
import sys

urls = {}
for line in sys.stdin:
    name, url = line.strip().split(',')
    urls[name] = url
print("WEB_TEX = %s" % " ".join(urls.keys()))
for name, url in urls.items():
    print("url_%s = %s" % (name, url))
