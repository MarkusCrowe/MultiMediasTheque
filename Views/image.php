
<section>
    <h1>Formulaire d'envoi de fichiers</h1>
    <form method="post" enctype="multipart/form-data">
        <!-- <label for="image">Image de profil</label></br> -->
        <input type="file" name="upload" class="upload"></br>
        <button type="submit" name="submit">Envoyer</button>
    </form>
</section>
<section class="polar">
    <?php foreach($images as $image){ ?>
        <img src="<?= $image["Link"]; ?>"  alt="<?= $image["Name"]; ?> ">
    <?php } ?>
</section>

<a href="?page=account&Id=<?= $_SESSION["CurrentUser"]["Id"] ?>">Account</a>