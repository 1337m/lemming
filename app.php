<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \Lemming\System\Application();

// Listen for events on Discord.
$app->discord->on('ready', function (\Discord\Discord $discord) {
    echo trans('general.started'), PHP_EOL;

    // Listen for messages.
    $discord->on('message', function ($message, \Discord\Discord $discord) {
        echo "{$message->author->username}: {$message->content}", PHP_EOL;
    });
});

// Run the bot constantly.
$app->run();
