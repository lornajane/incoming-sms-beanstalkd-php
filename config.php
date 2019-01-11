<?php

$container = $app->getContainer();

$container['queue'] = function ($container) {
    return new \Pheanstalk\Pheanstalk(getenv('QUEUE_HOST'), getenv('QUEUE_PORT'));
};

