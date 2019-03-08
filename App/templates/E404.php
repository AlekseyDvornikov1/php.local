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
    a {
        color: 	#808080;
    }
</style>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<style type="text/css">
    html, body {width:100%;height:100%;overflow:hidden;margin:0px;padding:0px;font-family:'Open Sans',sans-serif;font-size:16px}
    body {background:url('/img/404.png') center no-repeat #262626}
    .content a {display:inline-block;text-decoration:none}
    .content a, .content a:hover {color:rgba(255,255,255,0.3);}
    .content a:hover {color:rgba(255,255,255,0.5);}
    @media only screen and (max-width: 460px), screen and (max-height: 700px) {
        .content a {display:block;width:100%;height:100%;position:absolute;top:0px;left:0px;font-size:0px;opacity:0;}
        body {background-size:cover}
    }
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
            <li ><a href="/news/home">Home</a></li>
            <li class="active"><a href="/news/one/1">Article by id</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/index.php"><span class="glyphicon glyphicon-log-in"></span> Login Admin</a></li>
        </ul>
    </div>
</nav>
<h2 align="center"><?php  echo $error;?></h2>
<footer id="footer" class="footer navbar-fixed-bottom">
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="/"> Главная</a>
    </div>
</footer>

</body>
</html>