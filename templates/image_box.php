<section class="cards">
    <div class="cards__row">
        <?php foreach ($imageDataArray as $key => $fileData) { ?>
            <?php
            $imageBoxCatalog = $fileData["catalog"] ?? $imageBoxCatalog;
            $imageTemplateTransitionLink = "index.php?page=image_form&catalog={$imageBoxCatalog}&image={$fileData["id"]}";
            $imageTemplateSRC = FILE_FOLDER . "/{$imageBoxCatalog}/{$fileData["image"]}";
            $imageTitle = $fileData["image"];
            $imageTemplateDate = $fileData["date"];
            $imageTemplateTitle = $fileData["title"];
            include "image_template.php";
            ?>
        <?php } ?>
    </div>
</section>
