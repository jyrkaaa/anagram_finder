<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/doc.json' => [[['_route' => 'app.swagger', '_controller' => 'nelmio_api_doc.controller.swagger'], null, ['GET' => 0], null, false, false, null]],
        '/api/v1/anagram' => [[['_route' => 'anagram_list', '_controller' => 'App\\Controller\\AnagramController::findAnagram'], null, ['GET' => 0], null, false, false, null]],
        '/api/v1/words' => [
            [['_route' => 'wordbase_import', '_controller' => 'App\\Controller\\WordImportController::import'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'wordbase_delete', '_controller' => 'App\\Controller\\WordImportController::deleteDb'], null, ['DELETE' => 0], null, false, false, null],
        ],
        '/api/v1/wordsJson' => [[['_route' => 'wordbase_json_import', '_controller' => 'App\\Controller\\WordImportController::importJson'], null, ['POST' => 0], null, false, false, null]],
        '/api/doc' => [[['_route' => 'swagger_ui', '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\SwaggerUiAction::class'], null, null, null, false, false, null]],
        '/api/docs.json' => [[['_route' => 'openapi_json', '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\SwaggerAction::class'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
