<?php
    global $app;
    $render = new Render("admin", "php");
    $page = new Render("pages/", "php");
    $widget = new Render("widgets/", "php");

    $user_id = $app->values['3'];

    $widget->prop("auth");

    $render->prop("header", [
        "title" => "Set permissions",
    ]);

    $render->prop("users/permissions", [
        "user_id" => $user_id,
    ]);

    $render->prop("footer", [
        "page_script" => "
            
        ",
    ]);
?>
