
<section class="chats">
<!-- passer article en div et la div en article -->
    <?php foreach ($Post_manager->selectChatroomsId($_GET["Id"]) as $PostManager) : ?>
        <article class="chat">
            <div>
                <p><?= ($PostManager->getPseudo()) ?></p>
                <p><?= ($PostManager->getDate()) ?></p>
            </div>         
            <p><?= ($PostManager->getContent()) ?></p>
        </article>
    <?php endforeach ?>
    
    <?php if(isset($_SESSION["CurrentUser"])){ ?>
    <form method="POST">
        <textarea name="comment" placeholder="Tell what you want..."></textarea>
        <button type="submit">Submit</button>
    </form>
    <?php }; ?>
</section>