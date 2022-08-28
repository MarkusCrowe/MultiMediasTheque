<header>
    <section class="menu">
        <p class="hamburger"><i class="fa-solid fa-bars"></i></p>
        <p class="cross hide"><i class="fa-solid fa-xmark"></i></p>
    </section>
    <h1><a href="index.php" title="Vers Homepage">MultiMédiasThèque</a></h1>
    <section class="account">
        <?php if (empty($_SESSION)) { ?>
            <a href="?page=register" title="Register">Register</a>
            <a href="?page=login" title="Login">Login</a>
        <?php } elseif (isset($_SESSION["CurrentUser"])) { ?>
            <!-- <p>Hello <?= $_SESSION["CurrentUser"]["Pseudo"]; ?>!</p> -->
            <i class="fa-solid fa-circle-user" id="account"></i>
            <div id="account-menu" class="hide">
                <a href="?page=account&Id=<?= $_SESSION["CurrentUser"]["Id"] ?>" title="Vers le compte">Account</a>
                <a href="../Views/logout.php" title="Deconnexion">Logout</a>
            </div>
        <?php } ?>
    </section>
</header>