<section class="all_news_list">
    <h1> - Toutes Les Actualités - </h1>
    <article>
        <ul>
            <?php foreach ($NewsMana->selectAllNews() as $NewViews) : ?>
                <li>
                    <a href="?page=new_view&Id=<?= ($NewViews->getId()) ?>" title="Visionner actualité">
                        <h4><?= $NewViews->getTitle(); ?></h4>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </article>
    <p class="button_home"><a href="?page=home" title="homepage"><i class="fa-solid fa-house"></i></a></p>
</section>