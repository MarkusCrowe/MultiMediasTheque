<section class="new_view">
    <header>
        <img src="<?= $news->getImage_1_path(); ?>" alt="<?= $news->getImage_1_name(); ?>" class="image_1">
        <h1><?= $news->getTitle(); ?></h1>
    </header>
    <p class="intro_concl"><?= $news->getIntroduction(); ?></p>
    <img src="<?= $news->getImage_2_path(); ?>" alt="<?= $news->getImage_2_name(); ?>" class="image_2">
    <p><?= $news->getParagraphe_1(); ?></p>
    <p><?= $news->getParagraphe_2(); ?></p>
    <img src="<?= $news->getImage_3_path(); ?>" alt="<?= $news->getImage_3_name(); ?>" class="image_3">
    <p><?= $news->getParagraphe_3(); ?></p>
    <p class="intro_concl"><?= $news->getConclusion(); ?></p>
</section>