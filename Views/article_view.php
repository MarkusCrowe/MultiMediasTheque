<section>
    <h1><?= $article->getTitle(); ?></h1>
    <p><?= $article->getResume(); ?></p>
    <img src="<?= $article->getImage_path(); ?>" alt="<?= $article->getImage_name(); ?>">
</section>