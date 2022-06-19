<h1>Hello World!</h1>

<article>
    <h3><?= $userProfil->getPseudo(); ?></h3>
    <p><?= $userProfil->getFirstname(); ?></p>
    <p><?= $userProfil->getLastname(); ?></p>
    <p><?= $userProfil->getEmail(); ?></p>
    <p><?= $userProfil->getPhone(); ?></p>
    <p><?= $userProfil->getBiographie(); ?></p>

    <a href="?page=edit_user">Edit</a>
    <!-- <a href="?page=image">Avatar</a> -->
</article>

<?php if($_SESSION["CurrentUser"]["Pseudo"] === "Admin"){ ?>    
    
    <!-- <a href="?page=news">Add News</a> -->
    <a href="?page=news_list">News</a>
    <a href="?page=articles_list">Articles</a>
    <a href="?page=category">Add Categorie de Discussion</a>
    <a href="?page=forums_category">Forums</a>
<?php }; ?>