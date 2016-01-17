<?php
$title ='Login';
require 'includes/head.php';
require 'includes/nav.php';

?>


<header>
    <h1>Login Please</h1>
</header>
<form method="post" action="index.php">
    <fieldset>
        <legend>Welcome back!</legend>
        <label>Username</label>
        <input type="text" required><br>
        <label>Password</label>
        <input type="password" required><br>
        <input class="button" type="submit" value="Login">
    </fieldset>
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
</form>

<?php
require 'includes/footer.php';

?>
