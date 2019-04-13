<?php

namespace App\Controllers;

use App\Classes\View;

class Base
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function beforeAction()
    {
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    public function getUrlParts()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $url = mb_substr($url['path'], 1);
        return explode('/', $url);
    }

}