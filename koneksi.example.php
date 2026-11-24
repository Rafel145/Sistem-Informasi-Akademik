<?php
$host = "localhost";
$username = "your_username";
$password = "your_password";
$namaDB = "sistem1";

$mysqli = new mysqli($host, $username, $password, $namaDB);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>