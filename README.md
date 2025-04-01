<p align="center">
    <h1 align="center">Task-Syncer Project Template</h1>
</p>

An app made for synchronizing tasks between different task systems.

It contains realizations for three task systems: notion, gitlab and habitica. You can add more of the systems you
need using config files.

DIRECTORY STRUCTURE
-------------------

      bin/                contains main console script
      config/             contains application configurations

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 8.3

INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Install application template by running the following command:

~~~
composer create-project --prefer-dist ninlaret/task-syncer-app .
~~~

CONFIGURATION
-------------

### Database

Edit the file `config/params.php` with real data, for example:

```php
    'database' => [
        'host' => 'localhost',
        'user' => 'user',
        'password' => 'password',
        ...
    ]
```

You should add an existing database in this section.

### Synchronization settings


First you have to copy config files via commands:
~~~
mv config/params.php.dist config/params.php
mv config/systems.php.dist config/systems.php
~~~


Then you should fill up the 'mappers', 'updaters' and 'fetchers' keys in config/systems.php with your systems

'mappers' elements should be compatible with the `core\domain\TaskMapperInterface`

'updaters' elements should be compatible with the `core\domain\TaskApiUpdateInterface`

'fetchers' elements should be compatible with the `core\domain\TaskApiFetchInterface`


Then you need to edit the `syncRoutes` section in `config/params.php` file, for example:

```php
    'syncRoutes' => [
        'gitlab' => ['habitica']
    ]
```
Here it says all the tasks from gitlab will be synced habitica.

USAGE
-------------
Before first usage you should install database schema via command
~~~
php bin/console init
~~~

To sync systems from cli run the following command:
~~~
php bin/console sync
~~~
