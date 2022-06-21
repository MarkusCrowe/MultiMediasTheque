<article class="formulaire">
    <form method="POST">
    <h1><?= $DisplayName->getCategorie_name(); ?></h1>
        <?php if(isset($errors) && in_array(Chatroom::CHATROOM_INVALID, $errors)): ?>
            <p>Pas de nom</p>
        <?php endif ?>
        <input type="text" name="chatroom" placeholder="Nouveau forum...">
        <button type="submit">Valider</button>
    </form>        
    <a href="?page=forums_chatrooms&Id=<?= $_GET["Id"]; ?>" title="liste forums">Retour</a>
</article>