<?php

return [
    '~^articles/(\d+)$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'view' ],
    '~^articles/all$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'all'],
    '~^articles/add$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'add'],
    '~^articles/(\d+)/edit$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'edit'],
    '~^articles/(\d+)/delete$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'delete'],

];