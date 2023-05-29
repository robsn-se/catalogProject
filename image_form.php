<?php
require_once "index.php";
//echo '<pre>'; print_r($_SESSION["file"][$_GET['catalog']][$_GET['image']]); echo '</pre>';

if (isset($_SERVER['HTTP_REFERER'])) {
    $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<a href= '$urlback' class='back'>Вернуться назад</a>";
    echo "<a href= 'index.php' class='back'>На главную</a>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Image form</title>
</head>
<body>
<form action="catalog.php" method="get">
    <div>
        <input type="hidden" name="catalog" value="<?= $_GET["catalog"]?>">
        <input type="hidden" name="image" value="<?= $_GET["image"]?>">
        <img src="images/<?= $_GET["catalog"]?>/<?= $_SESSION["file"][$_GET["catalog"]][$_GET["image"]]["image"]?>" alt="" title="<?= $_SESSION["file"][$_GET["catalog"]][$_GET["image"]]["image"]?>">
        <div>
            <input type="checkbox" name="favorites" value=1 <?= $_SESSION["file"][$_GET["catalog"]][$_GET["image"]]["favorites"] ? "checked" : ""?>>
            <p>Избранное</p>
        </div>
        <textarea name="title"><?= $_SESSION["file"][$_GET["catalog"]][$_GET["image"]]["title"]?></textarea>
        <input type="submit">
    </div>
</form>
</body>
</html>
