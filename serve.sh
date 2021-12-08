#! /bin/bash

CONFIG_FILE="_config.yml"

getSubPath() {
    sed -nE "s#sub_path: ['\"]([^'\"]*)['\"]#\1#p" "$CONFIG_FILE"
}

setSubPath() {
    sed -i "s#sub_path: .*#sub_path: '$1'#" "$CONFIG_FILE"
}

serve() {
	bundle exec jekyll serve --livereload
}

_exit() {
    echo $@
    exit
}

if (( $# > 0 ))
then
    "$@"
    exit
fi

initialSubPath=$(getSubPath) || _exit 'Could not find initial subpath.'
setSubPath && \
serve
setSubPath "$initialSubPath" || _exit 'Could not set subpath: ' "$initialSubPath"