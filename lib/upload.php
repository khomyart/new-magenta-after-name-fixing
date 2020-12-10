<?php


if ($_POST['imgUploadButton'] || $_POST['imgEditUploadButton']) {
    $target_dir = "../images/";
} else {
    $target_dir = "../uploads/";
}

$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//$target_file = $target_dir . hash_file('md5', $_FILES["fileToUpload"]["name"]);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) || isset($_POST["imgUploadButton"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file

} else {
    var_dump($uploadOk);
    //die ();
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


        echo "The file ". $_FILES["fileToUpload"]["name"]. " has been uploaded.";

        if ($_POST["submit"]) {
            header ('Location: ../merch.php?newMerchUnderType=submit&fileLocation='.$target_file.'&MerchUnderTypeEdit='.$_POST["submit"]);
        } elseif ($_POST["imgUploadButton"]) {
            header('Location: ../gallery_control_panel.php?newImageCreate=pressed&fileLocation=' . $target_file);
        } elseif ($_POST["imgEditUploadButton"]){
            header ('Location: ../gallery_control_panel.php?imgEdit='.$_POST['imgEditUploadButton'].'&fileLocation='.$target_file);
        } else {
            header ('Location: ../merch.php?newMerchUnderType=submit&fileLocation='.$target_file);
        }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>