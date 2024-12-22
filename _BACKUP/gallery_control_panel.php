<?php
header("Content-Type: text/html; charset=UTF-8");

include './imports.php';
include './templates/header.php';
include './templates/navigation.php';

$searchValue = '';

if (isset($_REQUEST['isSearch']) && ($_REQUEST['isSearch'] == 'Y')) {
    $searchValue = $_REQUEST['search'];
}

$listOfImages = getListOfImages();

if (isset($_GET['cancel'])) {
    header('Location: gallery_control_panel.php');
}

if (isset($_GET['newImageSave'])) {
    $params = [
        'img' => $_GET['newImageAddress'],
        'name' => $_GET['newImgName'],
        'desc' => $_GET['newImageDesc'],
    ];

    if (!editGalleryUnit('insert', $params)) {
        die('Неможливо підключитись до бази данних');
    };

    header('Location: gallery_control_panel.php');
}

if (isset($_GET['imgDelete'])) {
    $params = [
        'id' => $_GET['imgDelete'],
    ];

    if (!editGalleryUnit('remove', $params)) {
        die('Неможливо підключитись до бази данних');
    };

    foreach ($listOfImages as $image) {
        if ($image['id'] == $params['id']) {
            $fileName = $image['img'];
            break;
        }
    }

    $fileName = substr($fileName, 1);

    unlink($fileName);

    header('Location: gallery_control_panel.php');
}

if (isset($_GET['editImageSave'])) {
    $params = [
        'id' => $_GET['editImageSave'],
        'img' => $_GET['editImageAddress'],
        'name' => $_GET['editImgName'],
        'desc' => $_GET['editImageDesc'],
    ];

    if (!editGalleryUnit('update', $params)) {
        die('Неможливо підключитись до бази данних');
    };

    header('Location: gallery_control_panel.php');
}

?>

<style>
    .new-image-button {
        background: none;
        outline: none;
        margin: 0px;
        padding: 0px;
        border: none;
    }

</style>

<form action="./lib/upload.php" method="post" enctype="multipart/form-data" id="uploadingFormFile">
</form>

<div class="container col-10">
    <div class="row">
        <div class="col">
            <br />

            <form class="form-inline d-flex justify-content-center" action="" method="get">
                <div>
                    <input type="hidden" name="isSearch" value="Y">
                    <div class="form-group">
                        <label for="search" class="sr-only">Текст для пошуку</label>
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            id="search"
                            placeholder="Текст для пошуку"
                            value="<?= $searchValue ?>">
                        <button type="submit" class="btn btn-primary" style="margin-left: 5px;">Пошук</button>
                    </div>
                </div>
            </form>

            <br />
            <form action="" method="get">
                <!--GALLERY-->
                <div class="gallery-container">
                    <div class="content-header">
                        <h2>Галерея</h2>
                    </div>
                    <div class="space-between-lots">
                        <div class="separator">
                        </div>
                    </div>
                    <div class="gallery-image">
                        <?php foreach ($listOfImages as $image) {
                            if ($_GET['imgEdit'] == $image['id']) { ?>
                                <div class="img-box">
                                    <div style="background-color: rgba(106,106,106,0.25); padding: 15px; border-radius: 5px;">
                                        <div class="input-group">
                                            <div class="custom-file d-flex justify-content-between">
                                                <input hidden name="editImageAddress"
                                                       value="<?= !isset($_GET['fileLocation']) ? $image['img'] : $_GET['fileLocation'] ?>">
                                                <input type="file" class="uploading-image-input"
                                                       form="uploadingFormFile"
                                                       name="fileToUpload"
                                                       id="fileToUpload"
                                                       style="width: 200px;">
                                                <button class="uploading-button-input" type="submit" form="uploadingFormFile"
                                                        name="imgEditUploadButton"
                                                        value="<?= $image['id'] ?>">
                                                    Завантажити
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control"
                                                   placeholder="Назва" name="editImgName" value="<?= $image['name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Опис" name="editImageDesc"
                                            ><?= str_replace('<br />', '', $image['desc']); ?></textarea>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <button type="submit" class="btn btn-primary" name="editImageSave" value="<?= $image['id'] ?>">
                                                Зберегти
                                            </button>
                                            <button type="submit"
                                                    style="margin-left: 10px;"
                                                    class="btn btn-primary" name="cancel">
                                                Відміна
                                            </button>
                                            <?php
                                            if (isset($_GET['fileLocation']) || isset($image['img'])) { ?>
                                                <div style="color: green; margin-left: 20px; margin-top: 6px;">
                                                    Картинка ✅
                                                </div>
                                                <?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else { ?>
                                <div class="img-box position-relative">
                                    <button type="submit" class="btn btn-danger"
                                            name="imgDelete"
                                            value="<?= $image['id'] ?>"
                                            style="z-index: 2000; position: absolute; top:15px; right: 20px;">Видалити
                                    </button>
                                    <button type="submit" class="btn btn-warning"
                                            name="imgEdit"
                                            value="<?= $image['id'] ?>"
                                            style="z-index: 2000; position: absolute; top:62px; right: 14px">Редагувати
                                    </button>
                                    <a href="<?= $image['img'] ?>" data-lightbox="magenta_gallery">
                                        <img src="<?= $image['img'] ?>" alt=""/>
                                        <div class="transparent-box">
                                            <div class="caption">
                                                <p><?= $image['name'] ?></p>
                                                <p class="opacity-low"><?= $image['desc'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                        }

                        if ($_GET['newImageCreate']) { ?>
                            <div class="img-box">
                                <div style="background-color: rgba(106,106,106,0.25); padding: 15px; border-radius: 5px;">
                                    <div class="input-group">
                                        <div class="custom-file d-flex justify-content-between">
                                            <input hidden name="newImageAddress"
                                                   value="<?= $_GET['fileLocation'] ?>">
                                            <input type="file" class="uploading-image-input"
                                                   form="uploadingFormFile"
                                                   name="fileToUpload"
                                                   id="fileToUpload"
                                            style="width: 200px;">
                                            <button class="uploading-button-input" type="submit" form="uploadingFormFile"
                                                    name="imgUploadButton"
                                                    value="submit">
                                                Завантажити
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control"
                                               placeholder="Назва" name="newImgName">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Опис" name="newImageDesc"></textarea>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <button type="submit" class="btn btn-primary" name="newImageSave"
                                                value="submit">
                                            Зберегти
                                        </button>
                                        <button type="submit"
                                                style="margin-left: 10px;"
                                                class="btn btn-primary" name="cancel">
                                            Відміна
                                        </button>
                                        <?php
                                        if (isset($_GET['fileLocation'])) { ?>
                                            <div style="color: green; margin-left: 20px; margin-top: 6px;">
                                                Картинка ✅
                                            </div>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        } if (!isset($_GET['newImageCreate'])) {?>
                            <button class="new-image-button" type="submit" name="newImageCreate" value="pressed">
                                <div class="img-box">
                                    <a href="./img/new_image_icon.jpg" data-lightbox="magenta_gallery">
                                        <img src="./img/new_image_icon.jpg" alt="" />
                                    </a>
                                </div>
                            </button>
                        <?php } ?>
                    </div>
                </div>
                <!--GALLERY-->
            </form>
        </div>
    </div>
</div>

<?php include './templates/footer.php'; ?>
