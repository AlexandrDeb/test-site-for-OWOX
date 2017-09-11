<?php
if (Session::get('login')) {
header("HTTP/1.1 302 Moved Temporarily");
header("Location: http://owox.megamaks.net");
}
?>


<a href="/users/register">Регистрация</a>
<h3>Форма для входа</h3><br/>
<form method="post" action="">
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
