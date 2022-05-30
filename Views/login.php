<article>
    <form method="POST">
        <input type="text" name="pseudo" placeholder="Pseudo">
        <!-- <?php if (isset($errors) && in_array(Users::PSEUDO_INVALID, $errors)) : ?>
            <p>Invalid pseudo!</p>
        <?php endif ?> -->

        <input type="password" name="password" placeholder="Password">
        <!-- <?php if (isset($errors) && in_array(Users::PASSWORD_INVALID, $errors)) : ?>
            <p>Invalid password!</p>
        <?php endif ?> -->

        <button type="submit">Submit</button>
    </form>
    <a href="../index.php">Retour</a>
</article>