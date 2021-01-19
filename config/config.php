<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'chat' => [
        'user' => env('OPENFIRE_CHAT_USER', ''),
        'password' => env('OPENFIRE_CHAT_PASSWORD', '')
    ],
    'connection' => [
        'base_url' => env('OPENFIRE_BASE_URL', 'http://127.0.0.1:7070'),
        'domain' => env('OPENFIRE_DOMAIN', ''),
        'credentials' => [
            'username' => env('OPENFIRE_ADMIN_USERNAME', 'admin'),
            'password' => env('OPENFIRE_ADMIN_PASSWORD', '')
        ]
    ]
];
