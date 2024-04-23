<?php
$conn = new mysqli('localhost', 'homestead', 'secret', 'Project2');
$pubConn = new mysqli('localhost', 'homestead', 'secret', 'Public');
if($conn->connect_error || $pubConn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}