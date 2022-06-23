<?php
    session_start();

    if (!isset($_SESSION['logged']))
    {
        header("Location: /");
        exit();
    }

    include "includes/header.inc.php";
    include "includes/db.inc.php";
    include "includes/upload.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Music</title>

        <meta name="author" content="Jakub Jordanek">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <link rel="stylesheet" href="css/style.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            $header = new Header($_SESSION['username']);
            $header->showHeader();

            echo '<form method="POST" enctype="multipart/form-data" id="upload-form">';
            echo '<input type="text" placeholder="ENTER TITLE" name="title">';
            echo '<label class="file-upload">';
            echo '<input type="file" accept="audio/mp3" name="file">[ CHOOSE A FILE ]';
            echo '</label>';
            echo '<input type="submit" value="[ UPLOAD ]" name="upload-submit">';
            echo '</form>';

            if (isset($_POST['upload-submit']))
            {
                $upload = new Upload();
                $upload->uploadFile($_SESSION['id'], $_POST['title']);
            }
        ?>
    </body>
</html>