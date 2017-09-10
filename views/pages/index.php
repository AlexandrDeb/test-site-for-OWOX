<?php

if (Session::get('login')){
   echo "<h2>".'Hello, '."</h2>". "<h2>".Session::get('login')."</h2>";
}else{

    Router::redirect('/users/login');
}