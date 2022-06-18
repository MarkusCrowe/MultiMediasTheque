<section class="all_news_list">
    <h1> - Toutes Les Actualités - </h1>
    <article>
        <ul>
            <?php foreach ($NewsMana->selectAllNews() as $NewViews) : ?>
                <li>
                    <a href="?page=new_view&Id=<?= ($NewViews->getId()) ?>">
                        <h4><?= $NewViews->getTitle(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>
    <a href="?page=home">Homepage</a>
</section>