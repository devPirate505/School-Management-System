<?php

    session_start();

    require('include/functions.php');

    authenticate();

    unset($_SESSION['login_id']);
    unset($_SESSION['username']);

    setcookie('login_id', NULL, time() - 12);

    redirect('index.php', 'Successfully Logged out', 'success');


?>