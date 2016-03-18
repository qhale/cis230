<?php
$title = 'Dogs Available';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/data_connection.php';
?>

<header>
    <h1>Dogs available for adoption:</h1>
</header>

//First row of products
<div class="row product-row">

<?php
$sql = "SELECT * FROM products ORDER BY prod_id LIMIT 4";
$result = $db->query($sql);

$image_item = "";
while(list($prod_id, $prod_name, $prod_description, $prod_price, $prod_catalog, $price_detail)=$result->fetch_row()){
    $image_item .='<div class="col-3">';
    $image_item .='<figure>';
    $image_item .='<a href="p_detail.php?prod_id=$prod_id"><img src="images/'.$prod_catalog.'"></a>';
    $image_item .='<figcaption><a href="p_detail.php?prod_id=$prod_id">'.$prod_name.' - $'.$prod_price.'</a></figcaption>';
    $image_item .='</figure>';
    $image_item .='</div>';
}
echo $image_item;
?>
    
</div>

//Second row of products
<div class="row product-row">

<?php
$sql = "SELECT * FROM products ORDER BY prod_id LIMIT 4,4";
$result = $db->query($sql);

$image_item = "";
while(list($prod_id, $prod_name, $prod_description, $prod_price, $prod_catalog, $price_detail)=$result->fetch_row()){
    $image_item .='<div class="col-3">';
    $image_item .='<figure>';
    $image_item .='<a href="p_detail.php?prod_id=$prod_id"><img src="images/'.$prod_catalog.'"></a>';
    $image_item .='<figcaption><a href="p_detail.php?prod_id=$prod_id">'.$prod_name.' - $'.$prod_price.'</a></figcaption>';
    $image_item .='</figure>';
    $image_item .='</div>';
}
echo $image_item;
?>

</div>

<?php
require 'includes/footer.php';

?>
