<?php
$title = 'Boxer Details';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

$prod_id=$_GET['prod_id'];

$sql = "SELECT * FROM products WHERE prod_id=$prod_id";
$result = $db->query($sql);
list($prod_id, $prod_name, $prod_description, $prod_price, $prod_catalog, $prod_detail)= $result->fetch_row();

?>


<header>
    <h1>Details for <?php echo($prod_name); ?></h1>
</header>
<div class="row">
    <div class="col-8">
        <figure>
            <img class="image-detail" src="images/<?php echo($prod_detail) ?>" alt="<?php echo($prod_name); ?> Photo">
            <figcaption><a href="product_detail.php"><?php echo($prod_name); ?> - $1</a></figcaption>
        </figure>
    </div>
    <div class="col-4">
        <p>
            <?php
            echo('Price: $'.$prod_price);
            echo('<br><br>');
            echo($prod_description);
        ?>
        </p>
    </div>
</div>

<?php



//create function to display bone
function bone_string($avg_rating) {
    $bone = "";
    $count = 0;
    while($count < $avg_rating) {
        $bone .= "<img class='bone' src='../images/bone.png' alt='bone'>";
        $count += 1;
    }
    return($bone);
}

$bone = bone_string($avg_rating);

$prod_id=$_GET['prod_id'];
$sql = "SELECT * FROM comments WHERE prod_id = $prod_id ORDER BY comment_date DESC LIMIT 4";
$result = $db->query($sql);
while(list($comment_id, $comment_author, $comment, $comment_date, $rating, $prod_id)= $result->fetch_row()){

    echo bone_string($rating);
    echo "<br>";
    //$date = date_create($comment_date);
    //$formatted_date = date_format($date, 'F d, Y');
    //echo "$formatted_date<br>";
    $datetime1 = new DateTime($comment_date);
    $datetime2 = new DateTime();
    $interval = $datetime1->diff($datetime2);
    echo $interval->format('Submitted %a day(s) ago')."<br>";
    echo "$comment_author<br>";
    echo "$comment<br>";
    echo "<hr>";

};




$prod_id=$_GET['prod_id'];


$comment = <<<EOU

<div class="story-edit-container">
    <form method="POST" action="comment_new.php">
            <p>
            <label>Rate this boxer: </label>
            $select
        </p>
        <select name="rating">
            <option value="1">1 Bone</option>
            <option value="2">2 Bones</option>
            <option value="3">3 Bones</option>
            <option value="4">4 Bones</option>
            <option value="5">5 Bones</option>
        </select>
        <input type="hidden" name="prod_id" value="$prod_id"/>
        <p><input type="text" name="author" value="$comment_author" placeholder="Your name" required></p>
        <textarea rows="7" cols="63" name="comment" placeholder="Your comments" required>$comment</textarea>


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
