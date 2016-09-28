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

## Licence

Lemming is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).