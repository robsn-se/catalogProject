<?php
session_start();
const FILE_FOLDER = "images";
if (!isset($_SESSION["file"])) {
    $catalogs = array_diff(scandir(FILE_FOLDER), ["..", "."]);
    foreach ($catalogs as $catalog) {
        foreach (array_diff(scandir(FILE_FOLDER . "/$catalog"), ["..", "."]) as $file) {
            $_SESSION["file"][$catalog][] = [
                "image" => $file,
                "date"  => date('d.m.y H:i:s'),
                "title"  => null,
                "favorites" => false
            ];
        }
    }
}
//echo '<pre>'; print_r($_SERVER); echo '</pre>';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Catalog Project</title>
</head>
<body>
<div class="catalogs">
    <h1>Catalogs</h1>
    <nav class="nav">
        <?php foreach ($_SESSION["file"] as $key => $value) { ?>
            <a class="nav_link" href="catalog.php?catalog=<?= $key ?>"><?= $key ?></a>
        <?php } ?>
    </nav>
</div>
<?php if ($_SERVER["DOCUMENT_URI"] == "/catalogProject/index.php") {?>
<section class="cards">
    <div class="cards__row">
        <?php foreach ($_SESSION["file"] as $catalogName => $catalogFiles) {
            foreach ($catalogFiles as $fileID => $fileData) {
                if (!$fileData["favorites"]){ continue;} ?>
            <div class="cards__column">
                <div class="cards__item">
                    <div class="cards__image">
                        <a href="image_form.php?catalog=<?= $catalogName ?>&image=<?= $fileID ?>">
                            <img src="images/<?= $catalogName?>/<?= $fileData["image"] ?>" title="<?= $fileData["image"] ?>" alt="">
                        </a>
                    </div>
                    <div class="items__body">
                        <div class="items__label">
                            <?= $fileData["date"] ?? "-" ?>
                        </div>
                        <div class="items__text">
                            <?= $fileData["title"] ?? "-" ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
    </div>
</section>
<?php } ?>
</body>
</html>