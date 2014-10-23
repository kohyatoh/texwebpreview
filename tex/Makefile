OUT := out.pdf

LOCAL_TEX := local.tex
WEB_TEX := web.tex

# put Google Docs url here (be sure to make them shared through link)
url_web := https://docs.google.com/document/d/1rcj4jeUfGwKZUbcX9iz9qeTStEu2VLnr_OxpSpuStUw/edit

ifeq ($(TEX_ENCODING),)
    TEX_ENCODING = utf-8
endif

.PHONY: $(WEB_TEX)

default: all

all: clean sync $(OUT)

$(WEB_TEX): %.tex:
	curl "$(subst edit,export,$(url_web))?format=txt" | tail -c +4 > $@
	dos2unix $@

sync: $(WEB_TEX)

clean:
	rm -f $(OUT) *.gen.*

$(OUT): $(LOCAL_TEX)
	iconv -t $(TEX_ENCODING) $< > $<.gen.tex
	latex $<.gen.tex
	dvipdfmx -o $@ $<.gen.dvi
	rm *.gen.*
