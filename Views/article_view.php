<!-- <?php foreach ($ArticleMana->selectAllArticles() as $ArticleViews) : ?> -->
        <!-- <section>
            <h1><?= $ArticleViews->getTitle(); ?></h1>
            <p class="intro_concl"><?= $ArticleViews->getIntroduction(); ?></p>
            <img src="<?= $ArticleViews->getImage_2_path(); ?>" alt="<?= $ArticleViews->getImage_1_name(); ?>" class="image_1">
            <p><?= $ArticleViews->getParagraphe_1(); ?></p>
            <p><?= $ArticleViews->getParagraphe_2(); ?></p>
            <img src="<?= $ArticleViews->getImage_3_path(); ?>" alt="<?= $ArticleViews->getImage_2_name(); ?>" class="image_2">
            <p><?= $ArticleViews->getParagraphe_3(); ?></p>
            <p class="intro_concl"><?= $ArticleViews->getConclusion(); ?></p>   
        </section> -->
    <!-- <?php endforeach ?> -->
<article class="article_view">
    <header>
        <img src="<?= $article->getImage_1_path(); ?>" alt="<?= $ArticleViews->getImage_1_name(); ?>" class="image_1">
        <h1><?= $article->getTitle(); ?></h1>
    </header>

<p class="intro_concl"><?= $article->getIntroduction(); ?></p>
<img src="<?= $article->getImage_2_path(); ?>" alt="<?= $ArticleViews->getImage_2_name(); ?>" class="image_2">
<p><?= $article->getParagraphe_1(); ?></p>
<p><?= $article->getParagraphe_2(); ?></p>
<img src="<?= $article->getImage_3_path(); ?>" alt="<?= $ArticleViews->getImage_3_name(); ?>" class="image_3">
<p><?= $article->getParagraphe_3(); ?></p>
<p class="intro_concl"><?= $article->getConclusion(); ?></p>
</article>