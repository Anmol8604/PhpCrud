<?php
include 'auth.php';
include 'connection.php';
include 'methods.php';
$id = $_SESSION['id'];
$method =  $_POST['methodName'];

if ($method == 'update') {
    update($id);
}
else if ($method == 'addVendor') {
    addVendor($id);
}
