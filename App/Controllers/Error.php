<?php

namespace App\Controllers;

use App\Logger;

class Error extends Base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function actionE404(\App\Exceptions\E404 $ex)
    {
        $log = Logger::instance();
        $log->log($ex);
        $this->view->error = $ex->getMessage();
        $this->view->display(__DIR__ . '/../templates/E404.php');
    }

    public function actionDb(\App\Exceptions\Db $ex)
    {
        $log = Logger::instance();
        $log->log($ex);
        $this->view->error = $ex->getMessage();
        $this->view->display(__DIR__ . '/../templates/Db.php');
    }


}
