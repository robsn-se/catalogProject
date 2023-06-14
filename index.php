<?php
require_once "controller.php";
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
<?php
//Если $_GET["page"] существует, не равен null И cуществует файл $_GET["page"] тогда =>
// подключаем файл "templates/$_GET["page"]",
// а Если $_GET["page"] не существует, равен null И не cуществует файл $_GET["page"] тогда =>
//подключаем файл "main.php"
echo '<pre>', print_r( $_SESSION, 1), '</pre>';

    if (isset($_GET["page"]) && file_exists("templates/{$_GET["page"]}.php")) {
        include "templates/{$_GET["page"]}.php";
    }
    else {
        include "templates/main.php";
    }
?>
</body>