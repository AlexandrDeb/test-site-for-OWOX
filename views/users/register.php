<?php
if (Session::get('login')) {
    header("HTTP/1.1 302 Moved Temporarily");
    header("Location: / ");
}
?>

<div>
    <a href="https://www.facebook.com/v2.9/dialog/oauth?client_id=<?= Config::get('id') ?>&redirect_uri=<?= Config::get('url') ?>&response_type=code&scope=public_profile,email,user_location">Регистрироваться
        через фейсбук</a>
</div>


<h3>Форма регистрации</h3><br/>
<form method="post" action="">
    <div class="form-group">
        <label for="login">Имя</label>
        <input type="text" id="login" name="login" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" class="form-control"/>
    </div>
    <input type="submit" class="btn btn-success"/>
</form>



