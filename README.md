# Blog
=============

## Description

A Symfony 4 project in dev environment resulting from WCS's "symfony_parcours".
This one is based on a blog with some CRUD and entities.

## Technos

PHP ^7.2 / Symfony 4.1.* / Doctrine / MYSQL / Webpack.

## Require
    
    * Php ^7.2 or higher            http://php.net/downloads.php
    * MySQL                         https://dev.mysql.com/downloads/installer/
    * Composer                      https://getcomposer.org/download/
    * npm ^5.6 or higher            https://docs.npmjs.com/getting-started/installing-node#linux                  

## Download project

Go to your working folder

    * Clone project -> git clone <url>.
    * 'composer install' / 'composer update'.
    * Update your .env file with your default configuration.
    * 'bin/console d:d:c'.
    * 'bin/console make:migration'.
    * 'bin/console doctrine:migrations:migrate'.
    * 'bin/console doctrine:fixtures:load.
    * 'bin/console s:r'.
    * Go on localhost:8000/.

- 26/09/2018 - V.1.3.0