<section class="account_admin">
    <p><a href="?page=edit_user">Edit</a></p>
    <?php if ($_SESSION["CurrentUser"]["Pseudo"] === "Admin") { ?>

        <p><a href="?page=news_list">News</a></p>
        <p><a href="?page=articles_list">Articles</a></p>
        <p><a href="?page=category">Add Category</a></p>
        <p><a href="?page=forums_category">Forums</a></p>
    <?php }; ?>
</section>