<?php
ob_start();
$title = 'User Admin';
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

<!-- ********** User Admin ********** -->

<header>
    <h1>User Admin</h1>
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
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th >Password</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                $sql = "SELECT * FROM users";
                $result = $db->query($sql);

                while(list($user_id, $f_name, $l_name, $user_email, $password, $role) = $result->fetch_row()){
                    $small_password = substr($password,0,40);
                    echo "<tr>";
                    echo "<td>$user_id</td>";
                    echo "<td>$f_name</td>";
                    echo "<td>$l_name</td>";
                    echo "<td>$user_email</td>";
                    echo "<td>$small_password...</td>";
                    echo "<td>$role</td>";
                    echo "<td><a href='user_edit.php?user_id=$user_id'>Edit</a></td>";
                    echo "<td><a href='user_delete.php?user_id=$user_id'>Delete</a></td>";
                    echo"</tr>";
                }
                ?>
                
            </table>
            <br><br>
            <a href="user_new.php">Add New User</a>
        </div>
    </div>
</main>

<!-- Closing html tags -->
        </div>
    </body>
</html>