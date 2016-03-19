<?php
ob_start();
$title = 'Comment Admin';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

if (isset($_SESSION['f_name'])) {
}
else {
    ob_clean();
    header("Location: index.php");
}
?>

<!-- ********** Comment Admin ********** -->

<header>
    <h1>Comment Admin</h1>
</header>
<nav>
    <ul>
        <li><a href="user_admin.php">User Admin</a></li>
        <li><a href="product_admin.php">Product Admin</a></li>
        <li><a href="story_admin.php">Story Admin</a></li>
        <li><a href="comment_admin.php">Comment Admin</a></li>
    </ul>
</nav>
<main class="container">
    <div class="row">
        <div class="col-12">
            <table>
                <tr>
                    <th>Comment ID</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Date</th>
                    <th>Rating</th>
                    <th>Product ID</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                $sql = "SELECT * FROM comments";
                $result = $db->query($sql);

                while(list($comment_id, $comment_author, $comment, $comment_date, $rating, $prod_id) = $result->fetch_row()){
                    echo "<tr>";
                    echo "<td>$comment_id</td>";
                    echo "<td>$comment_author</td>";
                    echo "<td>$comment</td>";
                    $date = date_create($comment_date);
                    $formatted_date = date_format($date, 'F d, Y');
                    echo "<td>$formatted_date</td>";
                    echo "<td>$rating</td>";
                    echo "<td>$prod_id</td>";
                    echo "<td><a href='comment_edit.php?comment_id=$comment_id'>Edit</a></td>";
                    echo "<td><a href='comment_delete.php?comment_id=$comment_id'>Delete</a></td>";
                    echo"</tr>";
                }
                ?>

            </table>
            <br><br>
            <a href="comment_new.php">Add New Comment</a>
        </div>
    </div>
</main>

<!-- Closing html tags -->
        </div>
    </body>
</html>