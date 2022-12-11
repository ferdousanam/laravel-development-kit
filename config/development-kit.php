<?php

return [
    /* -----------------------------------------------------------------
     |  Route settings
     | -----------------------------------------------------------------
     */

    'route' => [
        'enabled' => true,

        'attributes' => [
            'prefix' => '',

            'middleware' => env('DEVELOPMENT_KIT_MIDDLEWARE', ''),
        ],
    ],

];
