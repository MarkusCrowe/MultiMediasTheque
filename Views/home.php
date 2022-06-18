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
        <?php foreach ($NewsMana->selectSixNews() as $NewViews) : ?>
            <section class="new">
                <a href="?page=new_view&Id=<?= ($NewViews->getId()) ?>"><img src="<?= $NewViews->getImage_1_path(); ?>" alt="<?= $NewViews->getImage_1_name(); ?>" class="image_1">
                    <h4><?= $NewViews->getTitle(); ?></h4>
                </a>
            </section>
        <?php endforeach ?>
    </article>

    <h1> - Dernières Actualités - </h1>
    <article class="actus">
        <a href="?page=all_news_list" class="all_actus">All</a>
        <ul>
            <?php foreach ($NewsMana->selectEightNews() as $NewViews) : ?>
                <li>
                    <a href="?page=new_view&Id=<?= ($NewViews->getId()) ?>">
                        <h4><?= $NewViews->getTitle(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>

    <h1> - Objets Récents - </h1>
    <article class="actus">
        <a href="?page=all_articles_list" class="all_actus">All</a>
        <ul>
            <?php foreach ($ArticlesMana->selectFiveArticles() as $ArticlesViews) : ?>
                <li>
                    <a href="?page=article_view&Id=<?= ($ArticlesViews->getId()) ?>">
                        <h4><?= $ArticlesViews->getTitle(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>

    <h1> - Forums Récents - </h1>
</section>