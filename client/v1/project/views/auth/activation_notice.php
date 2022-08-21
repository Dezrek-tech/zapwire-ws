<?php
    global $app;

    $render = new Render("auth", "php");
    $auth_page = new Render("auth/pages", "php");
    $widget = new Render("widgets", "php");

    $widget->prop("auth2");

    $render->prop("header", ["sub_title" => "Activation Notice"]);
    $auth_page->prop("activation_notice");
    $render->prop("footer");
    
?>