<p align="center">
    <h1 align="center">Task-Syncer Project Template</h1>
</p>

A simple app made for synchronizing tasks between different task systems.

It contains realizations for three task systems: notion, gitlab and habitica and you can add more of the systems you
need.

DIRECTORY STRUCTURE
-------------------

      app/                contains system realizations
       - controller/      contains custom controller for webkooks
       - system/          contains local realizations of task systems
      config/             contains application configurations

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 8.0

INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Install application template by running the following command:

~~~
composer create-project --prefer-dist ninlaret/task-syncer-app .
~~~

If you expect to use any tasker webhooks, you have to choose a Web-accessible folder and a host with a Web-server and a
public IP.

CONFIGURATION
-------------

### Database

Edit the file `config/params.php` with real data, for example:

```php
return [
    'dbName' => 'tasker',
    'dbUser' => 'user',
    'dbPassword' => 'password',
    ...
];
```

You should add an existing database in this section.

### Synchronization settings

First you have to add all your systems in the `apiRealisations` section in `config/params.php` file. The realization of
any API should be compatible with the `core\system\ApiSystem` class.
All the tokens may also be put in `config/params.php`.

Then you need to edit the `syncParams` section in `config/cli.php` and `config/web.php` files, for example:

```php
'syncParams' => [
    'target' => [
        'gitlab' => ['notion'],
        'notion' => ['habitica'],
    ],
]
```
It says all the tasks from gitlab are synced notion, and all the tasks from notion are synced with habitica.

USAGE
-------------

To sync systems from cli run the following command:
~~~
cli sync
~~~

To use webhooks add the `app\controller\CustomController` action method. For example, method `CustomController::habiticaAction()` is available by the `http://your_app_host/habitica` url.