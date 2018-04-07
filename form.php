<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quete image</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid">
    <div class="jumbotron">
        <form method='post' action='control.php' enctype='multipart/form-data'>
        <input type="file" name="file[]" id="file" multiple class="btn btn-danger">
        <input type='submit' name='submit' class="btn btn-warning" value='Upload'>
    </form>
    </div>
</div>

<div class="container">

<?php
    $table = "";
    $liste = array();
    $dir="control/";
    if ($dossier = opendir($dir)) {
        while (($item = readdir($dossier)) !== false) {
            if ($item[0] == '.') { continue; }
            $liste[] = $item;
        }
        closedir($dossier);
        rsort($liste);
        foreach ($liste as $val) {
            $table .= '<div class="col-lg-3 col-md-4 col-xs-6">
                        <img class="img-fluid img-thumbnail" src="'.$dir.'/'.$val.'" alt="">
                           <div class="caption">
                               <p><strong>'.$val.'</strong></p>
                           </div>
                        
                            <form action="" method="post" role="form">
                                <input type="hidden"  name="image" value='.$val.' >
                                <input type="submit" class="btn btn-danger" name="delete" value="delete">
                            </form>
                        </div>';
            if(isset($_POST['delete'])){
                unlink("control/".$_POST['image']);
                header('location: control.php');
            }

        }
    }

    echo $table;
?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>







