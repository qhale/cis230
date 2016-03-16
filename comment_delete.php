<?php
ob_start();
$title = 'Comment Delete';
require 'includes/data_connection.php';

$comment_id=$_GET['comment_id'];
$sql = "DELETE FROM comments WHERE comment_id=$comment_id";
$result = $db ->query($sql);
mysqli_close($db);
$now = time();
ob_clean();
header("Location: comment_admin.php?t=$now&confirm=deleted");

?>

<!-- Closing html tags -->
        </div>
    </body>
</html>