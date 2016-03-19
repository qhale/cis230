<?php
ob_start();
$title = 'User Edit';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

//this gets story content from the db
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}
else{
    $user_id = 1;
}

$sql = "SELECT * FROM users WHERE user_id=$user_id";
$result = $db -> query($sql);
list($user_id, $f_name, $l_name, $user_email, $original_password,  $role) = $result -> fetch_row();

$submit = $_POST['submit'];

if ($submit) {

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $user_email = $_POST['email'];
    $readable_pw = $_POST['readable_pw'];
    $password = password_hash($readable_pw, PASSWORD_DEFAULT);
    $role = $_POST['role'];

    //check for missing headline/byline/text
    $errors = array();
    if (!isset($f_name) || $f_name === "") {
        $errors['f_name'] = "First name can't be blank";
    }
    if (!isset($l_name) || $l_name === "") {
        $errors['l_name'] = "Last name can't be blank";
    }
    if (!isset($user_email) || $user_email === "") {
        $errors['email'] = "Email can't be blank";
    }
    if (!isset($readable_pw) || $readable_pw === "") {
        $errors['readable_pw'] = "Password can't be blank";
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
        $f_name = mysqli_real_escape_string($db, $f_name);
        $l_name = mysqli_real_escape_string($db, $l_name);
        $user_email = mysqli_real_escape_string($db, $user_email);
        $password = mysqli_real_escape_string($db, $password);
        $role = mysqli_real_escape_string($db, $role);

        $sql = "UPDATE users SET f_name='$f_name', l_name='$l_name', email='$user_email', password='$password', role='$role' WHERE user_id=$user_id";
        $result = $db->query($sql);
        mail($user_email, "Your Qhale's Username and Password", "Welcome back to Qhale's Boxer Adoption, ".$f_name."! You have edited your login information. Please keep track of this information for future use: \r\n \r\n Username: ".$user_email."\r\n Password: ".$readable_pw);
        ob_clean();
        header("Location:user_admin.php");
    }
};

$user = <<< EOU

    <div class= "story-edit-container">
        <form method='POST' action='user_edit.php?user_id=$user_id'>
        <p><input type='text' name='f_name' value='$f_name' placeholder="First name"></p>
        <p><input type='text' name='l_name' value='$l_name' placeholder="Last name"></p>
        <p><input type='text' name='email' value='$user_email' placeholder="Email"></p>
        <p><input type='text' name='readable_pw' value='$readable_pw' placeholder="Password"></p>
        <p><input type='text' name='role' value='$role' placeholder="Role"></p>
        <p><input type="submit" name="submit" value="Update"></p>
        </form>
    </div>

EOU;

echo $user;

?>

<!-- Closing html tags -->
</div>
</body>
</html>
