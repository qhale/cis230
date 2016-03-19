<body>
<div class="top-bar">
    <div class="container">
        <ul>
            <?php
            if (isset($_SESSION['f_name'])){ //user logged in
                echo "<li><a href='user_admin.php'>Admin</a></li>";
                echo "<li> | </li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
            }
            else { //user logged out
                echo "<li><a href='login.php'>Login</a></li>";
            };
            ?>
            <li> | </li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>
    </div>
</div>
<div id="wrapper">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Dogs Available</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </nav>