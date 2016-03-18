<?php
$title = 'News';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

?>

<header>
    <h1>Recent News</h1>
</header>

<?php

$sql = "SELECT * FROM stories ORDER BY pub_date DESC LIMIT 3";
//echo $sql;
$result = $db->query($sql);

$article_html = "";
while(list($story_id, $headline, $byline, $text, $pub_date)=$result->fetch_row()) {
    $text_shortened = $text;
    if (strlen($text_shortened) > 800) {
        $text_shortened = substr($text_shortened, 0, 800). "... <a class='link-on-white-back' href='news_detail.php?story_id=$story_id'>Read More</a>";
    }

    $article_html .= "<h2><a class='link-on-white-back' href='news_detail.php?story_id=$story_id'>" .$headline."</a></h2>";
    $date = date_create($pub_date);
    $formatted_date = date_format($date, 'F d, Y');
    $article_html .= "<h3>".$byline." - ".$formatted_date."</h3>";
    $article_html .= "<p>".$text_shortened."</p>";
}

$sql = "SELECT * FROM stories ORDER BY pub_date DESC LIMIT 3,5";
//echo $sql;
$result = $db->query($sql);

$archive_html = "";
while(list($story_id, $headline, $byline, $text, $pub_date)=$result->fetch_row()) {
    $archive_html .= "<a class='link-on-white-back' href='news_detail.php?story_id=$story_id'>" . $headline . "</a>";
    $date = date_create($pub_date);
    $formatted_date = date_format($date, 'F d, Y');
    $archive_html .= "<p>" . $formatted_date . "</p>";
}

?>
<div class="row">
    <div class="col-8 backleft">
        <?php
            echo $article_html;
        ?>
    </div>
    <div class="col-4 backright">
        <figure>
            <img src="images/boxer8.jpg" width="219" alt="boxer 8">
            <figcaption>
                Everyone loves boxers. Even cats!
            </figcaption>
        </figure>
        <figure>
            <img src="images/boxer4.jpg" width="219" alt="boxer 4">
            <figcaption>
                Aren't we just the cutest?
            </figcaption>
        </figure>
        <figure>
            <img src="images/whiteboxer.jpg" width="219" alt="snowball">
            <figcaption>
                Snuffles is my slave name. Call me, "Snowball".
            </figcaption>
        </figure>
        <br>
        <div class="news-archive">
            <h2>Archive</h2>
            <?php
                echo $archive_html;
            ?>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';

?>