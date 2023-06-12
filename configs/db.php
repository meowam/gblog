<?php
if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set('Europe/Kiev');
$server = "localhost";
$username = "root";
$password = "";
$dbname = "genshin_blog";

$conn = mysqli_connect($server, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}
