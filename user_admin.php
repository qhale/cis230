<?php
$title = 'User Page';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

?>

<!-- ********** User Admin ********** -->

<header>
    <h1>User Page</h1>
</header>
<main class="container">
    <div class="row">
        <div class="col-12">
            <table>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                $sql = "SELECT * FROM users";
                $result = $db->query($sql);

                while(list($user_id, $f_name, $l_name, $user_email, $password, $role) = $result->fetch_row()){
                    echo "<tr>";
                    echo "<td>$user_id</td>";
                    echo "<td>$f_name</td>";
                    echo "<td>$l_name</td>";
                    echo "<td>$user_email</td>";
                    echo "<td>$password</td>";
                    echo "<td>$role</td>";
                    echo "<td><a href='user_edit.php?story_id=$user_id'>Edit</a></td>";
                    echo "<td><a href='user_delete.php?story_id=$user_id'>Delete</a></td>";
                    echo"</tr>";
                }
                ?>
                
            </table>
            <br><br>
            <a href="user_new.php">Add New Story</a>
        </div>
    </div>
</main>

<?php
require 'includes/footer.php';
?>