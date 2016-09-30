<?php

/**
 * Load the environment variables from .env file.
 */
try {
    $dotenv = new Dotenv\Dotenv(dirname($_SERVER['PHP_SELF']));
    $dotenv->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
    $dotenv = new Dotenv\Dotenv(__DIR__ . '/../../');
    $dotenv->load();
}

/**
 * Load the helpers.
 */
$helpers = glob(__DIR__ . '/*.php');

foreach ($helpers as $helper) {
    $isBootstrap = strpos($helper, 'bootstrap');

    if ($isBootstrap && $isBootstrap > -1) {
        continue;
    }

    require_once $helper;
}
