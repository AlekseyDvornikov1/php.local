<?php
require __DIR__.'/../autoload.php';

$controller = new \App\Controllers\Admin();
try {
    $controller->actionAdminPanel();
} catch ( \App\Exceptions\Db $ex) {
    $controllerError = new \App\Controllers\Error();
    $controllerError->actionDb($ex);
}
