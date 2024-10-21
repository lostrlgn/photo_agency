<?php

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../' . $className . '.php';
});


try{
    $method = $_SERVER['REQUEST_METHOD'];
    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/../Src/Config/routes_api.php';

    $isRouteFound = false;

    foreach($routes as $pattern => $controllerAndAction){
        preg_match($pattern, $route, $matches);
        if(!empty($matches)){
            $isRouteFound = true;
            break;
        }
    }
    if (!$isRouteFound) {
        throw new \Src\Exceptions\NotFoundException();
    }
    unset($matches[0]);
    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];
    $controller = new $controllerName();
    $controller->$actionName(...$matches);

    
}catch(\Src\Exceptions\DbException $e){
    $view = new \Src\Views\View('default');
    $view->displayJson([ 'error' => $e->getMessage()], 500);
}catch(\Src\Exceptions\NotFoundException $e){
    $view = new \Src\Views\View('default');
    $view->displayJson([ 'error' => $e->getMessage()], 404);
} catch (\Src\Exceptions\UnauthorizedException $e) {
    $view = new \Src\Views\View('default');
    $view->displayJson(['error' => $e->getMessage()], 401);
}






