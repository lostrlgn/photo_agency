<?php

spl_autoload_register(function (string $className) {
    require_once __DIR__ .'/' .str_replace('\\', '/', $className). '.php';
});
/*spl_autoload_register(function ($name) {
    $path = $name . ".php";
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $path);
    include $path;
});*/

try{
//spl_autoload_register();
    $method = $_SERVER['REQUEST_METHOD'];

// Получение данных из тела запроса
function getFormData($method) {
 
    // GET или POST: данные возвращаем как есть
    if ($method === 'GET') return $_GET;
    if ($method === 'POST') return $_POST;
 
    // PUT, PATCH или DELETE
    $data = array();
    $exploded = explode('&', file_get_contents('php://input'));
 
    foreach($exploded as $pair) {
        $item = explode('=', $pair);
        if (count($item) == 2) {
            $data[urldecode($item[0])] = urldecode($item[1]);
        }
    }
 
    return $data;
}

// Получаем данные из тела запроса
$formData = getFormData($method);


$route = $_GET['route'] ?? '';
//var_dump($route);

$urls = explode('/', $route);
//var_dump($urls);

$routes = require __DIR__ .'/Src/Config/routes.php';
//var_dump($routes);
$isRouteFound = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}


if (!$isRouteFound) {
    throw new \Src\Exceptions\NotFoundException();
}
$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

unset($matches[0]);
//var_dump($controllerAndAction);

$controller = new $controllerName();
$controller->$actionName(...$matches);

    
}catch(\Src\Exceptions\DbException $e){
    $view = new \Src\Views\View('default');
    $view->renderHtml('Errors/500.php', ['error' => $e->getMessage()], 500);
}catch(\Src\Exceptions\NotFoundException $e){
    $view = new \Src\Views\View('default');
    $view->renderHtml('Errors/404.php', ['error' => $e->getMessage()], 404);
} catch (\Src\Exceptions\UnauthorizedException $e) {
    $view = new \Src\Views\View('default');
    $view->renderHtml('Errors/401.php', ['error' => $e->getMessage()], 401);
}






