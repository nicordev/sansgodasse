install: ## 
	bundle install
	bundle exec jekyll build

serve: ## 
	./please.sh serve

build: ## baseurl=valueHere
	./please.sh build $(baseurl)

deploy: ## username=valueHere host=valueHere directory=valueHere
	./please.sh deploy $(username) $(host) $(directory)

.DEFAULT_GOAL := help
help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help deploy build serve install