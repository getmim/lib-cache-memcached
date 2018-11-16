<?php

return [
    '__name' => 'lib-cache-memcached',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/lib-cache-memcached.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-cache-memcached' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-cache' => NULL
            ],
            [
                'lib-memcached' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'LibCacheMemcached\\Driver' => [
                'type' => 'file',
                'base' => 'modules/lib-cache-memcached/driver'
            ]
        ],
        'files' => []
    ],
    '__inject' => [
        [
            'name' => 'libCache',
            'question' => 'cache driver setter',
            'children' => [
                [
                    'name' => 'driver',
                    'question' => 'Set driver to memcached',
                    'default' => 'memcached',
                    'rule' => 'any'
                ]
            ]
        ],
        [
            'name' => 'libMemcached',
            'question' => 'lib-memcached app config',
            'children' => [
                [
                    'name' => 'cache',
                    'children' => [
                        [
                            'name' => 'host',
                            'question' => 'Connection hostname',
                            'default' => '127.0.0.1',
                            'rule' => 'any'
                        ],
                        [
                            'name' => 'port',
                            'question' => 'Connection port number',
                            'default' => '11211',
                            'rule' => 'any'
                        ]
                    ]
                ]
            ]
        ]
    ],
    'libCache' => [
        'handlers' => [
            'memcached' => 'LibCacheMemcached\\Driver\\Memcached'
        ]
    ]
];