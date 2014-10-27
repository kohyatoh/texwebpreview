OUT := out.pdf
LOCAL_TEX := local.tex

-include vars.mak

ifeq ($(TEX_ENCODING),)
    TEX_ENCODING = utf-8
endif

.PHONY: $(WEB_TEX)

default: all

all: clean sync $(OUT)

vars.mak: urls.csv
	./genvars.py < $< > $@

$(WEB_TEX): %.tex:
	curl "$(subst edit,export,$(url_$@))?format=txt" | tail -c +4 > $@
	dos2unix $@

sync: $(WEB_TEX)

clean:
	rm -f $(OUT) *.gen.* $(VARS)

$(OUT): $(LOCAL_TEX)
	iconv -t $(TEX_ENCODING) $< > $<.gen.tex
	latex $<.gen.tex < /dev/null
	dvipdfmx -o $@ $<.gen.dvi
	rm *.gen.*
