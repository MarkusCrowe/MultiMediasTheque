<section>
    <h1> - Toules Les Actualités - </h1>
    <article>
        <ul>
            <?php foreach ($ArticleMana->selectAllArticles() as $ArticleViews) : ?>
                <li>
                    <a href="?page=article_view&Id=<?= ($ArticleViews->getId()) ?>">
                        <h4><?= $ArticleViews->getTitle(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>
</section>