<div>
    erberberbeberberb
    erberberberbreberberbererbreberber
    ererberberberberberberehreherheherhrehreh
    reherherherhrehrherherh<br>

</div>


<div>
<?php
if (Session::get('login')){
    echo "<h2>".'Hello, '."</h2>". "<h2>".Session::get('login')."</h2>";
}else{

    require_once(VIEWS_PATH.'/users/'.'login.php');
}
?>
</div>