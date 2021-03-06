<?php
ob_start();
$title = 'Product Admin';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

if (isset($_SESSION['f_name'])) {
}
else {
    ob_clean();
    header("Location: index.php");
}
?>

<!-- ********** Product Admin ********** -->

<header>
    <h1>Product Admin</h1>
</header>
<nav>
    <ul>
        <li><a href="user_admin.php">User Admin</a></li>
        <li><a href="product_admin.php">Product Admin</a></li>
        <li><a href="story_admin.php">Story Admin</a></li>
        <li><a href="comment_admin.php">Comment Admin</a></li>
    </ul>
</nav>
<main class="container">
    <div class="row">
        <div class="col-12">
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Catalog</th>
                    <th>Detail</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                $sql = "SELECT * FROM products";
                $result = $db->query($sql);

                while(list($prod_id, $prod_name, $prod_description, $prod_price, $prod_catalog, $prod_detail) = $result->fetch_row()){
                    echo "<tr>";
                    echo "<td>$prod_id</td>";
                    echo "<td>$prod_name</td>";
                    echo "<td>$prod_description</td>";
                    echo "<td>$prod_price</td>";
                    echo "<td>$prod_catalog</td>";
                    echo "<td>$prod_detail</td>";
                    echo "<td><a href='product_detail.php?prod_id=$prod_id'>View</a></td>";
                    echo "<td><a href='product_edit.php?prod_id=$prod_id'>Edit</a></td>";
                    echo "<td><a href='product_delete.php?prod_id=$prod_id'>Delete</a></td>";
                    echo"</tr>";
                }
                //mysqli_close($db);
                ?>

            </table>
            <br><br>
            <a href="product_new.php">Add New Product</a>
        </div>
    </div>
</main>

<!-- Closing html tags -->
</div>
</body>
</html>