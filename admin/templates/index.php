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
<style type="text/css">
    .alert-message .alert-icon {
        width: 4rem;
        font-size: 1.5rem;
    }
    .alert-message .close{
        font-size: 1rem;
        color: #a6a6a6;
    }
    html, body {width:100%;height:100%;margin:0px;padding:0px;font-family:'Open Sans',sans-serif;font-size:16px}
    body { center no-repeat #fff9e5
    }
    .content a {display:inline-block;text-decoration:none}
    .content a, .content a:hover {color:rgba(255,255,255,0.3);}
    .content a:hover {color:rgba(255,255,255,0.5);}
    @media only screen and (max-width: 460px), screen and (max-height: 700px) {
        .content a {display:block;width:100%;height:100%;position:absolute;top:0px;left:0px;font-size:0px;opacity:0;}
        body {background-size:cover}
    }
</style>
<style>
    .well {
        background-color: #fff9e5;
    }
    a {
        color: 	#808080;
    }
</style>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">News</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="/news/home">Home</a></li>
            <li ><a href="/news/one/1">Article by id</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login Admin</a></li>
        </ul>
    </div>
</nav>
<?php
if(!empty($errors)) : ?>
 <?php  foreach ($errors as $error) : ?>
        <div class="alert alert-danger">
            <strong>Warning!</strong> <?php   echo $error->getMessage(); ?>
        </div>
   <?php endforeach;
   endif;?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="well">
                <h2>
                    Добавить новость:
                </h2>
                <form action="" method="post">
                <div class="form-group">
                    <label for="header">Header:</label>
                    <input type="text" class="form-control" id="header" name="header" >
                </div>
                <div class="form-group">
                    <label for="text">Article:</label>
                    <input type="text" class="form-control" id="text" name="text" >
                </div>
                <div class="form-group">
                    <label for="author">Author id:</label>
                    <input type="number" class="form-control" id="author" name="author_id" >
                </div>
                    <input type="hidden" id="type" name="type" value="Add">
                    <div class="form-group">
                        <input type="submit" class="form-control" value="Send">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="well">
                <h2>
                    Всего: <?php echo count($number_of_news); ?> <br>
                    Редактировать новость:
                </h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="id2">Id:</label>
                        <input type="number" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="form-group">
                        <label for="header2">Header:</label>
                        <input type="text" class="form-control" id="header" name="header">
                    </div>
                    <div class="form-group">
                        <label for="text2">Article:</label>
                        <input type="text" class="form-control" id="text" name="text">
                    </div>
                    <div class="form-group">
                        <label for="author2">Author id:</label>
                        <input type="text" class="form-control" id="author" name="author_id" >
                    </div>
                    <input type="hidden" id="type" name="type" value="Edit">
                    <div class="form-group">
                        <input type="submit" class="form-control" value="Update">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="well">
                <h2>
                    Удалить новость:
                </h2>
                <form action="" method="post">
                <div class="form-group">
                    <label for="id3">Id:</label>
                    <input type="text" class="form-control" id="id3" name="id" required>
                </div>
                    <input type="hidden" id="type" name="type" value="Delete">
                    <div class="form-group">
                     <input type="submit" class="form-control" value="Delete">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<footer id="footer" class="footer navbar-fixed-bottom">
    <div class="footer-copyright text-center py-3">© 2018 Copyright: ДВОРНИКОВ
    </div>
</footer>
</body>
</html>