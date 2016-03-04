<?php
ob_start();
$title = 'Product Delete';
require 'includes/data_connection.php';

$prod_id=$_GET['prod_id'];
$sql = "DELETE FROM products WHERE prod_id=$prod_id";
$result = $db ->query($sql);
mysqli_close($db);
$now = time();
ob_clean();
header("Location: product_admin.php?t=$now&confirm=deleted");

?>

<!-- Closing html tags -->
        </div>
    </body>
</html>