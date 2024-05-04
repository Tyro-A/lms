<?php

function view($name, $model ="notfound")
{
    require_once(APP_PATH."views/layout.view.php");
}

function is_session() {
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        die();
    }
    if(isset($_GET['logout'])) {
   
        session_destroy();

        header("Location: login.php");
        die();
    }
}