#!/bin/bash

DOCS_VERSIONS=(
    1.x
    2.x
)

for v in "${DOCS_VERSIONS[@]}"; do
    if [ -d "resources/filament/$v" ]; then
        echo "Pulling latest documentation updates for $v..."
        (cd resources/filament/$v && git pull)
    else
        echo "Cloning $v..."
        git clone --single-branch --branch "$v" git@github.com:laravel-filament/filament.git "resources/filament/$v"
    fi;
done
