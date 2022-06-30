<?php
session_start();

require "Models/Users.php";
require "Models/UsersManager.php";
require "Models/Category.php";
require "Models/CategoryManager.php";
require "Models/Chatroom.php";
require "Models/ChatroomManager.php";
require "Models/Chats.php";
require "Models/ChatsManager.php";
require "Models/News.php";
require "Models/NewsManager.php";
require "Models/Articles.php";
require "Models/ArticlesManager.php";

require "Private/routing.php"; 

require "Views/layout.php";
?>

