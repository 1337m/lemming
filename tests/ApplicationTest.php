<?php

use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    /**
     * @expectedException \Lemming\System\Exception\NotRunning
     */
    public function testNotRunning()
    {
        trans('TESTING.should.fail');
    }

    /**
     * Test the configuration loader.
     */
    public function testCreatingApplication()
    {
        $_SERVER['DEBUG'] = true;

        $this->assertArrayNotHasKey('LEMMING_APP', $_SERVER);

        $app = new \Lemming\System\Application();

        $app->run();

        $this->assertArrayHasKey('LEMMING_APP', $_SERVER);
    }

    /**
     * Test the configuration loader.
     */
    public function testLoadConfiguration()
    {
        $_SERVER['DEBUG'] = true;

        $this->assertArrayNotHasKey('LEMMING_APP', $_SERVER);

        $app = new \Lemming\System\Application();

        $app->run();

        $this->assertArrayHasKey('commands', $app->getConfig());
    }

    /**
     * Test the configuration loader.
     */
    public function testLoadTranslations()
    {
        $_SERVER['DEBUG'] = true;

        $this->assertArrayNotHasKey('LEMMING_APP', $_SERVER);

        $app = new \Lemming\System\Application();

        $app->run();

        $this->assertArrayHasKey('en', $app->getTranslation());
    }

    /**
     * Check if discord is being created.
     */
    public function testDiscordCreation()
    {
        $_SERVER['DEBUG'] = true;

        $this->assertArrayNotHasKey('LEMMING_APP', $_SERVER);

        $app = new \Lemming\System\Application();

        $app->run();
        $this->assertNotNull($app->discord);
    }
}
