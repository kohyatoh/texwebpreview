#!/usr/bin/env python

import sys
import urllib2

def download(url):
    r = urllib2.urlopen(url)
    content = r.read().replace("\r", "")[3:]
    r.close()
    return content

for line in sys.stdin:
    name, url = line.strip().split(',')
    if url.endswith("/edit"):
        url = url[0:-len("/edit")]
    url = url + "/export?format=txt"
    print >>sys.stderr, "downloading %s: %s" % (name, url)
    with open(name, "w") as f:
        print >>f, download(url)
