<section class="chatrooms">
    <?php if (isset($_SESSION["CurrentUser"])) { ?>
        <button class="button_add_news"><a href="?page=add_news"><i class="fa-solid fa-plus"></i></a></button>
    <?php } ?>
    <?php foreach ($forums_chatrooms->selectCategorieId($_GET["Id"]) as $forums) : ?>
        <a href="?page=forums_chats&Id=<?= $forums->getId(); ?>"><?= ($forums->getChatroom_name()) ?></a>
    <?php endforeach ?>
</section>