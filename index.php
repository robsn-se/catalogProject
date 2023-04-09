<?php
if (!isset($_SESSION["images"])) {
    $images = array_diff(scandir("images"), ["..", "."]);
    foreach ($images as $key => $catalog) {
        $_SESSION["images"][$key]  = $catalog;
    }
//echo '<pre>'; print_r($_SESSION["images"]); echo '</pre>';
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
    <title>Catalog Project</title>
</head>
<body>
<div class="catalogs">
    <h1>Catalogs</h1>
    <nav class="nav">
        <?php foreach ($_SESSION["images"] as $key => $value) { ?>
            <a class="nav_link" href="catalogs.php?key=<?= $key ?>&catalog=<?= $value ?>"><?= $value ?></a>
        <?php } ?>
    </nav>
</div>
</body>
</html>