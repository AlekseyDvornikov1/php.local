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
<style>
    .well {
        background-color: #fff9e5;
    }
    a {
        color: 	#808080;
    }
</style>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<style type="text/css">
    html, body {width:100%;height:100%;margin:0px;padding:0px;font-family:'Open Sans',sans-serif;font-size:16px}
</style>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <ul class="nav navbar-nav">
            <li  class="active">
                <div class="navbar-header" >
                    <a  class="navbar-brand" href="/news/all"> All News</a>
                </div>
            </li>
            <li class="active"><a href="/news/home">Home</a></li>
            <li ><a href="/news/one/1">Article by id</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/index.php"><span class="glyphicon glyphicon-log-in"></span> Login Admin</a></li>
        </ul>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <?php
        foreach($news as $article) :
            ?>

            <div class="col-sm-6">
                <div class="well">
                    <blockquote class="blockquote-reverse">
                        <h2>
                            <a href="/news/one/<?php  echo $article->id; ?>"> <?php  echo $article->header;  ?> </a>
                        </h2>
                        <p>
                            <?php echo mb_substr($article->text,0,100).'...'; ?> <br>
                            <footer>
                                Автор: <?php if(isset($article->author)) :
                                    echo $article->author->name;
                                endif;
                                ?>
                            </footer>
                        </p>
                    </blockquote>
                </div>
            </div>
        <?php  endforeach; ?>
    </div>
</div>
<footer id="footer" class="footer navbar-fixed-bottom">
    <div class="footer-copyright text-center py-3">© 2018 Copyright: ДВОРНИКОВ
    </div>
</footer>
</body>
</html>