<?php

namespace Lemming\Discord\Exception;

class Configuration extends \Exception
{
    protected $message = 'Incorrect token has been provided.';
}