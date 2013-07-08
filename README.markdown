GitHub Browser using Composer.The first step to use browser is to download composer:

$ curl -s http://getcomposer.org/installer | php

Then we have to install our dependencies using:

$ php composer.phar install

Now we can use autoloader from Composer by:

{
    "require": {
        "knplabs/github-api": "*"
    },
    "minimum-stability": "dev"
}

Likes-Dislikes button:
For the use of buttons, you must use a database dump
 which is located in the root directory.
