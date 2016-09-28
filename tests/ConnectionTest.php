<?php

use PHPUnit\Framework\TestCase;

use Lemming\Discord;

class ConnectionTest extends TestCase
{
    /**
     * Test, if the connection comes back null.
     *
     * @expectedException Lemming\Discord\Exception\Configuration
     */
    public function testFailedConnection()
    {
        $discord = new Discord\Connection(false);

        $this->assertNull($discord->getStream());
    }

    /**
     * Test if the connection has been successful.
     */
    public function testSuccessfulConnection()
    {
        $discord = new Discord\Connection();

        $this->assertNotNull($discord->getStream());
    }

    /**
     * Attempt disconnection from the Discord server.
     */
    public function testDisconnecting()
    {
        $discord = new Discord\Connection();
        $discord->disconnect();

        $this->assertNull($discord->getStream());
    }
}
