<?php

// Load the environment variables.
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();

/**
 * Either load or set the default environment variable.
 *
 * @param $key
 * @param null $default
 * @return string
 */
function env($key, $default = null)
{
    if (!isset($_SERVER[$key]) || $_SERVER[$key] == '') {
        $_SERVER[$key] = $default;
    }

    return $_SERVER[$key];
}