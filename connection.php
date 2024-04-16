<?php
$conn = new mysqli('localhost', 'homestead', 'secret', 'Project2');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}