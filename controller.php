<?php
session_start();
const FILE_FOLDER = "images";
if (!isset($_SESSION["file"])) {
    $catalogs = array_diff(scandir(FILE_FOLDER), ["..", "."]);
    foreach ($catalogs as $catalog) {
        $_SESSION["favorites"][$catalog] = [];
        foreach (array_diff(scandir(FILE_FOLDER . "/$catalog"), ["..", "."]) as $file) {
            $_SESSION["file"][$catalog][] = [
                "image" => $file,
                "date"  => date('d.m.y H:i:s'),
                "title"  => null,
            ];
        }
    }
}

if (isset($_GET['image']) && isset($_GET['catalog'])) {
    if(isset($_GET["title"])) {
        $_SESSION["file"][$_GET['catalog']][$_GET['image']]["title"] = $_GET["title"];
        $_SESSION["file"][$_GET['catalog']][$_GET['image']]["date"] = date('d.m.y H:i:s');
        if (!in_array($_GET["image"], $_SESSION["favorites"][$_GET['catalog']], true)) {
            $_SESSION["favorites"][$_GET['catalog']][] = $_GET['image'];
        }
    }

}

if (isset($_GET["catalog"])) {
    $imageBoxCatalog = $_GET["catalog"];
    $imageDataArray = $_SESSION["file"][$imageBoxCatalog];
    if (isset($_GET["image"])) {
        $imageFormSRC = FILE_FOLDER . "/{$imageBoxCatalog}/{$_SESSION["file"][$imageBoxCatalog][$_GET["image"]]["image"]}";
        $imageKey = $_GET["image"];
        $imageFormTitle = $_SESSION["file"][$_GET["catalog"]][$_GET["image"]]["title"];
        $imageFormKeyFavorites = in_array($_GET["image"], $_SESSION["favorites"][$_GET["catalog"]], true);
    }

}
if (empty($_GET)) {
    $imageDataArray = [];
//    $key = 0;
    foreach ($_SESSION["favorites"] as $catalog => $imageIDs) {
        foreach ($imageIDs as $imageID) {
            $imageDataArray[] = $_SESSION["file"][$catalog][$imageID] + ["catalog" => $catalog];
//            $imageDataArray[$key]["catalog"] = $catalog;
//            $key++;
        }
    }
}