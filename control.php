<?php

$dir="control/";
$errors = [];
if(isset($_POST['submit'])){

    // Count total files
    $countfiles = count($_FILES['file']['name']);

    // Looping all files
    for($i=0; $i<$countfiles; $i++){
        $target_file = $dir . basename($_FILES['file']["name"][$i]);
        $imageFileType = '';


        if ($_FILES["file"]["size"][$i] > 1000000 || ($_FILES["file"]["size"] == 0)) {
            echo $errors[] = "Votre fichier est trop lourd";
            ?> <a href="javascript:history.go(-1)">Retour</a><?php
            die();

        }

        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo $errors[] = "Seuls les fichers jpg, png et gif sont acceptés.";
            ?> <a href="javascript:history.go(-1)">Retour</a><?php
            die();
        }


            $extension = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
            $filename = "Image" . uniqid() . '.' . $extension ;
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'][$i], 'control/' . $filename);}


}
header('location:form.php');
