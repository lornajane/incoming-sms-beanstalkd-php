<?php

// rather low-tech requiring of the worker class file since it won't be autoloaded
require "src/Worker.php";
require "src/SecureWorker.php";

// beanstalk connection
$queue = new \Pheanstalk\Pheanstalk(getenv('QUEUE_HOST'), getenv('QUEUE_PORT'));

// worker object
$options = [
    "outfile" => "./messages.txt"
];

$creds = [
    "signature_secret" => getenv('NEXMO_API_SIGNATURE_SECRET'),
    "algorithm" => "sha256"
];

// $worker = new Worker($options);
$worker = new SecureWorker($options, $creds);
