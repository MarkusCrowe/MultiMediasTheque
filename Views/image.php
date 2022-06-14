<article class="formulaire">
    <section>
        <h1>Choisis ton Avatar</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="upload_avatar" class="upload"></br>
            <button type="submit" name="submit">Envoyer</button>
        </form>
    </section>
    <section class="polar">
        <?php foreach ($avatar as $avtr) { ?>
            <img src="<?= $avtr["Link"]; ?>" alt="<?= $avtr["Name"]; ?> ">
        <?php } ?>
    </section>
    <a href="?page=account&Id=<?= $_SESSION["CurrentUser"]["Id"] ?>">Account</a>
</article>