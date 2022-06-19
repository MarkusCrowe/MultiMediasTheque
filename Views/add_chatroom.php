<article class="formulaire">
    <form method="POST">
    <h1><?= $DisplayName->getCategorie_name(); ?></h1>
        <?php if(isset($errors) && in_array(Chatroom::CHATROOM_INVALID, $errors)): ?>
            <p>No name entered</p>
        <?php endif ?>
        <input type="text" name="chatroom" placeholder="New chatroom name...">
        <button type="submit">Submit</button>
    </form>
        
    <a href="?page=forums_chatrooms&Id=<?= $_GET["Id"]; ?>">Retour</a>
</article>