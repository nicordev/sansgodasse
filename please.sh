#! /bin/bash

readonly SCRIPT_NAME=$(basename $BASH_SOURCE)
readonly CONFIG_FILE="_config.yml"

_getBaseUrl() {
    sed -nE "s#^baseurl: ['\"]([^'\"]*)['\"].*#\1#p" "$CONFIG_FILE"
}

_setBaseUrl() {
    sed -i "s#baseurl: .*#baseurl: '$1'#" "$CONFIG_FILE"
}

build() {
    if (( $# < 1 ))
    then
        echo -e "${SCRIPT_NAME} ${FUNCNAME[0]} \033[33mbaseUrlHere\033[0m"
        read -p "
    use empty base url? [Y/n] " answer

        if [[ $answer =~ ^[nN] ]]
        then
            _exit 'Build canceled. See ya!'
        fi
    fi

    _setBaseUrl "$1" && \
    JEKYLL_ENV=production bundle exec jekyll build
}

serve() {
    _setBaseUrl && \
    bundle exec jekyll serve --livereload
}

deploy() {
    if (( $# < 1 ))
    then
        echo -e "${SCRIPT_NAME} ${FUNCNAME[0]} \033[33musername remoteHost remoteDirectory\033[0m"

        return
    fi

    rsync --recursive --delete _site/ "$1@$2:$3"
}

_exit() {
    echo $@
    exit
}

_handleExit() {
    _setBaseUrl "$INITIAL_BASE_URL"
}

# List all functions that do not begin with an underscore _
_listAvailableFunctions() {
    cat $0 | grep -E '^[a-z]+[a-zA-Z0-9_]*\(\) \{$' | sed 's#() {$##' | sort
}

if [ $# -eq 0 ]; then
    _listAvailableFunctions
    exit
fi

trap _handleExit exit err

readonly INITIAL_BASE_URL=$(_getBaseUrl) || _exit 'Could not find initial subpath.'
"$@"