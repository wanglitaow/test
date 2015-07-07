<?php
$G_CONFIG['mq']['sPHPConsumer'] = '/data1/env/php-fpm/bin/php /data1/www/index/launcher_dev.php /mq/consumer/ -channel '.CHANNEL.' -cloudname '.CLOUDNAME.'';
$G_CONFIG['mq']['sSMSConsumer'] = '/data1/env/php-fpm/bin/php /data1/www/index/launcher_dev.php /rabbitmq/send/ -channel service-sms -cloudname '.CLOUDNAME.'';
