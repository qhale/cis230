<?php
ob_start();
$title = 'Product View';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

$prod_id=$_GET['prod_id'];

//create product average rating
$sql = "SELECT AVG(rating) FROM comments WHERE prod_id=$prod_id";
$result = $db->query($sql);
//echo $sql . "<br/>"
$avg_rating = $result->fetch_row()[0];
//echo "Average Rating: $avg_rating";

$sql = "SELECT * FROM products WHERE prod_id=$prod_id";
$result = $db->query($sql);
list($prod_id, $prod_name, $prod_description, $prod_price, $prod_catalog, $prod_detail)= $result->fetch_row();


//create function to display stars
function stars_string($avg_rating) {
    $stars = "";
    $count = 0;
    while($count < $avg_rating) {
        $stars .= "<img src='..images/star.png'>";
        $count += 1;
    }
    return($stars);
}

$stars = stars_string($avg_rating);

$sql = "SELECT * FROM comments WHERE prod_id=$prod_id";
$result = $db->query($sql);
while(list($prod_id, $prod_name, $prod_description, $prod_price, $prod_catalog, $prod_detail)= $result->fetch_row()){

    echo stars_string($rating);
    echo "<br>";
    echo "$comment_date";
    echo "$comment_author<br>";
    echo "$comment<br>";
    echo "<hr>";

};

$prod_id=$_GET['prod_id'];

$new_comment = <<<NC

    <form method="POST" action="comment_new.php">
    <input type="hidden" name="prod_id" value="$prod_id"/><br>
    <input type="text" name="author" value="$comment_author"/><br>
    <textarea name="comment" row="5" cols="30"></textarea><br>
    <select name="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br>
    <input type="submit" name="submit" value="Submit Comment"/>
    </form>

NC;

echo $new_comment;

?>

<?php
require 'includes/footer.php';
?>

