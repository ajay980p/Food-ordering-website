<?php
// Going to start the session so that it can store data within the browser
session_start();

define('SITEURL', 'http://localhost/food/');
// Connecting to the database
$servername = "127.0.0.1:3306";
$username = "root";
$password = 'root';
$dbname = "fods";
$port = 5306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn) {
    // echo "Connected to the db";
} else {
    echo "Database not Connected";
}
?>