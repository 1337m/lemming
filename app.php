<?php

require __DIR__ . '/vendor/autoload.php';

// Establish connection to Discord.
$connection = new \Lemming\Discord\Connection();
$discord = $connection->getStream();

// Listen for events on Discord.
$discord->on('ready', function (\Discord\Discord $discord) {
    echo 'Bot is ready!', PHP_EOL;

    // Listen for messages.
    $discord->on('message', function ($message, \Discord\Discord $discord) {
        echo "{$message->author->username}: {$message->content}", PHP_EOL;
    });
});

// Run the bot constantly.
$discord->run();
