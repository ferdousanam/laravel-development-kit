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

            'middleware' => explode(',', env('DEVELOPMENT_KIT_MIDDLEWARE', '')),
        ],
    ],

];
