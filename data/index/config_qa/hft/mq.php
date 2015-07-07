<?php
$G_CONFIG['mq']['sPHPConsumer'] = '/data1/dev/php-fpm/bin/php /data1/www/index/launcher_qa.php /mq/consumer/ -channel ' . CHANNEL . ' -cloudname ' . CLOUDNAME;
