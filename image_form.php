<?php
require_once "index.php";
//if (isset($_SERVER['HTTP_REFERER'])) {
//    $urlBack = htmlspecialchars($_SERVER['HTTP_REFERER']); //Адрес страницы, с которой браузер пользователя перешёл на текущую страницу.
//    echo "<a href='$urlBack' class='history-back'>Вернуться назад</a>";
//}

?>
<style>
    <?php include "main.css"; ?>
</style>
<form action="catalogs.php" method="get">
    <div>
        <input type="hidden" name="key" value="<?= $_GET['key'] ?>">
        <img src="images/Cars/<?= $_SESSION["storage"][$_GET['key']]["image"] ?>" alt="">
        <textarea name="title"></textarea>
        <input type="submit">
    </div>
</form>
