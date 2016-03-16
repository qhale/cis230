<?php
ob_start();
$title = 'Comment Edit';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

//this gets story content from the db
if(isset($_GET['comment_id'])){
    $comment_id = $_GET['comment_id'];
}
else{
    $comment_id = 1;
}

$sql = "SELECT * FROM comments WHERE comment_id=$comment_id";
$result = $db -> query($sql);
list($comment_id, $comment_author, $comment, $comment_date, $rating, $prod_id)= $result -> fetch_row();

$submit = $_POST['submit'];

if ($submit) {

    $comment_author = $_POST['author'];
    $comment = $_POST['comment'];
    $date = $_POST['date'];
    $rating = $_POST['rating'];
    $prod_id = $_POST['prod_id'];

    //check for missing name/description/price/catalog/detail
    $errors = array();
    if (!isset($comment_author) || $comment_author === "") {
        $errors['author'] = "Author can't be blank";
    }
    if (!isset($comment) || $comment === "") {
        $errors['comment'] = "Comment can't be blank";
    }
    if (!isset($date) || $date === "") {
        $errors['date'] = "Date can't be blank";
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
        $comment_date = mysqli_real_escape_string($db, $comment_date);
        $rating = mysqli_real_escape_string($db, $rating);
        $prod_id = mysqli_real_escape_string($db, $prod_id);

        $sql = "UPDATE comments SET comment_author='$comment_author', comment='$comment', comment_date='$comment_date', rating='$rating', prod_id='$prod_id' WHERE comment_id=$comment_id";
        $result = $db->query($sql);
        ob_clean();
        header("Location:comment_admin.php");
    }
};

$comment_edit = <<< EOU

    <div class= "story-edit-container">
        <form method='POST' action='comment_edit.php?comment_id=$comment_id'>
        <p><input type='text' name='author' value='$comment_author' placeholder="Author"></p>
        <p><input type='text' name='comment' value='$comment' placeholder="Comment"></p>
        <p><input type='text' name='date' value='$comment_date' placeholder="Date"></p>
        <p><input type='text' name='rating' value='$rating' placeholder="Rating"></p>
        <p><input type='text' name='prod_id' value='$prod_id' placeholder="Product ID"></p>
        <p><input type="submit" name="submit" value="Update"></p>
        </form>
    </div>

EOU;

echo $comment_edit;

?>

<!-- Closing html tags -->
        </div>
    </body>
</html>
