<!-- <p>Hello World!</p> -->
<script src="../Assets/JS/horloge.js"></script>
<div>
    <div class="horloge">
        <div class="heures"></div>
        <div class="date"></div>
    </div>
</div>
<section class="homepage">
    <h1> - Actualités récentes - </h1>
    <article class="news">
        <?php foreach ($ArticleMana->selectSixArticles() as $ArticleViews) : ?>
            <section class="new">
                <a href="?page=article_view&Id=<?= ($ArticleViews->getId()) ?>"><img src="<?= $ArticleViews->getImage_1_path(); ?>" alt="<?= $ArticleViews->getImage_1_name(); ?>" class="image_1">
                    <h4><?= $ArticleViews->getTitle(); ?></h4>
                </a>
            </section>
        <?php endforeach ?>
    </article>

    <h1> - Dernières Actualités - </h1>
    <article class="actus">
        <a href="?page=articles_list" class="all_actus">All</a>
        <ul>
            <?php foreach ($ArticleMana->selectEightArticles() as $ArticleViews) : ?>
                <li>
                    <a href="?page=article_view&Id=<?= ($ArticleViews->getId()) ?>">
                        <h4><?= $ArticleViews->getTitle(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>
</section>