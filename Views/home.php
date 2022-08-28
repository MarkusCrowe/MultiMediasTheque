<section class="homepage">
    <h1 id="actu"> - Actualités récentes - </h1>
    <article class="news">
        <?php foreach ($NewsMana->selectSixNews() as $NewViews) : ?>
            <section class="new">
                <a href="?page=new_view&Id=<?= ($NewViews->getId()) ?>" title="News"><img src="<?= $NewViews->getImage_1_path(); ?>" alt="<?= $NewViews->getImage_1_name(); ?>" class="image_1">
                    <h4><?= $NewViews->getTitle(); ?></h4>
                </a>
            </section>
        <?php endforeach ?>
    </article>

    <h1 id="actus"> - Dernières Actualités - </h1>
    <article class="actus">
        <a href="?page=all_news_list" class="all_actus" title="List News">All</a>
        <ul>
            <?php foreach ($NewsMana->selectEightNews() as $NewViews) : ?>
                <li>
                    <a href="?page=new_view&Id=<?= ($NewViews->getId()) ?>" title="News">
                        <h4><?= $NewViews->getTitle(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>

    <h1 id="article"> - Sujets Récents - </h1>
    <article class="actus">
        <a href="?page=all_articles_list" class="all_actus" title="List Article">All</a>
        <ul>
            <?php foreach ($ArticlesMana->selectFiveArticles() as $ArticlesViews) : ?>
                <li>
                    <a href="?page=article_view&Id=<?= ($ArticlesViews->getId()) ?>" title="Article">
                        <h4><?= $ArticlesViews->getTitle(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>

    <h1 id="forums"> - Forums Récents - </h1>
    <article class="actus">
        <a href="?page=forums_category" class="all_actus" title="Forums">Forums</a>
        <ul>
            <?php foreach ($ChatroomsMana->selectFiveChatrooms() as $ChatroomsViews) : ?>
                <li>
                    <a href="?page=forums_chats&Id=<?= $ChatroomsViews->getId(); ?>" title="forum">
                        <h4><?= $ChatroomsViews->getChatroom_name(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>
</section>