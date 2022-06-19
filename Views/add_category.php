<article class="formulaire">
    <form method="POST">
        <?php if(isset($errors) && in_array(Categorie::CATEGORIE_INVALID, $errors)): ?>
            <p>No name</p>
        <?php endif ?>
        <input type="text" name="categorie" placeholder="New categorie name...">
        <button type="submit">Submit</button>
    </form>
    <a href="?page=forums_category">Retour</a>
</article>