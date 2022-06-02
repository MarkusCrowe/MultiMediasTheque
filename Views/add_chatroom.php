<article>
    <form method="POST">
        <?php if(isset($errors) && in_array(Chatroom::CHATROOM_INVALID, $errors)): ?>
            <p>No name</p>
        <?php endif ?>
        <input type="text" name="chatroom" placeholder="New chatroom name...">
        <button type="submit">Submit</button>
    </form>
        <?php foreach ($Chatroom_manager->selectCategorieId($_GET["Id"]) as $ChatManager) : ?>
            <!-- <p><?= ($ChatManager->getCategorie_id()) ?> n</p> -->
        <?php endforeach ?>
    <a href="../index.php">Retour</a>
</article>