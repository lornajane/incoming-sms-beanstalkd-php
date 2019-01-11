<?php

require __DIR__ . '/../vendor/autoload.php';

// pre-app setup, inc. loading env vars on development platforms
require __DIR__ . '/../setup.php';

$app = new Slim\App();

// configure queue
require __DIR__ . '/../config.php';

$app->get('/webhooks/inbound-sms', function ($request, $response, $args) {
    $params = $request->getQueryParams();

    $data = ["event" => "message", "text" => $params['text'], "receivedAt" => date("U")];
    error_log(print_r($data, true));
    $this->queue->useTube('sms')
        ->put(json_encode($data));
});

$app->run();
