<?php

use core\App;

const ROOT_PATH = __DIR__ . '/';

require_once ROOT_PATH . '/vendor/autoload.php';

$config = require(ROOT_PATH . 'config/web.php');
$params = require(ROOT_PATH . 'config/params.php');

App::init($config, $params, 'Web');