<?php

namespace Lemming\Discord;

use Discord\DiscordCommandClient;

class Connection
{
    /**
     * Hold the stream connection to Discord.
     *
     * @var null
     */
    private $stream = null;

    /**
     * Establish new connection to the Discord server.
     *
     * @param string $token
     * @throws Exception\Configuration
     */
    public function __construct($token = null)
    {
        if (is_null($token) && isset($_ENV['DISCORD_API_TOKEN'])) {
            $token = $_ENV['DISCORD_API_TOKEN'];
        }

        if (empty($token) || !$token) {
            throw new Exception\Configuration();
        }

        // Set the stream to be a valid connection.
        $this->stream = new DiscordCommandClient([
            'token' => $token,
            'prefix' => '/',
        ]);
    }

    public function disconnect()
    {
        $this->stream = null;

        return $this;
    }

    /**
     * Obtain the stream connection.
     *
     * @return null
     */
    public function getStream()
    {
        return $this->stream;
    }
}

