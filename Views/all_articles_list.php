<section class="all_news_list">
    <h1> - Tous Les Articles - </h1>
    <article>
        <ul>
            <?php foreach ($ArticlesMana->selectAllArticles() as $ArticlesViews) : ?>
                <li>
                    <a href="?page=article_view&Id=<?= ($ArticlesViews->getId()) ?>">
                        <h4><?= $ArticlesViews->getTitle(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>
    <p class="button_home"><a href="?page=home"><i class="fa-solid fa-house"></i></a></p>
</section>