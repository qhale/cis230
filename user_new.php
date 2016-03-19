<?php
ob_start();
$title = 'User New';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';
require 'includes/data_connection.php';

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$user_email = $_POST['email'];
$role = $_POST['role'];
$submit = $_POST['submit'];

if ($submit) {

    $readable_pw=temp_password(8,$chars);
    $password = password_hash($readable_pw, PASSWORD_DEFAULT);

    $f_name = mysqli_real_escape_string($db,$f_name);
    $l_name = mysqli_real_escape_string($db,$l_name);
    $user_email = mysqli_real_escape_string($db,$user_email);
    $role = mysqli_real_escape_string($db,$role);

    $sql = "INSERT INTO users (user_id, f_name, l_name, email, password, role)
    VALUES (null,'$f_name', '$l_name', '$user_email', '$password', '$role')";
    $result = $db->query($sql);
    $new_story_id = $db->insert_id;
    mysqli_close($db);
    mail($user_email, "Your Qhale's Username and Password", "Welcome to Qhale's Boxer Adoption, ".$f_name."! Thank you for creating an account. Please keep track of this information for future use: \r\n \r\n Username: ".$user_email."\r\n Password: ".$readable_pw);
    ob_clean();
    header("Location:user_admin.php");
}

$user = <<<EOU
    <div class="story-edit-container">
        <form method = "POST" action = "user_new.php">
            <p><input type="text" name="f_name" value="$f_name" placeholder="First Name"></p>
            <p><input type="text" name="l_name" value="$l_name" placeholder="Last Name"></p>
            <p><input type="text" name="email" value="$user_email" placeholder="Email"></p>
            <p><input type="text" name="role" value="$role" placeholder="Role"></p>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>

EOU;
echo $user;

?>

<!-- Closing html tags -->
</div>
</body>
</html>

