<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');

$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$options = '';
while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option>' . $row['name_category'] . '</option>';
}
echo $options;

mysqli_close($conn);
?>
