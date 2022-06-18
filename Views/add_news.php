<article class="formulaire">
    <form method="post" enctype="multipart/form-data" >
    <h1>Add News</h1>
        <label>Bannière // Vignette </label>
            <input type="file" name="upload_1" class="upload">
       
        <label>Titre de la News</label>
            <input type="text" name="Titre_article">
        
        <label>Introduction</label>
            <textarea name="introduction"></textarea>
        
        <label>Paragraphe 1</label>
            <textarea name="paragraphe_1"></textarea>
        
        <label>Image 1</label>
            <input type="file" name="upload_2" class="upload">
        
        <label>Paragraphe 2</label>
            <textarea name="paragraphe_2"></textarea>
        
        <label>Image 2</label>
            <input type="file" name="upload_3" class="upload">
        
        <label>Paragraphe 3</label>
            <textarea name="paragraphe_3"></textarea>
        
        <label>Conclusion </label>
            <textarea name="conclusion"></textarea>
       
        <button type="submit" name="submit">Submit</button>
    </form>
</article>
<!-- <a href="?page=news_list">Retour</a> -->