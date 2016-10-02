<?php

namespace Lemming\System\Exception;

class NotRunning extends \Exception
{
    protected $message = 'Application is not running.';
}