<section class="formulaire">
    <form method="POST">
        <h1>Editer le Profil</h1>
        <input type="text" name="firstname" value="<?= $user->getFirstname(); ?>">
        <input type="text" name="lastname" value="<?= $user->getLastname(); ?>">
        <input type="mail" name="email" value="<?= $user->getEmail(); ?>">
        <input type="phone" name="phone" value="<?= $user->getPhone(); ?>">
        <textarea name="biographie"><?= $user->getBiographie(); ?></textarea>
        <button type="submit">Valider les changememnts</button>
    </form>
</section>