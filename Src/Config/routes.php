<?php

return [
    '~^articles/all$~'  => [\Src\Controllers\ArticlesController::class,'all'],
    '~^articles/add$~' => [\Src\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/edit$~' => [\Src\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)/delete$~' => [\Src\Controllers\ArticlesController::class, 'delete'],
    '~^articles/(\d+)$~'  => [\Src\Controllers\ArticlesController::class,'view'],
    '~^users/register$~' => [\Src\Controllers\UsersController::class, 'signUp'],
    '~^users/login$~' => [\Src\Controllers\UsersController::class, 'login'],
    '~^users/logout$~' => [\Src\Controllers\UsersController::class, 'logout'],
    '~^hello/(.*)$~'  => [\Src\Controllers\MainController::class,'sayHello'],
    '~^$~' => [\Src\Controllers\MainController::class, 'main'],
];