<?php
session_start();
session_destroy();

unset($_SESSION['id'],$_SESSION['type'],$_SESSION['usn']);

if (isset($_COOKIE['usn'],$_COOKIE['id'],$_COOKIE['type'])){
    setcookie("usn",null, -1,'/');
    setcookie("id",null, -1,'/');
    setcookie("type",null, -1,'/');
}

header('location: ../index.php');
