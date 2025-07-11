<?php

$origins = env('CORS_ORIGINS');

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
    'paths' => ['api/*'],
    'supportsCredentials' => false,
    // 'allowed_origins' => explode(',', env('CORS_ORIGINS', '*')),
    'allowed_origins' => ['*'], // 🔥 Libera para qualquer origem
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['*'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
