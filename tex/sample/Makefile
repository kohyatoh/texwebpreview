OUT := out.pdf
LOCAL_TEX := local.tex

ifeq ($(TEX_ENCODING),)
    TEX_ENCODING = utf-8
endif

.PHONY: default all sync clean

default: all

all: clean sync $(OUT)

sync:
	../../scripts/download.py < urls.csv

clean:
	rm -f $(OUT) $(WEB_TEX) *.gen.* vars.mk

$(OUT): $(LOCAL_TEX)
	iconv -t $(TEX_ENCODING) $< > $<.gen.tex
	latex $<.gen.tex < /dev/null
	dvipdfmx -o $@ $<.gen.dvi
	rm *.gen.*
