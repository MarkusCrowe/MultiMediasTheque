<section class="formulaire">
    <form method="POST" enctype="multipart/form-data">
        <h1>Editer l'article</h1>
        <label>Titre de l'article</label>
            <input type="text" name="title" value="<?= $edit_article->getTitle(); ?>">
       
        <label>Image</label>
        <img src="<?= $edit_article->getImage_path(); ?>" alt="image">
            <input type="file" name="upload" class="upload">
              
        <label>Résumé</label>
            <textarea name="resume"><?= $edit_article->getResume(); ?></textarea>

        <button type="submit" name="submit">Valider</button>
    </form>
    <button type="button"><a href="?page=articles_list" title="Retour">Retour</a></button>
</section>