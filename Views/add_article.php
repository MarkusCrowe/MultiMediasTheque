<article class="formulaire">
    <form method="post" enctype="multipart/form-data" >
    <h1>Ajouter Article</h1>
        <label>Titre de l'article</label>
            <input type="text" name="title">

        <label>Image</label>
            <input type="file" name="upload" class="upload">
        
        <label>Résume</label>
            <textarea name="resume"></textarea>
        
        <button type="submit" name="submit">Valider</button>
    </form>
</article>
<a href="?page=articles_list" title="liste Sujet">Retour</a>