<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<?php
require __DIR__.'/autoload.php';

$news = \App\Models\News::findAll();


$news = (new \App\Classes\AdminDataTable($news,
    function ($news) {
        return $news->id;
    },
    function ($news) {
        return $news->header;
    },
    function ($news) {
        return $news->text;
    },
    function ($news) {
        return $news->author->name;
    }))->render();
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Header</th>
        <th scope="col">Text</th>
        <th scope="col">Author</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($news as $article): ?>
    <tr>
        <?php foreach ($article as $column): ?>
        <td><?=$column;?></td>
        <?php endforeach;?>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</html>



