<?php
$servername = "localhost";
$username = "trtkp20a3";
$password = "trtkp20a3passwd";
$database = "trtkp20a3";
$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>