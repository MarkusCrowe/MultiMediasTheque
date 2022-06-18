<?php
    const AVAILABLE_ROUTES = [
        "index" => "home_controller.php",
        "register" => "add_users_controller.php",
        "login" => "login_controller.php",
        "navigation" => "navigation_controller.php",
        "category" => "add_category_controller.php",
        "chatroom" => "add_chatroom_controller.php",
        "chats" => "add_chats_controller.php",
        "account" => "account_controller.php",
        "image" => "image_controller.php",
        "edit_user" => "edit_user_controller.php",
        "add_news" => "add_news_controller.php",
        "new_edit" => "new_edit_controller.php",
        "new_delete" => "new_delete_controller.php",
        "news_list" => "news_list_controller.php",
        "new_view" => "new_view_controller.php",
        "all_news_list" => "all_news_list_controller.php",
        "articles_list" => "articles_list_controller.php",
        "add_article" => "add_article_controller.php",
        "all_articles_list" => "all_articles_list_controller.php",
        "article_view" => "article_view_controller.php",
        "article_edit" => "article_edit_controller.php",
        "article_delete" => "article_delete_controller.php",
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
