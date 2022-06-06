<h1>Hello World!</h1>

<article>
    <h3><?= $userProfil->getPseudo(); ?></h3>
    <p><?= $userProfil->getFirstname(); ?></p>
    <p><?= $userProfil->getLastname(); ?></p>
    <p><?= $userProfil->getEmail(); ?></p>
    <p><?= $userProfil->getPhone(); ?></p>
    <p><?= $userProfil->getBiographie(); ?></p>

    <a href="?page=edit_user">Edit</a>
    
</article>

<?php if($_SESSION["CurrentUser"]["Pseudo"] === "Admin"){ ?>
    <p>YOLOLOOOLOLOLOLOLO</p>
    
    <!-- <a href="?page=image">Add Images</a> -->
    <p></p>
    <!-- <a href="?page=news">Add News</a> -->
    <p></p>
    <a href="?page=articles">Articles</a>
<?php }; ?>

