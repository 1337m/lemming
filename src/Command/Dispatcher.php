<?php

namespace Lemming\Command;

use Discord\DiscordCommandClient;
use Discord\Parts\Channel\Message;

class Dispatcher
{
    /**
     * Placeholder for Discord client.
     *
     * @var DiscordCommandClient
     */
    protected $discord;

    public function __construct(DiscordCommandClient $discord)
    {
        $this->discord = $discord;
    }

    /**
     * Register new command.
     *
     * @param $command
     * @param $worker
     * @param array $options
     * @return $this
     */
    public function register($command, $worker, $options = [])
    {
        $this->discord->registerCommand(
            $command,
            function (Message $message, $params = null) use ($worker) {
                $action = new $worker($message, $params);

                return $action->fire();
            },
            $options
        );

        return $this;
    }

    /**
     * Register many commands at once.
     *
     * @param array $commands
     * @return $this
     */
    public function registerAll(array $commands)
    {
        foreach ($commands as $command => $options) {
            $this->register($command, $options['action'], $options);
        }

        return $this;
    }
}