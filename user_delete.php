<?php
ob_start();
$title = 'User Delete';
require 'includes/data_connection.php';

$user_id=$_GET['user_id'];
$sql = "DELETE FROM users WHERE user_id=$user_id";
$result = $db ->query($sql);
mysqli_close($db);
$now = time();
ob_clean();
header("Location: user_admin.php?t=$now&confirm=deleted");

?>