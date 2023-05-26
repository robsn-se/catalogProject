<?php
require_once "index.php";

if (isset($_SERVER['HTTP_REFERER'])) {
    $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<a href= '$urlback' class='back'>Вернуться назад</a>";
    echo "<a href= 'index.php' class='back'>На главную</a>";
}
if (isset($_GET['image']) && isset($_GET['catalog'])) {
    if(isset($_GET["title"])) {
        $_SESSION["file"][$_GET['catalog']][$_GET['image']]["title"] = $_GET["title"];
        $_SESSION["file"][$_GET['catalog']][$_GET['image']]["date"] = date('d.m.y H:i:s');
    }
    $_SESSION["file"][$_GET['catalog']][$_GET['image']]["favorites"] = isset($_GET["favorites"]);
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
    <title>Catalog</title>
</head>
<body>
<section class="cards">
    <div class="cards__row">
        <?php foreach ($_SESSION["file"][$_GET["catalog"]] as $key => $value) { ?>
            <div class="cards__column">
                <div class="cards__item">
                    <div class="cards__image">
                        <a href="image_form.php?catalog=<?= $_GET["catalog"] ?>&image=<?= $key ?>">
                            <img src="images/<?= $_GET["catalog"]?>/<?= $value["image"] ?>" title="<?= $value["image"] ?>" alt="">
                        </a>
                    </div>
                    <div class="items__body">
                        <div class="items__label">
                            <?= $value["date"] ?? "-" ?>
                        </div>
                        <div class="items__text">
                            <?= $value["title"] ?? "-" ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
</body>
</html>