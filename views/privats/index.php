<?php header("HTTP/1.1 401 Unauthorized"); ?>
<div style="margin-top: 20px;">
    <h1> <?= $data['posts'][0]['title'] ?></h1>
    <p><?= $data['posts'][0]['content'] ?></p>
</div>

