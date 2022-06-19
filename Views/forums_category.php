<?php foreach ($categories_manager->selectCategorie() as $categorie) : ?>
    <h4><a href="?page=forums_chatrooms&Id=<?= ($categorie->getId()) ?>"><?= $categorie->getCategorie_name(); ?></a>
        
    </h4>
<?php endforeach ?>
<a href="?page=account">Return</a>