<?php

return [
    'dbName' => 'tasker',
    'dbUser' => 'user',
    'dbPassword' => 'password',
    
    'notionLink' => 'https://api.notion.com/v1/',
    'notionToken' => 'secret_xxx',

    'habiticaLink' => 'https://habitica.com/api/v3/',
    'habiticaUserId' => 'xxxx',
    'habiticaToken' => 'xxxx',

    'apiRealisations' => [
        'notion' => 'app\system\CustomNotion',
        'habitica' => 'core\system\HabiticaApiSystem',
        'gitlab' => 'core\system\GitlabApiSystem'
    ],
];