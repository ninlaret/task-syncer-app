<?php

return [
    'showLogs' => true,
    'logger' => 'core\logger\EchoLogger',

    'syncParams' => [
        'target' => [
            'gitlab' => ['notion'],
            'notion' => ['habitica'],
        ],
    ],
];
