<?php
/**
 * Configuration of REST`ful resources
 */
return [
    // Connection which will be used for models by default
    'default_connection' => env('REST_CONNECTION', 'base_connection'),

    'connections' => [

        /**
         * Example connection
         */
        'base_connection' => [
            'domain' => env('REST_DOMAIN', 'https://randomuser.me'),
            'prefix' => env('REST_PREFIX', 'api'),
            /*'auth' => [ // delete this if you are will not use authorization at all
                'type' => 'basic_auth',
                'login' => env('REST_AUTH_LOGIN', 'example.com'),
                'password' => env('REST_AUTH_LOGIN', 'put_password_here'),
            ],*/
//            'auth' => [
//                'type' => 'bearer',
//                'cache_key' => 'base_connection_bearer_token', // Not required, can be generated automatically
//                'token_route' => env('REST_AUTH_TOKEN_ROUTE', 'login'), // ULR for update a bearer token
//                'token_method' => 'POST', // Method for touching token route
//                'token_index' => 'token',
//                'login' => env('REST_AUTH_LOGIN', 'example.com'),
//                'password' => env('REST_AUTH_LOGIN', 'put_password_here'),
//            ],
            'response_index' => 'results', // Array index which used for in main index response. Delete if not used
            'content-type' => 'www-form', // Data format for PUT and POST requests. Available: x-www-form-urlencoded, json
            'normalizer' => 'json', // Response normalizer. json, body
            'paginator' => [
                'page_key' => 'page',
                'per_page_key' => 'per_page',
                'page_response_key' => 'meta.current_page',
                'per_page_response_key' => 'meta.per_page',
                'total_response_key' => 'meta.total',
            ],
        ],
    ],
];
