<?php

namespace Lemming\System;

use Discord\Discord;
use Discord\DiscordCommandClient;
use Lemming\Discord\Connection;

class Application
{
    /**
     * Placeholder for the configuration files.
     *
     * @var array
     */
    protected $configuration = [];

    /**
     * Placeholder for the Discord connection.
     *
     * @var Discord
     */
    public $discord;

    /**
     * Placeholder for the translation files.
     *
     * @var array
     */
    protected $translation = [];

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this
            ->loadConfiguration()
            ->loadTranslations()
            ->setupConnection();

        $_SERVER['LEMMING_APP'] = $this;
    }

    /**
     * Get access to the specific config value.
     *
     * @param $key string
     * @return array|mixed
     */
    public function getConfig($key = '')
    {
        return $this->keyParser($this->configuration, $key);
    }

    /**
     * Get access to the specific config value.
     *
     * @param $key string
     * @return array|mixed
     */
    public function getTranslation($key = '')
    {
        return $this->keyParser($this->translation, $key);
    }

    /**
     * Search the array, for the key stored as dot separated value.
     *
     * @param $array
     * @param $key
     * @return mixed
     */
    private function keyParser($array, $key)
    {
        $phase = $array;
        $keyPath = explode('.', $key);

        for ($i = 0; $i < count($keyPath); $i++) {
            if (!isset($phase[$keyPath[$i]])) {
                break;
            }

            $phase = $phase[$keyPath[$i]];
        }

        return $phase;
    }

    /**
     * Load the configuration into the application.
     *
     * @return $this
     */
    private function loadConfiguration()
    {
        $this->loadFiles('config', 'configuration');

        return $this;
    }

    /**
     * Load all files from the location, into the class property.
     *
     * @param string $from
     * @param string $into
     * @param string $extension
     */
    private function loadFiles($from, $into, $extension = '.php')
    {
        $files = glob(__DIR__ . '/../../' . $from . '/*' . $extension);

        foreach ($files as $file) {
            $path = realpath($file);
            $key = basename($path, '.php');

            if (!isset($this->{$into}[$key])) {
                $this->{$into}[$key] = require $path;
            }
        }
    }

    /**
     * Load the locale files into the application.
     *
     * @return $this
     */
    private function loadTranslations()
    {
        $this->loadFiles('locale', 'translation');

        return $this;
    }

    /**
     * Run the application.
     *
     * @return mixed
     */
    public function run()
    {
        if (!env('DEBUG', false)) {
            return $this->runDiscord();
        }
    }

    /**
     * Run discord stream.
     *
     * @return mixed
     */
    private function runDiscord()
    {
        return $this->discord->run();
    }

    /**
     * Setup the connection to the discord server.
     *
     * @return $this
     */
    private function setupConnection()
    {
        $connection = new Connection();
        $this->discord = $connection->getStream();

        return $this;
    }
}