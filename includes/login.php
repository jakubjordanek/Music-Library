<?php
    if (isset($_POST['login-submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        include "../includes/db.inc.php";
        include "../includes/login.inc.php";

        $login = new Login();
        $login->loginUser($email, $password);

        header("Location: ../");
    }
    else
    {
        header("Location: ../");
        exit();
    }
?>