<?php
ob_start();
$title = 'Story New';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

//this processes for input
$submit = $_POST['submit'];

if($submit){
    $headline = $_POST['headline'];
    $byline = $_POST['byline'];
    $text = $_POST['text'];

    //check for missing headline/byline/text
    $errors = array();
    if (!isset($headline) || $headline === ""){
        $errors['headline'] = "Headline can't be blank";
    }
    if (!isset($byline) || $byline === ""){
        $errors['byline'] = "Byline can't be blank";
    }
    if (!isset($text) || $text === ""){
        $errors['text'] = "Text area can't be blank";
    }
    else {
        $words = explode(" ", $text);
        if (count($words) > 500){
            $errors['text'] = "Text is too long. Please shorten to under 500 words.";
        }
    }
    //display comment if there are errors
    if (count($errors) > 0){
        echo "<h4> Please fix the following errors </h4>";
        echo "<ul>";
        foreach ($errors as $key => $error){
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    //no errors
    else {
        $headline = mysqli_real_escape_string($db,$headline);
        $byline = mysqli_real_escape_string($db,$byline);
        $text = mysqli_real_escape_string($db,$text);

        $sql = "INSERT INTO stories (headline, byline, text, pub_date)
        VALUES ('$headline', '$byline', '$text', current_timestamp)";
        $result = $db->query($sql);
        $new_story_id = $db->insert_id;
        mysqli_close($db);
        ob_clean();
        header("Location:news_detail.php?story_id=$new_story_id");
    }
}


$story =<<<EOS

<div class="row">
    <div class="col-12">
    <form method='POST' action="story_new.php">
    <p><input type='text' name='headline' value='$headline' placeholder="Headline"></p>
    <p><input type='text' name='byline' value='$byline' placeholder="Byline"></p>
    <p><textarea rows="7" cols="63" name='text'>$text</textarea></p>
    <p><input type="submit" name="submit" value="submit"></p>
    </form>
    </div>
</div>
EOS;

echo $story;

require 'includes/footer.php';

?>