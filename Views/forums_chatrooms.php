<?php if (isset($_SESSION["CurrentUser"])) { ?>
    <a href="?page=chatroom&Id=<?= $_GET["Id"]; ?>"> + </a>
<?php } ?>

<?php foreach ($forums_chatrooms->selectCategorieId($_GET["Id"]) as $forums) : ?>
    <a href="?page=forums_chats&Id=<?= $forums->getId(); ?>"><?= ($forums->getChatroom_name()) ?></a>
<?php endforeach ?>