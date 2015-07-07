#!/bin/bash

if [ -n "$1" ] && [ -n "$2" ]; then
    phpdir=$(cd "$(dirname "$0")"; pwd)
    while(true);
    do
        /data1/env/php-fpm/bin/php $phpdir/launcher_anhouse.php /mq/dispatch/ -bid "$1" -channel "$2"
    done
else
    echo Usage: BIN '$bid' '$channel'
fi
