<?php

return [
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'user' => 'root',
            'pass' => 'poikoiloi@',
            'host' => 'chongieball',
            'port' => '',
            'name' => 'mit_framework'
        ],
        'view' => [
            'view_path' =>  __DIR__ .'/../views',
            'twig' => [
                'cache' => false,
                'debug' => true,
                'auto_reload' => true,
            ],
        ],
        'lang' => [
            'default' => 'id'
        ]
    ]
]

?>
