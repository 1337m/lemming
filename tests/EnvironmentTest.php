<?php

use PHPUnit\Framework\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * Test, if the environment variable falls back to the default value.
     */
    public function testDefaultFallback()
    {
        $rand = rand(0, 9999);
        $envVar = env('JUST_TESTING_THIS_SHOULD_NEVER_EXIST', $rand);

        $this->assertNotNull($envVar);
        $this->assertEquals($rand, $envVar);
    }

    /**
     * Test if we're able to obtain real environment variable.
     */
    public function testRealEnvironmentVariable()
    {
        $envVar = env('PATH');

        $this->assertNotNull($envVar);
    }
}
