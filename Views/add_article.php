<article class="formulaire">
    <form method="post" enctype="multipart/form-data" >
    <h1>Add Article</h1>
        <label>Titre de l'article</label>
            <input type="text" name="title">

        <label>Image</label>
            <input type="file" name="upload" class="upload">
        
        <label>Resume</label>
            <textarea name="resume"></textarea>
        
        <button type="submit" name="submit">Submit</button>
    </form>
</article>
<a href="?page=articles_list">Retour</a>