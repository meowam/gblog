<?php
// Дані для підключення до бази даних
$server = "localhost";
$username = "root";
$password = "";
$dbname = "genshin_blog";

// підключення до бази даних 
$connect = mysqli_connect($server, $username, $password, $dbname);
$connect->set_charset("utf8mb4");
//  встановимо кодування для коректного відображення кирилиці
if (!$connect) {
    die("Connection failed:" . mysqli_connect_error());
}
