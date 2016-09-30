<?php

namespace Lemming\Command;

use Discord\Parts\Channel\Message;

abstract class Base
{
    /**
     * @var Message
     */
    protected $message;

    /**
     * Additional parameters.
     *
     * @var
     */
    protected $params;

    /**
     * Base constructor.
     *
     * @param Message $message
     * @param $params
     */
    public function __construct(Message $message, $params)
    {
        $this->message = $message;
        $this->params = $params;
    }

    /**
     * Execute the command.
     */
    abstract public function fire();
}