<?php

/**
 * Attempt to load the .env file.
 *
 * @param null $location
 */
function loadDotEnv($location = null)
{
    if ($location) {
        try {
            $dotenv = new Dotenv\Dotenv($location);
            $dotenv->load();
        } catch (\Dotenv\Exception\InvalidPathException $e) {
            //
        }
    }
}

/**
 * Load the environment variables from .env file.
 */
if (isset($_SERVER['DEBUG']) && $_SERVER['DEBUG'] == 'true') {
    loadDotEnv('./');
} else {
    loadDotEnv(dirname($_SERVER['PHP_SELF']));
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
