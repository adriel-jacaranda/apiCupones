<?php

use Knuckles\Scribe\Extracting\Strategies;
use Knuckles\Scribe\Config\Defaults;
use Knuckles\Scribe\Config\AuthIn;
use function Knuckles\Scribe\Config\{removeStrategies, configureStrategy};

return [

    /*
    |--------------------------------------------------------------------------
    | Información general
    |--------------------------------------------------------------------------
    */
    'title' => config('app.name') . ' API Documentation',
    'description' => 'Documentación interactiva de la API con autenticación mediante Bearer Token.',
    'intro_text' => <<<INTRO
        Bienvenido a la documentación de nuestra API 🚀  
        Aquí puedes probar directamente los endpoints usando el botón **"Try It Out"**  
        Si algún endpoint requiere autenticación, introduce tu **Bearer Token** en la parte superior.
    INTRO,

'base_url' => env('APP_URL', 'http://127.0.0.1:8000'),

    /*
    |--------------------------------------------------------------------------
    | Rutas incluidas en la documentación
    |--------------------------------------------------------------------------
    */
    'routes' => [
        [
            'match' => [
                'prefixes' => ['api/*'], // Solo documentar rutas API
                'domains' => ['*'],
            ],
            'include' => [],
            'exclude' => ['GET /sanctum/csrf-cookie'], // Ejemplo de exclusión
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tipo de documentación
    |--------------------------------------------------------------------------
    */
    'type' => 'laravel',
    'theme' => 'default',

    'laravel' => [
        'add_routes' => true,
        'docs_url' => '/docs',
        'middleware' => [
            // Agrega autenticación si quieres restringir el acceso a /docs
            // 'auth', 
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuración del botón Try It Out
    |--------------------------------------------------------------------------
    */
    'try_it_out' => [
        'enabled' => true,
        'base_url' => null,
        'use_csrf' => false,
        'csrf_url' => '/sanctum/csrf-cookie',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autenticación
    |--------------------------------------------------------------------------
    */
 'auth' => [
    'enabled' => true,
    'default' => false,
    'in' => 'bearer',
    'name' => 'Authorization',
    'use_value' => env('SCRIBE_AUTH_KEY', 'Bearer {YOUR_TOKEN}'),
    'placeholder' => '{YOUR_TOKEN}',
    'extra_info' => 'Introduce tu token de autenticación en formato: <b>tu_token_aquí</b>.',
],

    /*
    |--------------------------------------------------------------------------
    | Ejemplos de código y colecciones
    |--------------------------------------------------------------------------
    */
    'example_languages' => ['bash', 'javascript', 'php'],
    'postman' => [
        'enabled' => true,
    ],
    'openapi' => [
        'enabled' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Personalización visual
    |--------------------------------------------------------------------------
    */
    'logo' => 'img/logo.png', // Cambia si tienes logo
    'last_updated' => 'Última actualización: {date:d/m/Y}',

    /*
    |--------------------------------------------------------------------------
    | Estrategias de generación
    |--------------------------------------------------------------------------
    */
    'strategies' => [
        'metadata' => [...Defaults::METADATA_STRATEGIES],
        'headers' => [
            ...Defaults::HEADERS_STRATEGIES,
            Strategies\StaticData::withSettings(data: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]),
        ],
        'urlParameters' => [...Defaults::URL_PARAMETERS_STRATEGIES],
        'queryParameters' => [...Defaults::QUERY_PARAMETERS_STRATEGIES],
        'bodyParameters' => [...Defaults::BODY_PARAMETERS_STRATEGIES],
        'responses' => configureStrategy(
            Defaults::RESPONSES_STRATEGIES,
            Strategies\Responses\ResponseCalls::withSettings(
                only: ['GET *'],
                config: ['app.debug' => false],
            )
        ),
        'responseFields' => [...Defaults::RESPONSE_FIELDS_STRATEGIES],
    ],

    /*
    |--------------------------------------------------------------------------
    | Transacciones y base de datos
    |--------------------------------------------------------------------------
    */
    'database_connections_to_transact' => [config('database.default')],
    'fractal' => ['serializer' => null],
];
