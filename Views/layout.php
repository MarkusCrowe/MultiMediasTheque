<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MultiMédiasThèque</title>
    <link rel="icon" href="Assets/Images/Divers/fgo-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="Assets/Style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="Assets/JS/account_menu.js"></script>
    <script src="Assets/JS/navigation_button.js"></script>
    <!-- <script src="../Assets/JS/horloge.js"></script> -->
    <script src="../Assets/JS/day-night.js"></script>

</head>
<body>
    <?php require "Views/Templates/header.php"; ?>
    <main>
        <?php require "Controls/navigation_controller.php"; ?>
        <?php require getRoute(); ?>
    </main>
    <?php require "Views/Templates/footer.php"; ?>
</body>
</html>