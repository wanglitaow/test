#!/bin/bash

if [ -n "$1" ] && [ -n "$2" ] && [ -n "$3" ]; then
	phpdir=$(cd "$(dirname "$0")"; pwd)
	while(true);
	do
		/data1/env/php-fpm/bin/php $phpdir/launcher_dev.php /mq/dispatch/ -bid "$1" -channel "$2" -cloudname "$3"
	done
else
	echo Usage: BIN '$bid' '$channel' '$cloudname'
fi
