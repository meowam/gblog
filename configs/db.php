<?php
if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set('Europe/Kiev');
// Дані для підключення до бази даних
$server = "localhost";
$username = "root";
$password = "";
$dbname = "genshin_blog";

// підключення до бази даних 
$conn = mysqli_connect($server, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
//  встановимо кодування для коректного відображення кирилиці
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}
