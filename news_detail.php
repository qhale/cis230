<?php
$title = 'News Detail';
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

<!-- ********** News Detail ********** -->

<header>
    <h1>Story Show</h1>
</header>
<main class="container">
    <div class="row">
        <h3 class="left-padding">Our Latest News</h3>
    </div>
</main>

<?php
$date = date_create($pub_date);
$formatted_date = date_format($date, 'F d, Y');

$story = <<<EOS

    <div class="news-item">
        <h3>$headline</h3>
        <h5>$byline -- $formatted_date</h5>
        <p>$text</p>
        <br>
        <a class="link-on-white-back bottom-padding" href="news.php">Back to News</a>
    </div>

EOS;

echo $story;

require 'includes/footer.php';
?>

