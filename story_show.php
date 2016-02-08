<?php
$title = 'Story Show';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/data_connection.php';


if(isset($_GET['story_id'])){
    $story_id = $_GET['story_id'];
}
else{
    $story_id = 1;
}

$sql = "SELECT * FROM stories WHERE story_id=$story_id";
$result = $db->query($sql);
if($result===false){
    echo $sql."   ".$db->error;
}
else{
    list($story_id, $headline, $byline, $text, $pub_date) = $result->fetch_row();
}


?>

<!-- ********** Story Show ********** -->

<header>
    <h1>Story Show</h1>
</header>
<main class="container">
    <div class="row">
        <h3>Our Latest News</h3>
    </div>
</main>

<?php
$story = <<<EOS

    <h3>$headline</h3>
    <h5>$byline -- $pub_date</h5>
    <p>$text</p>
    <br>
    <a class="link-on-white-back" href="news.php">Back to News</a>

EOS;

echo $story;

require 'includes/footer.php';
?>

