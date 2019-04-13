<?php

namespace App\Controllers;

use App\Exceptions\E404;

class News extends Base
{
    /**
     * @throws \App\Exceptions\E404
     */
    public function actionHome()
    {
        $this->view->news = \App\Models\News::findLatest();
        if ($this->view->news == null) {
            throw new E404('E404');
        }
        $this->view->display(__DIR__ . '/../templates/index.php');
    }

    /**
     * @throws \App\Exceptions\E404
     */
    public function actionOne()
    {
        $id = $this->getUrlParts()[2];
        $this->view->article = \App\Models\News::findById($id);
        if ($this->view->article == null) {
            throw new E404('E404');
        }
        $this->view->display(__DIR__ . '/../templates/article.php');
    }

    /**
     * @throws \App\Exceptions\E404
     */
    public function actionAll()
    {
        $this->view->news = \App\Models\News::findAll();
        if ($this->view->news == null) {
            throw new E404('E404');
        }
        $this->view->display(__DIR__ . '/../templates/index.php');
    }

}
