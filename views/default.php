<!DOCTYPE html>
<html>
<head>
    <title><?=Config::get('site_name')?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><?=Config::get('site_name')?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a <?php if( App::getRouter()->getController() == 'pages' ) {?>class="active"<?php } ?> href="/pages/">Pages</a></li>
                <li><a <?php if( App::getRouter()->getController() == 'users' ) {?>class="active"<?php } ?> href="/users/">Login</a></li>

            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="starter-template">
        <?=$data['content']?>
    </div>

</div>

</body>
</html>