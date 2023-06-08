<a href="index.php" class="back">На главную</a>
<?php if (isset($_SERVER['HTTP_REFERER'])) { ?>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="back">Вернуться назад</a>
<?php } ?>
<div class="catalogs">
    <h1>Catalogs</h1>
    <nav class="nav">
        <?php foreach ($_SESSION["file"] as $key => $value) { ?>
            <a class="nav_link" href="index.php?page=catalog&catalog=<?= $key ?>"><?= $key ?></a>
        <?php } ?>
    </nav>
</div>