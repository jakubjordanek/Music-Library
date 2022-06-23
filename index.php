<?php
    session_start();

    include "includes/db.inc.php";
    include "includes/header.inc.php";
    include "includes/player.inc.php";
    include "includes/music.inc.php";
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
            if (isset($_SESSION['logged']))
            {
                $header = new Header($_SESSION['username']);
                $header->showHeader();

                if (isset($_GET['play']))
                {
                    $player = new Player($_GET['play']);
                    $player->showPlayer();
                }

                echo '<form method="POST" autocomplete="off" id="search-form">';
                echo '<input type="text" placeholder="SEARCH SONG" name="search"> ';
                echo '<input type="submit" value="[ SEARCH ]" name="search-submit">';
                echo '</form>';

                if (isset($_POST['search-submit']))
                {
                    header("Location: index.php?search=".$_POST['search']);
                }

                if (isset($_GET['search']))
                {
                    $music = new Music();
                    $music->showMusic("SELECT * FROM library INNER JOIN users ON library.artist_id=users.id WHERE library.title='".$_GET['search']."' OR library.title LIKE '%".$_GET['search']."%' OR library.title LIKE '".$_GET['search']."%' OR library.title LIKE '%".$_GET['search']."' OR users.username='".$_GET['search']."' OR users.username LIKE '%".$_GET['search']."%' OR users.username LIKE '".$_GET['search']."%' OR users.username LIKE '%".$_GET['search']."' ORDER BY date DESC");
                }
                else
                {
                    $music = new Music();
                    $music->showMusic("SELECT * FROM library INNER JOIN users ON library.artist_id=users.id ORDER BY date DESC");
                }
            }
            else
            {
                echo password_hash("qwerty123", PASSWORD_DEFAULT);
                echo '<form method="POST" action="includes/login.php" id="login-form">';
                echo '<input type="text" placeholder="ENTER EMAIL" name="email">';
                echo '<input type="password" placeholder="ENTER PASSWORD" name="password">';
                echo '<input type="submit" value="[ LOGIN ]" name="login-submit">';
                echo '</form>';
            }
        ?>
    </body>
</html>