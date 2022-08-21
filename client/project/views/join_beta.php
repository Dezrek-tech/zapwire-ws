<?php
    global $app;

    $render = new Render("", "php");
    $auth_page = new Render("auth", "php");

    $auth_page->prop("header", ["sub_title" => "Join Beta"]);
    $render->prop("join_beta");
    $auth_page->prop("footer");
    
?>