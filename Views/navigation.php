
    <nav class="toggle hide">
        <h2>MENU</h2>
        <p>Mode Jour / Nuit</p> 
        <h3>Forums</h3>
        <ul>
            <?php if(isset($_SESSION["CurrentUser"]["Pseudo"]) == "Admin"){ ?>
                <a href="?page=category">Add Categorie</a>
            <?php } ?>
            <!-- <?php var_dump($_SESSION["CurrentUser"]["Pseudo"]); ?> -->
            <?php foreach ($categories_manager->selectCategorie() as $categorie) : ?>
                <h4><?= $categorie->getCategorie_name(); ?>
                    <?php if (isset($_SESSION["CurrentUser"])) { ?>
                        <a href="?page=chatroom&Id=<?= ($categorie->getId()) ?>"> + </a>
                    <?php } ?>
                </h4>

                <?php foreach($chatrooms_manager->selectCategorieId($categorie->getId()) as $chatroomMana): ?>
                    <h5><a href="?page=chats&Id=<?= ($chatroomMana->getId()) ?>"><?= $chatroomMana -> getChatroom_name(); ?></a></h5>   
                <?php endforeach ?>
            <?php endforeach ?>
        </ul>
    </nav>     