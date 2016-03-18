<?php
ob_start();

$title ='Login';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/data_connection.php';

$user_email = $_POST['email'];
$readable_pw = $_POST['readable_pw'];
$submit = $_POST['submit'];
?>


<header>
    <h1>Login Please</h1>
</header>

<?php

if ($submit) {

    $sql = "SELECT * FROM users WHERE email='$user_email'";
    $result = $db->query($sql);
    list($user_id, $f_name, $l_name, $user_email, $password, $role) = $result->fetch_row();

    if (password_verify($readable_pw, $password)){
        $_SESSION['f_name']=$f_name;
        ob_clean();
        header("Location: user_admin.php");
    }
    else {
        echo "<br>Login Failed";
    }
}

$login = <<<LOGIN


<form method="POST" class="login-form" action="login.php">
    <fieldset>
        <legend>Welcome back!</legend>
        <label>Username</label>
        <input type="text" name="email" value="$user_email" required><br>
        <label>Password</label>
        <input type="password" name="readable_pw" value="$readable_pw" required><br>
        <input type="submit" name="submit" value="Login">
        <a class="login-forgot-pw link-on-white-back" href="#">Forgot your password?</a>
    </fieldset>
    <!--
      <fieldset>
        <legend>Don't Have An Account?</legend>
        <label>Create Username</label>
        <input type="text" required><br>
        <label>Create Password</label>
        <input type="password" required><br>
        <label>Confirm Password</label>
        <input type="password" required><br>
        <input class="button" type="submit" value="Create">
    </fieldset>
    -->
</form>

LOGIN;

echo $login;

require 'includes/footer.php';

?>
