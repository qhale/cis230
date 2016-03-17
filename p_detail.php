<?php
$title = 'Boxer Details';
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
?>

<header>
    <h1>Details for <?php echo($prod_name); ?></h1>
</header>
<div class="row product-row">
    <div class="col-3">
        <figure>
            <img class="image-detail" src="images/whiteboxer.jpg">
            <figcaption><a href="p_detail.php"><?php echo($prod_name); ?> - $1</a></figcaption>
        </figure>
    </div>
    <div class="col-9">
        <p>
            It's Gus Gus! And he only costs $1 to adopt! WHAT A STEAL.
        </p>
    </div>
</div>

<?php



//create function to display bone
function bone_string($avg_rating) {
    $bone = "";
    $count = 0;
    while($count < $avg_rating) {
        $bone .= "<img class='bone' src='../images/bone.png'>";
        $count += 1;
    }
    return($bone);
}

$bone = bone_string($avg_rating);

$prod_id=$_GET['prod_id'];
$sql = "SELECT * FROM comments ORDER BY comment_date DESC LIMIT 4";
$result = $db->query($sql);
while(list($comment_id, $comment_author, $comment, $comment_date, $rating, $prod_id)= $result->fetch_row()){

    echo bone_string($rating);
    echo "<br>";
    echo "$comment_date<br>";
    echo "$comment_author<br>";
    echo "$comment<br>";
    echo "<hr>";

};




$prod_id=$_GET['prod_id'];


$comment = <<<EOU

<div class="story-edit-container">
    <form method="POST" action="comment_new.php">
        <input type="hidden" name="prod_id" value="$prod_id"/>
        <p><input type="text" name="author" value="$comment_author" placeholder="Your name"></p>
        <textarea rows="7" cols="63" name="comment" placeholder="Your comments">$comment</textarea>
        <p>
            <label for="inquiry">Rate this boxer: </label>
            $select
        </p>
        <select name="rating">
            <option value="1">1 Bone</option>
            <option value="2">2 Bones</option>
            <option value="3">3 Bones</option>
            <option value="4">4 Bones</option>
            <option value="5">5 Bones</option>
        </select>

        <p><input type="submit" name="submit" value="Submit"></p>
    </form>
</div>

EOU;

echo $comment;

?>

<a class="link-on-white-back" href="products.php">Back to available dogs</a>

<?php
require 'includes/footer.php';
?>
