<?php

/**
 * Build the path to the execution folder and beyond.
 *
 * @param null $addition
 * @return string
 */
function rootPath($addition = null)
{
    if ($addition && strlen($addition) > 0 && substr($addition, 0, 1) !== '/') {
        $addition = '/' . $addition;
    }

    return dirname($_SERVER['PHP_SELF']) . $addition;
}
