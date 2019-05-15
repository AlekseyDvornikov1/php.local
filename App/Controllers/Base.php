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
        if(method_exists($this,$methodName))
        {
            return $this->$methodName();
        } else {
            throw new \App\Exceptions\E404('Ошибка 404 - не найдено');
        }
    }

    public function getUrlParts()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $url = mb_substr($url['path'], 1);
        return explode('/', $url);
    }

}