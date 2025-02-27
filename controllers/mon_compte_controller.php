<?php
    require "templates/navbar.php";
    require 'views/mon_compte.php';
    session_start();
    var_dump($_SESSION['user_name']);

    require "templates/footer.php";
?>