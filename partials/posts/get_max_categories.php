<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
$maxCategories = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM categories"));
echo json_encode($maxCategories);
?>
