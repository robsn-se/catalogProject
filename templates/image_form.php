<form action="catalog.php" method="get">
    <div>
        <input type="hidden" name="catalog" value="<?= $imageBoxCatalog ?>">
        <input type="hidden" name="image" value="<?= $imageKey ?>">
        <img src="<?= $imageFormSRC?>" alt="">
        <div>
            <input type="checkbox" name="favorites" value=1 <?= $imageFormKeyFavorites ? "checked" : ""?>>
            <p>Избранное</p>
        </div>
        <textarea name="title"><?= $imageFormTitle ?></textarea>
        <input type="submit">
    </div>
</form>
