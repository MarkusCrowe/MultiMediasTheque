<section class="forum_category">
    <article>
        <?php foreach ($categories_manager->selectCategorie() as $categorie) : ?>
            <p><a href="?page=forums_chatrooms&Id=<?= ($categorie->getId()) ?>" title="forums"><?= $categorie->getCategorie_name(); ?></a></p>
        <?php endforeach ?>
    </article>
    <p class="button_home"><a href="?page=home" title="home"><i class="fa-solid fa-house"></i></a></p>
</section>