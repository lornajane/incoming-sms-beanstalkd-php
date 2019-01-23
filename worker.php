<?php

require __DIR__ . '/vendor/autoload.php';

// pre-app setup, inc. loading env vars on development platforms
require __DIR__ . '/setup.php';

// configure queue
require __DIR__ . '/worker-config.php';

$queue->watch("sms");

while($job = $queue->reserve()) {
    $received = json_decode($job->getData(), true);
    // a bit of output to keep things interesting for demo
    error_log($received['text']);

    // delegate to the class that will do the work
    $worker->process($received);

    // $queue->release($job, null, 1); // useful for testing
    $queue->delete($job);
}
