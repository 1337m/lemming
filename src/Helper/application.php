<?php

/**
 * Easy access to the application.
 *
 * @return mixed
 * @throws \Lemming\System\Exception\NotRunning
 */
function app()
{
    if (!isset($_SERVER['LEMMING_APP'])) {
        throw new \Lemming\System\Exception\NotRunning();
    }

    return $_SERVER['LEMMING_APP'];
}