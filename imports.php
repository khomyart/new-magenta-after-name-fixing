<?php
include './config.php';
include './lib/db.php';
include './lib/users.php';
include './lib/merch.php';
include './lib/colors.php';
include './lib/gallery.php';

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

initSession();
$isIndex = basename($_SERVER['SCRIPT_FILENAME']) == 'control.php';
$isPrice = basename($_SERVER['SCRIPT_FILENAME']) == 'price.php';
$isTrueIndex = basename($_SERVER['SCRIPT_FILENAME']) == 'index.php';
$isGallery = basename($_SERVER['SCRIPT_FILENAME']) == 'gallery.php';
$isAbout = basename($_SERVER['SCRIPT_FILENAME']) == 'about.php';

if ((!$isPrice) && (!$isTrueIndex) && (!$isGallery) && (!$isAbout)) {
    if (isAuth()) {
        // User is authorized
        if ($isIndex) {
            // Current file is index(control).
            // No need to show auth form.
            // Let's show positions page
            header("Location: merch.php");
            die();
        }
    } else {
        // User is not authorized
        if (!$isIndex) {
            // Current file is not index(control).
            // We need to redirect user to index page
            header("Location: control.php");
            die();
        }
    }

}

/*var_dump($_POST);
echo '<br/>';
var_dump($_SESSION);*/
