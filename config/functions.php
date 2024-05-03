<?php


function redirect($url)
{
    header("location: $url");
    die();
}
function is_post() {
    return $_SERVER["REQUEST_METHOD"] === "POST";
}
function view($name, $model = "not_found")
{
    global $view_bag;
    if($view_bag == null) {
        $view_bag = [
            "title" => "not found" 
        ];
    }
    require_once(APP_PATH."views/layout.view.php");
}
