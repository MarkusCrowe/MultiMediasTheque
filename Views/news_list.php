<article class="news_list">
<button class="button_add_news"><a href="?page=add_news"><i class="fa-solid fa-plus"></i></a></button>
    <?php foreach ($NewsMana->selectAllNews() as $NewViews) : ?>
        <section>
            <button class="button_view"><a href="?page=new_view&Id=<?= ($NewViews->getId()) ?>"><i class="fa-solid fa-eye"></i></a></button>
            <button class="button_edit"><a href="?page=new_edit&Id=<?= ($NewViews->getId()) ?>"><i class="fa-solid fa-pen"></i></a></button>
            <button class="button_delete"><a href="?page=new_delete&Id=<?= ($NewViews->getId()) ?>"><i class="fa-solid fa-trash-can"></i></a></button>
            <h3><?= $NewViews->getTitle(); ?></h3>
        </section>
    <?php endforeach ?>
</article>

