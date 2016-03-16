<?php
ob_start();
$title = 'Comment New';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

$submit = $_POST['submit'];

if ($submit) {

    $comment_author = $_POST['author'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
    $prod_id = $_POST['prod_id'];

    //check for missing headline/byline/text
    $errors = array();
    if (!isset($comment_author) || $comment_author === "") {
        $errors['author'] = "Author can't be blank";
    }
    if (!isset($comment) || $comment === "") {
        $errors['comment'] = "Comment can't be blank";
    }
    if (!isset($rating) || $rating === "") {
        $errors['rating'] = "Rating can't be blank";
    }
    if (!isset($prod_id) || $prod_id === "") {
        $errors['prod_id'] = "Product ID can't be blank";
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
        $comment_author = mysqli_real_escape_string($db, $comment_author);
        $comment = mysqli_real_escape_string($db, $comment);
        $rating = mysqli_real_escape_string($db, $rating);
        $prod_id = mysqli_real_escape_string($db, $prod_id);

        $sql = "INSERT INTO comments (comment_author, comment, rating, prod_id) VALUES ('$comment_author', '$comment', '$rating', '$prod_id')";
        $result = $db->query($sql);
        ob_clean();
        header("Location:p_detail.php?prod_id=$prod_id");
    }
}

$comment_new = <<< EOU

    <div class= "story-edit-container">
        <form method='POST' action='comment_new.php?comment_id=$comment_id'>
        <p><input type='text' name='author' value='$comment_author' placeholder="Author"></p>
        <p><input type='text' name='comment' value='$comment' placeholder="Comment"></p>
        <p><input type='text' name='rating' value='$rating' placeholder="Rating"></p>
        <p><input type='text' name='prod_id' value='$prod_id' placeholder="Product ID"></p>
        <p><input type="submit" name="submit" value="Update"></p>
        </form>
    </div>

EOU;

echo $comment_new;
?>

<!-- Closing html tags -->
        </div>
    </body>
</html>

