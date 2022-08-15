<?php

return [
    'showLogs' => true,
    'webCode' => 'changeMe',
    'logger' => 'core\logger\FileLogger',

    'syncParams' => [
        'target' => [
            'habitica' => ['notion', 'gitlab']
        ]
    ],
];
