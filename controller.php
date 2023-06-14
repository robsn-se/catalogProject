<?php
// session_start() создаем сеанс сессии
// Создаем константу  FILE_FOLDER присваиваем ей строковое значение "images" (так называется папка)
// Если $_SESSION["file"] не существует и равен null тогда =>
// Создаем переменную $catalogs присваиваем ей массив из каталогов
// Создаем цикл foreach пробегаемся по массиву $catalogs (папке images), а конкретно по значениям (по названиям каталогов) Array
                                                        //(
                                                        //    [2] => Animals
                                                        //    [3] => Cars
                                                        //    [4] => Flags
                                                        //    [5] => Nature
                                                        //)
//Создаем $_SESSION["favorites"][$catalog] = [] присваиваем пустой массив
//Создаем ещё один цикл foreach и пробегаемся по каталогам, преобразуем массив

session_start();
const FILE_FOLDER = "images";
//    echo '<pre>', print_r( $catalogs, 1), '</pre>';

if (!isset($_SESSION["file"])) {
    $catalogs = array_diff(scandir(FILE_FOLDER), ["..", "."]);
    foreach ($catalogs as $catalog) {
        $_SESSION["favorites"][$catalog] = [];
        foreach (array_diff(scandir(FILE_FOLDER . "/$catalog"), ["..", "."]) as $fileID => $file) {
            $_SESSION["file"][$catalog][$fileID] = [
                "id" => $fileID,
                "image" => $file,
                "date"  => date('d.m.y H:i:s'),
                "title"  => null,
            ];
        }
    }
//    echo '<pre>', print_r( $catalogs, 1), '</pre>';
}

// Если $_GET['image'] существует, не равен null И $_GET['catalog'] существует, не равен null => тогда
// Если $_GET['title'] существует, не равен null => тогда
// $_SESSION["file"][$_GET['catalog']][$_GET['image']]["title"] присваиваем = $_GET["title"](комментарий который прилетает с формы)
//$_SESSION["file"] массив с каталогами и фотографиями;$_GET['catalog']-название каталога;
//$_GET['image']-idФотографии;["title"]-ключ комментария
// Если $_GET["image"] не найден в массиве $_SESSION["favorites"][$_GET['catalog']] => тогда
// $_SESSION["favorites"][$_GET['catalog']][] присваиваем = $_GET['image'] idФотографии;
if (isset($_GET['image']) && isset($_GET['catalog'])) {
    if(isset($_GET["title"])) {
        $_SESSION["file"][$_GET['catalog']][$_GET['image']]["title"] = $_GET["title"];//
        $_SESSION["file"][$_GET['catalog']][$_GET['image']]["date"] = date('d.m.y H:i:s');//(дата котороя присваивается во время отправки формы)
        if (!in_array($_GET["image"], $_SESSION["favorites"][$_GET['catalog']], true)) {
            $_SESSION["favorites"][$_GET['catalog']][] = $_GET['image'];
        }
    }
}

// Если $_GET['image'] существует, не равен null  => тогда
// Создаем переменную $imageBoxCatalog присваиваем ей $_GET["catalog"](название каталога);
// Создаем переменную $imageDataArray присваиваем ей $_SESSION["file"][$imageBoxCatalog]();
// Если $_GET['image'] существует, не равен null  => тогда
// Создаем переменную $imageTitle присваиваем ей $imageDataArray[$_GET["image"]]["image"](название фотографии)
// Создаем переменную $imageFormSRC присваиваем ей путь к файлу src (название фотографии)
// Создаем переменную $imageKey присваиваем ей idФотографии;
// Создаем переменную $imageFormTitle присваиваем ей комментарий конкретной фотографии ;
// Создаем переменную $imageFormKeyFavorites присваиваем результат функции in_array(
//проверяем существует ли значение $_GET["image"] в массиве $_SESSION["favorites"][$_GET["catalog"]]);

if (isset($_GET["catalog"])) {
    $imageBoxCatalog = $_GET["catalog"];
    $imageDataArray = $_SESSION["file"][$imageBoxCatalog];
    if (isset($_GET["image"])) {
        $imageTitle = $imageDataArray[$_GET["image"]]["image"];
        $imageFormSRC = FILE_FOLDER . "/{$imageBoxCatalog}/{$imageDataArray[$_GET["image"]]["image"]}";
        $imageKey = $_GET["image"];
        $imageFormTitle = $imageDataArray[$_GET["image"]]["title"];
        $imageFormKeyFavorites = in_array($_GET["image"], $_SESSION["favorites"][$_GET["catalog"]], true);
    }
}

// Если $_GET не существует или имеет пустое или равное нулю значение => тогда
// Создаем переменную $imageDataArray присваиваем пустой массив;
// Пробегаемся циклом foreach по массиву $_SESSION["favorites"]
// В этом же цикле пробегаемся циклом foreach по массиву $imageIDs(idФотографии-)
// Переменной $imageDataArray[] присваиваем $_SESSION["file"][$catalog][$imageID]-а это id фотографии(массив,
// в котором хранятся данные image, title, date,), далее мы + ["catalog" => $catalog] это означает мы добавляем
// ключ "catalog" => $catalog (с названием самого каталога) в id фотографии(помним, что это массив данных фотографии)
if (empty($_GET)) {
    $imageDataArray = [];
//    $key = 0;
    foreach ($_SESSION["favorites"] as $catalog => $imageIDs) {
        foreach ($imageIDs as $imageID) {
//            echo '<pre>', print_r( $_SESSION["file"][$catalog][$imageID] + ["catalog" => $catalog], 1), '</pre>';
            $imageDataArray[] = $_SESSION["file"][$catalog][$imageID] + ["catalog" => $catalog];
//            $imageDataArray[$key]["catalog"] = $catalog;
//            $key++;
        }
    }
}