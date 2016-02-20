<?php
ob_start();
$title = 'Story Edit';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

//this gets story content from the db
if(isset($_GET['story_id'])){
    $story_id = $_GET['story_id'];
}
else{
    $story_id = 1;
}

$sql = "SELECT * FROM stories WHERE story_id=$story_id";
$result = $db -> query($sql);
list($story_id, $headline, $byline, $text, $pub_date) = $result -> fetch_row();

//this processes for input
$submit = $_POST['submit'];

if ($submit){

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
        if (count($words) > 500) {
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

        $sql = "UPDATE stories SET headline='$headline', byline='$byline', text='$text' WHERE story_id=$story_id";
        $result = $db->query($sql);
        ob_clean();
        //print_r($_POST);
        //print_r($result);
        header("Location:story_show.php?story_id=$story_id");
    }
};


$update_news =<<< EOS
    <div class= "story-edit-container">
        <form method='POST' action='story_edit.php?story_id=$story_id'>
        <p><input type='text' name='headline' value='$headline' placeholder="Headline"></p>
        <p><input type='text' name='byline' value='$byline' placeholder="Byline"></p>
        <p><textarea rows="7" cols="63" name='text' placeholder="Story">$text</textarea></p>
        <p><input type="submit" name="submit" value="Update"></p>
        </form>
    </div>

EOS;

echo $update_news;

?>

<!-- Closing html tags -->
</div>
</body>
</html>



