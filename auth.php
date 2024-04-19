<?php
session_start();

if($_SESSION['ltime'] < time() - 1800){
    session_unset();
    session_destroy();
    header("Location: alogin.php");
    exit();
}

if(!isset($_SESSION['id'])){
    header("Location: alogin.php");
    exit();
}
if(isset($_POST['logout'])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: alogin.php");
    exit();
}
