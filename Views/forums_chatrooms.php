<section class="chatrooms">
    <?php if (isset($_SESSION["CurrentUser"])) { ?>
        <button class="button_add_news"><a href="?page=chatroom&Id=<?= $_GET["Id"]; ?>" title="add forum"><i class="fa-solid fa-plus"></i></a></button>
    <?php } ?>

    <?php foreach ($forums_chatrooms->selectCategorieJoin($_GET["Id"]) as $forums) : ?>
        <!-- <p> <?= $forums->getChatroom_name() ?></p> -->
        <a href="?page=forums_chats&Id=<?= $forums->getId(); ?>" title="forums"><?= ($forums->getChatroom_name()) ?></a>
    <?php endforeach ?>





    <!-- <?php foreach ($forums_chatrooms->selectCategorieId($_GET["Id"]) as $forums) : ?>
        <a href="?page=forums_chats&Id=<?= $forums->getId(); ?>" title="forums"><?= ($forums->getChatroom_name()) ?></a>
    <?php endforeach ?> -->
</section>