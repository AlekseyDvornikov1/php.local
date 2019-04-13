<?php

namespace App\Controllers;

use App\MultiException;

class Admin extends Base
{
    protected $news;

    public function __construct()
    {
        parent::__construct();
        $this->news = new \App\Models\News();
    }

    public function actionAdminPanel()
    {
        $this->view->number_of_news = \App\Models\News::findAll();
        switch ($_POST['type']) {
            case 'Add':
                $this->actionEdit(
                    [
                        'header' => $_POST['header'],
                        'text' => $_POST['text'],
                        'author_id' => $_POST['author_id'],
                    ]
                );
                break;
            case 'Edit':
                $this->actionEdit(
                    [
                        'header' => $_POST['header'],
                        'text' => $_POST['text'],
                        'author_id' => $_POST['author_id'],
                        'id' => $_POST['id'],
                    ]
                );
                break;
            case 'Delete':
                $this->actionDelete();
                break;
        }
        $this->view->display(__DIR__ . '/../../admin/templates/index.php');
    }

    public function actionEdit($data)
    {
        try {
            $this->news->fill($data);
            $this->news->save();
        } catch (MultiException $e) {
            $this->view->errors = $e;
        }
    }

    public function actionDelete()
    {
        $this->news->id = $_POST['id'];
        $this->news->delete();
    }
}
