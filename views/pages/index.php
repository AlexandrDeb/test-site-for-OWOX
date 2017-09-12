<?php if (Session::get('login')) { ?>
    
    <h2>Добро пожаловать, <?= Session::get('login') ?></h2>
    <div><?= Session::get('passwordFb') ?></div>
    <div><?= Session::get('emailFb') ?></div>

<?php } else {
    Router::redirect('/users/login');
} ?>