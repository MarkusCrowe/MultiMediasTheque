<section class="article_view">
    <h1><?= $article->getTitle(); ?></h1>
    <img src="<?= $article->getImage_path(); ?>" alt="<?= $article->getImage_name(); ?>">
    <p><?= $article->getResume(); ?></p>
</section>