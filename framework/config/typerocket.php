<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    |
    | Determine frontend settings
    |
    */
    'frontend' => [
        'assets' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Post Messages
    |--------------------------------------------------------------------------
    |
    | Determine admin settings
    |
    */
    'admin' => [
        'post_messages' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    |
    | Determine how routes are loaded and used. If you want routes
    | loaded instantly set hook to _instant_. Other hook options
    | include: muplugins_loaded, plugins_loaded, or setup_theme
    |
    */
    'routes' => [
        'hook' => '_instant_',
    ],
];
