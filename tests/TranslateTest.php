<?php

use PHPUnit\Framework\TestCase;

class TranslateTest extends TestCase
{
    protected $app;

    public function setUp()
    {
        $_SERVER['DEBUG'] = true;

        $this->app = new \Lemming\System\Application();

        $this->app->run();
    }

    /**
     * This test, should translate very simple string.
     */
    public function testTranslation()
    {
        $translation = trans('general.ok', 'en');

        $this->assertEquals('Ok', $translation);
    }

    /**
     * In this test, we'd like to use custom locale.
     */
    public function testCustomLocaleTranslation()
    {
        $translation = trans('general.yes', 'pl');

        $this->assertEquals('Tak', $translation);
    }

    /**
     * In this test, we'd like to check the ability to format string.
     */
    public function testTranslationFormatting()
    {
        $translation = trans('general.greet_user', 'en', 'Tester');

        $this->assertEquals('Hello, Tester!', $translation);
    }

    /**
     * This test should throw an exception rather than provide the translation.
     * @expectedException Lemming\Helper\Exception\TranslationNotFound
     */
    public function testMissingTranslation()
    {
        trans('1337.never.gonna.give.you.up', 'en');
    }
}
