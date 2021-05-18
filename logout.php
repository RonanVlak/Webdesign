<?php
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["uname"]);
    header("Location: Account.php");
?>