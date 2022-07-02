<section class="chats">
    <?php foreach ($Post_manager->selectChatroomJoin($_GET["Id"]) as $PostManager) : ?>
        <article class="chat">
            <div>
                <p><?= ($PostManager->getPseudo()) ?></p>
                <p><?= ($PostManager->getDate()) ?></p>
            </div>         
            <p><?= ($PostManager->getContent()) ?></p>
        </article>
    <?php endforeach ?>

    <?php if(empty($_SESSION)){ ?>
        <p>Tu dois être connecter pour poster des messages !</p>
    <?php }; ?>
    <?php if(isset($_SESSION["CurrentUser"])){ ?>
        <form method="POST">
            <textarea name="comment" placeholder="Ecrit ton message"></textarea>
            <button type="submit">Valider</button>
        </form>
    <?php }; ?>
</section>