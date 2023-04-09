<?php
session_start();
require_once "index.php";
$img = array_diff(scandir("images/Cars"), ["..", "."]);
//$_SESSION["catalogs"] = $ruben;
//echo '<pre>'; print_r($_SESSION["catalogs"]); echo '</pre>';

//if (isset($_SERVER['HTTP_REFERER'])) {
//    $urlBack = htmlspecialchars($_SERVER['HTTP_REFERER']); //Адрес страницы, с которой браузер пользователя перешёл на текущую страницу.
//    echo "<a href='$urlBack' class='history-back'>Вернуться назад</a>";
//}

if (!isset($_SESSION["storage"])) {
    $img = array_diff(scandir("images/Cars"), ["..", "."]);
    foreach ($img as $key => $image) {
        $_SESSION["storage"][$key] = [
            "image" => $image,
            "date"  => date('d.m.y H:i:s')
        ];
    }
}

if(isset($_GET["title"], $_GET["key"])) {
    $_SESSION["storage"][$_GET['key']]["title"] = $_GET["title"];
    $_SESSION["storage"][$_GET['key']]["date"] = date('d.m.y H:i:s');
}

//echo '<pre>', print_r( $_SESSION["storage"]), '</pre>';
?>

<style>
    <?php include "main.css"; ?>
</style>
<section class="cards">
    <div class="cards__row">
        <?php foreach ($_SESSION["storage"] as $key => $value) { ?>
            <div class="cards__column">
                <div class="cards__item">
                    <div class="cards__image">
                        <a href="image_form.php?key=<?= $key ?>">
                            <img src="images/Cars/<?= $value["image"] ?>" title="<?= $value ?>" alt="">
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
