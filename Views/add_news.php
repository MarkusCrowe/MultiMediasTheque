<article class="formulaire">
    <form method="post" enctype="multipart/form-data" >
    <h1>Add News</h1>
        <label>Bannière // Vignette
            <input type="file" name="upload_1" class="upload">
        </label>
        <label>Titre de l'article
            <input type="text" name="Titre_article">
        </label>
        <label>Introduction
            <textarea name="introduction"></textarea>
        </label>
        <label>Paragraphe 1
            <textarea name="paragraphe_1"></textarea>
        </label>
        <label>Image 1
            <input type="file" name="upload_2" class="upload">
        </label>
        <label>Paragraphe 2
            <textarea name="paragraphe_2"></textarea>
        </label>
        <label>Image 2
            <input type="file" name="upload_3" class="upload">
        </label>
        <label>Paragraphe 3
            <textarea name="paragraphe_3"></textarea>
        </label>
        <label>Conclusion
            <textarea name="conclusion"></textarea>
        </label>

        <button type="submit" name="submit">Envoyer</button>
    </form>
</article>
<a href="?page=account">Retour</a>

