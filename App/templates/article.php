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
</style>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<style type="text/css">
    html, body {width:100%;height:100%;margin:0px;padding:0px;font-family:'Open Sans',sans-serif;font-size:16px}

</style>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">News</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="/news/home">Home</a></li>
            <li class="active"><a href="#">Article by id</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/index.php"><span class="glyphicon glyphicon-log-in"></span> Login Admin</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">

            <div class="well">
                <h2>
                     <?php echo $article->header; ?> <small> Author: <?php echo $article->author->name; ?></small>
                </h2>
                <p>
                    <?php echo $article->text; ?>
                </p>
            </div>
    </div>
<footer id="footer" class="footer navbar-fixed-bottom">
    <div class="footer-copyright text-center py-3">© 2018 Copyright: ДВОРНИКОВ
    </div>
</footer>
</body>
</html>