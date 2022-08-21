<?php
    global $app;

    $render = new Render("", "php");
    $auth_page = new Render("auth", "php");
    $user = new User();
    
    if(!$user->is_loggedin){
         header("Location: ".$app->url('logout'));
    }

    $auth_page->prop("header", ["sub_title" => "Restricted Access"]);
    $render->prop("unauthorized");
    $auth_page->prop("footer");
    
?>