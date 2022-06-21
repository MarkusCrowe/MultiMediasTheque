<article class="news_list">
<button class="button_add_news"><a href="?page=add_article"><i class="fa-solid fa-plus"></i></a></button>
    <?php foreach ($ArticlesMana->selectAllArticles() as $ArticlesViews) : ?>
        <section>
            <button class="button_view"><a href="?page=article_view&Id=<?= ($ArticlesViews->getId()) ?>" title="Views"><i class="fa-solid fa-eye"></i></a></button>
            <button class="button_edit"><a href="?page=article_edit&Id=<?= ($ArticlesViews->getId()) ?>" title="Edit"><i class="fa-solid fa-pen"></i></a></button>
            <button class="button_delete"><a href="?page=article_delete&Id=<?= ($ArticlesViews->getId()) ?>" title="Delete"><i class="fa-solid fa-trash-can"></i></a></button>
            <h3><?= $ArticlesViews->getTitle(); ?></h3>
        </section>
    <?php endforeach ?>
</article>