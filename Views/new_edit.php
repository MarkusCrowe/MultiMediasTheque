<form method="POST" enctype="multipart/form-data" >
    <h1>Add News</h1>
        <label>Bannière // Vignette
            <input type="file" name="upload_1" class="upload" value="">
            <img src="<?= $edit_new->getImage_1_path(); ?>" alt="banniere">
        </label>
        <label>Titre de l'article
            <input type="text" name="Titre_article" value="<?= $edit_new->getTitle(); ?>">
        </label>
        <label>Introduction
            <textarea name="introduction"><?= $edit_new->getIntroduction(); ?></textarea>
        </label>
        <label>Paragraphe 1
            <textarea name="paragraphe_1"><?= $edit_new->getParagraphe_1(); ?></textarea>
        </label>
        <label>Image 1
            <input type="file" name="upload_2" class="upload">
            <img src="<?= $edit_new->getImage_2_path(); ?>" alt="image 2">
        </label>
        <label>Paragraphe 2
            <textarea name="paragraphe_2"><?= $edit_new->getParagraphe_2(); ?></textarea>
        </label>
        <label>Image 2
            <input type="file" name="upload_3" class="upload">
            <img src="<?= $edit_new->getImage_3_path(); ?>" alt="image 3">
        </label>
        <label>Paragraphe 3
            <textarea name="paragraphe_3"><?= $edit_new->getParagraphe_3(); ?></textarea>
        </label>
        <label>Conclusion
            <textarea name="conclusion"><?= $edit_new->getConclusion(); ?></textarea>
        </label>

        <button type="submit" name="submit">Envoyer</button>
    </form>