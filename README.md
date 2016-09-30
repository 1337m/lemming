# Lemming

Discord bot, for custom needs.

## Features

  - It's alive!
 
### Coming soon

  - Gif provider - This has been specked out, planned and is being implemented. 
  - Daddy Jokes filter - This has been specked out, planned and is being implemented.
  
### On our mind

  - Reminders
  - Self upgrade
  - Jokes provider
  - Wikipedia provider
  - In depth configuration

## Installation

This application is developed in PHP. Not the proudest moment of our lives, but why not?

Going with trends, we're using `composer`, to manage our dependencies, scripts and configuration.

In order to install the application and be able to use it, you will require few things:

  - Go through this detailed [Creating a discord bot & getting a token](https://github.com/reactiflux/discord-irc/wiki/Creating-a-discord-bot-&-getting-a-token) tutorial
  - PHP version `5.6` or above
  - [`composer`](https://getcomposer.org/)
  - [`git`](https://git-scm.com/)
  - Backing service (MySQL, Postgres, MongoDB, etc.)
 
If you meet the requirements above, you're almost done!

First, you may want to clone this repository.

```
git clone --depth=1 git@github.com:1337m/lemming.git
```

**Note**, we've added an extra parameter `--depth=1`, which is totally optional. It simply tells `github`:
`Yeah, I want that! But I dont't really care for the history of this software... Just get me what I want.`

Once you succeed to clone the repository, you may enter the directory. Typically, it would be:

```
cd lemming
```

Inside the directory, you may find a lot of useless stuff. 
You probably don't need to know what's going on in here...
However, if you do, you're awesome and be sure, to visit the Contributing section of this `README` file.

You will need, to give the bot some information, so it knows how to human. Pretend at least.

The application, expects you to store your information in the `.env` file. It's the easiest solution, 
to have a desired setup on different environments.

Our `.env` file, looks like this:

```
DISCORD_API_TOKEN="TOP_SECRET_API_TOKEN"
LANG="en_US.utf-8"
```

Most important are:

  - `DISCORD_API_TOKEN` - Refer to the application, you created on Discord.
 
Once you have configured the environment variables to meet your needs, install the dependencies with composer.

```
composer install
```

We're done now. That was easy, right?

Why don't you go ahead and run the application?

```
composer run
```

### TL;DR

Lazy? You... I like you. Here:

```
git clone --depth=1 git@github.com:1337m/lemming.git
cd lemming
touch .env
echo 'DISCORD_API_TOKEN="TOP_SECRET_API_TOKEN"' >> .env # Make sure to use a real token...
echo 'LANG="en_US.utf-8"' >> .env
composer install
composer run
```

## Commands

This list, shall grow in time...

```
!hello - This greet the bot.
!help - This will generate the list of commands.
!gif [set of key words] - This will look for any GIF maches and post int on to the channel.
```

## Testing

We love TDD. Testing is love. We use this great php tool, called `phpunit` to configure our tests.

These are mostly ready, so you can have a look at running the command below:

```
composer test
```

## Contributing

You're amazing. We like amazing. The idea of Open Source, is to make things better, by using different/fresh 
set of eyes. If you:

  - found a bug which you know how to fix
  - found a spelling mistake
  - are urged to add new translation or a new feature
  - want to fix a previously reported issue
 
Please, feel free to do so! But to make everybody's life easier, we'd like you to follow some path.
 
  1. Create/Comment an issue - Would be nice, to know what's going on. 
  Perhaps, it'd help by stopping one of us to work on the same issue?
 
  1. Fork out - Make your own copy of the repository. You may not necessarily have a write permission for this one...
 
  1. Run the tests before you start coding! - Make sure, it wasn't you, who broke something in the code. 
  Run the tests, if everything is in order, continue.
 
  1. Make your own tests - It's a good idea, to follow TDD pattern. Write a test, make sure it fails, then fix the 
  code to make the test success. Either way, Make some tests :D
 
  1. Be amazing. Be great. Be yourself. Be a developer. - Code your way to the top.
 
  1. Create a `Pull Request` - We'll make sure, to review your code. Give you feedback, 
  ask questions or discuss solutions. Don't be offended! Feel privileged. We're all here to learn. 
  We may learn something from you, which we hope for, and you may learn something from us, 
  which would make us very happy. Feel free, to disagree with something, but try to reason the disagreement.
 
  1. Have a cookie! - Every work deserves a reward. Although, we'd love to give you cookie, 
  you may need to sort this on your own. Internet is great, but it has some limitations.

## Plugins

Lemming has a nice and easy support for plugins, using composer!

### Installing plugins

Well, it's very simple! For the sake of documentation, I'll be referencing one of our official plugins
[Lemming Giphy](https://github.com/1337m/lemming-giphy).

By default, the installation is only one command! Check it out:

```
composer require 1337m/lemming-giphy
```

The plugin should be installed in it's latest version. Now it's time to reference it!
You should be having a `config/commands.php` file. Open it up, and somewhere in the middle of an array, 
add new key (command to be recorded) and array of options including required action.
After all, it should look something like this:

```php
<?php

return [
    'gif' => [
        'action' => Lemming\Giphy\Command::class,
        'aliases' => ['giphy', 'moving-picture'],
        'description' => 'Search the big database, of GIFs, and return the matching result.',
        'usage' => '/gif [phrase]',
    ],
];

```

Sometimes, the plugin developers may give you instructions on how to do so. These are amazing developers.
The plugin above, has a nice `README` file associated, explaining the steps you may need to take, 
in order to make the plugin work. Be sure to check it out!


### Developing plugins

If you know at least basics of PHP, you know how to write plugin for Lemming...
 - Start off with initialising composer package! Be sure to add description and some keywords.
 - Use `PSR-4`, for easier integration. 
 - Write tests! We all love tests. So should you. 
 - Publish your plugin on both GitHub and Packagist. Make it available to everyone!
 
We have created a little abstract class, you may need to use.

Here, have a nice starting point for your app:

```php
<?php

namespace MyAwesomePlugin;

use Lemming\Command\Base;

class MyAwesomeCommand extends Base
{
    public function fire()
    {
        return 'AWESOME!';
    }
}

```

Now if you reference this, in your bot:

```php
<?php

return [
    'awesome' => [
        'action' => MyAwesomePlugin\MyAwesomeCommand::class,
    ],
];

```

you will be able, to write `/awesome` in the chat and expect the bot to reply!

Bit of technicality:

`Base` class, provides both `$message` and `$params` variables.

 - `$message` is `Discord-PHP` implementation of [`Message`](https://discordphp.readme.io/docs/message) class.
 - `$params` is an array, containing any extra parameters passed with the command.

The above class, could look like this:

```php
<?php

namespace MyAwesomePlugin;

use Lemming\Command\Base;

class RandomCommand extends Base
{
    public function fire()
    {
        if (empty($this->params)) {
            return 'Nothing to pick from...';
        }
        
        shuffle($this->params);
        
        return $this->message->channel->sendMessage('Personally, I would go with: ' . $this->params[0]);
    }
}

```

Reference the new command:



```php
<?php

return [
    'random' => [
        'action' => MyAwesomePlugin\RandomCommand::class,
    ],
];

```

And test out with the discord client:

```
[user] /random Pizza Burger ChowMain Pierogi
[bot] Personally, I would go with: Pierogi
```

## Licence

Lemming is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).