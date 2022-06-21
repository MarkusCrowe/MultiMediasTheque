<article class="formulaire">
    <form method="POST">
        <h1>Ajouter Catégorie</h1>
        <?php if(isset($errors) && in_array(Categorie::CATEGORIE_INVALID, $errors)): ?>
            <p>No name</p>
        <?php endif ?>
        <input type="text" name="categorie" placeholder="Nom de la nouvelle categorie...">
        <button type="submit">Valider</button>
    </form>
    <a href="?page=account" title="Compte">Retour</a>
</article>