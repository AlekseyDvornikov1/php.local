<?php
require __DIR__ . '/autoload.php';

$base = new \App\Controllers\Base();
$url_parts = $base->getUrlParts();

$id = $url_parts[2];

if (!empty($url_parts[0])) {
    $class = '\\App\\Controllers\\' . ucfirst($url_parts[0]);
    $action = ucfirst($url_parts[1]);
} else {
    $class = '\\App\\Controllers\\News';
    $action = 'Home';
}
if (!empty($class)) {
    try {
        if (class_exists($class) !== false) {
            $controller = new $class();
            $controller->action($action);
        } else {
            throw new \App\Exceptions\E404('Ошибка 404 - не найдено');
        }
    } catch (\App\Exceptions\Db $ex) {
        $controllerError = new \App\Controllers\Error();
        $controllerError->actionDb($ex);

    } catch (\App\Exceptions\E404 $ex) {
        $controllerError = new \App\Controllers\Error();
        $controllerError->actionE404($ex);
    }
}

