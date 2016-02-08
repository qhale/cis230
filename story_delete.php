<?php
ob_start();
$title = 'Story Delete';
require 'includes/data_connection.php';

$story_id=$_GET['story_id'];
$sql = "DELETE FROM stories WHERE story_id=$story_id";
$result = $db ->query($sql);
mysqli_close($db);
$now = time();
ob_clean();
header("Location: story_admin.php?t=$now&confirm=deleted");

?>