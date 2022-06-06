<article class="articles_list">
<a href="?page=news">Add News</a>
    <?php foreach ($ArticleMana->selectAllArticles() as $ArticleViews) : ?>
        <section>
            <button class="button_edit"><a href="#"><i class="fa-solid fa-pen"></i></a></button>
            <button class="button_delete"><a href="#"><i class="fa-solid fa-trash-can"></i></a></button>
            <!-- <button class="edit"><a href="edit.php?Id=<?= ($ArticleViews->getId()) ?>"><i class="fa-solid fa-gear"></i></a></button>
            <button class="delete"><a href="delete.php?Id=<?= ($ArticleViews->getId()) ?>"><i class="fa-solid fa-trash-can"></i></a></button> -->
            <h1><?= $ArticleViews->getTitle(); ?></h1>
            <img src="<?= $ArticleViews->getImage_1_path(); ?>" alt="<?= $ArticleViews->getImage_1_name(); ?>" class="image_1">
            <p><?= $ArticleViews->getParagraphe_1(); ?></p>
            <p><?= $ArticleViews->getParagraphe_2(); ?></p>
            <img src="<?= $ArticleViews->getImage_2_path(); ?>" alt="<?= $ArticleViews->getImage_2_name(); ?>" class="image_2">
            <p><?= $ArticleViews->getParagraphe_3(); ?></p>   
        </section>
    <?php endforeach ?>
</article>

