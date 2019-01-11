<?php

// PhpDotEnv is a development-only dependency, on production we'll be using
// actual environment variables
if (class_exists('Dotenv\Dotenv')) {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
}


