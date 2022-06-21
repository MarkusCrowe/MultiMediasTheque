<section class="account_admin">
    <p><a href="?page=edit_user" title="Editer Profil">Editer profil</a></p>
    <?php if ($_SESSION["CurrentUser"]["Pseudo"] === "Admin") { ?>

        <p><a href="?page=news_list" title="liste News">Actualités</a></p>
        <p><a href="?page=articles_list" title="liste Articles">Articles</a></p>
        <p><a href="?page=category" title="ajouter une categorie de discussion">Ajouter Catégorie</a></p>
        <p><a href="?page=forums_category" title="vers les forums">Forums</a></p>
    <?php }; ?>
</section>