<a href="index.php" class="back">На главную</a>
<?php if (isset($_SERVER['HTTP_REFERER'])) { ?>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="back">Вернуться назад</a>
<?php } ?>
<form action="index.php" method="get">
    <div>
        <input type="hidden" name="catalog" value="<?= $imageBoxCatalog ?>">
        <input type="hidden" name="image" value="<?= $imageKey ?>">
        <img src="<?= $imageFormSRC?>" alt="" title="<?= $imageTitle?>">
        <div>
            <input type="checkbox" name="favorites" value=1 <?= $imageFormKeyFavorites ? "checked" : ""?>>
            <p>Избранное</p>
        </div>
        <textarea name="title"><?= $imageFormTitle ?></textarea>
        <input type="submit">
    </div>
</form>
