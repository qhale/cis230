<?php
ob_start();
$title = 'Product Edit';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

//this gets story content from the db
if(isset($_GET['prod_id'])){
    $prod_id = $_GET['prod_id'];
}
else{
    $prod_id = 1;
}

$sql = "SELECT * FROM products WHERE prod_id=$prod_id";
$result = $db -> query($sql);
list($prod_id, $prod_name, $prod_description, $prod_price, $prod_catalog, $prod_detail)= $result -> fetch_row();

$submit = $_POST['submit'];

if ($submit) {

    $prod_name = $_POST['prod_name'];
    $prod_description = $_POST['description'];
    $prod_price = $_POST['price'];
    $prod_catalog = $_POST['catalog'];
    $prod_detail = $_POST['detail'];

    //check for missing name/description/price/catalog/detail
    $errors = array();
    if (!isset($prod_name) || $prod_name === "") {
        $errors['prod_name'] = "Product name can't be blank";
    }
    if (!isset($prod_description) || $prod_description === "") {
        $errors['description'] = "Description can't be blank";
    }
    if (!isset($prod_price) || $prod_price === "") {
        $errors['price'] = "Price can't be blank";
    }
    if (!isset($prod_catalog) || $prod_catalog === "") {
        $errors['catalog'] = "Catalog can't be blank";
    }
    if (!isset($prod_detail) || $prod_detail === "") {
        $errors['detail'] = "Detail can't be blank";
    }

    //display comment if there are errors
    if (count($errors) > 0) {
        echo "<h4> Please fix the following errors </h4>";
        echo "<ul>";
        foreach ($errors as $key => $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } //no errors
    else {
        $prod_name = mysqli_real_escape_string($db, $prod_name);
        $prod_description = mysqli_real_escape_string($db, $prod_description);
        $prod_price = mysqli_real_escape_string($db, $prod_price);
        $prod_catalog = mysqli_real_escape_string($db, $prod_catalog);
        $prod_detail = mysqli_real_escape_string($db, $prod_detail);

        $sql = "UPDATE products SET prod_name='$prod_name', prod_description='$prod_description', prod_price='$prod_price', prod_catalog='$prod_catalog', prod_detail='$prod_detail' WHERE prod_id=$prod_id";
        $result = $db->query($sql);
        ob_clean();
        header("Location:product_admin.php");
    }
};

$product = <<< EOU

    <div class= "story-edit-container">
        <form method='POST' action='product_edit.php?prod_id=$prod_id'>
        <p><input type='text' name='prod_name' value='$prod_name' placeholder="Product name" required></p>
        <p><input type='text' name='description' value='$prod_description' placeholder="Description" required></p>
        <p><input type='text' name='price' value='$prod_price' placeholder="Price" required></p>
        <p><input type='text' name='catalog' value='$prod_catalog' placeholder="Catalog" required></p>
        <p><input type='text' name='detail' value='$prod_detail' placeholder="Detail" required></p>
        <p><input type="submit" name="submit" value="Update"></p>
        </form>
    </div>

EOU;

echo $product;

?>

<!-- Closing html tags -->
        </div>
    </body>
</html>
