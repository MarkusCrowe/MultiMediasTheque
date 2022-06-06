<article>
    <h1><?= $ArticleViews->getTitle(); ?></h1>
    <p><?= $ArticleViews->getParagraphe_1(); ?></p>
    <p><?= $ArticleViews->getParagraphe_2(); ?></p>
    <p><?= $ArticleViews->getParagraphe_3(); ?></p>
    <img src="<?=$ArticleViews->getImage_1_path(); ?>" alt="<?=$ArticleViews->getImage_1_name(); ?>">
    <img src="<?=$ArticleViews->getImage_2_path(); ?>" alt="<?=$ArticleViews->getImage_2_name(); ?>">
</article>
