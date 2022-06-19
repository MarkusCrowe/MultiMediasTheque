<section class="formulaire">
    <form method="POST" enctype="multipart/form-data">
        <h1>Edit News</h1>
        <label>Bannière // Vignette</label>
            <img src="<?= $edit_new->getImage_1_path(); ?>" alt="banniere">
            <input type="file" name="upload_1" class="upload">
        
        <label>Titre de la News</label>
            <input type="text" name="Titre_article" value="<?= $edit_new->getTitle(); ?>">
       
        <label>Introduction</label>
            <textarea name="introduction"><?= $edit_new->getIntroduction(); ?></textarea>
        
        <label>Paragraphe 1</label>
            <textarea name="paragraphe_1"><?= $edit_new->getParagraphe_1(); ?></textarea>
        
        <label>Image 1</label>
        <img src="<?= $edit_new->getImage_2_path(); ?>" alt="image 2">
            <input type="file" name="upload_2" class="upload">
              
        <label>Paragraphe 2</label>
            <textarea name="paragraphe_2"><?= $edit_new->getParagraphe_2(); ?></textarea>
        
        <label>Image 2</label>
        <img src="<?= $edit_new->getImage_3_path(); ?>" alt="image 3">
            <input type="file" name="upload_3" class="upload">
        
        <label>Paragraphe 3</label>
            <textarea name="paragraphe_3"><?= $edit_new->getParagraphe_3(); ?></textarea>
        
        <label>Conclusion</label>
            <textarea name="conclusion"><?= $edit_new->getConclusion(); ?></textarea>
        

        <button type="submit" name="submit">Envoyer</button>
    </form>
</section>