<?php

namespace Lemming\Discord\Exception;

class Connection extends \Exception
{
    protected $message = 'Could not establish connection with the Discord servers.';
}