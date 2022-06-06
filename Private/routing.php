<?php
    const AVAILABLE_ROUTES = [
        "index" => "index_controller.php",
        "register" => "add_users_controller.php",
        "login" => "login_controller.php",
        "navigation" => "navigation_controller.php",
        "category" => "add_category_controller.php",
        "chatroom" => "add_chatroom_controller.php",
        "chats" => "add_chats_controller.php",
        "account" => "account_controller.php",
        "image" => "image_controller.php",
        "edit_user" => "edit_user_controller.php",
        "news" => "add_news_controller.php",
        "articles" => "articles_list_controller.php",
    ];

    function getRoute(): string {
        $defaultControllerPath = "Controls/";
        $routesName = array_keys(AVAILABLE_ROUTES);
        $path =realpath($defaultControllerPath . AVAILABLE_ROUTES["index"]);
        if(isset($_GET["page"]) && in_array($_GET["page"], $routesName, true)) {
            $path = realpath($defaultControllerPath . AVAILABLE_ROUTES[$_GET["page"]]);
        }
        return $path;
    }
?>